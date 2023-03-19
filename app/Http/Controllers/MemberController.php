<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $members = Member::paginate(10);

        return view('members.index', compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('members.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'membership_id' => 'required',
            'name' => 'required',
            'first_name' => 'required',
            'street' => 'required',
            'house_number' => 'required',
            'postal_code' => 'required',
            'city' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'birth_date' => 'required',
            'join_date' => 'required',
        ]);

        Member::create($request->all());

        return redirect()->route('members.index')->with('success', 'Member created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Member $member)
    {
        return view('members.show', compact('member'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Member $member)
    {
        return view('members.edit', compact('member'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Member $member)
    {
        $request->validate([
            'membership_id' => 'required',
            'name' => 'required',
            'first_name' => 'required',
            'street' => 'required',
            'house_number' => 'required',
            'postal_code' => 'required',
            'city' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'birth_date' => 'required',
            'join_date' => 'required',
        ]);

        $member->update($request->all());

        return redirect()->back()->with('success', 'Mitglied erfolgreich aktualisiert.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Member $member)
    {
        $member->delete();

        return redirect()->back()->with('success', 'Member deleted successfully.');
    }
}
