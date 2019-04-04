<?php

namespace App\Notifications;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class EmailCode extends Notification implements ShouldQueue
{
    use Queueable;

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        $data = [
            'title' => '邮箱验证码',
            'email' => $notifiable->routeNotificationFor('mail'),
            'minutes' => 5,
            'code' => number_random(),
        ];

        $key = 'email_code_' . $data['email'];
        $expired_at = now()->addMinutes($data['minutes']);

        \Cache::put($key, $data['code'], $expired_at);

        return (new MailMessage)->subject($data['title'])->view('emails.verification_code', $data);
    }
}
