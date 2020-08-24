<?php

namespace App\Http\Controllers;

use App\Models\Baskets;
use App\Models\Stuff;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\BasketRequest;
use App\Http\Requests\StuffRequest;
use Illuminate\Support\Facades\DB;

class BasketController extends Controller
{

    public function add(BasketRequest $request, $id) {

        if(Auth::check() == true) {
            $basket = new Baskets;
            $stuff = Stuff::find($id);
            $user_id = Auth::user()->id;

            $inBasket = DB::table('baskets')->insert([
                ['userID' => $user_id,
                    'productID' => $id,
                    'name' => $stuff->name,
                    'price' => $stuff->price,
                    'number' => $stuff->number,
                    'cost' => ($stuff->price - ($stuff->price / 100 * $stuff->discount)) * $stuff->number]
            ]);

            return redirect()->route('welcome')->with('success', 'Товар успешно добавлен в корзину!');
        } else {
            return redirect()->route('welcome')->with('error', 'Ошибка добавления. Необходима авторизация!');
        }
    }

    public function storage() {

        if(Auth::check() == true) {

            if (count(DB::table('baskets')->where('userID', Auth::id())->get()) > 0) {
                $basket = new Baskets;
                $stuff = new Stuff;

                $productID = $stuff->id;
                $userID = Auth::user()->id;

                return view('Basket.inBasket', ['baskets' => $basket->all(), 'stuffs' => $stuff->find($productID)]);
            } else {
                return redirect()->route('welcome')->with('error', 'Корзина пуста!');
            }
        } else {
            return redirect()->route('welcome')->with('error', 'Для доступа к корзине необходима авторизация!');
        }
    }

    public function basketDel($id) {

        $basket = new Baskets;
        return redirect()->route('basket', [ '$basket' => $basket->find($id)->delete() ])->with('error', 'Товар удален с корзины');
    }

    public function basketUpdate(BasketRequest $request, $id) {

        $basket = Baskets::find($id);


        $basket->number = $request->input('number');
        $basket->cost = $basket->number * ($basket->price - ($basket->price / 100 * DB::table('stuffs')->where('id', $id)->value('discount')));
        $basket->save();

        return redirect()->route('basket')->with('success', 'Корзина обновлена!');

}

}
