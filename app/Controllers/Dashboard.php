<?php

namespace App\Controllers;

use App\Models\BookModel;
use App\Models\MemberModel;
use App\Models\BorrowModel;

class Dashboard extends BaseController
{
    public function index()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to(base_url('login'));
        }

        $bookModel = new BookModel();
        $memberModel = new MemberModel();
        $borrowModel = new BorrowModel();

        $data['totalBooks'] = $bookModel->countAll();

        $data['totalMembers'] = $memberModel->countAll();

        $data['borrowedBooks'] = $borrowModel
            ->where('status', 'borrowed')
            ->countAllResults();

        $data['returnedBooks'] = $borrowModel
            ->where('status', 'returned')
            ->countAllResults();

        return view('dashboard', $data);
    }
}