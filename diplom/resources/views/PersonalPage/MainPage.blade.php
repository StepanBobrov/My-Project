{{-- MODAL--}}
<div class="modal fade" id="personalPage" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Информация о пользователе - {{ Auth::user()->name }}</h5>

            </div>
            <div class="modal-body">
                <div>Дата регистрации: {{ DB::table('users')->where('id', Auth::id())->value('created_at') }}</div>
                <div>Электронная почта: {{ DB::table('users')->where('id', Auth::id())->value('email') }}</div>

                <h3 class=" mt-lg-5 mb-3">Отзывы от этого пользователя ({{ DB::table('reviews')->where('userID', Auth::id())->count() }})</h3>
                @foreach( DB::table('reviews')->where('userID', Auth::id())->get() as $review)
                    <ul>
                        <li>
                            <div><a href="{{ route('game', $review->productID) }}">{{ DB::table('stuffs')->where('id', $review->productID)->value('name') }}</a></div>
                            <div>{{ $review->review_text }}</div>
                            <div>Рейтинг отзыва: <b>{{ $review->rating }}</b></div>
                            <hr>
                        </li>
                    </ul>
                    @endforeach
                <div><b>Общий рейтинг: {{ DB::table('reviews')->where('userID', Auth::id())->sum('rating')  }}</b></div>
                <div>Уровень доверия:
                    @if(DB::table('reviews')->where('userID', Auth::id())->sum('rating') < 10)
                        <h1 style="color:red">Низкий</h1></div>
                    @elseif(10 < DB::table('reviews')->where('userID', Auth::id())->sum('rating') && DB::table('reviews')->where('userID', Auth::id())->sum('rating') < 20)
                        <h1 style="color:grey">Средний</h1></div>
                    @else
                        <h1 style="color:green">Высокий</h1></div>
                    @endif

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><img src="https://img.icons8.com/metro/26/000000/exit.png"/></button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="personalPage-edit" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Редактирование профиля - {{ Auth::user()->name }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Изменить</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal" data-toggle="modal" data-target="#personalPage">Вернуться</button>
            </div>
        </div>
    </div>
</div>


{{-- MODAL--}}
