<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel') — Info wadhah school</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-slate-100 text-slate-800">
    <div class="flex min-h-screen">
        @include('admin.partials.sidebar')

        <div class="flex flex-1 flex-col lg:ml-64">
            @include('admin.partials.header')

            <main class="flex-1 p-6">
                @include('admin.partials.alerts')
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
