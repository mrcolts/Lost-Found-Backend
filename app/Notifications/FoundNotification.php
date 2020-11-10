<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class FoundNotification extends Notification
{
    use Queueable;

    private string $full_name;

    private string $lost_item_name;

    private string $founder_phone;

    private string $location;

    /**
     * FoundNotification constructor.
     * @param string $full_name
     * @param string $lost_item_name
     * @param string $founder_phone
     */
    public function __construct(string $full_name, string $lost_item_name, string $founder_phone, string $location)
    {
        $this->full_name = $full_name;
        $this->lost_item_name = $lost_item_name;
        $this->founder_phone = $founder_phone;
        $this->location = $location;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $message = (new MailMessage)
            ->subject('Найдена ваша собственность!')
            ->greeting("Здравствуйте, $this->full_name!")
            ->line("Вашу собственность «{$this->lost_item_name}» нашли.");

        if (is_null($this->location))
        {
          $message->line("Примерное место нахождения вещи: ". $this->location);
        }
        $message->line('Связаться с нашедшим можно по телефону: '. $this->founder_phone)
                ->line('С уважением, команда IT Kama Sutra');
        return $message;
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
