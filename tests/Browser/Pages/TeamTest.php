<?php

namespace Tests\Browser\Pages;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use RolesAndPermissionsSeeder;
use ProfilesSeeder;
use App\Models\User;
use App\Models\Team;

/**
 * @group team
 */
class TeamTest extends DuskTestCase
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
    * Simulate team CRUD
    *
    * @test
    */

    public function can_create_view_update_delete_team()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs($this->user)

                    // Create team
                    ->visit('/teams')
                    ->assertSee('Teams')
                    ->click('.team-create')
                    ->assertSee('Create Team')
                    ->type('title', "Team1")
                    ->type('description', "Sample team")
                    ->click('.unassigned-user')
                    ->press('CREATE')
                    ->waitForLocation('/teams')
                    ->waitFor('.response')
                    ->assertSee('Success')
                    ->click('.response-close')

                    // View team
                    ->waitForLocation('/teams')
                    ->assertSee('Team1')
                    ->assertSee('Sample team')
                    ->assertSee('1')
                    ->assertSee('MEMBERS')

                    // Edit team
                    ->click('.team-edit')
                    ->waitForLocation('/teams/1/edit')
                    ->assertSee('Edit Team')
                    ->type('title', "Team2")
                    ->type('description', "Sample team2")
                    ->click('.assigned-user')
                    ->press('SAVE')
                    ->waitForLocation('/teams')
                    ->waitFor('.response')
                    ->assertSee('Success')
                    ->click('.response-close')

                    // View team updated
                    ->waitForLocation('/teams')
                    ->assertSee('Team2')
                    ->assertSee('Sample team2')
                    ->assertSee('0')
                    ->assertSee('MEMBERS')

                    // Delete team
                    ->click('.team-edit')
                    ->waitForLocation('/teams/1/edit')
                    ->click('.team-delete')
                    ->assertSee('Are you sure you want to delete?')
                    ->press("Delete")
                    ->waitForLocation('/teams')
                    ->assertDontSee('Team2');
        });
    }
}
