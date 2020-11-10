<?php


namespace App\Notifications;


use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewItemNotification extends Notification
{
    use Queueable;

    private string $full_name;

    private string $lost_item_name;

    private string $lost_item_id;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(string $full_name, string $lost_item_name, string $lost_item_id)
    {
        $this->full_name = $full_name;
        $this->lost_item_name = $lost_item_name;
        $this->lost_item_id = $lost_item_id;
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
        $url = config('common.web.lost_item_page') . "/" . $this->lost_item_id;
        $body = '<body><br/> <img src="{{ https://api.qrserver.com/v1/create-qr-code/?size=320x320&data=' . $url . ' }}"/></body>';
        return (new MailMessage)
                ->subject('Вы добавили новую предмет!')
                ->greeting('Здравствуйте, $this->full_name!')
                ->line("Предмет « $this->lost_item_name » был добавлен в ваш каинет.")
                ->line($body)
                ->line('С уважением, команда IT Kama Sutra');
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
