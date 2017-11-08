<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

/**
 * @property User User
 */

class NewReply extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $user;

    public $url;

    /**
     * Create a new message instance.
     * @param User $user
     */
    public function __construct(User $user, $url)
    {
        $this->user = $user;

        $this->url = $url;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->from('info@arnetcode.com')
            ->subject('!آرنت - شما یک پیغام جدید دارید')
            ->view('emails.new-reply');
    }
}
