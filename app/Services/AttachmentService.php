<?php

namespace App\Services;

use App\Models\Attachment;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Collection;

/**
 * AttachmentService
 * @author Md. Amzad Hossain Jacky <amzadhossainjacky@gmail.com>
 */
class AttachmentService
{
    /**
     * delete_files method deletes all files from storage
     * @param  \Illuminate\Database\Eloquent\Collection $files
     * @param  string $disk name of the storage directory to upload file as disk default is 'attachments'
     * @param  string $field_name name of the table filed where uploaded file name exist default is 'file'
     * @return void
     */
    public function delete_files(Collection $files, string $disk = 'attachments', string $field_name = 'file'): void
    {
        $files = $files->pluck($field_name)->toArray();
        Storage::disk($disk)->delete($files);
    }

    /**
     * download_by_id method
     * @param int $id
     * @return mixed
     */
    public function download_by_id(int $id): Mixed
    {
        $attachment = Attachment::find($id);
        $filePath = storage_path('app/public/attachments/' . $attachment->file);

        return $filePath;
    }

    /**
     * delete_by_id method
     * @param int $id
     * @return mixed
     */
    public function delete_model_by_id(int $id): Mixed
    {
        $attachment = Attachment::find($id);
        $this->unlink_single_file($attachment->file);
        $attachment->delete();

        return $attachment;
    }

    /**
     * unlink_single_file method deletes single file from storage
     * @param  string $file name of the table filed where uploaded file name exist default is 'file'
     * @param  string $disk name of the storage directory to upload file as disk default is 'attachments'
     * @return void
     */
    public function unlink_single_file(string $file, string $disk = 'attachments'): void
    {
        Storage::disk($disk)->delete($file);
    }



}
