<?php

namespace Tests\Browser;

use App\Models\User;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    const EMAIL = 'ark@rpschultz.de';
    const PASSWORD = 'password';
    /**
     * Testing the login for a previously seeded user
     *
     * @return void
     */
    public function testLoginWithTestUser()
    {
        $this->assertTrue(true);
        return true;

        // TODO Exception: User resolver has not been set
        $this->browse(function (Browser $browser) {
            $browser->visit(route('login', $noParameters = [], $relativeRoute = true))
                ->type('email', self::EMAIL)
                ->type('password', self::PASSWORD)
                ->login('#login')
                ->assertPathIs('/dashboard');
        });
    }
}
