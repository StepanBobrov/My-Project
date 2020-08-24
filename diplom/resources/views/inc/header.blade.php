<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="/">TecHStuFF</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExample07">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('admin') }}">Главная <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown07" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Товары</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown07">
                        <a class="dropdown-item" href="#">Техника</a>
                        <a class="dropdown-item" href="{{ route('games') }}">Игры</a>
                        <a class="dropdown-item" href="#">Аксессуары</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Контакты</a>
                </li>

            </ul>
            <form class="form-inline my-2 my-md-0">
                <input class="form-control" type="text" placeholder="Поиск..." aria-label="Search">
            </form>


            @if (Auth::check() == false)
                <a class="nav-link" href="{{ route('login') }}">{{ __('Вход') }}</a>
                <a class="nav-link" href="{{ route('register') }}">{{ __('Регистрация') }}</a>
                <span class="text-info ml-5">Привет, Гость!</span>
            @else
                <span class="text-info ml-5">Привет, <a title="Перейти в личный кабинет" href="" data-toggle="modal" data-target="#personalPage">{{ Auth::user()->name }}</a>!</span>

                {{-- MODAL--}}
                @include('PersonalPage.MainPage')


            {{-- MODAL--}}
                <a title="Выход" class="text-danger ml-1" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <img src="https://img.icons8.com/metro/26/000000/exit.png"/>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>

            @endif

            @if( Auth::check() == true )

            @if( count(DB::table('baskets')->where('userID', Auth::id())->get()) > 0)
                <a class="ml-5" title="Корзина({{ count(DB::table('baskets')->where('userID', Auth::id())->get()) }})" href="{{ route('basket') }}">
                    <img src="{{ asset('images/shopping-bag-open.png') }}"></a><div class="text-danger">({{ count(DB::table('baskets')->where('userID', Auth::id())->get()) }})</div>
                @else
                <a class="ml-5" title="Корзина пуста" href="{{ route('basket') }}">
                    <img src="{{ asset('images/shopping-bag-close.png') }}"></a><div class="text-danger">(Корзина пуста)</div>
            @endif

                @else
                <a class="ml-5" title="Для добавления товаров в корзину необходима авторизация" href="{{ route('basket') }}">
                    <img src="{{ asset('images/shopping-bag-close.png') }}"></a>

            @endif

        </div>
    </div>
</nav>
