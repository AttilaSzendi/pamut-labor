<?php

namespace Feature\Project;

use App\Models\Project;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class ProjectDestroyTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_project_can_be_deleted(): void
    {
        $project = Project::factory()->create();

        $response = $this->deleteJson(route('project.destroy', $project->id));

        $this->assertDatabaseMissing('projects', [
            'id' => $project->id
        ]);

        $response->assertStatus(Response::HTTP_OK);
    }
}
