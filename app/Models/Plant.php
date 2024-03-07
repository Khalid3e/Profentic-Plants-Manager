<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Plant extends Model{
    use HasFactory;

   /*  public function insert($data){
        DB::table('plants')->insert($data);
        return response()->json(['success' => 'success'], 200);
    }

    public function allPlants(){
        return DB::table('plants')->get();
    }
    public function all(){
        return DB::table('plants')->get();
    }
    public function delete($id){
        return  DB::table('plants')->where('id', $id)->delete();
    }

    public function getByID($id){
        return  DB::table('plants')->where('id', $id)->get();
    } */

}
