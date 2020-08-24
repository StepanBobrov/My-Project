<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Reviews;
use App\Models\Users;
use Illuminate\Http\Request;
use App\Models\Stuff;
use App\Http\Requests\StuffRequest;
use Illuminate\Support\Facades\Storage;

class StuffController extends Controller
{

        public function main() {
            $newStuff = new Stuff;
            return view('welcome', ['data' => $newStuff->all()]);
        }

        public function games() {
            $newStuff = new Stuff;
            return view('stuffs/games', ['data' => $newStuff->all()]);
        }

        public function game($id) {
            $reviews = new Reviews;
            $newStuff = new Stuff;
            $users = new Users;


            return view('stuffs/game', ['data' => $newStuff->find($id), 'reviews' => $reviews->all()]);
        }



        public function submit(StuffRequest $req) {
            $newStuff = new Stuff;

            $newStuff -> name = $req->input('name');
            $newStuff -> category = $req->input('category');
            $newStuff -> about = $req->input('about');
            $newStuff -> number = $req->input('number');
            $newStuff -> price = $req->input('price');
            $newStuff -> file = $req -> file('image')->store('images', 'public');

            $newStuff->save();

            return redirect()->route('stuffs_A')->with('success', 'Добавлено');
        }

}
