<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Wstate;

class CreateStateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $wstate = Wstate::create(['description' => 'Open' ]);
        $wstate = Wstate::create(['description' => 'Closed' ]);
    }
}
