@extends('inc.meta')

@section('title', 'Панель администратора/Добавление нового товара')

@section('content')

    <body>



    <div class="container-fluid mt-lg-5">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('users_A') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                                Пользователи <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('stuffs_A') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg>
                                Товары
                            </a>
                        </li>
                    </ul>


                    </ul>
                </div>
            </nav>


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
                    <h1>Добавление товара</h1>
                    <form method="post" action="{{ route('submit') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="name">Название</label>
                            <input class="form-control" type="text" name="name" id="name" placeholder="Введите название товара" required width="100">
                        </div>

                        <div class="form-group">
                            <label for="category">Категория</label>
                            <select class="custom-select mr-sm-2" name="category" id="category">
                                <option selected>Выберите категорию...</option>
                                <option value="Мониторы">Мониторы</option>
                                <option value="Игры для PS4">Игры для PS4</option>
                                <option value="Мобильные телефоны">Мобильные телефоны</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="about">Описание</label>
                            <textarea class="form-control" id="about" name="about" rows="25" required>Здесь вводится описание по товару</textarea>
                        </div>

                        <div class="form-group">
                            <label for="price">Цена</label>
                            <input class="form-control" name="price" id="price" type="number" min="1" max="100000">
                        </div>

                        <div class="form-group">
                            <label for="number">Количество</label>
                            <input class="form-control" type="number" min="1" name="number" id="number" value="1">
                        </div>

                        <div class="form-group">

                            <label for="image">Предварительный просмотр</label>
                            <input class="form-control" type="file" name="image" id="image">
                        </div>

                        <button type="submit" class="btn btn-primary">Добавить</button>
                    </form>
                </div>
                </main>
    </body>

@endsection
