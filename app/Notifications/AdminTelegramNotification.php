<?php

namespace App\Notifications;

use App\Admin;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use NotificationChannels\Telegram\TelegramChannel;
use NotificationChannels\Telegram\TelegramMessage;

/**
 * @property Admin admin
 * @property  ticketUrl
 */
class AdminTelegramNotification extends Notification implements ShouldQueue
{
    use Queueable;

    protected $admin;

    protected $ticketUrl;

    /**
     * Create a new notification instance.
     *
     * @param Admin $admin
     */
    public function __construct(Admin $admin, $ticketUrl)
    {
        $this->admin = $admin;

        $this->ticketUrl = $ticketUrl;
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

        $telegramChatId = $this->admin->telegram;

        return TelegramMessage::create()
            ->to($telegramChatId) // Telegram chat ID
            ->content(  "مدیر گرامی، شما یک پیغام جدید دارید! برای مشاهده پیغام بر روی کلید زیر کلیک نمایید.") // Content
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
