<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\User;

class LoginTest extends DuskTestCase
{
    use DatabaseMigrations;
    /**
     * A Dusk test example.
     * @test
     * @return void
     */
    public function registeredStoresCanLogin()
    {
        $user = factory(User::class)->create([
            'name' => 'Adidas',
            'email' => 'adidas@mail.com',
            'rol' => 'store',
            'password' => '123456789'
        ]);
        $this->browse(function ($browser) use ($user) {
            $browser->visit('/login/stores')
                ->type('email', 'adidas@mail.com')
                ->type('password', '123456789')
                ->press('#btnIngreso')
                ->assertPathIs('/stores/miPerfil');
        });
    }
}
