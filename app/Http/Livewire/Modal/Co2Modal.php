<?php

namespace App\Http\Livewire\Modal;

use App\Models\Node;
use App\Models\NodeParameter;
use LivewireUI\Modal\ModalComponent;

class Co2Modal extends ModalComponent
{
    public $bg_color =[
        'thead' => '',
        'trEven' => '',
        'trOdd' => '',
    ];
    public $datas;
    public $nodes;
    public $node_id;
    public $equipment_type;
    public $equipment_label;
    public $latestNodeParameter;
    public $unit_of_measurement;

    public function mount()
    {
        $this->datas = NodeParameter::where('node_id', $this->node_id)->orderBy('id','desc')->get();
        $this->nodes = Node::where('id', $this->node_id)->get();
        $this->equipment_type = $this->nodes->pluck('equipment_type')->first() ?? 'N/A';
        $this->equipment_label = $this->nodes->pluck('equipment_label')->first() ?? 'N/A';
        $this->unit_of_measurement = $this->nodes->where('id', $this->node_id)->pluck('unit_of_measurement')->first();
        $this->latestNodeParameter = $this->datas->first();
        switch ($this->bg_color) {
            case $this->node_id == 1:
                $this->bg_color = [
                    'thead' => 'bg-blue-300',
                    'trEven' => 'bg-blue-50',
                    'trOdd' => 'bg-blue-200',
                ];
                break;
            case $this->node_id == 2:
                $this->bg_color = [
                    'thead' => 'bg-purple-300',
                    'trEven' => 'bg-purple-50',
                    'trOdd' => 'bg-purple-200',
                ];
                break;
            case $this->node_id == 3 || $this->node_id == 4:
                $this->bg_color = [
                    'thead' => 'bg-red-300',
                    'trEven' => 'bg-red-50',
                    'trOdd' => 'bg-red-200',
                ];
                break;
            case $this->node_id == 5:
                $this->bg_color = [
                    'thead' => 'bg-green-300',
                    'trEven' => 'bg-green-50',
                    'trOdd' => 'bg-green-200',
                ];
                break;
        }
    }
    public function render()
    {
        return view('livewire.modal.co2-modal');
    }
}
