<?php

namespace App\Livewire\Managements;

use Livewire\Component;

class IndexManagement extends Component
{
    public $name = 'Duvan Smith Duque Rodriguez';
    public $type = 'CC';
    public $identification = '1004148273';
    public $gender = 'M';
    public $birthday = '24/07/2000';
    public $address = 'Calle 4 #9-40 Barrio Altico';
    public $phone = '3506808725';
    public $email = 'duvansmith@hotmail.com';
    public $ocupation = 'Desarrollador';
    public $type_person = 'Natural';

    public $open = false;

    public function render()
    {
        return view('livewire.managements.index-management')
            ->layout('layouts.app');
    }
}
