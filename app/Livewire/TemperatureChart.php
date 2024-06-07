<?php

namespace App\Livewire;

use App\Models\TemperatureRecord;
use Livewire\Component;

class TemperatureChart extends Component
{
    public $temperatureRecords;

    public function mount()
    {
        $this->temperatureRecords = TemperatureRecord::all();
    }
    
    public function render()
    {
        return view('livewire.temperature-chart');
    }
}
