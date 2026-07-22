<?php

namespace App\Notifications;

use App\Models\Umkm;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UmkmReactivatedNotification extends Notification
{
    use Queueable;

    public function __construct(public Umkm $umkm) {}

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('✅ UMKM Anda Telah Aktif Kembali!')
            ->greeting('Halo, ' . $notifiable->name . '!')
            ->line('Kabar baik! UMKM **"' . $this->umkm->nama_umkm . '"** Anda kini telah **aktif kembali**.')
            ->line('UMKM Anda sudah tampil di peta dan katalog publik WebGIS Kopi Temanggung.')
            ->action('Buka Dashboard', route('dashboard'))
            ->salutation('Salam, Tim ' . config('app.name'));
    }
}
