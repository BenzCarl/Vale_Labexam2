<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Manager</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">

    <!-- Navigation Bar -->
    <nav class="bg-blue-600 text-white p-4 flex justify-between">
        <h1 class="text-xl font-bold text-center">Task Manager</h1>
        
    </nav>

    <div class="container mx-auto p-6">
        @yield('content')
    </div>

    
</body>
</html>