<?php

namespace App\Observers;

use App\Models\Permission;
use App\Observers\ParentObserver;

class PermissionObserver extends ParentObserver
{
    /**
     * Handle the Permission "created" event.
     */
    public function created(Permission $model): void
    {
        $data = [
            "user_id" => $this->causer_id,
            "event" => 'created',
            "subject" => 'permission created',
            "model" => 'permission',
            "description" => _str_conversion("'{$model->name}' permission added by <span class='causer'>{$this->causer_name}</span>", 'strtolower', true, false),
            "properties" => $model->toJson(),
            "is_read" => false,
        ];
        $activity = $model->activity()->create($data);
        if ($activity) {
            $this->notification_service->createNotification($activity);
        }
        $this->dispatch_header_notification();
    }

    /**
     * Handle the Permission "updated" event.
     */
    public function updated(Permission $model): void
    {
        ## Get the old data
        $oldData = $model->getOriginal();

        $data = [
            "user_id" => $this->causer_id,
            "event" => 'updated',
            "subject" => 'permission updated',
            "model" => 'permission',
            "description" => _str_conversion("'{$model->name}' permission updated by <span class='causer'>{$this->causer_name}</span>", 'strtolower', true, false),
            "properties" => json_encode([
                "old" => $oldData,
                "new" => $model->toArray(),
            ]),
            "is_read" => false,
        ];
        $activity = $model->activity()->create($data);
        if ($activity) {
            $this->notification_service->createNotification($activity);
        }
        $this->dispatch_header_notification();
    }

    /**
     * Handle the Permission "deleted" event.
     */
    public function deleted(Permission $permission): void
    {
        //
    }

    /**
     * Handle the Permission "restored" event.
     */
    public function restored(Permission $permission): void
    {
        //
    }

    /**
     * Handle the Permission "force deleted" event.
     */
    public function forceDeleted(Permission $permission): void
    {
        //
    }
}
