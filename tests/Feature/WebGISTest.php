<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Umkm;
use App\Models\Category;
use App\Models\Product;
use Tests\TestCase;

class WebGISTest extends TestCase
{
    public function test_simple()
    {
        $this->assertTrue(true);
    }

    public function test_admin_can_access_admin_dashboard()
    {
        $admin = User::where('email', 'admin@kopi.com')->first();
        
        if (!$admin) {
            $this->markTestSkipped('User Admin tidak ditemukan di database.');
        }

        $response = $this->actingAs($admin)->get('/admin/dashboard');

        $response->assertStatus(200);
        $response->assertSee('Admin Panel');
    }

    public function test_umkm_can_access_umkm_dashboard_and_products()
    {
        $umkmUser = User::where('email', 'testumkm@gmail.com')->first();
        
        if (!$umkmUser) {
            $this->markTestSkipped('User UMKM tidak ditemukan di database.');
        }

        // Cek Dashboard
        $response = $this->actingAs($umkmUser)->get('/dashboard');
        $response->assertStatus(200);
        $response->assertSee('Katalog Produk');

        // Cek Akses Daftar Produk
        $response = $this->actingAs($umkmUser)->get(route('umkm.products.index'));
        $response->assertStatus(200);
        $response->assertSee('Tambah Produk');
    }

    public function test_regular_user_cannot_access_admin_area()
    {
        $user = User::where('email', 'testuser@gmail.com')->first();

        if (!$user) {
            $this->markTestSkipped('User biasa tidak ditemukan di database.');
        }

        $response = $this->actingAs($user)->get('/admin/dashboard');

        // Menggunakan 403 karena sistem Anda memberikan akses terlarang (Forbidden) yang lebih aman
        $response->assertStatus(403); 
    }

    public function test_public_can_access_map_and_katalog()
    {
        $response = $this->get('/');
        $response->assertStatus(200);

        $response = $this->get('/katalog');
        $response->assertStatus(200);
        $response->assertSee('Produk Unggulan');
    }

    public function test_guest_is_redirected_when_accessing_dashboard()
    {
        $response = $this->get('/dashboard');
        $response->assertRedirect('/login');
    }
}
