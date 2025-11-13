<?php

namespace App\View\Components\Spasial;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Sidebarku extends Component
{
    public $links;

    public function __construct()
    {
        /** @var \App\Models\User $user */
        // $user = Auth::user(); 

        $links = []; // Mulai dengan array kosong

        // ===================================
        // 1. MENU HOME (TIDAK BERUBAH)
        // ===================================
        $links[] = [
            'name' => 'Home',
            'route' => 'dashboard',
            'icon' => 'fas fa-home fa-lg',
            'is_active' => request()->routeIs('dashboard'),
            'is_dropdown' => false,
            'submenu' => [],
        ];

        // ===================================
        // 2. MENU LAMA ANDA (ANALISIS MANDIRI)
        // ===================================
        $analisisMandiriSubmenu = [];
        $analisisMandiriActiveRoutes = [];

        $analisisMandiriSubmenu[] = [
            'name' => 'Input Data',
            'route' => 'klarifikasi.input', // (Ini adalah route ke form input)
            'is_active' => request()->routeIs('klarifikasi.input'),
        ];
        $analisisMandiriActiveRoutes[] = 'klarifikasi.input';

        $analisisMandiriSubmenu[] = [
            'name' => 'Data Saya',
            'route' => 'data.list', // (Ini adalah route ke tabel data)
            'is_active' => request()->routeIs('data.list'),
        ];
        $analisisMandiriActiveRoutes[] = 'data.list';

        // Tambahkan ke links utama
        if (!empty($analisisMandiriSubmenu)) {
            $links[] = [
                'name' => 'Analisis Mandiri', // Nama menu lama
                'icon' => 'fas fa-map-marked-alt fa-lg',
                'is_active' => request()->routeIs($analisisMandiriActiveRoutes),
                'is_dropdown' => true,
                'submenu' => $analisisMandiriSubmenu,
            ];
        }

        // ===================================
        // 3. MENU BARU ANDA (PERMOHONAN RESMI)
        // ===================================
        $permohonanSubmenu = [];
        $permohonanActiveRoutes = [];

        // Submenu "Ajukan Permohonan Baru"
        $permohonanSubmenu[] = [
            'name' => 'Ajukan Permohonan Baru',
            'route' => 'permohonananalisis.create', // <-- NAMA ROUTE BARU
            'is_active' => request()->routeIs('permohonananalisis.create'),
        ];
        $permohonanActiveRoutes[] = 'permohonananalisis.create';

        // Submenu "Daftar Permohonan Saya"
        $permohonanSubmenu[] = [
            'name' => 'Daftar Permohonan Saya',
            'route' => 'permohonananalisis.index', // <-- NAMA ROUTE BARU
            'is_active' => request()->routeIs('permohonananalisis.index'),
        ];
        $permohonanActiveRoutes[] = 'permohonananalisis.index';

        // Tambahkan ke links utama
        if (!empty($permohonanSubmenu)) {
            $links[] = [
                'name' => 'Permohonan Analisis Resmi', // Nama menu baru
                'icon' => 'fas fa-file-signature fa-lg', // Icon baru
                'is_active' => request()->routeIs($permohonanActiveRoutes),
                'is_dropdown' => true,
                'submenu' => $permohonanSubmenu,
            ];
        }

        $this->links = $links;
    }


    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.spasial.sidebarku');
    }
}
