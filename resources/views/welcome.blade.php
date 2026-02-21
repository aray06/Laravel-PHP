@extends('layouts.app')

@section('title', 'Главная страница')

@section('content')
    <h2>Добро пожаловать мистер Пернебек!</h2>
    <p>Эта страница использует макет из папки <code>layouts</code>.</p>

    <hr>

    @php $day = date('l'); @endphp
    @if($day == 'Monday')
        <p>Сегодня понедельник — начало новой недели! 🚀</p>
    @else
        <p>Сегодня <strong>{{ $day }}</strong> — отличный день для программирования! 💻</p>
    @endif
@endsection
