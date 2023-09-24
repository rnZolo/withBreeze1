<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Spatie
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

    /* Create the initial roles and permissions.
     *
     * @return void
     */
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        $permission1 = Permission::create(['name' => 'create students']);
        $permission2 = Permission::create(['name' => 'read students']);
        $permission3 = Permission::create(['name' => 'update students']);
        $permission4 = Permission::create(['name' => 'delete students']);

        // create roles and assign existing permissions
        $student = Role::create(['name' => 'Student']);
        $student->givePermissionTo($permission2); // single assign a permission

        $subAdmin = Role::create(['name' => 'Sub-admin']);
        $subAdmin->syncPermissions([$permission1, $permission2, $permission3]);

        $superAdmin = Role::create(['name' => 'Super-Admin']);
        $superAdmin->syncPermissions([$permission1, $permission2, $permission3, $permission4]);

        // create demo users
        $student_user = \App\Models\User::factory()->create([
            'name' => 'Student User',
            'email' => 'student1@email.com',
            'password' => '$2y$10$U/hhtB/lYVfexUoJ/a26TuD1RDFwFRnZYZ/68AQM5egMAjESM0EG.'
        ]);
        $student_user->assignRole($student);

        $subAdmin_user = \App\Models\User::factory()->create([
            'name' => 'Admin User',
            'email' => 'subAdmin1@email.com',
            'password' => '$2y$10$U/hhtB/lYVfexUoJ/a26TuD1RDFwFRnZYZ/68AQM5egMAjESM0EG.'
        ]);
        $subAdmin_user->assignRole($subAdmin);

        $superAdmin_user = \App\Models\User::factory()->create([
            'name' => 'Super-Admin User',
            'email' => 'superAdmin1@email.com',
            'password' => '$2y$10$U/hhtB/lYVfexUoJ/a26TuD1RDFwFRnZYZ/68AQM5egMAjESM0EG.'
        ]);
        $superAdmin_user->assignRole($superAdmin);

    }
}
