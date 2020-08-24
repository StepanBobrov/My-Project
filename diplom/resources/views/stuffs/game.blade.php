@extends('inc.meta')

@section('title'){{$data->name}}@endsection

@section('content')


            <div class="container mt-lg-5 mb-lg-5 ">
                <h1>{{$data->name}}</h1>
                <img src="{{ Storage::url($data->file) }}" >
                @if ( ($data->discount) > 0 )
                    <h1 class="text-danger">-{{ $data->discount }}%</h1>
                @endif

                <h3>&#8381; @if ( ($data->discount) > 0 )
                        <del>{{ $data->price }}</del>
                        {{ $data->price-($data->price / 100 * $data->discount) }} <a href="{{ route('new-review', $data->id) }}"><button type="button" class="btn btn-info">Оставить отзыв </button></a>
                                <a href="#reviews"><span class="badge badge-light">{{ DB::table('reviews')->where('productID', $data->id)->count() }}</span></a>

                    @else
                        {{ $data->price }} <a href="{{ route('new-review', $data->id) }}"><button type="button" class="btn btn-info">Оставить отзыв </button></a>
                            <a href="#reviews"><span class="badge badge-light">{{ DB::table('reviews')->where('productID', $data->id)->count() }}</span></a>

                    @endif
                </h3>



                <img src="https://img.icons8.com/fluent/36/000000/star.png"/>
                @if ($data->rating > 0 && $data->votes > 0)
                <b>

                @php
                    $z = 1.64485;
                   $vMin = 1;
                   $vWidth = floatval(5 - $vMin);
                   $phat = ( $data->rating  - $data->votes * $vMin ) / $vWidth / floatval($data->votes);
                   $rating = ($phat + $z * $z / (2 * $data->votes) - $z
                   * sqrt(($phat * (1 - $phat) + $z * $z / (4 * $data->votes)) / $data->votes)) / (1 + $z * $z / $data->votes);

                   $result = round($rating * $vWidth + $vMin, 2);
                   echo $result;

                @endphp

                    / 5
                    @else 0 / 5
                @endif</b>


                <form class="mt-5" method="POST" action="{{ route('inBasket', $data->id) }}">
                    @csrf
                    <button type="submit" class="ml-3" role="button"><img src="https://img.icons8.com/dusk/32/000000/shopping-basket-2.png"></button>
                </form>
                <hr>


                <h3 class="mb-4">Описание</h3>
                <p style="width: 75%; line-height: 27px; white-space: pre-wrap">{{ $data->about }}</p>
                <hr>
                <h3 class="mt-5">Характеристики</h3>
                <p style="text-indent: 25px">
                    <ul>
                    <li>Диагональ - 24"</li>
                </ul>
                </p>
            </div>

            <a name="reviews"></a>
    <div class="mx-auto">


        <div class="comments">
            <h3 class="title-comments ml-3">Отзывы по товару ({{ DB::table('reviews')->where('productID', $data->id)->count() }})</h3>
            @if ( DB::table('reviews')->where('productID', $data->id)->count() == 0)
            <div class="ml-5 mb-lg-5">Отзывов еще нет.</div>
        @else
        @foreach($reviews as $review)

                    @if( $data->id == $review->productID)
            <ul class="media-list mb-lg-5">

                <li class="media">
                    <div class="media-left">
                            <img class="media-object img-rounded mr-2" src="https://img.icons8.com/pastel-glyph/48/000000/communication--v1.png" alt="">
                    </div>
                    <div class="media-body">
                        <div class="media-heading">
                            <div class="author"><a href="/" data-toggle="modal" data-target="#personalPage">{{ DB::table('users')->where('id', $review->userID)->value('name') }}</a> <span class="date">{{ $review->updated_at }}</span>
                                <div class="footer-comment">
                                            <span class="rating">{{ $review->rating }}</span>
                                            <a href=" {{ route('positive', [$review->id, $review->productID] ) }}" id="positive" title="Положительно">+</a>
                                            <span>|</span>
                                            <a href=" {{ route('negative', [$review->id, $review->productID] ) }}" id="negative" title="Отрицательно">-</a>
                                </div>
                            </div>

                            @include('PersonalPage.MainPage')
                            <hr>
                            <div class="metadata">
                                <span class="date">Время использования: {{ $review->time }}</span>
                            </div>
                        </div>
                        <br class="media-text text-justify"><p style="width: 75%; line-height: 27px; text-indent: 25px; white-space: pre-wrap">{{ $review->review_text }}</p></div>

                    </div>
            </ul>
                @endif
            @endforeach
            @endif
        </div>
    </div>



@endsection
