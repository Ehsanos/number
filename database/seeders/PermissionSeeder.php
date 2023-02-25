<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $permissions=json_decode('[
{"id":"1","name":"view_balance","guard_name":"web","created_at":"2023-02-22 10:32:32","updated_at":"2023-02-22 10:32:32"},
{"id":"2","name":"view_any_balance","guard_name":"web","created_at":"2023-02-22 10:32:32","updated_at":"2023-02-22 10:32:32"},
{"id":"3","name":"create_balance","guard_name":"web","created_at":"2023-02-22 10:32:33","updated_at":"2023-02-22 10:32:33"},
{"id":"4","name":"update_balance","guard_name":"web","created_at":"2023-02-22 10:32:33","updated_at":"2023-02-22 10:32:33"},
{"id":"5","name":"restore_balance","guard_name":"web","created_at":"2023-02-22 10:32:33","updated_at":"2023-02-22 10:32:33"},
{"id":"6","name":"restore_any_balance","guard_name":"web","created_at":"2023-02-22 10:32:33","updated_at":"2023-02-22 10:32:33"},
{"id":"7","name":"replicate_balance","guard_name":"web","created_at":"2023-02-22 10:32:33","updated_at":"2023-02-22 10:32:33"},
{"id":"8","name":"reorder_balance","guard_name":"web","created_at":"2023-02-22 10:32:33","updated_at":"2023-02-22 10:32:33"},
{"id":"9","name":"delete_balance","guard_name":"web","created_at":"2023-02-22 10:32:33","updated_at":"2023-02-22 10:32:33"},
{"id":"10","name":"delete_any_balance","guard_name":"web","created_at":"2023-02-22 10:32:33","updated_at":"2023-02-22 10:32:33"},
{"id":"11","name":"force_delete_balance","guard_name":"web","created_at":"2023-02-22 10:32:33","updated_at":"2023-02-22 10:32:33"},
{"id":"12","name":"force_delete_any_balance","guard_name":"web","created_at":"2023-02-22 10:32:34","updated_at":"2023-02-22 10:32:34"},
{"id":"13","name":"view_order","guard_name":"web","created_at":"2023-02-22 10:32:34","updated_at":"2023-02-22 10:32:34"},
{"id":"14","name":"view_any_order","guard_name":"web","created_at":"2023-02-22 10:32:34","updated_at":"2023-02-22 10:32:34"},
{"id":"15","name":"create_order","guard_name":"web","created_at":"2023-02-22 10:32:35","updated_at":"2023-02-22 10:32:35"},
{"id":"16","name":"update_order","guard_name":"web","created_at":"2023-02-22 10:32:35","updated_at":"2023-02-22 10:32:35"},
{"id":"17","name":"restore_order","guard_name":"web","created_at":"2023-02-22 10:32:35","updated_at":"2023-02-22 10:32:35"},
{"id":"18","name":"restore_any_order","guard_name":"web","created_at":"2023-02-22 10:32:35","updated_at":"2023-02-22 10:32:35"},
{"id":"19","name":"replicate_order","guard_name":"web","created_at":"2023-02-22 10:32:35","updated_at":"2023-02-22 10:32:35"},
{"id":"20","name":"reorder_order","guard_name":"web","created_at":"2023-02-22 10:32:35","updated_at":"2023-02-22 10:32:35"},
{"id":"21","name":"delete_order","guard_name":"web","created_at":"2023-02-22 10:32:35","updated_at":"2023-02-22 10:32:35"},
{"id":"22","name":"delete_any_order","guard_name":"web","created_at":"2023-02-22 10:32:35","updated_at":"2023-02-22 10:32:35"},
{"id":"23","name":"force_delete_order","guard_name":"web","created_at":"2023-02-22 10:32:35","updated_at":"2023-02-22 10:32:35"},
{"id":"24","name":"force_delete_any_order","guard_name":"web","created_at":"2023-02-22 10:32:35","updated_at":"2023-02-22 10:32:35"},
{"id":"25","name":"view_role","guard_name":"web","created_at":"2023-02-22 10:32:36","updated_at":"2023-02-22 10:32:36"},
{"id":"26","name":"view_any_role","guard_name":"web","created_at":"2023-02-22 10:32:36","updated_at":"2023-02-22 10:32:36"},
{"id":"27","name":"create_role","guard_name":"web","created_at":"2023-02-22 10:32:36","updated_at":"2023-02-22 10:32:36"},
{"id":"28","name":"update_role","guard_name":"web","created_at":"2023-02-22 10:32:36","updated_at":"2023-02-22 10:32:36"},
{"id":"29","name":"delete_role","guard_name":"web","created_at":"2023-02-22 10:32:36","updated_at":"2023-02-22 10:32:36"},
{"id":"30","name":"delete_any_role","guard_name":"web","created_at":"2023-02-22 10:32:36","updated_at":"2023-02-22 10:32:36"},
{"id":"31","name":"view_setting","guard_name":"web","created_at":"2023-02-22 10:32:37","updated_at":"2023-02-22 10:32:37"},
{"id":"32","name":"view_any_setting","guard_name":"web","created_at":"2023-02-22 10:32:37","updated_at":"2023-02-22 10:32:37"},
{"id":"33","name":"create_setting","guard_name":"web","created_at":"2023-02-22 10:32:37","updated_at":"2023-02-22 10:32:37"},
{"id":"34","name":"update_setting","guard_name":"web","created_at":"2023-02-22 10:32:37","updated_at":"2023-02-22 10:32:37"},
{"id":"35","name":"restore_setting","guard_name":"web","created_at":"2023-02-22 10:32:37","updated_at":"2023-02-22 10:32:37"},
{"id":"36","name":"restore_any_setting","guard_name":"web","created_at":"2023-02-22 10:32:37","updated_at":"2023-02-22 10:32:37"},
{"id":"37","name":"replicate_setting","guard_name":"web","created_at":"2023-02-22 10:32:37","updated_at":"2023-02-22 10:32:37"},
{"id":"38","name":"reorder_setting","guard_name":"web","created_at":"2023-02-22 10:32:37","updated_at":"2023-02-22 10:32:37"},
{"id":"39","name":"delete_setting","guard_name":"web","created_at":"2023-02-22 10:32:37","updated_at":"2023-02-22 10:32:37"},
{"id":"40","name":"delete_any_setting","guard_name":"web","created_at":"2023-02-22 10:32:37","updated_at":"2023-02-22 10:32:37"},
{"id":"41","name":"force_delete_setting","guard_name":"web","created_at":"2023-02-22 10:32:37","updated_at":"2023-02-22 10:32:37"},
{"id":"42","name":"force_delete_any_setting","guard_name":"web","created_at":"2023-02-22 10:32:37","updated_at":"2023-02-22 10:32:37"},
{"id":"43","name":"view_user","guard_name":"web","created_at":"2023-02-22 10:32:38","updated_at":"2023-02-22 10:32:38"},
{"id":"44","name":"view_any_user","guard_name":"web","created_at":"2023-02-22 10:32:38","updated_at":"2023-02-22 10:32:38"},
{"id":"45","name":"create_user","guard_name":"web","created_at":"2023-02-22 10:32:38","updated_at":"2023-02-22 10:32:38"},
{"id":"46","name":"update_user","guard_name":"web","created_at":"2023-02-22 10:32:38","updated_at":"2023-02-22 10:32:38"},
{"id":"47","name":"restore_user","guard_name":"web","created_at":"2023-02-22 10:32:38","updated_at":"2023-02-22 10:32:38"},
{"id":"48","name":"restore_any_user","guard_name":"web","created_at":"2023-02-22 10:32:38","updated_at":"2023-02-22 10:32:38"},
{"id":"49","name":"replicate_user","guard_name":"web","created_at":"2023-02-22 10:32:38","updated_at":"2023-02-22 10:32:38"},
{"id":"50","name":"reorder_user","guard_name":"web","created_at":"2023-02-22 10:32:38","updated_at":"2023-02-22 10:32:38"},
{"id":"51","name":"delete_user","guard_name":"web","created_at":"2023-02-22 10:32:39","updated_at":"2023-02-22 10:32:39"},
{"id":"52","name":"delete_any_user","guard_name":"web","created_at":"2023-02-22 10:32:39","updated_at":"2023-02-22 10:32:39"},
{"id":"53","name":"force_delete_user","guard_name":"web","created_at":"2023-02-22 10:32:39","updated_at":"2023-02-22 10:32:39"},
{"id":"54","name":"force_delete_any_user","guard_name":"web","created_at":"2023-02-22 10:32:39","updated_at":"2023-02-22 10:32:39"}
]');
      //  dd(var_dump($permissions));
        foreach($permissions as $permission) {

            Permission::create([
                'name'=>$permission->name,
                'guard_name'=>'web',

            ]);
        }
}

}
