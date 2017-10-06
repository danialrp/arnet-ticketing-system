<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    protected $table = 'attachments';


    /* FK RELATIONSHIP */

    public function contentAttachment()
    {
        return $this->belongsTo('App\Content', 'message_id');
    }
}
