<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendVerificationCode extends Notification
{
    use Queueable;
    public $verificationCode;
    public $user;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($verificationCode, $user){
        $this->verificationCode = $verificationCode;
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
        return (new MailMessage)
        ->view('emails.newUserEmail', ['verificationCode' => $this->verificationCode, 'user' =>  $this->user]);
                    // ->line('The introduction to the notification.')
                    // ->action('Notification Action', url('/'))
                    // ->line('Your Verification Code is '. $this->verificationCode);
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
