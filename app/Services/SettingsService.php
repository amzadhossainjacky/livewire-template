<?php

namespace App\Services;

use App\Models\Setting;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;

/**
 * SettingsService service class
 * @author Sakil Jomadder <sakil.diu.cse@gmail.com>
 */

class SettingsService
{
    /**
     * update_or_create method returns created or updated resource
     * @param array $input
     * @return mixed
     */
    public function update_or_create(array $input = []): mixed
    {
        @['type' => $type, 'value' => $value] = $input;

        ## Update or create resource
        $model = Setting::updateOrCreate(
            ['type' => $type],
            ['value' => $value]
        );

        ## Flush all sessions if system mode changed to maintenance
        if ($model->type === 'system_mode' && $model->value == 2) {
            $this->truncate_sessions();
            return redirect()->route('login');
        }

        return $model;
    }

    /**
     * get_all method return collection of settings
     *
     * @return Collection
     */
    public function get_all(): Collection
    {
        return Setting::get();
    }

    /**
     * truncate_sessions method deletes all database sessions
     *
     * @return void
     */
    private function truncate_sessions(): void
    {
        DB::table('sessions')->truncate();
    }

    /**
     * get_all method return setting item
     *
     * @param string $type
     * @return \App\Models\Setting
     */
    public function get_settings_item_by_type(string $type = 'system_mode'): mixed
    {
        return Setting::where(['type' => $type])->first();
    }

    /**
     * check_is_maintenance_mode method decide and return maintenance mode status
     *
     * @param string $type
     * @return boolean
     */
    public function check_is_maintenance_mode(string $type): bool
    {
        $system_mode = $this->get_settings_item_by_type($type);

        return $system_mode && $system_mode->value == 2 ? true : false;
    }
}
