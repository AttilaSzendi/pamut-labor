<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProjectResource;
use App\Models\Project;

class ProjectShowController extends Controller
{
    public function __invoke(Project $project): ProjectResource
    {
        return new ProjectResource($project->load('contact'));
    }
}
