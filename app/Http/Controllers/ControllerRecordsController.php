<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ControllerRecords;

class ControllerRecordsController extends Controller
{
    public function updateValve(Request $request)
    {
        // Retrieve the value of valve1 from the request
        $valve1 = $request->input('valve1');

        // Save the value to the database using the ControllerRecords model
        $record = ControllerRecords::first(); // Assuming you want to update the first record

        if ($record) {
            $record->update(['valve1' => $valve1]);
        }

        // Redirect back or return a response as needed
        return redirect()->with('success', 'Valve updated successfully');
    }
}
