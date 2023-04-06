<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\usermodel;
use DB;
class usercontroller extends Controller
{
    public function create()
    {
        return View("create");
    }
    public function store(Request $req)
    {
        $user = new usermodel();
        $user->name = $req->name;
        $user->email = $req->email;
        $user->password = $req->password;
        $user->save();
    }
    public function fetch()
    {
        $users = usermodel::all();
        return View("fetch",compact("users"));
    }

    public function getdata(Request $req)
    {   
        $id = $req->post("id");
        $record = DB::table("usermodels")->where("id",$id)->get();
        foreach($record as $r)
        {
            $user = $r;
            echo json_encode($user);
        }
    }

    public function update(Request $req)
    {
        $id = usermodel::find($req->recordid);
        $id->name = $req->recordname;
        $id->email = $req->recordemail;
        $id->password = $req->recordpassword;
        $id->update();
        return redirect("/fetch");
    }
}
