<?php

namespace App\Services;

use App\Models\User;
use App\Models\Notification;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Queue;
use App\Jobs\AllNotificationUpdatedJob;

/**
 * NotificationService
 * @author Md. Amzad Hossain Jacky <amzadhossainjacky@gmail.com>
 */
class NotificationService
{

    /**
     * Update All Notification
     * @param array $inputs
     * @return Mixed
     */
    public function allNotificationUpdated(): Mixed
    {
        /* $allNotifications = Notification::where(['is_read' => 0])->where(['user_id' => Auth::id()])->get();
        if(count($allNotifications) > 0){
            for ($i=0; $i < count($allNotifications) ; $i++) {
               $findNotification = Notification::find($allNotifications[$i]->id);
               if( $findNotification){
                    $findNotification->is_read = 1;
                    $findNotification->save();
               }
            }
        } */

        // $allNotifications = Notification::where('is_read', 0)->where('user_id', Auth::id())->get();
        // if(count($allNotifications) > 0){
        //     for ($i=0; $i < count($allNotifications) ; $i++) {
        //        $findNotification = Notification::find($allNotifications[$i]->id);
        //        if( $findNotification){
        //             $findNotification->is_read = 1;
        //             $findNotification->save();
        //        }
        //     }
        // }

        //dispatch(new AllNotificationUpdatedJob());

        // $batch = Bus::batch([
        //     new AllNotificationUpdatedJob,
        // ])->dispatch()
        // ->tries(3);

        $batch = Bus::batch([
            new AllNotificationUpdatedJob,
        ])->name('all_batch_notification_updated')->dispatch();

        return $batch->id;

        // $batch->jobs->each(function ($job) {
        //     $job->tries(3); // Specify the number of retry attempts
        //     $job->delay(now()->addSeconds(30)); // Add a delay before job execution
        // });

        //dispatch(new AllNotificationUpdatedJob())->onQueue('default');
        //dispatch(new AllNotificationUpdatedJob())->onConnection('database')->onQueue('default');
    }

    /**
     * Update Notification
     * @param array $inputs
     * @return void
     */
    public function notificationUpdated($id): void
    {
        $findNotification = Notification::find($id);
        $findNotification->is_read = 1;
        $findNotification->save();
    }

    /**
     * create Notification
     * @param array $inputs
     * @return void
     */
    public function createNotification($activity): void
    {
        $users  = User::role(['ADMIN'])->get()->pluck('id')->toArray();

        if (Auth::check()) {
            if (session('role') != "ADMIN") {
                array_push($users, Auth::id());
            }
        }

        for ($i = 0; $i < count($users); $i++) {
            $notification_data = [
                "user_id" => $users[$i],
                "is_read" => false,
                "is_trash" => false,
            ];
            $activity->do_notify()->create($notification_data);
        }
    }
}
