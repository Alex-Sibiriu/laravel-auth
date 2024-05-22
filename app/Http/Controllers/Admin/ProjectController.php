<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Functions\Helper;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        $num_projects = Project::count();

        return view('admin.projects.index', compact('projects', 'num_projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $val_data = $request->validate(
            [
                'title' => 'required|min:3|max:100',
                'link' => 'required|min:10',
            ],
            [
                'title.required' => 'Inserire un titolo',
                'title.min' => 'Il titolo deve contenere almeno :min caratteri',
                'title.max' => 'Il titolo non deve contenere più di :max caratteri',

                'link.required' => 'Inserire un link',
                'link.min' => 'Il link deve contenere almeno :min caratteri'
            ]
        );

        if ($val_data['title'] === $project->title) {
            $val_data['slug'] = $project->slug;
        } else {
            $val_data['slug'] = Helper::createSlug($val_data['title'], Project::class);
        }

        $project->update($val_data);

        return redirect()->route('admin.projects.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
