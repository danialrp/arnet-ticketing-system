<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddUserRequest;
use App\Http\Requests\EditUserRequest;
use App\Repositories\AdminRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

/**
 * @property AddUserRequest AddUserRequest
 * @property AdminRepository AdminRepository
 */

class AdminUserController extends Controller
{
    public function __construct(AdminRepository $adminRepository)
    {
        $this->middleware('admin_auth');

        $this->AdminRepository = $adminRepository;
    }

    public function showAddUserForm()
    {
        return view('admin_user.create-user');
    }

    public function createNewUser(AddUserRequest $addUserRequest)
    {
        $this->AdminRepository->insertUser($addUserRequest);

        Session::flash('message', 'کاربر جدید با موفقیت درج گردید!');

        return redirect()->back();
    }

    public function showUsers()
    {
        $allUsers = $this->AdminRepository->getAllUsers();

        return view('admin_user.all-user', compact('allUsers'));
    }

    public function showEditUser($userId)
    {
        $user = $this->AdminRepository->getEditUser($userId);

        return view('admin_user.edit', compact('user'));
    }

    public function editUser(EditUserRequest $editUserRequest, $userId)
    {
        $url = $editUserRequest->fullUrl();

        $this->AdminRepository->updateUser($userId, $editUserRequest);

        Session::flash('message', 'بروزرسانی با موفقیت انجام شد!');

        return redirect($url);
    }
}
