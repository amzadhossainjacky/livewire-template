<?php

namespace App\Services;

use App\Models\Role;
use App\Models\Module;
use App\Models\Permission;
use Illuminate\Database\Eloquent\Collection;

/**
 * PermissionService
 * @author Md. Amzad Hossain Jacky <amzadhossainjacky@gmail.com>
 */

class PermissionService
{
    /**
     * get_permission_lists method returns list of role permission in array
     * @param int $id
     * @return array
     */
    public function get_permission_lists(): array
    {
        return [
            'roles' => [
                'parent_checked' => 1,
                'label' => 'role permissions',
                'list' => [
                    ['name' => 'role-list', 'checked' => 1],
                    ['name' => 'role-create', 'checked' => 1],
                    ['name' => 'role-edit', 'checked' => 1],
                    ['name' => 'role-delete', 'checked' => 1],
                ],
            ],
            'users' => [
                'parent_checked' => 1,
                'label' => 'user permissions',
                'list' => [
                    ['name' => 'user-list', 'checked' => 1],
                    ['name' => 'user-create', 'checked' => 1],
                    ['name' => 'user-edit', 'checked' => 1],
                    ['name' => 'user-delete', 'checked' => 1],
                ],
            ],
            'permissions' => [
                'parent_checked' => 1,
                'label' => 'permission permissions',
                'list' => [
                    ['name' => 'permission-list', 'checked' => 1],
                    ['name' => 'permission-create', 'checked' => 1],
                ],
            ],
            'system_settings' => [
                'parent_checked' => 1,
                'label' => 'system setting permissions',
                'list' => [
                    ['name' => 'system-setting-list', 'checked' => 1],
                ],
            ],
            
            'settings' => [
                'parent_checked' => 1,
                'label' => 'settings',
                'list' => [
                    ['name' => 'setting-list', 'checked' => 1],
                ],
            ],
        ];
    }

    /**
     * create returns copyright content from database or default
     * @return Permission
     */
    public function create(array $inputs): void
    {

        #module inputs;
        $module_name = "";
        $parent_checked = "";
        $label = "";

        #initial permission entries;
        foreach ($inputs as $index => $module) {
            $module_name = $index;
            $parent_checked = $module['parent_checked'];
            $label = $module['label'];
            $list = $module['list'];

            //dump($module);
            $module = Module::Create([
                'module_name' => $module_name,
                'parent_checked' => $parent_checked,
                'label' => $label,
            ]);

            for ($i = 0; $i < count($list); $i++) {
                $permission = Permission::Create([
                    'name' => $list[$i]['name'],
                    'module_id' => $module->id,
                    'checked' => $list[$i]['checked'],
                ]);
            }
        }
    }

    /**
     * create returns copyright content from database or default
     * @return Permission
     */
    public function update(array $inputs): void
    {

        #module inputs;
        $module_name = "";
        $parent_checked = "";
        $label = "";

        #update permission entries;
        foreach ($inputs as $index => $module) {
            $module_name = $index;
            $parent_checked = $module['parent_checked'];
            $label = $module['label'];
            $list = $module['list'];

            $find_existing_module = Module::where('module_name', $module_name)->first();

            if ($find_existing_module) {
                for ($j = 0; $j < count($list); $j++) {

                    $find_permissison = Permission::where('name', $list[$j]['name'])->first();
                    if (!$find_permissison) {
                        /* dump($list[$j]['name']); */
                        $permission = Permission::Create([
                            'name' => $list[$j]['name'],
                            'module_id' => $find_existing_module->id,
                            'checked' => $list[$j]['checked'],
                        ]);
                    }
                }
            }

            if (!$find_existing_module) {
                //dump($module);
                $module = Module::Create([
                    'module_name' => $module_name,
                    'parent_checked' => $parent_checked,
                    'label' => $label,
                ]);

                for ($i = 0; $i < count($list); $i++) {
                    $permission = Permission::Create([
                        'name' => $list[$i]['name'],
                        'module_id' => $module->id,
                        'checked' => $list[$i]['checked'],
                    ]);
                }
            }
        }
    }

    /**
     * get_db_unchecked_permissions_list method returns list of module permissions
     * @return array
     */
    public function get_db_unchecked_permissions_list(): array
    {
        $modules_with_permissions = Module::with(['permissions'])->get()->toArray();
        $modules_with_permissions = $this->uncheck_parent_child($modules_with_permissions);
        return $modules_with_permissions;
    }


    /**
     * uncheck_parent_child method returns list of module permissions without checked
     * @param array $list
     * @return array
     */
    private function uncheck_parent_child(array $modules_with_permissions): array
    {
        $modules_with_permissions = array_map(function ($module_with_permissions) {
            $modified_permission_list = [];
            if (count($module_with_permissions['permissions'])) {
                foreach ($module_with_permissions['permissions'] as $child_key => $permission) {
                    $modified_permission_list[$child_key] = [...$permission, 'checked' => false];
                }
            }
            return [...$module_with_permissions, 'parent_checked' => false, 'permissions' => $modified_permission_list];
        }, $modules_with_permissions);

        return $modules_with_permissions;
    }


    /**
     * create_permission_for_role method stores permission for a specific role
     * @param \App\Models\Role $role
     * @param array $permissions list of permission for a single role
     * @return void
     */
    public function create_permission_for_role(Role $role, array $permissions): void
    {
        $permission_names = [];
        foreach ($permissions as $index => $module) {
            if (count($module['permissions'])) {
                foreach ($module['permissions'] as $key => $permission) {
                    if ($permission['checked']) {
                        $permission_names[] = $permission['name'];
                    }
                }
            }
        }
        $role->syncPermissions($permission_names);
    }

    /**
     * count_system_permissions method return total permissions stored on this system
     *
     * @return integer
     * @author Sakil Jomadder <sakil.diu.cse@gmail.com>
     */
    public function count_system_permissions(): int
    {
        return Permission::count();
    }

    /**
     * get_selected_permissions_list_by_role method return selected permission list
     *
     * @param [type] $role_permissions
     * @return array
     */
    public function get_selected_permissions_list_by_role($role_permissions): array
    {
        $all_unchecked_module_permission = $this->get_db_unchecked_permissions_list();
        $role_permissions_ids = $role_permissions->permissions->pluck('id')->toArray();
        foreach ($all_unchecked_module_permission as $module_index => $module) {
            foreach ($module['permissions'] as $permission_index => $permission) {
                if (in_array($permission['id'], $role_permissions_ids)) {
                    $all_unchecked_module_permission[$module_index]['permissions'][$permission_index]['checked'] = true;
                }
            }
        }
        return $all_unchecked_module_permission;
    }
}
