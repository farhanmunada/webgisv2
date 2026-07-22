<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UmkmRejectedNotification extends Notification
{
    use Queueable;

    // Menerima nama string, bukan model Umkm,
    // karena data umkm akan dihapus setelah notifikasi ini dibuat.
    public function __construct(public string $namaUmkm) {}

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Informasi Status Pendaftaran UMKM Anda')
            ->greeting('Halo, ' . $notifiable->name . '.')
            ->line('Kami informasikan bahwa pendaftaran UMKM dengan nama **"' . $this->namaUmkm . '"** belum dapat kami setujui saat ini.')
            ->line('Hal ini dapat terjadi karena data yang dikirimkan belum lengkap atau belum memenuhi persyaratan yang berlaku.')
            ->line('Anda dipersilakan untuk mendaftar kembali dengan melengkapi informasi UMKM yang sesuai.')
            ->action('Daftar Ulang UMKM', route('umkm.register'))
            ->line('Jika ada pertanyaan, silakan hubungi tim admin kami.')
            ->salutation('Terima kasih atas partisipasinya. Tim ' . config('app.name'));
    }
}
