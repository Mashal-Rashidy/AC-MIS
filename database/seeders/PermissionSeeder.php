<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            [
                "name" => "Create-record",
                "name_dr" => "ثبت ریکارد",
                "guard_name" => "web",
            ],
            [
                "name" => "Update-record",
                "name_dr" => "تجدید ریکارد",
                "guard_name" => "web",
            ],
            [
                "name" => "Delete-record",
                "name_dr" => "حذف ریکارد",
                "guard_name" => "web",
            ],
            [
                "name" => "Select-record",
                "name_dr" => "نمایش ریکارد",
                "guard_name" => "web",
            ],
            [
                "name" => "print-card",
                "name_dr" => "چاپ کارت",
                "guard_name" => "web",
            ],
            [
                "name" => "Checking",
                "name_dr" => "چک کردن ریکارد",
                "guard_name" => "web",
            ],
            [
                "name" => "Show Users",
                "name_dr" => "نمایش کاربران",
                "guard_name" => "web",
            ],
            [
                "name" => "Show Roles And Permissions",
                "name_dr" => "نمایش صلاحیت ها",
                "guard_name" => "web",
            ],
        ];

        foreach ($permissions as $permission) {
            Permission::create($permission);
        }
    }
}
