<?php

namespace App\Http\Controllers;


use App\Playlist;
use App\PlaylistContent;
use Illuminate\Http\Request;
use App\Chanson;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

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
        return redirect("/musics/".Auth::id());
    }

    public function suivre($id){
        Auth::user()->jeLesSuit()->toggle($id);
        return back();
    }



    public function mesmusiques($id){
        $u = User::findOrFail($id);

        return view("firstcontroller.mesmusiques", ['utilisateur' => $u]);
    }

    public function mesplaylists($id){
        $u = User::findOrFail($id);

        return view("firstcontroller.mesplaylists", ['utilisateur' => $u]);
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

    public function search($s){
        $user = User::whereRaw("username like concat('%',?,'%')",[$s])->get();
        $music = Chanson::whereRaw("nom like concat('%',?,'%')",[$s])->get();
        return view("firstcontroller.search", ['music' => $music ,'user' => $user]);

    }

    public function updatePeople(Request $request, $id){
        $user = User::where('id', $id)->first();

        $request->validate([
            'username' => [
                'required',
                Rule::unique('users')->ignore(Auth::id()),
                'max:255',
                'min:3'
        ],

            'forename' => 'required|min:3|max:255',
            'lastname' => 'required|min:3|max:255',
            'pdp' => 'file',
            'pdc' => 'file',
        ]);




        $username = $request->input('username');
        $forename = $request->input('forename');
        $lastname = $request->input('lastname');
        if ($request->file('pdp')){
            $pdp = $request -> file('pdp')->hashName();
            $pdplien = "/uploads/".Auth::id()."/".$pdp;
            $request->file('pdp')->move("uploads/".Auth::id(), $pdp);
        }
        else{
            $pdplien = $user['avatar'];
        }
        if ($request->file('pdc')){
            $pdc = $request -> file('pdc')->hashName();
            $pdclien = "/uploads/".Auth::id()."/".$pdc;
            $request->file('pdc')->move("uploads/".Auth::id(), $pdc);
        }else{
            $pdclien = $user['banner'];
        }




        User::where('id',$id)->update(array(
            'username'=>$username,
            'forename'=>$forename,
            'lastname'=>$lastname,
            'avatar'=>  $pdplien,
            'banner'=>  $pdclien
        ));

        return redirect("/utilisateur/".Auth::id());
    }

    public function nouvelleplaylist($id_music)
    {
        return view("firstcontroller.nouvelleplaylist", ['id' => $id_music]);
    }

    public function creerplaylist(Request $request, $id_music)
    {


        $request->validate([
            'name' => 'required|min:3|max:255',
            'cover' => 'required|file',
        ]);


        $namecover = $request -> file('cover')->hashName();
        $request->file('cover')->move("uploads/".Auth::id(), $namecover);




        $p = new Playlist();
        $p->user_id = Auth::id();
        $p->name = $request->input('name');
        $p->url_photo = "/uploads/".Auth::id()."/".$namecover;
        $p-> save();

        $p->chansons()->attach($id_music);
        return redirect("/playlists/".Auth::id());
    }

    public function addplaylist($id, $idmusic){
        $c = new PlaylistContent();
        $c->id_music = $idmusic;
        $c->id_playlists = $id;
        $c-> save();
        return back();
    }

    public function laplaylist($id, $idplaylist){
        $p = Playlist::findOrFail($idplaylist);

       return view("firstcontroller.playlistaffichage", ['playlist' => $p]);
    }

}
