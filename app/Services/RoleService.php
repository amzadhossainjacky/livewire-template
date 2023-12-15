<?php

namespace App\Services;

use Exception;
use App\Models\Role;

/**
 * RoleService
 * @author Md. Amzad Hossain Jacky <amzadhossainjacky@gmail.com>
 */

class RoleService
{

    ## Services
    private PermissionService $permission_service;

    /**
     * Create a new instance
     * @return void
     */
    public function __construct()
    {
        $this->permission_service = new PermissionService;
    }

    /**
     * update_or_create returns create or update resource
     * @param array $inputs
     * @return \App\Models\Role
     */
    public function create(array $inputs): Role
    {

        ## Check null inputs and throw an exception
        if (!count($inputs)) {
            throw new Exception(__('invalid inputs'));
        }
        ## Extract permissions
        $permissions = [...$inputs['permissions']];

        # Unset unwanted attributes from inputs for creating new task
        unset($inputs['permissions']);

        $role_created = Role::Create(
            $inputs
        );

        if ($role_created && count($permissions)) {
            $this->permission_service->create_permission_for_role($role_created, $permissions);
        }
        return $role_created;
    }

    /**
     * update_or_create returns create or update resource
     * @param array $inputs
     * @return Role
     */
    public function update(array $inputs): Role
    {

        ## Check null inputs and throw an exception
        if (!count($inputs)) {
            throw new Exception(__('invalid inputs'));
        }
        ## Extract permissions
        $permissions = $inputs['permissions'];

        $role_updated = Role::find($inputs['id']);
        $role_updated->name = $inputs['name'];
        $role_updated->is_active = $inputs['is_active'];
        $role_updated->route_segment = $inputs['route_segment'];
        $role_updated->save();

        # Unset unwanted attributes from inputs for creating new task
        unset($inputs['permissions']);

        if ($role_updated && count($permissions)) {
            $role_updated->syncPermissions($permissions);
        }

        return $role_updated;
    }

    /**
     * delete_model_by_id method returns list of resources in array
     * @param int $id
     * @return void
     */
    public function delete(int $id): void
    {
        Role::find($id)->delete();
    }

    /**
     * delete_model_by_id method returns list of resources in array
     * @param int $id
     * @return Role
     */
    public function edit(int $id): Role
    {
        return Role::find($id);
    }


    /**
     * get_filtered method returns list of resources
     * @param array $filter_options []
     * @return mixed
     * @author Sakil Jomadder <sakil.diu.cse@gmail.com> <2023-11-17>     
     */
    public function get_filtered(array $filter_options = []): mixed
    {
        @['paginate' => $paginate, 'select' => $select, 'order_by_field' => $order_by_field, 'order_by_type' => $order_by_type] = $filter_options;

        return Role::with(['permissions', 'users'])

            ->when(isset($select), function ($query) use ($select) {
                return $query->select($select);
            })
            ->when(isset($order_by_field) && isset($order_by_type), function ($query) use ($order_by_field, $order_by_type) {
                return $query->orderBy($order_by_field, $order_by_type);
            }, function ($query) {
                return $query->orderBy('id', 'asc');
            })
            ->when(isset($paginate), function ($query) use ($paginate) {
                return  $query->paginate($paginate);
            }, function ($query) {
                return $query->paginate(10);
            });
    }

    /**
     * get_role_permissions method returns role with attached permissions
     *
     * @param integer $role_id
     * @return mixed
     */
    public function get_role_permissions(int $role_id): mixed
    {
        return   Role::with('permissions')->find($role_id);
    }
}
