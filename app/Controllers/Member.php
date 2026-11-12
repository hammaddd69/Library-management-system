<?php
// this controller handles three actions:opening registration page,saving member and displaying all members
namespace App\Controllers;

use App\Models\MemberModel;

class Member extends BaseController
{
    // Display the Add Member page
    public function index()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to(base_url('login'));
        }

        return view('add_member');
    }

    // Save a new member
    public function save()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to(base_url('login'));
        }

        $memberModel = new MemberModel();

        $memberModel->save([
            'full_name' => $this->request->getPost('full_name'),
            'email' => $this->request->getPost('email'),
            'phone' => $this->request->getPost('phone'),
            'address' => $this->request->getPost('address'),
            'status' => 'active'
        ]);

        return redirect()->to(base_url('members/list'))
            ->with('success', 'Member registered successfully!');
    }

    // Display all members
    public function list()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to(base_url('login'));
        }

        $memberModel = new MemberModel();

        $data['members'] = $memberModel->findAll();

        return view('members_list', $data);
    }
	
	// Open the Edit Member page
public function edit($id)
{
    if (!session()->get('isLoggedIn')) {
        return redirect()->to(base_url('login'));
    }

    $memberModel = new MemberModel();

    $data['member'] = $memberModel->find($id);

    if (!$data['member']) {
        return redirect()->to(base_url('members/list'));
    }

    return view('edit_member', $data);
}

// Update an existing member
public function update($id)
{
    if (!session()->get('isLoggedIn')) {
        return redirect()->to(base_url('login'));
    }

    $memberModel = new MemberModel();

    $memberModel->update($id, [
        'full_name' => $this->request->getPost('full_name'),
        'email' => $this->request->getPost('email'),
        'phone' => $this->request->getPost('phone'),
        'address' => $this->request->getPost('address')
    ]);

    return redirect()->to(base_url('members/list'))
        ->with('success', 'Member updated successfully!');
}
}