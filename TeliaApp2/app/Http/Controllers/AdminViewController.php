<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminView;
use App\Http\Controllers\Controller;
use DB;

class AdminViewController extends Controller
{



    public function index(){

        $show = new AdminView();
        return view('admin')->with('ekraan', 
            ['ekraan_data'=> $show->get_saved_data(),
        ]);

    }    
        /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     
    public function store(Request $request)
    {
        
        $save = new AdminView();
        if($request->Ekraan_submit == "Save"){
            //save data
            $save->save_data($request->nimi,$request->keel, $request->url, $request->vaade);

        }elseif($request->Ekraan_submit == "Update"){
            //et samas aknast updatida saaks
            $save->update_data($request);
        }

        return redirect('/admin');
        
    }

}
