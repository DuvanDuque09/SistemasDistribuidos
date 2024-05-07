<?php

namespace App\Livewire\Documents;

use Livewire\Component;

class IndexDocument extends Component
{
    public function render()
    {
        return view('livewire.documents.index-document')
            ->layout('layouts.app');
    }
}
