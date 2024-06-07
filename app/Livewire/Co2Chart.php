<?php

namespace App\Livewire;

use App\Models\CO2Records;
use Livewire\Component;

class Co2Chart extends Component
{
    public $co2Records;

    public function mount()
    {
        $this->co2Records = CO2Records::all();
    }

    public function render()
    {
        return view('livewire.co2-chart');
    }
}
