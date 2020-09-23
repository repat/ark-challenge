<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class DashboardTest extends DuskTestCase
{
    /**
     * A Test for making sure Dashboard data (blocks / transactions) are loaded and the user
     * has a button to login / register
     *
     * @return void
     */
    public function testDashboardLoggedOutViewsAndLoginLinks()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(route('welcome', $noParameters = [], $relativeRoute = true))
                    ->assertSee('Dashboard')
                    ->assertSee('Login')
                    ->assertSee('Register')
                    ->waitFor('#blocks-table')
                    ->assertSee('Generator') // example from blocks table
                    ->waitFor('#transactions-table')
                    ->assertSee('Amount'); // examples from transactions table
        });
    }
}
