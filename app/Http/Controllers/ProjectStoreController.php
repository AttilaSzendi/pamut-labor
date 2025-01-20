<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectRequest;
use App\Http\Resources\ProjectResource;
use App\Models\Project;

class ProjectStoreController extends Controller
{
    public function __invoke(ProjectRequest $request): ProjectResource
    {
        $project = Project::query()->create($request->validated());

        return new ProjectResource($project->load('contact'));
    }
}
