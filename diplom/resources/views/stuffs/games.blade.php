@extends('inc.meta')

@section('title', 'Игры')

@section('content')


    <div class="album py-5 bg-light">
        <div class="container">

            <div class="row">
                @foreach($data as $el)
                    <div class="col-md-4">
                        <div class="card mb-4 shadow-sm">
                            @if ( ($el->discount) > 0 )
                                <h1 class="text-danger">-{{ $el->discount }}%</h1>
                            @endif
                            <img height="250" src="{{ Storage::url($el->file) }}">
                             <div class="card-body">
                                <p class="card-text overflow-hidden h-25">{{ $el->name }}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-secondary"><a href="{{ route('game', $el->id) }}">Подробнее</a></button>
                                        @if ( (Auth::check() == true) && (Auth::user()->admin == 1) )
                                        <button type="button" class="btn btn-sm btn-outline-secondary">Редактировать</button>
                                        @else
                                            <div></div>
                                        @endif
                                    </div>
                                    <small class="text-muted">&#8381;@if ( ($el->discount) > 0 )
                                            <del>{{ $el->price }}</del>
                                            {{ $el->price-($el->price / 100 * $el->discount) }}

                                        @else
                                            {{ $el->price }}
                                        @endif</small>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>



@endsection
