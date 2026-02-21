<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Berita - Yayasan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 flex items-center justify-center min-h-screen py-10">
    <div class="bg-white p-8 rounded-2xl shadow-lg w-full max-w-lg border border-gray-100">
        <h1 class="text-2xl font-bold text-gray-800 mb-6 text-center text-blue-900">Tulis Berita Baru</h1>
        
        @if (session('status'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4 text-sm text-center">
                {{ session('status') }}
            </div>
        @endif

        <form action="{{ route('berita.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf
            
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Judul Berita</label>
                <input type="text" name="judul" required class="w-full border border-gray-300 px-4 py-2 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none transition" placeholder="Contoh: Kegiatan Santunan Anak Yatim">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Isi Berita</label>
                <textarea name="isi" rows="5" required class="w-full border border-gray-300 px-4 py-2 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none transition" placeholder="Tuliskan detail kegiatannya..."></textarea>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Foto Kegiatan (Max 2MB)</label>
                <input type="file" name="gambar" accept="image/*" class="w-full border border-gray-300 px-3 py-2 rounded-lg text-sm file:mr-4 file:py-1 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
            </div>

            <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                <a href="{{ route('berita.index') }}" class="text-gray-500 hover:text-gray-700 text-sm font-medium">← Kembali</a>
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-8 rounded-xl shadow-md transition transform active:scale-95">
                    Simpan & Posting
                </button>
            </div>
        </form>
    </div>
</body>
</html>