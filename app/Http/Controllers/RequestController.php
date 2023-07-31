<?php

namespace App\Http\Controllers;

use App\Request;

class RequestController extends Controller
{
    public function index()
    {
        $requests = Request::all();
        return view('requests.index', compact('requests'));
    }

    public function downloadCSV()
    {
        $requests = Request::all();
        $filename = 'export.csv';
        header('Content-Type: application/csv');
        header('Content-Disposition: attachment; filename="'.$filename.'";');

        // open the "output" stream
        // see http://www.php.net/manual/en/wrappers.php.php#refsect2-wrappers.php-unknown-unknown-unknown-descriptioq
        $f = fopen('php://output', 'w');
        fprintf($f, chr(0xEF).chr(0xBB).chr(0xBF));
        fputcsv($f, [
            '번호', '도,시', '학교', '학년', '반', '이름', '연락처'
        ]);
        foreach ($requests as $index => $request) {
            fputcsv($f, [
                $index+1,
                $request->street->name,
                $request->school,
                $request->year,
                $request->class,
                $request->name,
                $request->address
            ]);
        }

        exit();
    }
}
