<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Department $department)
    {
        $title = $department->name;
        $members = $department->members()->paginate(10);

        return view('departments.members', compact('members'), compact('title'));
    }
}
