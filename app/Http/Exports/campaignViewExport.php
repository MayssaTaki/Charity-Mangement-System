<?php
namespace App\Http\Exports;
use App\Models\campaign;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class campaignViewExport implements FromView{
    public function view(): view
    {
        $campaign=campaign::all();
        return view('campaign.export',['campaign'=>$campaign]);
    }

}