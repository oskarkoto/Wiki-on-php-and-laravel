<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Wtype;

class CreateTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $wtype = Wtype::create(['description' => 'Question' ]);
        $wtype = Wtype::create(['description' => 'Article' ]);
    }
}
