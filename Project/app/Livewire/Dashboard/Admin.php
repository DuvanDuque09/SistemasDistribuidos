<?php

namespace App\Livewire\Dashboard;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

use Livewire\Component;

class Admin extends Component
{
    public $user;
    public $fechaActual;

    public function render()
    {
        // Establecer la localización en español
        Carbon::setLocale('es');

        // Asignar el valor de $user dentro del método render()
        $this->user = Auth::user();

        // Obtener la fecha actual y almacenarla en la variable $fechaActual
        $this->fechaActual = Carbon::now()->format('l, j \d\e F \d\e Y');

        return view('livewire.dashboard.admin')
            ->layout('layouts.app');
    }
}
