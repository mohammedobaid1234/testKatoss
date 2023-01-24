<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\SendMailJob;
use App\Models\News;
use App\Models\Service;
use Illuminate\Http\Request;

class DashboardController extends Controller{
    public function __construct(){
        $this->middleware(['auth']);
    }

    public function manage(){

        $data['activePage'] = ['dashboard' => 'dashboard'];
        $data['breadcrumb'] = [
            ['title' => 'Home'],
            ['title' => 'Home| Welcome To Dashboard To Manage CMC Created By Mohammed Obaid mhmd.obaid.18@gmail.com | 0594034429'],
        ];
        return view('dashboard' , [
            'data' => $data,
            'numberOFNews' => News::count(),
            'numberOFServices' => Service::count(),
        ]);
    }
    public function sendEmails(Request $request){
        SendMailJob::dispatch()->onQueue('mail');
        return redirect()->back()->with('Done!');
    }


}
