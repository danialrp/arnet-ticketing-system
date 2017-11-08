<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Session;
use \Verta as Verta;


/**
 * @property UserRepository UserRepository
 */

class UserController extends Controller
{
    private $ticketRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->middleware('auth');
        $this->UserRepository = $userRepository;
    }

    public function showDashboard()
    {
        $dashboardAllCounts = [
            'time' => verta::now(),
            'unreadTickets' => $this->UserRepository->getNewMessagesCount(Auth::user()->id),
            'unpaidInvoices' => $this->UserRepository->getUnpaidInvoicesCount(Auth::user()->id),
            'allMessages' => $this->UserRepository->getAllMessagesCount(Auth::user()->id),
            'allProjects' => $this->UserRepository->getAllProjectsCount(Auth::user()->id),
        ];

        $projectDetails = $this->UserRepository->getProjectDetails(Auth::user()->id);

        $ticketDetails = $this->UserRepository->getTicketDetails(Auth::user()->id);


        return view('user.dashboard', compact([
            'dashboardAllCounts',
            'projectDetails',
            'ticketDetails',
        ]));
    }

    public function showSetting()
    {
        return view('user.user-setting');
    }

    public function updatePassword(UpdateUserPassword $updateUserPassword)
    {
        if(! $this->UserRepository->updateUserPass(Auth::user()->id, $updateUserPassword))
            return redirect()->back()->withErrors('کلمه عبور فعلی شما صحیح نمی باشد!');

        Session::flash('message', 'کلمه عبور شما با موفقیت بروزرسانی شد!');

        return redirect()->back();
    }
}
