<?php

namespace App\Http\Controllers;

use App\Models\Node;
use Illuminate\Http\Request;
use App\Models\NodeParameter;

class ChartDataController extends Controller
{
    public function getData()
    {
        $nodes = Node::all();
        $labels = [];
        $values = [];

        foreach ($nodes as $node) {
            $nodeParameters = $node->nodeParameter;

            if ($nodeParameters->where('node_id', 1)->count() > 0){
                $valueNodes = $nodeParameters->pluck('current_value')->values();
                $labelNode = $nodeParameters->pluck('date_time')->values();
                $titleNode = $nodes->where('id', 1)->pluck('unit_of_measurement');
                $equipment_label = $nodes->where('id', 1)->pluck('equipment_label');
                $equipment_type = $nodes->where('id', 1)->pluck('equipment_type')->first();

                foreach ($valueNodes as $index => $valueNode) {
                    $labels[] = date('d M H:i:s', strtotime($labelNode[$index])); // For example: "12 Jul 14:30"
                    $values[] = $valueNode;
                }
            }

            if ($nodeParameters->where('node_id', 2)->count() > 0){
                $valueNodes2 = $nodeParameters->pluck('current_value')->values();
                $labelNode2 = $nodeParameters->pluck('date_time')->values();
                $titleNode2 = $nodes->where('id', 2)->pluck('unit_of_measurement')->values();
                $equipment_type2 = $nodes->where('id', 2)->pluck('equipment_type')->first();

                foreach($valueNodes2 as $index => $valueNode2) {
                    $labels2[] = date('d M H:i:s', strtotime($labelNode2[$index]));
                    $values2[] = $valueNode2;
                }
            }

            if ($nodeParameters->where('node_id', 3)->count() > 0){
                $valueNodes3= $nodeParameters->pluck('current_value')->values();
                $labelNode3= $nodeParameters->pluck('date_time')->values();
                $titleNode3 = $nodes->where('id', 3)->pluck('unit_of_measurement')->values();
                $equipment_type3 = $nodes->where('id', 3)->pluck('equipment_type')->first();

                foreach($valueNodes3 as $index => $valueNode3) {
                    $labels3[] = date('d M H:i:s', strtotime($labelNode3[$index]));
                    $values3[] = $valueNode3;
                }
            }

            if ($nodeParameters->where('node_id', 4)->count() > 0){
                $valueNodes4= $nodeParameters->pluck('current_value')->values();
                $labelNode4 = $nodeParameters->pluck('date_time')->values();
                $titleNode4 = $nodes->where('id', 4)->pluck('unit_of_measurement')->values();
                $equipment_type4 = $nodes->where('id', 4)->pluck('equipment_type')->first();

                foreach($valueNodes4 as $index => $valueNode4) {
                    $labels4[] = date('d M H:i:s', strtotime($labelNode4[$index]));
                    $values4[] = $valueNode4;
                }
            }

            if ($nodeParameters->where('node_id', 5)->count() > 0){
                $valueNodes5= $nodeParameters->pluck('current_value')->values();
                $labelNode5= $nodeParameters->pluck('date_time')->values();
                $titleNode5 = $nodes->where('id', 5)->pluck('unit_of_measurement')->values();
                $equipment_type5 = $nodes->where('id', 5)->pluck('equipment_type')->first();

                foreach($valueNodes5 as $index => $valueNode5) {
                    $labels5[] = date('d M H:i:s', strtotime($labelNode5[$index]));
                    $values5[] = $valueNode5;
                }
            }
        }
        return view('dashboard', compact(
            'labels', 'values','titleNode','equipment_type',
            'labels2','values2','titleNode2','equipment_type2',
            'labels3','values3','titleNode3','equipment_type3',
            'labels4','values4','titleNode4','equipment_type4',
            'labels5','values5','titleNode5','equipment_type5'
        ));
    }
}
