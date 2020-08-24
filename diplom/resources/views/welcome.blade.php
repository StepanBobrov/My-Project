@extends('inc.meta')

@section('title', 'TecHStuff')

@section('content')




    <main role="main">

        <section class="jumbotron text-center">
            <div class="container">
                <h1>Случайные товары</h1>
            </div>
        </section>

        <div class="album py-5 ">
            <div class="container">

                <div class="row">
                    @foreach($data as $el)
                    <div class="col-md-5">
                        <div class="card mb-4 shadow-sm">
                            @if ( ($el->discount) > 0 )
                            <h3 class="text-danger">-{{ $el->discount }}%</h3>
                            @else
                                <br/>
                            @endif
                            <div class="mx-auto mb-3">
                                <img src="https://img.icons8.com/fluent/36/000000/star.png"/>
                                @if ($el->rating > 0 && $el->votes > 0)
                                    <b>
                                        @php
                                            $z = 1.64485;
                                            $vMin = 1;
                                            $vWidth = floatval(5 - $vMin);
                                            $phat = ( $el->rating - $el->votes * $vMin ) / $vWidth / floatval($el->votes);
                                            $rating = ($phat + $z * $z / (2 * $el->votes) - $z * sqrt(($phat * (1 - $phat) + $z * $z / (4 * $el->votes)) / $el->votes)) / (1 + $z * $z / $el->votes);

                                            $result = round($rating * $vWidth + $vMin, 2);
                                            echo $result;

                                        @endphp / 5 </b>
                                        @else<b> 0 / 5 </b>
                                        @endif
                            </div>

                            <div style="width: 300px; height: 300px" class="mx-auto"><img style="width: 90%; height: 90%" src="{{ Storage::url($el->file) }}"></div>
                            <div class="card-body">
                                <p class="card-text overflow-hidden h-25">{{ $el->name }}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-secondary mr-1"><a href="{{ route('game', $el->id) }}">Подробнее</a></button>
                                        @if ( (Auth::check() == true) && (Auth::user()->admin == 1) )
                                            <a href="{{ route('stuff_AEdit', $el->id) }}"><button type="button" class="btn btn-sm btn-outline-secondary">Редактировать</button></a>
                                        @else
                                            <div></div>
                                        @endif
                                        <form method="POST" action="{{ route('inBasket', $el->id) }}">
                                            @csrf
                                          <button type="submit" class="ml-3" role="button"><img src="https://img.icons8.com/dusk/32/000000/shopping-basket-2.png"></button>
                                        </form>
                                    </div>

                                    <small class="text-muted">
                                        @if ( ($el->discount) > 0 )
                                            <del>{{ $el->price }}&#8381;</del>
                                            <h3>{{ $el->price-($el->price / 100 * $el->discount) }}&#8381;</h3>

                                        @else
                                            <h3>{{ $el->price }}&#8381;</h3>
                                        @endif
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

            </div>
        </div>

    </main>



    @include('inc.footer')
@endsection

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js">
</script>
