<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repositories\UserRepository;
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
}
