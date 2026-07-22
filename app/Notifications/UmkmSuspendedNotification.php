<?php

namespace App\Notifications;

use App\Models\Umkm;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UmkmSuspendedNotification extends Notification
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
            ->subject('⚠️ Akun UMKM Anda Telah Ditangguhkan')
            ->greeting('Halo, ' . $notifiable->name . '.')
            ->line('Kami informasikan bahwa akun UMKM **"' . $this->umkm->nama_umkm . '"** Anda telah **ditangguhkan** oleh tim admin karena terdeteksi pelanggaran terhadap ketentuan layanan platform kami.')
            ->line('Selama masa penangguhan, UMKM Anda tidak akan tampil di peta dan katalog publik.')
            ->line('Jika Anda merasa ini adalah kesalahan atau ingin mengajukan keberatan, silakan hubungi tim admin melalui email:')
            ->line('📧 **no-reply@jelajahkopi.my.id**')
            ->salutation('Terima kasih atas perhatiannya. Tim ' . config('app.name'));
    }
}
