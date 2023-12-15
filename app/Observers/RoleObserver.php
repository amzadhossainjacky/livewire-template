<?php

namespace App\Observers;

use App\Models\Role;
use App\Observers\ParentObserver;

class RoleObserver extends ParentObserver
{
    /**
     * Handle the Role "created" event.
     */
    public function created(Role $model): void
    {
        // $data = [
        //     "user_id" => $this->causer_id,
        //     "event" => 'created',
        //     "subject" => 'role created',
        //     "model" => 'role',
        //     "description" => _str_conversion("'{$model->name}' role added by <span class='causer'>{$this->causer_name}</span>", 'strtolower', true, false),
        //     "properties" => $model->toJson(),
        //     "is_read" => false,
        // ];
        // $activity = $model->activity()->create($data);
        // if ($activity) {
        //     $this->notification_service->createNotification($activity);
        // }
        // $this->dispatch_header_notification();
    }

    /**
     * Handle the Role "updated" event.
     */
    public function updated(Role $model): void
    {
        // ## Get the old data
        // $oldData = $model->getOriginal();

        // $data = [
        //     "user_id" => $this->causer_id,
        //     "event" => 'updated',
        //     "subject" => 'role updated',
        //     "model" => 'role',
        //     "description" => _str_conversion("'{$model->name}' role updated by <span class='causer'>{$this->causer_name}</span>", 'strtolower', true, false),
        //     "properties" => json_encode([
        //         "old" => $oldData,
        //         "new" => $model->toArray(),
        //     ]),
        //     "is_read" => false,
        // ];
        // $activity = $model->activity()->create($data);
        // if ($activity) {
        //     $this->notification_service->createNotification($activity);
        // }
        // $this->dispatch_header_notification();
    }

    /**
     * Handle the Role "deleted" event.
     */
    public function deleted(Role $model): void
    {
        // ## Get the old data
        // $oldData = $model->getOriginal();

        // $data = [
        //     "user_id" => $this->causer_id,
        //     "event" => 'deleted',
        //     "subject" => 'role deleted',
        //     "model" => 'role',
        //     "description" => _str_conversion("'{$model->name}' role deleted by <span class='causer'>{$this->causer_name}</span>", 'strtolower', true, false),
        //     "properties" => json_encode([
        //         "old" => $oldData,
        //         "new" => $model->toArray(),
        //     ]),
        //     "is_read" => false,
        // ];
        // $activity = $model->activity()->create($data);
        // if ($activity) {
        //     $this->notification_service->createNotification($activity);
        // }
        // $this->dispatch_header_notification();
    }

    /**
     * Handle the Role "restored" event.
     */
    public function restored(Role $model): void
    {
        //
    }

    /**
     * Handle the Role "force deleted" event.
     */
    public function forceDeleted(Role $model): void
    {
        //
    }
}
