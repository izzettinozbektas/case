<?php
namespace App\Helpers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ElequentFilterHelper
{

    public static function multipleFilter($model,$request,$relation='')
    {
        if($request->fullName){
            $array =  explode(" ",$request->fullName);
            if(strlen($relation) >0){
                $model = $model->whereHas(str_replace(".","",$relation), function ($q) use($array){
                    if(count($array) == 1){
                        $q->where('name','LIKE',"%$array[0]%");
                    }else{
                        $q->where('name','LIKE',"%$array[0]%")->orWhere('surname','LIKE',"%$array[1]%");
                    }
                });
            }else{
                $model = $model::getFullName($request->fullName);
            }

        }
        return $model;
    }
}
