<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;


class ClientView extends Model
{
    use HasFactory;

    public function route_controller(){
        $ekraan = new Ekraan;
        return $ekraan->all();
    }
    
    public function vaade_controller($url){
        //check where we are
        $url_arr = explode("/", $url);
        $url_clean = end($url_arr);

        $vaade_query = DB::table('ekraan')
            ->leftJoin('vaade', 'ekraan.active_vaade_id', '=', 'vaade.id')
            ->select('vaade.id as vaade_id', 'vaade.Name as vaade_name', 'ekraan.language', 'vaade.url as vaade_url', 'active_vaade_id', 'kuupaev')
            ->where('ekraan.url', '=', $url_clean)
            ->get();

        $aktiivne = "";
        $language = "";

        foreach($vaade_query as $vaade_row){
            $kuupaev = $vaade_row->kuupaev;
            $language = $vaade_row->language;
                if($vaade_row->vaade_id == $vaade_row->active_vaade_id){
                    //kõhime välja keele ja lingid teistele vaadetele
                    
                    $aktiivne = $vaade_row->vaade_url;
                }
        }

        // kõhime välja aktiivse vaate
        
        echo view("vaated/pais");
        echo "<div>Vaate keel hetkel:".$language ."</div>";
        if(empty($kuupaev)){
            $kuupaev = "kuupäev puudub";
        }
        echo View::make("vaated/".$aktiivne, ['Kuupaev' => $kuupaev]);
    }
    
    public function change_language($language, $p_url){

        $prev_url = explode("/", $p_url);
        $url_clean = end($prev_url);
        DB::table('ekraan')
        ->where('url', $url_clean)
        ->update(['language' => $language]);
        
    }
}
