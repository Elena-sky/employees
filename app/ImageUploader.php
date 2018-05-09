<?php

namespace App;


use Illuminate\Http\Request;

trait ImageUploader
{
    public static function uploader(Request $request)
    {
        if ($request->isMethod('PUT') || $request->isMethod('post')) {

            $file = $request->file('photo');
            $result = [];
            $name = 'photo' . rand(123, 655555) . '.' . $file->getClientOriginalExtension();
            if ($file->move(public_path() . '/img/team' , $name)) {
                return $name;
            }

            return $result;

        }

        return false;

    }

}