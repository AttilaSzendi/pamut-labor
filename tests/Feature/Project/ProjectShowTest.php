<?php

namespace Feature\Project;

use App\Models\Project;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class ProjectShowTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_project_can_be_shown(): void
    {
        $project = Project::factory()->create();

        $response = $this->getJson(route('project.show', $project->id));

        $response->assertJsonStructure([
            'data' => [
                'id',
                'name',
                'status',
                'contactId',
                'createdAt',
                'updatedAt',

            ]
        ]);

        $response->assertStatus(Response::HTTP_OK);
    }
}
