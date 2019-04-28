<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveMemberProfileRequest;
use App\Http\Requests\StoreMemberRequest;
use App\Http\Requests\UpdateMemberRequest;
use App\Imports\MembersImport;
use App\Services\Member\MemberServiceInterface as MemberService;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class MemberController extends Controller
{
    private $memberService;

    public function __construct(MemberService $memberService)
    {
        $this->middleware('auth')->except(['save']);
        $this->memberService = $memberService;
    }

    public function index()
    {
        $members = $this->memberService->fetchAll();

        return view('members.index')->with(['members' => $members]);
    }

    public function show(int $id)
    {
        $member = $this->memberService->getMember($id);
        return view('members.view')->with(['member' => $member]);
    }

    public function create()
    {
        return view('members.create');
    }

    public function edit(int $id)
    {
        $member = $this->memberService->getMember($id);

        return view('members.edit')->with(['member' => $member]);
    }

    public function store(StoreMemberRequest $request)
    {
        $member = $this->memberService->createMember($request->all());

        return redirect('members')->with('info', "Member has been created");
    }

    public function update(UpdateMemberRequest $request, int $id)
    {
        $member = $this->memberService->updateMember($request->all(), $id);

        return \redirect('members')->with('success', 'Member has been updated');
    }

    public function import()
    {
        Excel::import(new MembersImport, request()->file('file'));

        return redirect('/members')->with('success', 'All good!');
    }

    public function save(SaveMemberProfileRequest $request)
    {
        $member = $this->memberService->saveProfile($request->all());

        return \redirect('/member/profile')->with('success', 'Your membership profile has been updated');
    }
}
