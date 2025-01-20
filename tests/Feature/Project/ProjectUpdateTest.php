<?php

namespace Feature\Project;

use App\Mail\ProjectUpdatedMail;
use App\Models\Contact;
use App\Models\Project;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class ProjectUpdateTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_project_can_be_updated(): void
    {
        Mail::fake();

        /** @var Contact $contact */
        $contact = Contact::factory()->create([
            'email' => 'szendiattila@gmail.com',
            'name' => 'Nagy András',
        ]);

        /** @var Project $project */
        $project = Project::factory()->create();

        $input = Project::factory()->make(['contact_id' => $contact->id])->toArray();

        $response = $this->patchJson(route('project.update', $project->id), $input);

        $this->assertDatabaseHas('projects', [
            'id' => $project->id,
            'name' => $input['name'],
            'status' => $input['status'],
            'contact_id' => $input['contact_id'],
        ]);

        $response->assertStatus(Response::HTTP_OK);

        Mail::assertSent(function (ProjectUpdatedMail $mail) use ($contact) {
            return
                $mail->hasTo($contact->email) &&
                $mail->assertFrom(config('mail.from.address')) &&
                $mail->hasSubject('Project Updated Mail');
        });
    }
}
