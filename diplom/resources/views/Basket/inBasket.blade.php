@extends('inc.meta')

@section('title', 'Моя корзина')

@section('content')


    <table class="table ">
        <thead>
        <tr>
            <th></th>
            <th>Название</th>
            <th>Кол-во</th>
            <th>Цена</th>
            <th>Cтоимость</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        @foreach($baskets as $basket)
        @if($basket->userID == Auth::user()->id)
        <tbody>
        <tr>
            <td style="width: 150px; height: 150px" class="mx-auto">
                <img class="mr-5" style="width: 90%; height: 90%" src="{{ Storage::url(DB::table('stuffs')->where('id', $basket->productID)->value('file') ) }}">
            </td>
            <td>
                <a href="{{ route('game', $basket->productID) }}">
                    {{ $basket->name }}
                </a>
            </td>
            <form method="post" action="{{ route('basket_Update', $basket->id) }}" enctype="multipart/form-data">
                {{ csrf_field() }}
            <td><span class="badge"><input type="number" name="number" value="{{ $basket->number }}" min="1" max="{{ DB::table('stuffs')->where('id', $basket->productID)->value('number') }}"></span>

            </td>
            <td>{{ $basket->price - ($basket->price / 100 * (DB::table('stuffs')->where('id', $basket->productID)->value('discount'))) }} ₽ </td>
            <td>{{ $basket->number * ($basket->price - ($basket->price / 100 * DB::table('stuffs')->where('id', $basket->productID)->value('discount'))) }} ₽</td>
            <td><button type="submit" class="btn btn-success">Подсчитать</button></td>
            </form>
            <td ><a id="delete-button" class="text-danger" href="{{ route('basket_Del', $basket->id) }}">X</a></td>

        </tr>
        @endif
        @endforeach
        <tr>
            <td colspan="4">Общая стоимость:</td>
            @if ( DB::table('baskets')->value('userID') == Auth::user()->id)
            <td>{{ ( DB::table('baskets')->sum('cost') )   }} ₽</td>
                @else
                <td>0 ₽</td>
                @endif
            <td><button type="button" class="btn btn-primary">Оформить заказ</button></td>
        </tr>
        </tbody>


    </table>

@endsection
