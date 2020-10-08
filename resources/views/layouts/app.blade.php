<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts/head')
</head>
<body>
    @include('layouts/navigation')

    @yield('content')

    @include('layouts/scripts')
</body>
</html>
