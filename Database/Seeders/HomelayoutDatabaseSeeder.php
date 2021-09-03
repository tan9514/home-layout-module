<?php

namespace Modules\Homelayout\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class HomelayoutDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $this->call([
            HomeLayoutAuthMenuSeeder::class,
            ModuleSeeder::class
        ]);
    }
}
