<?php

namespace App\Livewire;

use App\Models\FlowControllerRecords;
use Livewire\Component;

class FlowControllerChart extends Component
{
    public $flowControllerRecords;

    public function mount()
    {
        $this->flowControllerRecords = FlowControllerRecords::all();
    }

    public function render()
    {
        return view('livewire.flow-controller-chart');
    }
}
