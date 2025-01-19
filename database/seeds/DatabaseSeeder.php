<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        // $this->call(AdminSeeder::class);
        // $this->call(RolePermissionSeeder::class);

          // Path ke folder gallery
          $galleryPath = public_path('assets/img/gallery');
        
          // Ambil semua file di folder
          $files = File::files($galleryPath);
  
          foreach ($files as $file) {
              // Simpan ke database
              DB::table('galleries')->insert([
                  'title' => pathinfo($file->getFilename(), PATHINFO_FILENAME), // Nama file tanpa ekstensi
                  'image' => $file->getFilename(), // Nama file lengkap
                  'created_at' => now(),
                  'updated_at' => now(),
              ]);
          }
    }
}
