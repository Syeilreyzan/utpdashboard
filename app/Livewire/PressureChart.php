<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\PressureRecord;

class PressureChart extends Component
{
    public $pressureRecords;

    public function mount()
    {
        $this->pressureRecords = PressureRecord::all();
    }

    public function render()
    {
        return view('livewire.pressure-chart');
    }
}
