<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Chanson;
use App\User;
use Illuminate\Support\Facades\Auth;

class FirstController extends Controller
{
    public function index () {
     $chansons = Chanson::all();

        return view("firstcontroller.index", ["chansons" => $chansons]);
    }

    public function about() {
        return view("firstcontroller.about");
    }

    public function article($id) {
        return view("firstcontroller.article", ['id' => $id, "nom" => 'Gilles']);
    }

    public function utilisateur($id){
        $u = User::findOrFail($id);
        return view("firstcontroller.utilisateur", ['utilisateur' => $u]);
    }

    public function nouvellechanson()
    {
        return view("firstcontroller.nouvelle");
    }

    public function creerchanson(Request $request)
    {


        $request->validate([
            'nom' => 'required|min:3|max:255',
            'chanson' => 'required|file',
            'style' => 'required|min:2',
            'cover' => 'required|file',
        ]);

        $name = $request -> file('chanson')->hashName();
        $namecover = $request -> file('cover')->hashName();
        $request->file('cover')->move("uploads/".Auth::id(), $namecover);
        $request->file('chanson')->move("uploads/".Auth::id(), $name);



        $c = new Chanson();
        $c->nom = $request->input('nom');
        $c->url = "/uploads/".Auth::id()."/".$name;
        $c->coverurl = "/uploads/".Auth::id()."/".$namecover;
        $c->style = $request->input('style');
        $c->user_id = Auth::id();
        $c-> save();
        return redirect("/utilisateur/".Auth::id());
    }

    public function suivre($id){
        Auth::user()->jeLesSuit()->toggle($id);
        return back();
    }

    public function mesmusiques($id){
        $u = User::findOrFail($id);

        return view("firstcontroller.mesmusiques", ['utilisateur' => $u]);
    }

    public function mentionslegales(){
        return view("firstcontroller.mentionslegales");
}

    public function like($id){
        Auth::user()->jeLike()->toggle($id);
        return back();
    }

    public function changementprofil($id){
        $u = User::findOrFail($id);

        return view("firstcontroller.changementprofil", ['utilisateur' => $u]);
    }



}
