<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\defineFreeIssues; 

class DataControllerController extends Controller
{


    public function edit($id)
    {
        // Retrieve data to edit based on the provided ID
        $data = defineFreeIssues::findOrFail($id);
        // Pass the data to the view for editing
        return view('edit-view', ['data' => $data]);
    }

    public function update(Request $request, $id)
    {
        // Retrieve the existing data
        $data = defineFreeIssues::findOrFail($id);
        // Update the data with new values
        $data->field_name = $request->input('field_name');
        // Add more fields as needed

        // Save the updated data
        $data->save();
        // Redirect or return a response
        return redirect()->route('data.edit', $data->id)->with('success', 'Data updated successfully');
    }

}
