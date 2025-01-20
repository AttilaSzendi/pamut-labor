<?php

namespace Feature\Project;

use App\Enums\StatusEnum;
use App\Models\Project;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class ProjectIndexTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     */
    public function test_the_project_index_page_is_working(): void
    {
        Project::factory()->count($count = 3)->create();

        $response = $this->getJson(route('project.index'));

        $response->assertJsonCount($count, 'data');

        $response->assertJsonStructure([
            'data' => [
                [
                    'id',
                    'name',
                    'status',
                    'contactId',
                    'createdAt',
                    'updatedAt',
                ]
            ]
        ]);

        $response->assertStatus(Response::HTTP_OK);
    }

    public function test_projects_can_be_filtered_by_status(): void
    {
        Project::factory()->create(['status' => StatusEnum::IN_PROGRESS]);
        Project::factory()->create(['status' => StatusEnum::RELEASED]);

        $response = $this->getJson(route('project.index', ['status' => StatusEnum::RELEASED]));

        $response->assertJsonCount(1, 'data');

        $response->assertJsonStructure([
            'data' => [
                [
                    'id',
                    'name',
                    'status',
                    'contactId',
                    'createdAt',
                    'updatedAt',
                ]
            ]
        ]);

        $response->assertStatus(Response::HTTP_OK);
    }
}
