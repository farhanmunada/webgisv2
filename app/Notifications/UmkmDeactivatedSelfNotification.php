<?php

namespace App\Notifications;

use App\Models\Umkm;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UmkmDeactivatedSelfNotification extends Notification
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
            ->subject('UMKM Anda Telah Dinonaktifkan')
            ->greeting('Halo, ' . $notifiable->name . '!')
            ->line('Permintaan Anda telah berhasil diproses. UMKM **"' . $this->umkm->nama_umkm . '"** kini berstatus **tidak aktif**.')
            ->line('Selama tidak aktif, UMKM Anda tidak akan tampil di peta dan katalog publik.')
            ->line('Anda dapat mengaktifkan kembali kapan saja melalui dashboard Anda.')
            ->action('Aktifkan Kembali UMKM', route('dashboard'))
            ->salutation('Salam, Tim ' . config('app.name'));
    }
}
