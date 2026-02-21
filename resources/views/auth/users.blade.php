<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manajemen Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-10">
    <div class="max-w-4xl mx-auto">
        <a href="{{ route('berita.index') }}" class="text-blue-600 mb-4 inline-block">← Kembali ke Berita</a>
        
        <div class="bg-white p-6 rounded-xl shadow-md mb-8">
            <h2 class="text-xl font-bold mb-4">Tambah Admin Baru</h2>
            <form action="{{ route('users.store') }}" method="POST" class="flex gap-4">
                @csrf
                <input type="text" name="name" placeholder="Nama" class="border p-2 rounded w-full" required>
                <input type="email" name="email" placeholder="Email" class="border p-2 rounded w-full" required>
                <input type="password" name="password" placeholder="Password" class="border p-2 rounded w-full" required>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Tambah</button>
            </form>
        </div>

        <div class="bg-white p-6 rounded-xl shadow-md">
            <h2 class="text-xl font-bold mb-4">Daftar Admin</h2>
            <table class="w-full text-left">
                <thead>
                    <tr class="border-b">
                        <th class="py-2">Nama</th>
                        <th>Email</th>
                        <th>Aksi (Ganti Password)</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr class="border-b">
                        <form action="{{ route('users.update', $user->id) }}" method="POST">
                            @csrf @method('PUT')
                            <td class="py-2"><input type="text" name="name" value="{{ $user->name }}" class="border p-1 rounded text-sm"></td>
                            <td>{{ $user->email }}</td>
                            <td class="flex gap-2 py-2">
                                <input type="password" name="password" placeholder="Password Baru (Kosongkan jika tidak ganti)" class="border p-1 rounded text-xs w-full">
                                <button type="submit" class="bg-green-500 text-white px-2 py-1 rounded text-xs">Update</button>
                            </td>
                        </form>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>