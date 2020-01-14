<?php

namespace Tests\Feature;

use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Collection;
use Tests\TestCase;
use App\Contact;

class ContactsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_contact_can_be_added()
    {
        $this->post('api/contacts', $this->data());

        $contact = Contact::first();

        $this->assertEquals('Test Name', $contact->name);
        $this->assertEquals('test@email.com', $contact->email);
        $this->assertEquals('05/14/1988', $contact->birthday->format('m/d/Y'));
        $this->assertEquals('ABC String', $contact->company);

    }

    /** @test */

    public function fields_are_required()
    {
        collect(['name', 'email', 'company', 'birthday'])
            ->each(function ($field) {
                $response = $this->post('api/contacts', array_merge(
                    $this->data(),
                    [$field => '']
                ));

                $response->assertSessionHasErrors($field);
                $this->assertCount(0, Contact::all());
            });
    }

    /** @test */
    public function email_must_be_a_valid_email()
    {
        $response = $this->post('api/contacts', array_merge(
            $this->data(),
            ['email' => 'NOT AN EMAIL']
        ));

        $response->assertSessionHasErrors('email');
        $this->assertCount(0, Contact::all());
    }

    /** @test */
    public function birthdays_are_properly_stored()
    {
        $this->post('api/contacts', $this->data());
        $this->assertCount(1, Contact::all());
        $this->assertInstanceOf(Carbon::class, Contact::first()->birthday);

        $this->assertEquals('05-14-1988', Contact::first()->birthday->format('m-d-Y'));
    }

    /** @test */

    public function a_contact_can_be_retrieve()
    {
        $contact = factory(Contact::class)->create();

        $response = $this->get('api/contacts/' . $contact->id);

        $response->assertJson([
            'name' => $contact->name,
            'email' => $contact->email,
            'company' => $contact->company,
            'birthday' => $contact->birthday
        ]);
    }

    /** @test */
    public function a_contact_can_be_patched()
    {
        $this->withoutExceptionHandling();
        $contact = factory(Contact::class)->create();

        $response = $this->patch('/api/contacts/' . $contact->id, $this->data());
        $contact = $contact->fresh();

        $this->assertEquals('Test Name', $contact->name);
        $this->assertEquals('test@email.com', $contact->email);
        $this->assertEquals('05/14/1988', $contact->birthday->format('m/d/Y'));
        $this->assertEquals('ABC String', $contact->company);

    }

    private function data()
    {
        return [
            'name' => 'Test Name',
            'email' => 'test@email.com',
            'birthday' => '05/14/1988',
            'company' => 'ABC String'
        ];
    }
}
