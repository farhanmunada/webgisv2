<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'users' => \App\Models\User::count(),
            'umkms' => \App\Models\Umkm::count(),
            'products' => \App\Models\Product::count(),
            'pending_umkms' => \App\Models\Umkm::where('status', 'pending')->count(),
        ];
        
        return view('admin.dashboard', compact('stats'));
    }
}
