<?php

namespace App\Notifications;

use App\Models\Product;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ProductListedNotification extends Notification
{
    use Queueable;

    public function __construct(public Product $product) {}

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        $hargaFormatted = 'Rp ' . number_format($this->product->harga, 0, ',', '.');

        return (new MailMessage)
            ->subject('📦 Produk Anda Berhasil Terdaftar di Katalog!')
            ->greeting('Halo, ' . $notifiable->name . '!')
            ->line('Produk Anda telah berhasil ditambahkan ke katalog WebGIS Kopi Temanggung.')
            ->line('**Detail Produk:**')
            ->line('• Nama Produk : ' . $this->product->nama_produk)
            ->line('• Harga       : ' . $hargaFormatted)
            ->action('Lihat Katalog Saya', url('/katalog/' . $this->product->id))
            ->line('Produk Anda kini dapat ditemukan dan dibeli oleh pelanggan di seluruh platform.')
            ->salutation('Salam, Tim ' . config('app.name'));
    }
}
