<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;

class SKCKNotifikasiSelesai extends Notification implements ShouldQueue
{
    use Queueable;
    private $id_persuratan;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($id_persuratan)
    {
        $this->id_persuratan=$id_persuratan;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        
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
            'message'=>'Surat SKCK selesai diproses! ','from'=>Auth::id(), 'id_persuratan'=>$this->id_persuratan
        ];
    }
}
