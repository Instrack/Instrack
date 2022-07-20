<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class Projects extends Controller
{
    public function view()
    {
        return view('projects');
    }

    public function details($slug)
    {
        return view('projects.details', [
            'project' => Project::query()->where('projects.slug', $slug)->firstOrFail()
        ]);
    }

    public function roadmap($slug)
    {

    }
}
