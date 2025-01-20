<?php

namespace Feature\Project;

use App\Models\Project;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class ProjectStoreTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_project_can_be_stored(): void
    {
        $input = Project::factory()->make()->toArray();

        $response = $this->postJson(route('project.store'), $input);

        $this->assertDatabaseHas('projects', [
            'id' => 1,
            'name' => $input['name'],
            'status' => $input['status'],
            'contact_id' => $input['contact_id'],
        ]);

        $response->assertStatus(Response::HTTP_CREATED);
    }
}
