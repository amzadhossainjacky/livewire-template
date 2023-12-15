<?php

namespace App\Observers;

use App\Models\User;
use App\Observers\ParentObserver;

/**
 * ParentObserver
 * @author Md. Amzad Hossain Jacky <amzadhossainjacky@gmail.com>
 */
class UserObserver extends ParentObserver
{

    /**
     * Handle the User "created" event.
     */
    public function created(User $model): void
    {
        $data = [
            "user_id" => $this->causer_id,
            "event" => 'created',
            "subject" => 'user created',
            "model" => 'user',
            "description" => _str_conversion("'{$model->name}' user added by <span class='causer'>{$this->causer_name}</span>", 'strtolower', true, false),
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
     * Handle the User "updated" event.
     */
    public function updated(User $model): void
    {

        ## Get the old data
        $oldData = $model->getOriginal();
        
        $data = [
            "user_id" => $this->causer_id,
            "event" => 'updated',
            "subject" => 'user updated',
            "model" => 'user',
            "description" => _str_conversion("'{$model->name}' user updated by <span class='causer'>{$this->causer_name}</span>", 'strtolower', true, false),
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
     * Handle the User "deleted" event.
     */
    public function deleted(User $model): void
    {

        ## Get the old data
        $oldData = $model->getOriginal();

        $data = [
            "user_id" => $this->causer_id,
            "event" => 'deleted',
            "subject" => 'user deleted',
            "model" => 'user',
            "description" => _str_conversion("'{$model->name}' user deleted by <span class='causer'>{$this->causer_name}</span>", 'strtolower', true, false),
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
     * Handle the User "restored" event.
     */
    public function restored(User $model): void
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     */
    public function forceDeleted(User $model): void
    {
        //
    }
}
