<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Domain;
use App\Models\Tenant;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Tenant::factory()->has(Domain::factory(['domain' => 'tenant']))->create(['id' => 'tenant']);
        Tenant::factory()->has(Domain::factory(['domain' => 'tenant2']))->create(['id' => 'tenant2']);
        Tenant::factory()->has(Domain::factory(['domain' => 'tenant3']))->create(['id' => 'tenant3']);
    }
}
