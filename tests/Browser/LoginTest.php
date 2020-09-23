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
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                ->type('email', self::EMAIL)
                ->type('password', self::PASSWORD)
                ->login('#login')
                ->assertPathIs('/dashboard');
        });
    }
}
