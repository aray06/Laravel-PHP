<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; background: #f0f2f5; margin: 0; display: flex; flex-direction: column; min-height: 100vh; }
        nav { background: #2d3748; color: white; padding: 15px; text-align: center; }
        .container { flex: 1; max-width: 800px; margin: 30px auto; background: white; padding: 20px; border-radius: 8px; shadow: 0 2px 4px rgba(0,0,0,0.1); }
        footer { background: #edf2f7; text-align: center; padding: 15px; font-size: 0.9rem; }
    </style>
</head>
<body>

<nav>
    <strong>Laravel App</strong> |

    @guest
        <span>Добро пожаловать, Гость!</span>
    @endguest
</nav>

<div class="container">
    @yield('content')
</div>

<footer>

    @isset($footerNote)
        <p>{{ $footerNote }}</p>
    @else
        <p>&copy; {{ date('Y') }} Мой первый проект на Blade</p>
    @endisset
</footer>

</body>
</html>
