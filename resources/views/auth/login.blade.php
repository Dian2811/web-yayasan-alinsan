<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Admin Yayasan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-blue-900 flex items-center justify-center h-screen">
    <div class="bg-white p-10 rounded-2xl shadow-2xl w-full max-w-md">
        <h2 class="text-3xl font-bold text-center text-gray-800 mb-8">Admin Login</h2>
        
        <form action="/login" method="POST" class="space-y-6">
            @csrf
            <div>
                <label class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" required class="w-full border border-gray-300 px-4 py-2 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" name="password" required class="w-full border border-gray-300 px-4 py-2 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none">
            </div>
            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 rounded-xl transition shadow-lg">Masuk</button>
        </form>
    </div>
</body>
</html>