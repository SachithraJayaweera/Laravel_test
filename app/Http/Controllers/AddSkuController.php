<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AddSku;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use League\Csv\Reader;


class AddSkuController extends Controller
{

    public function downloadTemplate()
    {
        // Define the template CSV file path
        $templatePath = storage_path('app/public/templates/template.csv');

        // Download the template file
        return response()->download($templatePath, 'template.csv');
    }



    public function uploadCsv(Request $request)
    {
        // Validate the uploaded file
        $request->validate([
            'csv_file' => 'required|mimes:csv,txt|max:2048', // Adjust max size as needed
        ]);

        // Process the uploaded CSV file
        if ($request->hasFile('csv_file')) {
            $uploadedFile = $request->file('csv_file');

            // Check file structure against the template (assuming 'template.csv' is your template)
            $templatePath = storage_path('app/public/templates/template.csv');
            $template = Reader::createFromPath($templatePath, 'r');
            $uploadedCsv = Reader::createFromPath($uploadedFile->getPathname(), 'r');

            if ($template->fetchOne() !== $uploadedCsv->fetchOne()) {
                return redirect()->back()->with('error', 'Uploaded file structure does not match the template.');
            }

            // Process and insert the data into the database
            $csv = Reader::createFromPath($uploadedFile->getPathname(), 'r');
            $csv->setHeaderOffset(0); // Assuming the first row contains headers

            foreach ($csv as $row) {
                addSku::create([
                    'skuid' => $row['skuid'],
                    'sku_code' => $row['sku_code'],
                    'sku_name' => $row['sku_name'],
                    'mrp' => $row['mrp'],
                    'distributor_price' => $row['distributor_price'],
                    'weight_volume' => $row['weight_volume'],
                    // Add other columns as needed
                ]);
            }

        }

        return redirect('/addsku');
    }


    public function addSku()
    {
        return view('addsku');
    }
    
    public function save(Request $request){
        $result = addSku::create($request->all());
        return ($result);
    }

    public function viewSku()
    {
        $allSkus = addSku::all();
        return view('viewSku',['allSkus' => $allSkus]);
    }

    public function editSku($skuid)
    {
        $addSku = addSku::find($skuid);
        return view('editSku',['addSku' => $addSku]);
    }

    public function updateSku(Request $request, $skuid)
    {
        $addSku = addSku::find($skuid);
        $addSku->sku_code = $request->input("sku_code");
        $addSku->sku_name= $request->input("sku_name");
        $addSku->mrp = $request->input("mrp");
        $addSku->distributor_price = $request->input("distributor_price");
        $addSku->weight_volume = $request->input("weight_volume");
        $addSku->update();
        return Redirect('/viewSku');
    }


}
