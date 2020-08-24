<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Stuff;
use App\Models\Reviews;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RatingController extends Controller
{

    public function positive($id, $product_id) {
        $review = Reviews::find($id);

        $review->rating += 1;

        $review->save();

        return redirect()->route('game', $product_id);
    }

    public function negative($id, $product_id) {
        $review = Reviews::find($id);

        $review->rating -= 1;

        $review->save();

        return redirect()->route('game', $product_id);
    }
}
