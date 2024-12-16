<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class UserInvitationNotification extends Notification
{
    protected $setPasswordUrl;

    public function __construct($setPasswordUrl)
    {
        $this->setPasswordUrl = $setPasswordUrl;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->greeting('Hello ' . $notifiable->name . ',')
            ->line('You have been invited to join the platform.')
            ->action('Set Your Password', $this->setPasswordUrl)
            ->line('Thank you for joining us!');
    }
}
