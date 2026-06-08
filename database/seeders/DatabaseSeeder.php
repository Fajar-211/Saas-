<?php

namespace Database\Seeders;

use App\Models\Division;
use App\Models\Priority;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 3; $i++) {
            $name = 'Super Admin';
            $p = Priority::factory()->create([
                'level' => $i,
                'name' => 'Priority ' . $i
            ]);
            if ($i == 1) {
                $d = $p->divisions()->create([
                    'name' => $name,
                    'slug' => Str::slug($name)
                ]);
                $d->user()->create([
                    'first_name' => 'SUPER ADMIN',
                    'email' => 'superadmin@example.com',
                    'email_verified_at' => now(),
                    'password' => Hash::make('password')
                ]);
            } elseif ($i == 2) {
                $name = 'Supervisor';
                $d = $p->divisions()->create([
                    'name' => $name,
                    'slug' => Str::slug($name)
                ]);
                $d->user()->create([
                    'first_name' => 'SUPERVISOR 1',
                    'email' => 'supervisor1@example.com',
                    'email_verified_at' => now(),
                    'password' => Hash::make('password')
                ]);
                $d->user()->create([
                    'first_name' => 'SUPERVISOR 2',
                    'email' => 'supervisor2@example.com',
                    'email_verified_at' => now(),
                    'password' => Hash::make('password')
                ]);
            } else {
                $name = 'Reservation';
                $d = $p->divisions()->create([
                    'name' => $name,
                    'slug' => Str::slug($name)
                ]);
                $d->user()->create([
                    'first_name' => 'Toni',
                    'email' => 'tonireservation@example.com',
                    'email_verified_at' => now(),
                    'password' => Hash::make('password')
                ]);
                $d->user()->create([
                    'first_name' => 'Ranita',
                    'email' => 'ranitareservation@example.com',
                    'email_verified_at' => now(),
                    'password' => Hash::make('password')
                ]);

                $name = 'Kitchen';
                $d = $p->divisions()->create([
                    'name' => $name,
                    'slug' => Str::slug($name)
                ]);
                $d->user()->create([
                    'first_name' => 'Lena',
                    'email' => 'lenaKitchen@example.com',
                    'email_verified_at' => now(),
                    'password' => Hash::make('password')
                ]);

                $name = 'Host';
                $d = $p->divisions()->create([
                    'name' => $name,
                    'slug' => Str::slug($name)
                ]);
                $d->user()->create([
                    'first_name' => 'Latif',
                    'email' => 'latifhost@example.com',
                    'email_verified_at' => now(),
                    'password' => Hash::make('password')
                ]);
            }
        }
    }
}
