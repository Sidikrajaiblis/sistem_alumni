<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\DatabaseMessage;
use Illuminate\Support\Facades\Auth;

class KomentarBaruNotification extends Notification
{
    use Queueable;

    protected $komentar;

    public function __construct($komentar)
    {
        $this->komentar = $komentar;
    }

    public function via($notifiable)
    {
        return ['database']; // atau 'mail' juga bisa
    }

    public function toDatabase($notifiable)
    {
        return [
            'forum_id' => $this->komentar->forum_id,
            'komentar_id' => $this->komentar->id,
            'komentar_oleh' => $this->komentar->user->name, 
            'isi' => $this->komentar->isi,
            'komentar_user_id' => Auth::id(),
        ];
    }
}
