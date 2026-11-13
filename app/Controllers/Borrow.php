<?php

namespace App\Controllers;

use App\Models\BorrowModel;
use App\Models\BookModel;
use App\Models\MemberModel;

class Borrow extends BaseController
{
    // Open the Borrow Book page
    public function index()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to(base_url('login'));
        }

        $bookModel = new BookModel();
        $memberModel = new MemberModel();

        $data['books'] = $bookModel->where('available >', 0)->findAll();
        $data['members'] = $memberModel->findAll();

        return view('borrow_book', $data);
    }
	
	
// Save a borrowing record
public function save()
{
    if (!session()->get('isLoggedIn')) {
        return redirect()->to(base_url('login'));
    }

    $memberId = $this->request->getPost('member_id');
    $bookId = $this->request->getPost('book_id');
    $borrowDate = $this->request->getPost('borrow_date');
    $dueDate = $this->request->getPost('due_date');

    // Check the dates
    if (!$borrowDate || !$dueDate || strtotime($dueDate) < strtotime($borrowDate)) {
        return redirect()->to(base_url('borrow'))
            ->with('error', 'Please enter valid borrowing and due dates.');
    }

    $memberModel = new MemberModel();
    $bookModel = new BookModel();
    $borrowModel = new BorrowModel();

    $member = $memberModel->find($memberId);
    $book = $bookModel->find($bookId);

    if (!$member || $member['status'] !== 'active') {
        return redirect()->to(base_url('borrow'))
            ->with('error', 'Please select an active member.');
    }

    if (!$book || $book['available'] < 1) {
        return redirect()->to(base_url('borrow'))
            ->with('error', 'This book is not available.');
    }

    // Start database transaction
    $database = \Config\Database::connect();
    $database->transStart();

    // Reduce available book quantity
    $database->table('books')
        ->set('available', 'available - 1', false)
        ->where('id', $bookId)
        ->where('available >', 0)
        ->update();

    if ($database->affectedRows() !== 1) {
        $database->transRollback();

        return redirect()->to(base_url('borrow'))
            ->with('error', 'This book is no longer available.');
    }

    // Save borrowing details
    $borrowModel->insert([
        'member_id' => $memberId,
        'book_id' => $bookId,
        'borrow_date' => $borrowDate,
        'due_date' => $dueDate,
        'status' => 'borrowed'
    ]);

    $database->transComplete();

    if (!$database->transStatus()) {
        return redirect()->to(base_url('borrow'))
            ->with('error', 'Could not save the borrowing record.');
    }

    return redirect()->to(base_url('borrow'))
        ->with('success', 'Book borrowed successfully!');
}

// Display all borrowing records
public function list()
{
    if (!session()->get('isLoggedIn')) {
        return redirect()->to(base_url('login'));
    }

    $database = \Config\Database::connect();

    $data['records'] = $database->table('borrow_records')
        ->select('borrow_records.*, members.full_name, books.title')
        ->join('members', 'members.id = borrow_records.member_id')
        ->join('books', 'books.id = borrow_records.book_id')
        ->orderBy('borrow_records.id', 'DESC')
        ->get()
        ->getResultArray();

    return view('borrow_list', $data);
}
// Return a borrowed book
public function returnBook($id)
{
    if (!session()->get('isLoggedIn')) {
        return redirect()->to(base_url('login'));
    }

    $borrowModel = new BorrowModel();
    $record = $borrowModel->find($id);

    if (!$record || $record['status'] !== 'borrowed') {
        return redirect()->to(base_url('borrow/list'));
    }

    $database = \Config\Database::connect();
    $database->transStart();

    // Increase available book quantity
    $database->table('books')
        ->set('available', 'available + 1', false)
        ->where('id', $record['book_id'])
        ->update();

    // Update borrowing record
    $borrowModel->update($id, [
        'return_date' => date('Y-m-d'),
        'status' => 'returned'
    ]);

    $database->transComplete();

    if (!$database->transStatus()) {
        return redirect()->to(base_url('borrow/list'))
            ->with('error', 'Could not return the book.');
    }

    return redirect()->to(base_url('borrow/list'))
        ->with('success', 'Book returned successfully!');
}

}