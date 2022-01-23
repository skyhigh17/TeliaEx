<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Artisan;
class AdminView extends Model
{
    use HasFactory;
    public function save_data($name, $language, $url, $vaade_arr){
        
        $ekraan = New Ekraan;
        $ekraan->Name = $name;
        $ekraan->Language = $language;
        $ekraan->Url = $url;
        $ekraan->active_vaade_id = 1;
        $ekraan->save();
        
        foreach($vaade_arr as $row){

            DB::table('Vaade_to_ekraan')->insert([
                'ekraan_id' => $ekraan->id,
                'vaade_id' => $row
            ]);

        } 
        Artisan::call('route:clear');
 
    }

    public function update_data($data){

        $count = count($data->ekraan_id);

        if(!empty($data->ekraan_id) && !empty($data->ekraan_language_selector) && !empty($data->aktiivne_selector)){
            for ($i = 0; $i < $count; $i++){

                DB::table('ekraan')
                ->where('id', $data->ekraan_id[$i])
                ->update([
                    'Language' => $data->ekraan_language_selector[$i],
                    'active_vaade_id' => $data->aktiivne_selector[$i],
                ]);
       
                DB::table('vaade')
                ->where('id', $data->aktiivne_selector[$i])
                ->update([
                    'kuupaev' => $data->kuupaev[$i],
                ]);
                

            }
        }
        
    }
    
    public function get_saved_data(){

        $query = DB::table('vaade_to_ekraan')
                ->leftJoin('vaade', 'vaade_to_ekraan.vaade_id', '=', 'vaade.id')
                ->select('*')->get();  
                
        $ekraan = New Ekraan();

        $ekraan_arr = [];

        foreach($ekraan->all() as $key => $row){
            $ekraan_arr[$key]['name'] = $row->Name;
            $ekraan_arr[$key]['language'] = $row->Language;
            $ekraan_arr[$key]['url'] = $row->url;
            $ekraan_arr[$key]['id'] = $row->id;
            $ekraan_arr[$key]['active_vaade_id'] = $row->active_vaade_id;
            foreach($query as $row_vaade){
                if($row->id == $row_vaade->ekraan_id){
                    $ekraan_arr[$key]['vaade'][] = $row_vaade;
                }        
            }
        }

        return $ekraan_arr;
    }


}
