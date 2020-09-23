<?php

namespace Tests\Browser;

use ArkEcosystem\Ark\Facades\Ark;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class WalletsTest extends DuskTestCase
{
    /**
     * A Test for making sure Wallets data is loaded
     *
     * @return void
     */
    public function testWalletsIndex()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(route('wallet', $noParameters = [], $relativeRoute = true))
                    ->assertSee('Wallets')
                    ->waitFor('#wallets-table')
                    ->assertSee('Delegate')
                    ->assertSee('Address')
                    ->assertSee('Balance');
        });
    }
    /**
     * A Test for making sure Wallets data is loaded
     *
     * @return void
     */
    public function testWalletsShow()
    {
        $apiResponse = Ark::wallets()->all();
        $wallets = $apiResponse['data'] ?? [];
        $exampleWallet = array_first($wallets);
        $this->browse(function (Browser $browser) use ($exampleWallet) {
            $browser->visit(route('wallet.show', $exampleWallet['address'], $relativeRoute = true))
                    ->pause($miliseconds = 3000)
                    ->assertSee('Details');
        });
    }
}
