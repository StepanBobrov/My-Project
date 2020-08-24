@extends('inc.meta')

@section('title', 'Новый отзыв')

@section('content')



            @if($errors->any())
                <div class="alert alert-dark">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif



            <div class="container mt-5">
                <h1>Новый отзыв</h1>
                <form method="post" action="{{ route('send-review', $stuffs->id) }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="time">Период использования</label>
                        <input class="form-control" type="text" name="time" id="time" placeholder="Введите название товара" required width="100">
                    </div>

                    <div class="form-group">
                        <label for="review_text">Текст отзыва</label>
                        <textarea class="form-control" id="review_text" name="review_text" rows="10" required>Опишите ощущения от использования товара</textarea>
                    </div>

                    <div class="form-group">
                        <div>Ваша оценка</div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input value="1" type="radio" id="rate_star1" name="rate_star" class="custom-control-input">
                        <label class="custom-control-label" for="rate_star1">1</label>
                        <img src="https://img.icons8.com/fluent/24/000000/star.png"/>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input value="2" type="radio" id="rate_star2" name="rate_star" class="custom-control-input">
                        <label class="custom-control-label" for="rate_star2">2</label>
                        <img src="https://img.icons8.com/fluent/24/000000/star.png"/>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input value="3" type="radio" id="rate_star3" name="rate_star" class="custom-control-input">
                        <label class="custom-control-label" for="rate_star3">3</label>
                        <img src="https://img.icons8.com/fluent/24/000000/star.png"/>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input value="4" type="radio" id="rate_star4" name="rate_star" class="custom-control-input">
                        <label class="custom-control-label" for="rate_star4">4</label>
                        <img src="https://img.icons8.com/fluent/24/000000/star.png"/>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input value="5" type="radio" id="rate_star5" name="rate_star" class="custom-control-input">
                        <label class="custom-control-label" for="rate_star5">5</label>
                        <img src="https://img.icons8.com/fluent/24/000000/star.png"/>
                    </div>
                    </div>

                    <br><br>
                    <button type="submit" class="btn btn-primary">Отправить отзыв</button>
                </form>
            </div>
            </main>
    </body>

@endsection
