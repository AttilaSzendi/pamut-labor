<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectRequest;
use App\Http\Resources\ProjectResource;
use App\Mail\ProjectUpdatedMail;
use App\Models\Project;
use Illuminate\Support\Facades\Mail;

class ProjectUpdateController extends Controller
{
    public function __invoke(Project $project, ProjectRequest $request): ProjectResource
    {
        $project->update($request->validated());

        Mail::to($project->contact)->send(new ProjectUpdatedMail($project));

        return new ProjectResource($project->load('contact'));
    }
}
