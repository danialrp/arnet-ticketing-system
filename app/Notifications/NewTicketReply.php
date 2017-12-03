<?php

namespace App\Notifications;

use App\User;
use NotificationChannels\Telegram\TelegramChannel;
use NotificationChannels\Telegram\TelegramMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

/**
 * @property User user
 * @property  ticketUrl
 */
class NewTicketReply extends Notification implements ShouldQueue
{
    use Queueable;

    protected $user;

    protected  $ticketUrl;

    /**
     * Create a new notification instance.
     *
     * @param User $user
     * @param $ticketUrl
     * @internal param $ticketId
     */
    public function __construct(User $user, $ticketUrl)
    {
        $this->ticketUrl = $ticketUrl;

        $this->user = $user;

    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [TelegramChannel::class];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return TelegramMessage
     */
    public function toTelegram($notifiable)
    {

        $url = $this->ticketUrl;

        $telegramChatId = $this->user->telegram;

        return TelegramMessage::create()
            ->to($telegramChatId) // Telegram chat ID
            ->content("کاربر گرامی، شما یک پیغام جدید دارید! برای مشاهده پیغام بر روی کلید زیر کلیک نمایید.") // Content
            ->button('مشاهده پیغام', $url); // Inline Button
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
