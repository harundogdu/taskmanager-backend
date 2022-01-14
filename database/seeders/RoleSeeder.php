<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = [
            'todo',
            'inprogress',
            'testing',
            'done',
            'outdated'
        ];

        foreach ($statuses as $status) {
            Status::create([
                'title' => $status,
                'slug' => Str::slug($status)
            ]);
        }
    }
}
