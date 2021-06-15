<?php

namespace App\Exports;

use App\Models\Rapat;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class ExcelRapat implements FromView
{


    protected $id;

    function __construct($id)
    {
        $this->id = $id;
    }

    public function view(): View
    {
        $data = [];

        $data = Rapat::find($this->id);
        return view('rapat.excel', compact(
            'data'
        ));
    }
}
