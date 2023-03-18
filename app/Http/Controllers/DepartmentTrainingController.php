<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Training;
use Illuminate\Http\Request;

class DepartmentTrainingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Department $department)
    {
        $title = $department->name;
        $trainings = Training::where('department_id', '=', $department->id)->paginate(10);

        return view('departments.trainings', compact('trainings'), compact('title'));
    }
}
