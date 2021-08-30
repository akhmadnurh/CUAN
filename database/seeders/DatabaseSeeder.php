<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            category::class,
            debt_credit_status::class,
            debt_credit::class,
            email_verification::class,
            mutation_detail::class,
            mutation_type::class,
            mutation::class,
            users::class,
        ]);
    }
}
