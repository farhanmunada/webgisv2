<?php

namespace App\Notifications;

use App\Models\Umkm;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UmkmApprovedNotification extends Notification
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
            ->subject('🎉 Selamat! Pendaftaran UMKM Anda Disetujui')
            ->greeting('Halo, ' . $notifiable->name . '!')
            ->line('Kabar baik! Pendaftaran UMKM Anda dengan nama **"' . $this->umkm->nama_umkm . '"** telah **disetujui** oleh tim admin.')
            ->line('UMKM Anda kini telah terdaftar dan dapat ditemukan di platform WebGIS Kopi Temanggung.')
            ->action('Buka Dashboard Saya', url('/dashboard'))
            ->line('Segera lengkapi profil dan tambahkan produk-produk Anda agar bisa dilihat oleh lebih banyak pelanggan.')
            ->salutation('Salam, Tim ' . config('app.name'));
    }
}
