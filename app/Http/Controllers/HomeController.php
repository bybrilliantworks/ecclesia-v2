<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Services\Member\MemberServiceInterface as MemberService;
use App\Services\User\UserServiceInterface as UserService;

class HomeController extends Controller
{
    private $memberService;
    private $userService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(MemberService $memberService, UserService $userService)
    {
        $this->middleware('auth');
        $this->memberService = $memberService;
        $this->userService = $userService;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recentlyJoinedMembers = $this->memberService->fetchAll();
        $loggedInUser = $this->userService->getUser(auth()->user()->id);
        return view('home')->with(['recent_joined_members' => $recentlyJoinedMembers, 'user' => $loggedInUser]);
    }
}
