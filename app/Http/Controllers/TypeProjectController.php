<?php

namespace App\Http\Controllers;

use App\Models\Project\Project;
use Illuminate\Http\Request;

class TypeProjectController extends Controller
{
    /**
     * Menampilkan proyek yang statusnya 'not_started'.
     */
    public function projectNotStarted()
    {
        $projects = Project::where('status', 'not_started')->get();
        return view('pages.type-project', compact('projects'));
    }

    /**
     * Menampilkan proyek yang statusnya 'ongoing'.
     */
    public function projectOngoing()
    {
        $projects = Project::where('status', 'ongoing')->get();
        return view('pages.type-project', compact('projects'));
    }

    /**
     * Menampilkan proyek yang statusnya 'finish'.
     */
    public function projectFinished()
    {
        $projects = Project::where('status', 'finish')->get();
        return view('pages.type-project', compact('projects'));
    }
}
