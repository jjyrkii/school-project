<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Member;
use App\Models\Training;
use Illuminate\Http\Request;

class TrainingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $trainings = Training::paginate(10);
        return view('trainings.index', compact('trainings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(?Member $member)
    {
        return view('trainings.create', compact('member'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required',
            'member_id' => 'required',
            'department_id' => 'required',
        ]);

        Training::create($request->all());

        return redirect()->route('trainings.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Training $training)
    {
        return view('trainings.show', compact('training'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Training $training)
    {
        return view('trainings.edit', compact('training'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Training $training)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Training $training)
    {
        //
    }
}
