<?php

namespace App\Http\Controllers;

use App\Repositories\AdminRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

/**
 * @property AdminRepository AdminRepository
 */

class AdminController extends Controller
{

    public function __construct(AdminRepository $adminRepository)
    {
        $this->middleware('admin_auth');

        $this->AdminRepository = $adminRepository;
    }

    public function showDashboard()
    {
        $departmentId = Auth::guard('web_admin')->user()->department;

        $dashboardInfo = [
            'usersCount' => $this->AdminRepository->getUsersCount(),
            'newMessagesCount' => $this->AdminRepository->getNewMessagesCount($departmentId),
            'unpaidInvoicesCount' => $this->AdminRepository->getUnpaidInvoicesCount(),
            'projectsCount' => $this->AdminRepository->getProjectsCount(),

        ];

        return view('admin.dashboard', compact('dashboardInfo'));
    }

}