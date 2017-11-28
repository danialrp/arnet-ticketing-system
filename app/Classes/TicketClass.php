<?php

/**
 * Class TicketClass
 *
 * @package \\${NAMESPACE}
 */

namespace App\Classes;

use App\Admin;
use App\Content;
use App\Events\NewReplySent;
use App\Http\Requests\AdminSendMessageRequest;
use App\Http\Requests\SendMessageRequest;
use App\Notifications\AdminTelegramNotification;
use App\Notifications\NewTicketReply;
use App\Ticket;
use App\User;
use Carbon\Carbon;
use Hekmatinasser\Verta\Verta;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class TicketClass
{
    public function saveAttachmentFileToDisk(SendMessageRequest $sendMessageRequest, $inputName, $contentId)
    {
        if(! $sendMessageRequest->hasFile($inputName))
            return false;

        $file = $sendMessageRequest->file($inputName);
        $extension = $file->getClientOriginalExtension();
        Storage::disk('local')->put($contentId . '/'.$file->getFilename(). '.' .$extension, File::get($file));
        $mime = $file->getClientMimeType();
        $originalFileName = $file->getClientOriginalName();
        $fileName = $file->getFilename(). '.' .$extension;
        $fileUrl = 'app/'. $contentId .'/';

        return [
            'file' => $file,
            'extension' => $extension,
            'mime' => $mime,
            'originalFileName' => $originalFileName,
            'fileName' => $fileName,
            'fileUrl' => $fileUrl,
        ];

    }

    public function downloadAttachment($attachmentId)
    {
        $fileInfo = DB::table('attachments')
            ->where('id', $attachmentId)
            ->select('file_url', 'mime','filename', 'original_filename')
            ->first();

        return $fileInfo;
    }

    public function generateReferenceNumber()
    {
        $referenceNumber = sprintf("%06d", mt_rand(1, 999999));
        return $referenceNumber;
    }

    public function getProjectOwner($projectId)
    {
        $user = DB::table('projects')
            ->join('users', 'projects.owner', 'users.id')
            ->where('projects.id', $projectId)
            ->select('users.*')
            ->first();

        return $user;
    }

    public function saveAdminAttachmentFileToDisk(AdminSendMessageRequest $adminSendMessageRequest, $inputName, $contentId)
    {
        if(! $adminSendMessageRequest->hasFile($inputName))
            return false;

        $file = $adminSendMessageRequest->file($inputName);
        $extension = $file->getClientOriginalExtension();
        Storage::disk('local')->put($contentId . '/'.$file->getFilename(). '.' .$extension, File::get($file));
        $mime = $file->getClientMimeType();
        $originalFileName = $file->getClientOriginalName();
        $fileName = $file->getFilename(). '.' .$extension;
        $fileUrl = 'app/'. $contentId .'/';

        return [
            'file' => $file,
            'extension' => $extension,
            'mime' => $mime,
            'originalFileName' => $originalFileName,
            'fileName' => $fileName,
            'fileUrl' => $fileUrl,
        ];

    }

    public function notifyUserViaEmailForNewReply($contentId, $url)
    {
        $content = Content::findOrFail($contentId);

        $user = User::findOrFail($content->owner);

        event(new NewReplySent($user, $url));
    }

    public function notifyUserViaTelegramForNewReply($contentId, $url)
    {
        $content = Content::findOrFail($contentId);

        $user = User::findOrFail($content->owner);

        if($user->telegram)
            $user->notify(new NewTicketReply($user, $url));

        return true;
    }

    public function notifyAdminViaTelegramForNewReply($contentId, $url)
    {
        $content = Content::findOrFail($contentId);

        $admin = Admin::findOrFail(1);

        if($admin->telegram)
            $admin->notify(new AdminTelegramNotification($admin, $url));

        return true;
    }
}