<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProjectResource;
use App\Models\Project;

class ProjectDestroyController extends Controller
{
    public function __invoke(Project $project): ProjectResource
    {
        $project->delete();

        return new ProjectResource($project);
    }
}
