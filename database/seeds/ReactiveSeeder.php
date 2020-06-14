<?php

use Illuminate\Database\Seeder;

class ReactiveSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        factory(App\Reactive::class, 5)->create();

    }
}
