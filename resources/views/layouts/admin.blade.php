<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('components.admin.style')
</head>

<body>

    @include('components.navbar')

    {{-- Content --}}
    @yield('content')
    {{-- Content End --}}

    @include('components.admin.script')

</body>

</html>