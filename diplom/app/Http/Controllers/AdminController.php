<?php

namespace App\Http\Controllers;

use App\Http\Requests\StuffRequest;
use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Stuff;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class AdminController extends Controller
{
    public function main() {
        $check = Auth::check();

        if ($check == true) {
            $id = Auth::user()->id;

            $admin = DB::table('users')->where('id', $id)->value('admin');
            if ( $admin == '1') {
                return view('AdminPanel.main');
            } else {
                return redirect()->route('welcome')->with('error', 'У вас нет прав для доступа к панели администратора!');
            }
        } else {
            return redirect()->route('welcome')->with('error', 'Необходима авторизация!');
        }
    }

    ///////////////USERS
    public function users() {

        $users = new Users;
        return view('AdminPanel.users', [ 'users' => $users->all() ]);
    }
    public function usersDel($id) {

        $users = new Users;
        return redirect()->route('users_A', [ 'users' => $users->find($id)->delete() ]);
    }
    ////////////////

    ////////////STUFF
    public function stuffs() {

        $stuffs = new Stuff;
        return view('AdminPanel.stuff', [ 'stuffs' => $stuffs->all() ]);
    }

    public function newStuff() {
        return view('AdminPanel.newStuff');
    }

    public function editStuff($id) {
        $stuffs = new Stuff;
        return view('AdminPanel.editStuff', ['stuffs' => $stuffs->find($id) ]);
    }

    public function updateStuffSubmit(StuffRequest $req, $id) {
        $stuff = Stuff::find($id);

        $stuff -> name = $req->input('name');
        $stuff -> category = $req->input('category');
        $stuff -> about = $req->input('about');
        $stuff -> number = $req->input('number');
        $stuff -> price = $req->input('price');
        $stuff -> discount = $req->input('discount');
        $stuff -> file = $req -> file('image')->store('images', 'public');

        $stuff->save();

        return redirect()->route('stuffs_A')->with('success', 'Добавлено');
    }

    public function stuffsDel($id) {
        Storage::delete();
        $stuffs = new Stuff;
        return redirect()->route('stuffs_A', [ 'stuffs' => $stuffs->find($id)->delete() ]);
    }

    ////////////////


    //////////////////////////////
    public function accessError() {
        return view('AdminPanel.NoRightsPage');
    }
    public function AuthRequired() {
        return view('AdminPanel.AuthRequired');
    }

    public function isAdmin() {
        $user = new Users;
        return view('welcome', ['user' => $user->all() ]);
    }
    //////////////////////////////////
}
