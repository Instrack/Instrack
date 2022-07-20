<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Projects extends Controller
{
    public function view()
    {
        return view('projects');
    }

    public function details($slug)
    {
        return view('/projects/details');
    }
}
