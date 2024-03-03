<?php // Code within app\Helpers\Helper.php

namespace App\Helpers;

use App\Models\User;
use App\Models\Project;
use Illuminate\Support\Carbon;

class Helper
{
    public static function getUserName(string $name)
    {
        $getUsername = User::where('_id', '=', $name)->pluck('name');
        return $getUsername;
    }

    public static function getProjectName(string $string)
    {
        $getPname = Project::where('_id', '=', $string)->pluck('title');
        foreach($getPname as $title){
            return $title;
        }
    }

    public static function getTagByValue($tags){
        $getTags = explode(",",$tags);
        return $getTags;
    }

    public static function changeDateFormat($newdate){
        $getDate = Carbon::createFromFormat('Y-m-d H:i:s', $newdate)->format('M d Y');
        return $getDate;
    }

    public static function changeDueDateFormat($newdate){
        $getDates = Carbon::createFromFormat('Y-m-d', $newdate)->format('M d Y');
        return $getDates;
    }



}