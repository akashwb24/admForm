<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;

class FormController extends Controller
{
    function getregister(Request $request)
    {
        $tbl = new UserModel();

        $profile = "PROFILE" . time() . "." . $request->photo->extension();
        $sign = "SIGN" . time() . "." . $request->signature->extension();

        $request->photo->move(public_path('photo'), $profile);
        $request->signature->move(public_path('signature'), $sign);
        //left side had names from database table
        //right side has the names of data coming from form
        //here we have directly initialized the data in controller
        $tbl->name = $request->name;
        $tbl->email = $request->email;
        $tbl->password = $request->password;
        $tbl->mobile = $request->mobile;
        $tbl->dob = $request->dob;
        $tbl->address = $request->address;

        $tbl->photo = $profile;
        $tbl->signature = $sign;

        $tbl->save();

        return back()
            ->with("success", "Successfully Registerd.")
            ->with("photo", "$profile")
            ->with("signature", "$sign");
    }
}
