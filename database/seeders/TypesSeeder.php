<?php

namespace Database\Seeders;

use App\Models\Types;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $types = [
            'Task',
            "Design",
            'Feature',
            'Bug Report',
            'Enhancement',
            'Support',
            'Feature Request',
            "Research",
            "Marketing",
            'Documentation',
            'Other',
        ];

        foreach ($types as $type) {
            Types::create([
                'title' => $type,
                'slug' => Str::slug($type)
            ]);
        }
    }
}
