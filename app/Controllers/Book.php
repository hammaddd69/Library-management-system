<?php

namespace App\Controllers;

use App\Models\BookModel;

class Book extends BaseController
{
    // Open Add Book page
    public function index()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to(base_url('login'));
        }

        return view('add_book');
    }

    // Save a new book
    public function save()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to(base_url('login'));
        }

        $bookModel = new BookModel();

        $bookModel->save([
            'title' => $this->request->getPost('title'),
            'author' => $this->request->getPost('author'),
            'isbn' => $this->request->getPost('isbn'),
            'category' => $this->request->getPost('category'),
            'publisher' => $this->request->getPost('publisher'),
            'published_year' => $this->request->getPost('published_year'),
            'quantity' => $this->request->getPost('quantity'),
            'available' => $this->request->getPost('quantity')
        ]);

        return redirect()->to(base_url('books'))
            ->with('success', 'Book added successfully!');
    }

    // Display all books
    public function list()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to(base_url('login'));
        }

        $bookModel = new BookModel();

        $data['books'] = $bookModel->findAll();

        return view('books_list', $data);
    }
}

