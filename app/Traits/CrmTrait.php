<?php

namespace App\Traits;

use Carbon\Carbon;


/**
 * CrmTrait trait
 * @author Sakil Jomadder <sakil.diu.cse@gmail.com>
 */

trait  CrmTrait
{

    /**
     * date_filter_options method return date filter options
     *
     * @return array
     */
    public function date_filter_options(): array
    {
        ## Get the first and last day of the current month
        $firstDayOfCurrentMonth = Carbon::now()->firstOfMonth()->format('Y-m-d 00:00:00');
        $lastDayOfCurrentMonth = Carbon::now()->lastOfMonth()->format('Y-m-d 23:59:59');

        ## Get the first and last day of the previous month
        $lastDayOfPreviousMonth = Carbon::now()->firstOfMonth()->subDay()->format('Y-m-d 23:59:59');
        $firstDayOfPreviousMonth = Carbon::now()->firstOfMonth()->subDay()->firstOfMonth()->format('Y-m-d 00:00:00');

        return [
            'today' => ['label' => 'today', 'start_date' => Carbon::now()->format('Y-m-d 00:00:00'), 'end_date' => Carbon::now()->format('Y-m-d 23:59:59')],
            'yesterday' => ['label' => 'yesterday', 'start_date' => Carbon::yesterday()->format('Y-m-d 00:00:00'), 'end_date' => Carbon::yesterday()->format('Y-m-d 23:59:59')],
            'last_7' => ['label' => 'last 7 days', 'start_date' => Carbon::now()->subDay(6)->format('Y-m-d 00:00:00'), 'end_date' => Carbon::now()->format('Y-m-d 23:59:59')],
            'last_15' => ['label' => 'last 15 days', 'start_date' => Carbon::now()->subDay(14)->format('Y-m-d 00:00:00'), 'end_date' => Carbon::now()->format('Y-m-d 23:59:59')],
            'last_30' => ['label' => 'last 30 days', 'start_date' => Carbon::now()->subDay(29)->format('Y-m-d 00:00:00'), 'end_date' => Carbon::now()->format('Y-m-d 23:59:59')],
            'current_month' => ['label' => 'current month', 'start_date' => $firstDayOfCurrentMonth, 'end_date' =>  $lastDayOfCurrentMonth],
            'previous_month' => ['label' => 'previous month', 'start_date' => $firstDayOfPreviousMonth, 'end_date' =>  $lastDayOfPreviousMonth],
        ];
    }
}
