<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index()
    {
        // $subjects = Subject::paginate(5);
        $subjects = Subject::all();
        return view('subjects.subjects_index', compact("subjects"));
    }
}
