<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ControllerRecords;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class ControllerValve extends Component
{
    use LivewireAlert;

    public $valve1;

    public function getListeners()
    {
        return [
            "echo-private:controller,ControllerEvent" => 'updateValve1',
            'updateValve',
        ];
    }

    public function mount()
    {
        $record = ControllerRecords::first(); // Assuming you want to work with the first record

        if ($record) {
            $this->valve1 = $record->valve1; // Initialize $valve1 based on the record's value
        }
    }

    public function updatedValve1($value)
    {
        // Emit an event to trigger the controller method
        // $this->emit('updateValve', $value);
    }

    public function updateValve($value)
    {
        $this->alert('success', 'Valve updated successfully');
    }

    public function render()
    {
        return view('livewire.controller-valve');
    }
}
