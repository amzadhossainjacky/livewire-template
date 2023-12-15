<?php

namespace App\Services;

use App\Models\ActivityLog;

/**
 * ActivityLogService
 * @author Md. Amzad Hossain Jacky <amzadhossainjacky@gmail.com>
 */
class ActivityLogService
{

    /**
     * Update All Activity Log Updated
     * @param array $inputs
     * @return void
     */
    public function allActivityLogUpdated(): void
    {
        $allActivityLogs = ActivityLog::where(['is_read' => 0])->get();
        if(count($allActivityLogs) > 0){
            for ($i=0; $i < count($allActivityLogs) ; $i++) {
               $findActivityLog = ActivityLog::find($allActivityLogs[$i]->id);
               if( $findActivityLog){
                    $findActivityLog->is_read = 1;
                    $findActivityLog->save();
               }
            }
        }
    }

    /**
     * Update Activity Log Updated
     * @param array $inputs
     * @return void
     */
    public function activityLogUpdated($id): void
    {
        $findActivityLog = ActivityLog::find($id);
        $findActivityLog->is_read = 1;
        $findActivityLog->save();
    }

    /**
     * delete method returns list of resources in array
     * @param int $id
     * @return void
     */
    // public function delete(int $id): void
    // {
    //     Campaign::find($id)->delete();
    // }

}
