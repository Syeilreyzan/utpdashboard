<?php

namespace App\Http\Livewire;

use App\Models\Toggle;
use Livewire\Component;

class ToggleButtons extends Component
{
    public $toggles;

    public function mount()
    {
        $this->toggles = Toggle::all(); // Retrieve all data from the toggle table
    }

    public function toggleStatus($id)
    {
        // Find the toggle by id and toggle the status
        $toggle = Toggle::find($id);
        $toggle->status = !$toggle->status;
        $toggle->save();

        // Refresh the data to update the UI
        $this->toggles = Toggle::all();
    }

    public function render()
    {
        return view('livewire.toggle-buttons', [
            'toggles' => $this->toggles
        ]);
    }
}
