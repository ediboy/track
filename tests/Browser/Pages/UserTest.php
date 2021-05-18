<?php

namespace Tests\Browser\Pages;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use RolesAndPermissionsSeeder;
use ProfilesSeeder;
use App\Models\User;

/**
 * @group user
 */
class UserTest extends DuskTestCase
{
    use DatabaseMigrations;

    private $user;

    public function setUp() :void
    {
        parent::setUp();

        $this->seed(RolesAndPermissionsSeeder::class);
        $this->seed(ProfilesSeeder::class);

        $this->user = factory(User::class)->create();

        foreach (static::$browsers as $browser) {
            $browser->driver->manage()->deleteAllCookies();
        }
    }

    /**
    * Simulate user CRUD
    *
    * @test
    */

    public function can_create_view_update_delete_user()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->user)

                    // Create user
                    ->visit('/users')
                    ->assertSee('Users')
                    ->click('.user-create')
                    ->assertSee('Create User')
                    ->type('Firstname', "Juan")
                    ->type('Lastname', "Dela Cruz")
                    ->select('Civil Status', "Single")
                    ->click('input[name="Birthday"]')
                    ->waitFor('.vdatetime-popup')
                    ->click('.vdatetime-popup__actions__button--confirm')
                    ->type('Email', "juan@test.com")
                    ->type('Employee Number', "12345")
                    ->select('Position', "CEO")
                    ->click('input[name="Start Date"]')
                    ->waitFor('.vdatetime-popup')
                    ->click('.vdatetime-popup__actions__button--confirm')
                    ->type('Hourly Rate', "500")
                    ->select('Status', "Regular")
                    ->pause(500)
                    ->press('CREATE')
                    ->waitFor('.response')
                    ->assertSee('Success')
                    ->click('.response-close')

                    // View user
                    ->click('.user-list')
                    ->waitForLocation('/users')
                    ->assertSee('Dela Cruz, Juan')
                    ->click('.user-view')
                    ->waitForLocation('/users/2')
                    ->assertSee('Juan Dela Cruz')
                    ->assertSee('Single')
                    ->assertSee('12345')
                    ->assertSee('CEO')

                    // Edit user
                    ->click('.user-list')
                    ->waitForLocation('/users')
                    ->assertSee('Dela Cruz, Juan')
                    ->click('.user-edit')
                    ->waitForLocation('/users/2/edit')
                    ->assertSee('Edit User')
                    ->type('Firstname', "Pedro")
                    ->type('Lastname', "Dela Cruz")
                    ->press('SAVE')
                    ->waitFor('.response')
                    ->assertSee('Success')
                    ->click('.response-close')

                    // Delete user
                    ->click('.user-delete')
                    ->assertSee('Are you sure you want to delete?')
                    ->press("Delete")
                    ->waitForLocation('/users')
                    ->assertDontSee('Dela Cruz, Pedro');
        });
    }
}
