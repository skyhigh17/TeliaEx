<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClientView;
use PhpParser\Node\Expr\New_;

class ClientViewController extends Controller
{
    
    public function index(Request $request){
        $ekraan = new ClientView();
        $ekraan->vaade_controller(url()->current());
    }



    public function show_ekraan_route(){
        $ekraan = new ClientView();
        return $ekraan->route_controller();
    }

    public function change_language(){
        $get_language = new ClientView();
        
        $language = $_GET['language'];
        $get_language->change_language($language, url()->previous());

        return redirect()->back();
    }


    
}
