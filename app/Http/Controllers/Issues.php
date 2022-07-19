<?php

namespace App\Http\Controllers;

use App\Models\Issue;
use Illuminate\Http\Request;

class Issues extends Controller
{
    public function view(Request $request)
    {
        $filter = $request->query('open');

        return view('issues', [
            'issues' => Issue::query()->get()
                ->when($filter, function ($query, $filter) {
                    $query->where('type', $filter);
                })
        ]);
    }
}
