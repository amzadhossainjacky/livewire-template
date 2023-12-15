<?php

namespace App\Livewire\Backend\Partials;

use Livewire\Component;
use App\Models\ActivityLog;
use Livewire\Attributes\On;
use App\Models\Notification;
use Illuminate\Support\Carbon;
use App\Events\NotificationEvent;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use App\Services\ActivityLogService;
use Illuminate\Support\Facades\Auth;
use App\Services\NotificationService;

class HeaderNotificationComponent extends Component
{
    public string $item_title;
    public string $mark_all_as_read_text;
    public string $view_all_text;
    public int $unread_log_counter;
    public string $log_counter_icon;
    public array $activity_log;
    public array $unread_notification_list;

    ## status
    public bool $notificationStatus = false;

    ## Service properties
    private ActivityLogService $activity_log_service;
    private NotificationService $notification_service;



    /**
     * boot method to set initial values
     *
     * @return void
     */
    public function boot(): void
    {
        $this->activity_log_service = new ActivityLogService();
        $this->notification_service = new NotificationService();
    }

    /**
     * To initialize value for once
     * @return void
     */
    public function mount(): void
    {
        $this->get_static_values();
        $this->get_dynamic_values_by_all();
    }

    /**
     * Assign initial static values
     * @return void
     */
    private function get_static_values(): void
    {
        $this->item_title = __("activity log");
        $this->mark_all_as_read_text = __("mark all as read");
        $this->view_all_text = __("view all logs");
        $this->log_counter_icon = _icons('bell');
    }


    /**
     * Assign initial dynamic values
     * @return void
     */
    private function get_dynamic_values(): void
    {
        /* $unread_activity_log = ActivityLog::where(['is_read' => 0])->with(['user'])->orderBY('id', 'desc')->get()->take(10);

        //$unread_activity_log_collection = (new ActivityLogCollection($unread_activity_log))->resolve();

        $this->unread_log_counter =  ActivityLog::where(['is_read' => 0])->count();
        $this->activity_log = $unread_activity_log->toArray(); */

        // $timestamp = 1695478619; // Your integer timestamp
        // $dateTime = Carbon::createFromTimestamp($timestamp);

        $findData = DB::table('job_batches')->where('failed_jobs', 0)->orderBY('id', 'desc')->first();

        if($findData){
            $timestamp = $findData->created_at;
            $dateTime = Carbon::createFromTimestamp($timestamp);
            $formattedDateTime = $dateTime->toDateTimeString();

            $unread_notification = Notification::where(['is_read' => 0])->where(['user_id' => Auth::id()])->where('created_at','>',$formattedDateTime)->with(['notifiable'])->orderBY('id', 'desc')->get()->take(10);
        }else{
            $unread_notification = Notification::where(['is_read' => 0])->where(['user_id' => Auth::id()])->with(['notifiable'])->orderBY('id', 'desc')->get()->take(10);
        }


        $this->unread_log_counter =  Notification::where(['is_read' => 0])->where(['user_id' => Auth::id()])->count();

        $this->unread_notification_list = $unread_notification->toArray();

        ///dd($this->activity_log )
    }

    private function get_dynamic_values_by_all(): void
    {

        $findPendingData = DB::table('job_batches')->where('failed_jobs', 0)->where('pending_jobs', 1)->orderBY('id', 'desc')->first();

        if($findPendingData){
            $timestamp = $findPendingData->created_at;
            $dateTime = Carbon::createFromTimestamp($timestamp);
            $formattedDateTime = $dateTime->toDateTimeString();

            $data = Notification::where(['is_read' => 0])->where(['user_id' => Auth::id()])->where('created_at','>',$formattedDateTime)->with(['notifiable'])->orderBY('id', 'desc')->get();

            $unread_notification = $data->take(10);

            $this->unread_log_counter =  $data->count();
        }else{
            $data = Notification::where(['is_read' => 0])->where(['user_id' => Auth::id()])->with(['notifiable'])->orderBY('id', 'desc')->get();

            $unread_notification = $data->take(10);

            $this->unread_log_counter =  $data->count();
        }



        $this->unread_notification_list = $unread_notification->toArray();
    }

    /**
     * headerNotificationUpdated method will be called on any changes on activity log table
     * @return null
     */

    #[On('echo:notification,NotificationEvent')]
    public function topHeaderNotificationEventListener()
    {
        $this->notificationStatus = false;
        $this->get_dynamic_values_by_all();
    }

      /**
     * Update all activity logs
     * @return void
     */
    public function allNotificationUpdated(): void
    {
        $batch = $this->notification_service->allNotificationUpdated();
        if(strlen($batch > 0)){
            $this->notificationStatus = true;
            $this->get_dynamic_values();
        }
    }

    /**
     * Update all activity logs
     * @return void
     */
    public function notificationUpdated($id): void
    {
        $this->notification_service->notificationUpdated($id);
        $this->get_dynamic_values_by_all();
       // $this->unread_log_counter = $this->unread_log_counter - 1;
    }

    public function render(): View
    {
        return view('livewire.backend.partials.header-notification-component');
    }
}
