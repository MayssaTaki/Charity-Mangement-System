<?php
namespace App\Http\Exports;
use App\Models\poor_Family;
use App\Models\area;
use App\Models\campaign;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class poor_familyViewExport implements FromView{
    public function view(): view
    {   
        $poor_family=poor_family::with(['campaign','area'])->get();

        return view('poor_family.export',['poor_family'=>$poor_family]);
    }

}