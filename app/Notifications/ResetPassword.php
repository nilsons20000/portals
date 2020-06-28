<?php

namespace App\Notifications;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Lang;
use Illuminate\Auth\Notifications\VerifyEmail as VerifyEmailBase;

class ResetPassword extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public $token;

   public function __construct($token)
{
    $this->token = $token;
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
             ->greeting('Sveicināti!')
            ->subject(Lang::getFromJson('Paroles atjaunošana "Ikdiena"'))
            ->line('Jūs saņemat šo e-pasta ziņojumu, jo mēs saņēmām jūsu konta paroles atiestatīšanas pieprasījumu.') // Here are the lines you can safely override
            ->action('Atjaunot paroli', url('password/reset', $this->token))
            ->line('Ja jūs nepieprasījāt paroles atiestatīšanu, turpmāka darbība nav nepieciešama.');
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
