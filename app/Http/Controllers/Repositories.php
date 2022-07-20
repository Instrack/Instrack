<?php

namespace App\Http\Controllers;

use App\Models\Repository;
use Illuminate\Http\Request;

class Repositories extends Controller
{
    public function view()
    {
        return view('repositories');
    }

    public function get($slug)
    {
        return view('repositories.manage', [
            'repo' => Repository::query()->where('repositories.slug', $slug)->firstOrFail()
        ]);
    }
}
