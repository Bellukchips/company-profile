<?php

namespace App\Http\Controllers;

use AnourValar\EloquentSerialize\Service;
use App\Models\Construction\ConstructionModel;
use App\Models\Project\Project;
use App\Models\Project\TypeProject;
use App\Models\Service\OurService;
use App\Models\Setting\Setting;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $setting = Setting::first();
        $services = OurService::all();
        $projects = Project::all();
        $typeProject = TypeProject::all();
        $constructions = ConstructionModel::all();
        return view('pages.index', compact("constructions", "setting", "services", "projects", "typeProject"));
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
