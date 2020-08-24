<?php

namespace App\Http\Controllers;

use App\Models\Baskets;
use App\Models\Users;
use Illuminate\Http\Request;
use App\Http\Requests\ReviewRequest;
use App\Http\Requests\StuffRequest;
use App\Models\Reviews;
use App\Models\Stuff;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Http\FormRequest;

class ReviewController extends Controller
{
    public function newReview($id)
    {
        if (Auth::check() == true) {
            $stuffs = new Stuff;

            return view('Review.review-form', ['stuffs' => $stuffs->find($id)]);
        } else {
            return redirect()->route('game')->with('error', 'Требуется авторизация');
        }
    }

    public function sendReview(ReviewRequest $req, StuffRequest $req2, $id)
    {
        $review = new Reviews();
        $stuff = Stuff::find($id);

        $userID = Auth::user()->id;

        $review->userID = $userID;
        $review->productID = $id;
        $review->time = $req->input('time');
        $review->review_text = $req->input('review_text');

        $review->save();

        $stuff->rating += $req2->input('rate_star');
        $stuff->votes = ($stuff->votes) + 1;
        $stuff->save();

        return redirect()->route('game', $id)->with('success', 'Отзыв добавлен!');

    }
}
