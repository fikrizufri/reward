<?php

use App\Models\User;
use Illuminate\Database\Seeder;

use App\Models\Permission;
use App\Models\Role;
use App\Models\Task;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superadmin = new Role();
        $superadmin->name = 'Superadmin';
        $superadmin->slug = 'superadmin';
        $superadmin->save();

        $adminRole = new Role();
        $adminRole->name = 'Admin';
        $adminRole->slug = 'admin';
        $adminRole->save();

        $customerRole = new Role();
        $customerRole->name = 'Customer';
        $customerRole->slug = 'customer';
        $customerRole->save();

        $superadmin = Role::where('slug', 'superadmin')->first();
        $adminRole = Role::where('slug', 'admin')->first();

        $superadminUser = new User();
        $superadminUser->name = 'Superadmin';
        $superadminUser->username = 'Superadmin';
        $superadminUser->slug = Str::slug('Superadmin');
        $superadminUser->email = 'Superadmin@admin.com';
        $superadminUser->password = bcrypt('123456');
        $superadminUser->icon = 'default-icon.png';
        $superadminUser->save();

        $superadminUser->role()->attach($superadmin);

        $admin = new User();
        $admin->name = 'admin';
        $admin->username = 'admin';
        $admin->slug = Str::slug('admin');
        $admin->email = 'admin@admin.com';
        $admin->password = bcrypt('admin');
        $admin->icon = 'default-icon.png';
        $admin->save();
        $admin->role()->attach($adminRole);

        $taskUser = new Task();
        $taskUser->name = 'User';
        $taskUser->slug = Str::slug($taskUser->name);
        $taskUser->description = 'Manajemen User';
        $taskUser->save();

        $taskRole = new Task();
        $taskRole->name = 'Roles';
        $taskRole->slug = Str::slug($taskRole->name);
        $taskRole->description = 'Manajemen Hak Akses ';
        $taskRole->save();

        $taskCustomer = new Task();
        $taskCustomer->name = 'Customer';
        $taskCustomer->slug = Str::slug($taskCustomer->name);
        $taskCustomer->description = 'Manajemen Pelanggan';
        $taskCustomer->save();

        $taskTransaksi = new Task();
        $taskTransaksi->name = 'Transaksi';
        $taskTransaksi->slug = Str::slug($taskTransaksi->name);
        $taskTransaksi->description = 'Manajemen Transaksi';
        $taskTransaksi->save();

        $taskHadiah = new Task();
        $taskHadiah->name = 'Hadiah';
        $taskHadiah->slug = Str::slug($taskHadiah->name);
        $taskHadiah->description = 'Manajemen Hadiah';
        $taskHadiah->save();

        $tasks = Task::all();

        foreach ($tasks as $task) {
            $name = $task->name;
            $slug = Str::slug($name);
            $data = array(

                [
                    'name'    => 'View ' . $name,
                    'slug'    => 'view-' . $slug,
                    'task_id' => $task->id
                ],
                [
                    'name'    => 'Create ' . $name,
                    'slug'    => 'create-' . $slug,
                    'task_id' => $task->id
                ],
                [
                    'name'    => 'Edit ' . $name,
                    'slug'    => 'edit-' . $slug,
                    'task_id' => $task->id
                ],
                [
                    'name'    => 'Delete ' . $name,
                    'slug'    => 'delete-' . $slug,
                    'task_id' => $task->id
                ],
            );

            foreach ($data as $induk) {
                Permission::Create($induk);
            }
        }
    }
}
