<?php

namespace App\Services;

use Exception;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

/**
 * UserService
 * @author Md. Amzad Hossain Jacky <amzadhossainjacky@gmail.com>
 */

class UserService
{

    /**
     * check_is_exist method check model exist with given number
     *
     * @param [array] $inputs
     * @return void
     */
    private function check_is_exist($inputs): void
    {
        $mobile = $inputs['mobile'];

        if (strlen($mobile) == 11) {
            $user = User::where('mobile', "88{$mobile}")->first();

            if ($user) {
                throw new Exception(__(_static_strings('already_exist')) . " - $mobile");
            }
        }
    }


    /**
     * create methods returns create resource
     * @param array $inputs
     * @return \App\Models\User
     */
    public function create(array $inputs): User
    {
        $this->check_is_exist($inputs);


        $user_created = User::Create(
            $inputs
        );

        $user_created->assignRole($inputs['role']);
        return $user_created;
    }

    /**
     * update resource
     * @param array $inputs
     * @return void
     */
    public function update(array $inputs): void
    {
        $user = User::find($inputs['id']);

        $mobile = $inputs['mobile'];

        if (strlen($mobile) == 11) {
            $user_exist = User::where('mobile', "88{$mobile}")->first();


            if ($user_exist  && ($user->id != $user_exist->id)) {
                throw new Exception(__(_static_strings('already_exist')) . " - $mobile");
            }
        }


        $user->fill($inputs);
        $user->save();

        DB::table('model_has_roles')
            ->where('model_id', $inputs['id'])
            ->delete();
        $user->assignRole($inputs['role']);
    }

    /**
     * edit method returns list of resources in array
     * @param int $id
     * @return User
     */
    public function edit(int $id): User
    {
        return User::with('roles')->find($id);
    }

    /**
     * delete method returns list of resources in array
     * @param int $id
     * @return void
     */
    public function delete(int $id): void
    {
        User::find($id)->delete();
    }

    /**
     * get_all_roles method fetch all the roles of user
     * @return array
     */
    public function get_all_roles(): array
    {
        return Role::get()->toArray();
        // return Role::where('name', '!=', 'ADMIN')->get()->toArray();
    }

    /**
     * get_all_roles method fetch all the roles of user
     * @return array
     */
    public function get_marketing_cc_roles(): array
    {
        return Role::whereIn('name', ['CALL_CENTER', 'MARKETING'])->get()->toArray();
    }

    /**
     * get_all_users method fetch all the roles of user
     * @return array
     */
    public function get_all_active_user(): Collection
    {
        return User::where(['is_active' => 1])->pluck('name', 'id');
    }

    /**
     * get_all_users method fetch all the roles of user
     * @return array
     */
    public function get_all_user_in_array(): array
    {
        return User::where(['is_active' => 1])->pluck('name', 'id')->toArray();
    }

    /**
     * get_all_users method fetch all the roles of user without admin
     * @return array
     */
    public function get_all_user(): array
    {
        if (session('role') == "ADMIN") {
            return User::pluck('name', 'id')->toArray();
        } elseif (session('role') == "MARKETING_SUPERVISOR" || session('role') == "MARKETING") {
            return User::whereHas('roles', function ($query) {
                $query->whereIn('name', ['MARKETING_SUPERVISOR', 'MARKETING']);
            })->pluck('name', 'id')->toArray();
        } elseif (session('role') == "CALL_CENTER_SUPERVISOR" || session('role') == "CALL_CENTER") {
            return User::whereHas('roles', function ($query) {
                $query->whereIn('name', ['CALL_CENTER_SUPERVISOR', 'CALL_CENTER']);
            })->pluck('name', 'id')->toArray();
        } else {
            return User::whereDoesntHave('roles', function ($query) {
                $query->where('name', 'Admin');
            })->pluck('name', 'id')->toArray();
        }
    }

    /**
     * delete_user_except_admin method delete all temp users except admin
     *
     * @return void
     */
    public function delete_user_except_admin(): void
    {
        User::where('id', '!=', 1)->delete();
    }

    /**
     * profile password update resource
     * @param array $inputs
     * @return void
     */
    public function profile_password_update(array $inputs): void
    {
        $user = User::find($inputs['id']);
        $user->password = $inputs['password'];
        $user->save();
    }

    /**
     * get_all_active_general_user method fetch all the roles of user without admin
     * @return array
     */
    public function get_all_active_general_user(): array
    {
        return User::whereHas('roles', function ($query) {
            $query->whereIn('name', ['MARKETING','CALL_CENTER']);
        })->where(['is_active' => 1])->pluck('name','mobile', 'id')->toArray();
    }

    /**
     * get_all_active_marketing_general_user method fetch all the roles of user without admin
     * @return array
     */
    public function get_all_active_marketing_general_user(): array
    {
        return User::whereHas('roles', function ($query) {
            $query->whereIn('name', ['MARKETING']);
        })->where(['is_active' => 1])->pluck('name','mobile', 'id')->toArray();
    }


    /**
     * get_all_active_cc_general_user method fetch all the roles of user without admin
     * @return array
     */
    public function get_all_active_cc_general_user(): array
    {
        return User::whereHas('roles', function ($query) {
            $query->whereIn('name', ['CALL_CENTER']);
        })->where(['is_active' => 1])->pluck('name','mobile', 'id')->toArray();
    }



    /**
     * find user by mobile number
     * @param string $inputs
     * @return Mixed
     */
    public function get_user_by_mobile(string $mobile): Mixed
    {
        $user = User::where('mobile', $mobile)->first();
        return $user;
    }

}
