<?php

namespace Database\Seeders;

use App\Models\Diary;
use App\Models\User;
use Illuminate\Database\Seeder;

class DemoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $demoEmail = 'demo@diary.se';
        User::where('email', $demoEmail)->delete();
        $user = USER::factory()->create([
            'email' => 'demo@diary.se',
        ]);

        Diary::factory(20)->create([
            'owner' => $user->id,
        ]);
    }
}