<?php

namespace App\Jobs;

use App\Mail\CrmScriptMail;
use Illuminate\Bus\Queueable;
use App\Services\EmailService;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

/**
 * SendEmailFromCrmScriptJob job class
 * @author Sakil Jomadder <sakil.diu.cse@gmail.com>
 */

class SendEmailFromCrmScriptJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private array $inputs = [];
    public EmailService $email_service;

    /**
     * Create a new job instance.
     */
    public function __construct(array $inputs)
    {
        $this->email_service = new EmailService();
        $this->inputs = $inputs;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        ## Scope properties
        $attachments = [];
        $cc_list = [];

        @['user_id' => $user_id, 'current_lead_id' => $current_lead_id, 'email_to_list' => $email_to_list, 'cc_list' => $cc_list, 'subject' => $subject, 'body' => $body, 'attachment' => $attachment] = $this->inputs;

        ## Process email to send list and cc list
        $email_to_list = collect($email_to_list)->pluck('to')->toArray();
        $cc_list = isset($cc_list) && !empty($cc_list[0]['to']) ? collect($cc_list)->pluck('to')->toArray() : [];

        ## Create new mailable object and send email
        $crm_script_mail = new CrmScriptMail($subject, $body, $attachments);


        Mail::to($email_to_list)->when(($cc_list), function ($query) use ($cc_list) {
            return $query->cc($cc_list);
        })->send($crm_script_mail);
    }
}
