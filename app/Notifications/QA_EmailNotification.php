<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class QA_EmailNotification extends Notification
{
    use Queueable;

    public function __construct($data)
    {
        $this->data = $data;
    }
    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return $this->getMessage();
    }

    public function getMessage()
    {
        return (new MailMessage)
            ->subject(config('app.name') . ': entry ' . $this->data["action"] . ' in ' . $this->data['crud_name'])
            ->greeting(',مرحبا')
            ->line('نود أن نعلمكم أن الدخول كان ' . $this->data["action"] . ' في ' . $this->data['crud_name'])
            ->line('الرجاء تسجيل الدخول للاطلاع على مزيد من المعلومات.')
            ->action(config('app.name'), url(env('APP_URL')))
            ->line('شكرا لكم')
            ->line(config('app.name') . ' الفريق')
            ->salutation(" ");
    }

}
