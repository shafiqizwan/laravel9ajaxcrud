<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;

class MemberController extends Controller
{
    public function index()
    {
        return view('show');
    }

    public function getMember()
    {
        $members = Member::all();

        return view('memberlist', compact('members'));
    }

    public function save(Request $request)
    {
        if ($request->ajax())
        {
            $member = new Member;
            $member->firstname = $request->input('firstname');
            $member->lastname = $request->input('lastname');
            $member->save();

            return response($member);
        }
    }

    public function update(Request $request)
    {
        if ($request->ajax())
        {
            $member = Member::find($request->id);
            // dd($member);
            $member->firstname = $request->input('firstname');
            $member->lastname = $request->input('lastname');

            $member->update();
            return response($member);
        }
    }
}
