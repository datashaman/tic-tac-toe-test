<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 5)
            ->create()
            ->each(
                function ($user) {
                    for($x = 0; $x < rand(1, 5); $x++) {
                        $user->games()->save(factory(App\Game::class)->make());
                    }
                }
            );
    }
}
