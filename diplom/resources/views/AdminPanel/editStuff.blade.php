@extends('inc.meta')

@section('title', 'Панель администратора/Редактирование товара')

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
                <h1>Редактирование товара</h1>
                <form method="post" action="{{ route('stuff_AUpdateSubmit', $stuffs->id) }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="name">Название</label>
                        <input class="form-control" type="text" value="{{ $stuffs->name  }}" name="name" id="name" required width="100">
                    </div>

                    <div class="form-group">
                        <label for="category">Категория</label>
                        <select class="custom-select mr-sm-2" name="category" id="category">
                            <option selected>{{ $stuffs->category }}</option>
                            <option value="1">Мониторы</option>
                            <option value="2">Игры для PS4</option>
                            <option value="3">Мобильные телефоны</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="about">Описание</label>
                        <textarea class="form-control" id="about" name="about" rows="25" required>{{ $stuffs->about  }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="price">Цена</label>
                        <input class="form-control" value="{{ $stuffs->price  }}" name="price" id="price" type="number" min="1" max="100000">
                    </div>

                    <div class="form-group">
                        <label for="discount">Скидка</label>
                        <input class="form-control" value="{{ $stuffs->discount }}" name="discount" id="discount" type="number" min="0" max="100">
                    </div>

                    <div class="form-group">
                        <label for="number">Количество</label>
                        <input class="form-control" value="{{ $stuffs->number  }}" type="number" min="1" name="number" id="number" value="1">
                    </div>

                    <div class="form-group">
                        <img height="25%" width="25%" src="{{ Storage::url($stuffs->file) }}">
                        <label for="image">Предварительный просмотр</label>
                        <input class="form-control" value="{{ $stuffs->file }}" type="file" name="image" id="image">
                    </div>

                    <button type="submit" class="btn btn-primary">Изменить</button>
                </form>
            </div>
            </main>
    </body>

@endsection
