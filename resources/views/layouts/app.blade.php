
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'ShizuKafe.brew')</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    @stack('styles')
</head>
<body>

    <div class="website-container">

        <header class="navbar">
            <a href="/" class="logo">☕ ShizuKafe<span>.brew</span></a>

            <nav class="nav-links">
                <a href="/">Home</a>
                <a href="/about">About</a>
                <a href="#products">Our Product</a>
                <a href="#category">Category</a>
                <a href="/contact">Contact Us</a>
            </nav>

            <div class="nav-actions">
                <a href="#products" class="search-icon">⌕</a>
                <a href="/contact" class="register-btn">Register ↗</a>
            </div>
        </header>

        <main>
            @yield('content')
        </main>

        <footer>
            <p>© 2026 ShizuKafe.brew. All Rights Reserved.</p>
        </footer>

    </div>

    @stack('scripts')

</body>
</html>
