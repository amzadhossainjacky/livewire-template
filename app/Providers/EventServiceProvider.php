<?php

namespace App\Providers;

use App\Models\Exam;
use App\Models\Lead;
use App\Models\Role;
use App\Models\Task;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Campaign;
use App\Models\IssueType;
use App\Models\LeadQuery;
use App\Models\Procedure;
use App\Models\LeadSource;
use App\Models\Permission;
use App\Models\SmsHistory;
use App\Models\SmsSetting;
use App\Models\TaskRecord;
use App\Models\LeadCallLog;
use App\Models\LeadDialLog;
use App\Models\SmsTemplate;
use App\Models\Cancellation;
use App\Models\EmailHistory;
use App\Models\IssueSummary;
use App\Models\LeadFollowUp;
use App\Models\LeadDescendant;
use App\Models\PlanAndPackage;
use App\Models\ReportDelivery;
use App\Models\PatientCategory;
use App\Observers\ExamObserver;
use App\Observers\LeadObserver;
use App\Observers\RoleObserver;
use App\Observers\TaskObserver;
use App\Observers\UserObserver;
use App\Models\DoctorDepartment;
use App\Models\EmailSmtpSetting;
use App\Models\ExamQuestionSet;
use App\Models\IssueSummaryCause;
use App\Observers\DoctorObserver;
use App\Models\FitnessCertificate;
use App\Models\LeadFollowUpStatus;
use App\Models\SmsTemplateContent;
use App\Observers\CampaignObserver;
use App\Observers\IssueTypeObserver;
use App\Observers\LeadQueryObserver;
use App\Observers\ProcedureObserver;
use App\Observers\LeadSourceObserver;
use App\Observers\PermissionObserver;
use App\Observers\SmsHistoryObserver;
use App\Observers\SmsSettingObserver;
use App\Observers\TaskRecordObserver;
use Illuminate\Support\Facades\Event;
use App\Observers\LeadCallLogObserver;
use App\Observers\LeadDialLogObserver;
use App\Observers\SmsTemplateObserver;
use Illuminate\Auth\Events\Registered;
use App\Observers\CancellationObserver;
use App\Observers\EmailHistoryObserver;
use App\Observers\IssueSummaryObserver;
use App\Observers\LeadFollowUpObserver;
use App\Observers\LeadDescendantObserver;
use App\Observers\PlanAndPackageObserver;
use App\Observers\ReportDeliveryObserver;
use App\Observers\PatientCategoryObserver;
use App\Observers\DoctorDepartmentObserver;
use App\Observers\EmailSmtpSettingObserver;
use App\Observers\IssueSummaryCauseObserver;
use App\Observers\FitnessCertificateObserver;
use App\Observers\LeadFollowUpStatusObserver;
use App\Observers\SmsTemplateContentObserver;
use App\Models\IssueTypesSummariesCausesMapping;
use App\Observers\ExamQuestionSetObserver;
use App\Observers\IssueSummaryCauseMappingObserver;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        // all observer register
        User::observe(UserObserver::class);
        Role::observe(RoleObserver::class);
        Permission::observe(PermissionObserver::class);
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
