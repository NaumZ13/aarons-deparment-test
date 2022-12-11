<?php

namespace App\Http\Controllers;

use App\Imports\DatabaseImport;
use Exception;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class CsvFileUploadController extends Controller
{
    public function index()
    {
        return view('csv-upload.index');
    }

    public function upload(Request $request)
    {
        $this->validate($request, [
            'file-upload' => ['file', 'required', 'mimes:csv,txt'],
        ]);

        try {
            Excel::import(new DatabaseImport(), request()->file('file-upload'));
        } catch (Exception $exception) {
            throw new Exception($exception->getMessage());
        }

        return back()->with(['success' => 'Database was successfully seeded.']);

    }
}
