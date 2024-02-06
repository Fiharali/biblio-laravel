<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('admin.projects.index',[ 'projects'=>Project::paginate(5)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.projects.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        //
        Project::create($request->all());
        return to_route('projects.index')->with('success', 'Project added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        //
        return view('admin.projects.edit',[ 'project'=>$project]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        //
        $project->update($request->all());
        return redirect()->route('projects.index')->with('success', "project  updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        //
        $project->delete();

        return redirect()->route('projects.index')->with('success', "Book $project->title delete successfully");

    }
}
