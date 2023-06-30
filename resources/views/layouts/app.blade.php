<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Application</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Include any necessary custom CSS files -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <header class="bg-dark text-white text-center py-4">
        <!-- Add your header content here -->
        <h1>Welcome to My Application</h1>
    </header>

    <nav class="navbar navbar-expand navbar-light bg-light">
        <!-- Add your navigation menu here -->
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('home') }}">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('users.index') }}">User List</a>
            </li>
            <!-- Add more navigation links as needed -->
            <li class="nav-item">
                <form action="{{ route('logout') }}" method="POST" id="logout-form">
                    @csrf
                    <button type="submit" class="nav-link btn btn-link">Logout</button>
                </form>
            </li>
        </ul>
    </nav>

    <main class="py-4">
        <div class="container">
            @yield('content')
        </div>
    </main>

    <footer class="bg-light text-center py-3">
        <!-- Add your footer content here -->
        <p>&copy; {{ date('Y') }} My Application. All rights reserved.</p>
    </footer>

    <!-- Include Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Include any necessary custom JavaScript files -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
