<?php

namespace App\Jobs;

use App\Models\Notification;
use Illuminate\Bus\Batchable;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;


class AllNotificationUpdatedJob implements ShouldQueue
{
    use Batchable, Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public $auth_id;

    public $tries = 3;

    public function __construct()
    {
        $this->auth_id = Auth::id();
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        //sleep(20);
        $allNotifications = Notification::where('is_read', 0)->where('user_id', $this->auth_id)->get();

        if(count($allNotifications) > 0){
            for ($i=0; $i < count($allNotifications) ; $i++) {
               $findNotification = Notification::find($allNotifications[$i]->id);
               if( $findNotification){
                    $findNotification->is_read = 1;
                    $findNotification->save();
               }
            }
        }
    }
}
