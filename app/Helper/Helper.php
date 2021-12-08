<?php

namespace App\Helper;

class Helper
{
    public static function timeSubtaction($actual_time ,$time_to_reduce){
        $actual_time=$actual_time.":00";
        $actual_time_array = explode(":",$actual_time);
        $time_to_reduce = explode(":",$time_to_reduce);
        $final_result = [];
        if($actual_time_array[1] < $time_to_reduce[1]){
            $actual_time_array[0] = $actual_time_array[0]-1;
            $final_result[] = $actual_time_array[1]+60-$time_to_reduce[1];
        }else{
            $final_result[] = $actual_time_array[1]-$time_to_reduce[1];
        }
        $final_result[] = $actual_time_array[0]-$time_to_reduce[0];
        foreach ($final_result as $i=>$item){
            $final_result[$i]=sprintf('%02d', $item);
        }
        return implode(":", array_reverse($final_result));
    }
}
