<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Technology;

class DashboardController extends Controller
{
    public function index()
    {
        $count_project = Project::count();
        $last_project = Project::orderByDesc('created_at')->first();
        $updated_project = Project::orderByDesc('updated_at')->first();
        $count_technologies = Technology::count();

        return view('admin.home', compact('count_project', 'last_project', 'updated_project', 'count_technologies'));
    }
}
