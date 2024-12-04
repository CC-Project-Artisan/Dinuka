<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\BroadcastMessage;

class ExhibitionActivated extends Notification
{
    use Queueable;

    protected $exhibition;

    public function __construct($exhibition)
    {
        $this->exhibition = $exhibition;
    }

    public function via($notifiable)
    {
        return ['mail', 'database', 'broadcast'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('Your exhibition post has been activated.')
                    ->action('View Exhibition', url('/exhibitions/' . $this->exhibition->id))
                    ->line('Thank you for using our application!');
    }

    public function toArray($notifiable)
    {
        return [
            'exhibition_id' => $this->exhibition->id,
            'message' => 'Your exhibition post has been activated.',
        ];
    }

    public function toBroadcast($notifiable)
    {
        return new BroadcastMessage([
            'exhibition_id' => $this->exhibition->id,
            'message' => 'Your exhibition post has been activated.',
        ]);
    }
}