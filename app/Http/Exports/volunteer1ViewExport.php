<?php
namespace App\Http\Exports;
use App\Models\volunteer1;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class volunteer1ViewExport implements FromView{
    public function view(): view
    {
        $volunteer1=volunteer1::all();
        return view('volunteer1.export',['volunteer1'=>$volunteer1]);
    }

}