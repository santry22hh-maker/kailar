<?php

namespace App\View\Components\klarifikasi;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Sidebarku extends Component
{
    public $links;

    public function __construct()
    {
        $this->links = [
            [
                'label' => 'Dashboard',
                'icon' => 'fas fa-home',
                'rute' => 'Dashboard',
                'is_dropdown' => false,
                'is_active' => request()->is('dashboard*'),
            ],
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.klarifikasi.sidebarku');
    }
}
