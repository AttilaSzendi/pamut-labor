<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProjectResource;
use App\Models\Project;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ProjectIndexController extends Controller
{
    public function __invoke(Request $request): AnonymousResourceCollection
    {
        return ProjectResource::collection(
            Project::query()
                ->when($request->has('status'), function (Builder $query) use ($request) {
                    $query->where('status', $request->input('status'));
                })
                ->with('contact')
                ->paginate(10)
        );
    }
}
