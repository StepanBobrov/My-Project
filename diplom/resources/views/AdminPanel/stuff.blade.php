@extends('inc.meta')

@section('title', 'Панель администратора/Товары')

@section('content')

    <body>




    {{-- Боковая панель --}}
    <div class="container-fluid mt-lg-5" >
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
    {{-- Боковая панель --}}


    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4"><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
        <div class="mx-auto mb-lg-5" style="width: 200px;"><h1 >Товары</h1></div>
                <a href="{{ route('stuff_ANew') }}"><button type="button" class="btn btn-primary">Добавить новое наименование</button></a>
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Название</th>
                            <th scope="col">Категория</th>
                            <th scope="col">Цена</th>
                            <th scope="col">Количество</th>
                            <th scope="col">Скидка</th>
                            <th scope="col">Создано</th>
                            <th scope="col">Обновлено</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($stuffs as $stuff)
                            <tr>
                                <th scope="row" >{{ $stuff->id }}</th>
                                <td>{{ $stuff->name }}</td>
                                <td>{{ $stuff->category }}</td>
                                <td>@if ( ($stuff->discount) > 0 )
                                        <del>{{ $stuff->price }}</del>
                                        {{ $stuff->price-($stuff->price / 100 * $stuff->discount) }}

                                    @else
                                        {{ $stuff->price }}
                                    @endif</td>
                                <td>{{ $stuff->number }}</td>
                                <td>{{ $stuff->discount }}%</td>
                                <td>{{ $stuff->created_at }}</td>
                                <td>{{ $stuff->updated_at }}</td>
                                <td><a href="{{ route('stuff_AEdit', $stuff->id) }}"><img src="https://img.icons8.com/ios/25/000000/edit.png"/></a></td>
                                <td ><a id="delete-button" class="text-danger" href="{{ route('stuff_ADel', $stuff->id) }}">X</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

            </main>
    </body>

@endsection
