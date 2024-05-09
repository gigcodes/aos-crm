<?php

namespace App\Notifications;

use Filament\Facades\Filament;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class LoginRequest extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Hello'.' '.$notifiable->name)
            ->line('You have requested to log in to your account. Here is your temporary password:')
            ->line('Temporary Password: ' . $notifiable->password)
            ->action('Reset Your Password', $this->resetUrl($notifiable))
            ->line('This password is only valid for a limited time. Please reset your password using the link provided.')
            ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }

    protected function resetUrl(mixed $notifiable): string
    {
        $token = app('auth.password.broker')->createToken($notifiable);
        return Filament::getResetPasswordUrl($token, $notifiable);
    }
}
