<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategoriaSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categorias')->insert([
            'nombre' => 'Restaurant',
            'slug' => Str::slug('Restaurant'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('categorias')->insert([
            'nombre' => 'Café',
            'slug' => Str::slug('Café'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('categorias')->insert([
            'nombre' => 'Hoteles',
            'slug' => Str::slug('Hoteles'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('categorias')->insert([
            'nombre' => 'Bar',
            'slug' => Str::slug('Bar'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('categorias')->insert([
            'nombre' => 'Hospital',
            'slug' => Str::slug('Hospital'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        
        DB::table('categorias')->insert([
            'nombre' => 'Gimnasio',
            'slug' => Str::slug('Gimnasio'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('categorias')->insert([
            'nombre' => 'Doctor',
            'slug' => Str::slug('Doctor'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
