<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Functions\Helper;
use App\Http\Requests\ProjectRequest;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::orderByDesc('id')->get();
        $num_projects = Project::count();

        return view('admin.projects.index', compact('projects', 'num_projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $method = 'POST';
        $route = route('admin.projects.store');
        $project = null;
        $title = 'Aggiungi un nuovo fumetto';

        return view('admin.projects.create-edit', compact('method', 'route', 'project', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProjectRequest $request)
    {
        $val_data = $request->all();
        $val_data['slug'] = Helper::createSlug($val_data['title'], Project::class);
        $project = new Project;
        $project->fill($val_data);

        $project->save();

        return redirect()->route('admin.projects.show', compact('project'))->with('success', 'Progetto ' . $project->title . ' aggiunto con successo');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $method = 'PUT';
        $route = route('admin.projects.update', $project);
        $title = 'Modifica il fumetto';

        return view('admin.projects.create-edit', compact('project', 'method', 'route', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProjectRequest $request, Project $project)
    {
        $val_data = $request->all();

        if ($val_data['title'] === $project->title) {
            $val_data['slug'] = $project->slug;
        } else {
            $val_data['slug'] = Helper::createSlug($val_data['title'], Project::class);
        }

        $project->update($val_data);

        return redirect()->route('admin.projects.show', $project)->with('success', 'Progetto ' . $project->title . ' modificato con successo');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('admin.projects.index')->with('success', 'Progetto ' . $project->title . ' eliminato con successo');
    }
}
