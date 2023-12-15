<?php

namespace App\Observers;

use App\Events\NotificationEvent;
use App\Services\NotificationService;

/**
 * ParentObserver
 * @author Md. Amzad Hossain Jacky <amzadhossainjacky@gmail.com>
 */
class ParentObserver
{
    protected string $causer_name;
    protected int $causer_id;

    ## Service properties
    protected NotificationService $notification_service;

    public function __construct()
    {
        $this->causer_name = auth()->user()->name ?? 'seed';
        $this->causer_id = auth()->id() ?? 1;
        $this->notification_service = new NotificationService();
    }

    /**
     * dispatch_header_notification method dispatch header notification for activity log
     * @return void
     * @author Sakil Jomadder <sakil.diu.cse@gmail.com>
     */
    protected function dispatch_header_notification(): void
    {
        NotificationEvent::dispatch();
    }
}
