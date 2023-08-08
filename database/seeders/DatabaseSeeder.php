<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $rak = \App\Models\Rak::factory(24)->create();
        \App\Models\Tag::factory(50)->create();
        \App\Models\Buku::factory(50)->create();

        $tags = \App\Models\Tag::all();
        \App\Models\Buku::all()->each(function ($buku) use($tags) {
            $buku->tag()->attach(
                $tags->random(rand(1, 5))->pluck('id')->toArray()
            );
        });
        // foreach($tags as $tag){
        //     $tag = Tag::firstOrCreate([
        //         'nama' => strtolower($tag),
        //         'slug' => Str::slug($tag)
        //     ]);

        //     $buku->tag()->attach($tag->id);
        // }

        // \App\Models\Petugas::create([
        //     'nama' => 'Petugas',
        //     'email' => 'petugas@gmail.com',
        //     'password' => Hash::make('petugas'),
        //     'email_verified_at' => now(),
        //     'jenis_kelamin' => 'P',
        //     'alamat' => fake()->address(),
        //     'telepon' => 8374078731,
        // ]);
        // \App\Models\Anggota::create([
        //     'nama' => 'Anggota',
        //     'email' => 'anggota@gmail.com',
        //     'password' => Hash::make('anggota'),
        //     'email_verified_at' => now(),
        //     'jenis_kelamin' => 'L',
        //     'alamat' => fake()->address(),
        //     'telepon' => 8837462222,
        // ]);
    }
}
