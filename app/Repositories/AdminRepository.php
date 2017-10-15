<?php

namespace App\Repositories;

use App\Http\Requests\AddUserRequest;
use App\Http\Requests\EditUserRequest;
use App\User;
use Carbon\Carbon;
use Hekmatinasser\Verta\Verta;
use Illuminate\Support\Facades\DB;

/**
 * Class AdminRepository
 *
 * @package \App\Repositories
 */
class AdminRepository
{
    public function getUsersCount()
    {
        $usersCount = DB::table('users')
            ->count();

        return $usersCount;
    }

    public function getNewMessagesCount($departmentId)
    {
        $newMessagesCount = DB::table('tickets')
            ->where('status', 1)
            ->where('department', $departmentId)
            ->count();

        return $newMessagesCount;
    }

    public function getUnpaidInvoicesCount()
    {
        $unpaidInvoicesCount = DB::table('invoices')
            ->where('status', 7)
            ->count();

        return $unpaidInvoicesCount;
    }

    public function getProjectsCount()
    {
        $projectsCount = DB::table('projects')
            ->count();

        return $projectsCount;
    }

    public function insertUser(AddUserRequest $addUserRequest)
    {
        DB::table('users')
            ->insert([
                'fname' => $addUserRequest->fname,
                'lname' => $addUserRequest->lname,
                'email' => $addUserRequest->email,
                'password' => bcrypt($addUserRequest->password),
                'role' => 1,
                'phone' => $addUserRequest->phone,
                'ip_address' => '0.0.0.0',
                'login_time' => null,
                'note' => $addUserRequest->note,
                'created_fa' => Verta::now(),
                'created_at' => Carbon::now(),
            ]);
    }

    public function getAllUsers()
    {
        $allUsers = DB::table('users')->orderBy('created_fa', 'desc')->get();

        return $allUsers;
    }

    public function getEditUser($userId)
    {
        $editUser = DB::table('users')
            ->where('id', $userId)
            ->first();

        return $editUser;
    }

    public function updateUser($userId, EditUserRequest $editUserRequest)
    {
        $user = User::find($userId);

        if(! empty($editUserRequest->password))
            $user->password = bcrypt($editUserRequest->password);

        DB::table('users')
            ->where('id', $userId)
            ->update([
                'fname' => $editUserRequest->fname,
                'lname' => $editUserRequest->lname,
                'email' => $editUserRequest->email,
                'password' => $user->password,
                'phone' => $editUserRequest->phone,
                'note' => $editUserRequest->note,
                'updated_at' => Carbon::now(),
            ]);
    }

    public function getAllProjects()
    {
        $allProjects = DB::table('projects')
            ->orderBy('created_fa', 'desc')
            ->get();

        return $allProjects;
    }

    public function getAllStatuses()
    {
        $allStatuses = DB::table('statuses')
            ->orderBy('id', 'asc')
            ->get();

        return $allStatuses;
    }

    public function getAllPriorities()
    {
        $allPriorities = DB::table('priorities')
            ->orderBy('id', 'asc')
            ->get();

        return $allPriorities;
    }
}