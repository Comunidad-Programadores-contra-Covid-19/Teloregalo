<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RegisterTest extends DuskTestCase
{
    //use DatabaseMigrations;
    /**
     * A Dusk test example.
     * @test
     * @return void
     */
    public function aUserCanRegisterStore()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/stores/register')
                ->type('name', 'Juan Perez')
                ->type('email', 'nike@email.com')
                ->type('password', '123456789')
                ->type('password_confirmation', '123456789')
                ->check('terminos')
                ->press('#btnRegistroComercio1')
                ->type('name', 'Nike')
                ->type('address', "Avenida Loca")
                ->type('phone', '999999999')
                ->press('#btnRegistroComercio1')
                ->assertPathIs('/stores/miPerfil');
        });
    }

    /* public function aUserCanRegisterClient()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/stores/register')
                ->type('name', 'Juan Perez')
                ->type('email', 'nike@email.com')
                ->type('password', '123456789')
                ->type('password_confirmation', '123456789')
                ->check('terminos')
                ->press('#btnRegistroComercio1')
                ->type('name', 'Nike')
                ->type('address', "Avenida Loca")
                ->type('phone', '999999999')
                ->press('#btnRegistroComercio1')
                ->assertPathIs('/stores/miPerfil');
        });
    } */
}
