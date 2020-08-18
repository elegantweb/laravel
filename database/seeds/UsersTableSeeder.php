<?php

use App\Models\Employee;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Employee::exists()) return;

        $admin = new Employee();
        $admin->name = 'Admin';
        $admin->email = 'admin@example.com';
        $admin->password = bcrypt('admin');
        $admin->save();
    }
}
