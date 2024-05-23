<?php

namespace App\Http\Controllers;
use App\Models\Plant;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
class PlantController extends Controller
{
      public function view()
    {
        $plants = Plant::orderBy('id')->get();
        return view('plant.index', ['plants' => $plants]);
    }

    public function generateCSV() {
        $plant = Plant::orderBy('id')->get();

        $filename = '../storage/plants.csv';

        $file = fopen($filename, 'w+');

        foreach($plant as $o) {
            fputcsv($file, [
                $o->name,
                $o->price,
                $o->imageUrl
            ]);
        }
        fclose($file);

        return response()->download($filename);
    }

    public function pdf() {
        $plant = Plant::orderBy('id')->get();

        $pdf = Pdf::loadView('plant.pdf', compact('plant'));

        return $pdf->download('plant.pdf');
    }

    public function importCSV(Request $request)
    {
        try {
            // Validate the uploaded file
            $request->validate([
                'csv_file' => 'required|mimes:csv,txt|max:2048'
            ]);
    
            // Get the uploaded file
            $file = $request->file('csv_file');
            $csvData = file_get_contents($file);
    
            // Parse the CSV data
            $rows = array_map('str_getcsv', explode("\n", $csvData));
            $header = array_shift($rows); // Remove header row if it exists
    
            // Initialize an array to hold the parsed data
            $parsedData = [];
    
            // Process each row of the CSV
            foreach ($rows as $row) {
                // Skip empty rows
                if (count($row) < 3) {
                    continue;
                }
    
                // Validate row data
                $validator = Validator::make([
                    'name' => $row[0] ?? null,
                    'price' => $row[1] ?? null,
                    'imageUrl' => $row[2] ?? null
                ], [
                    'name' => 'required',
                    'price' => 'required',
                    'imageUrl' => 'required'
                ]);
    
                // Skip invalid rows
                if ($validator->fails()) {
                    continue;
                }
    
                // Add valid data to the parsedData array
                $parsedData[] = [
                    'name' => $row[0],
                    'price' => $row[1],
                    'imageUrl' => $row[2]
                ];
            }
    
            // Insert the parsed data into the database
            foreach ($parsedData as $plantData) {
                Plant::create($plantData);
            }
    
            // Fetch all plants from the database (including newly added ones)
            $allPlants = Plant::all();
    
            // Display the merged data
            return view('plant.index', ['plants' => $allPlants, 'info' => 'CSV data imported and displayed successfully.']);
        } catch (\Exception $e) {
            // Log and display any exceptions
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    
    
    
}
