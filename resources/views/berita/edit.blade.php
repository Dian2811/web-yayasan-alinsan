<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Berita - Yayasan Al-Insan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 font-sans text-gray-900">

    <div class="max-w-2xl mx-auto py-12 px-4">
        <a href="{{ route('berita.index') }}" class="text-blue-600 font-bold hover:underline mb-6 inline-block">← Kembali ke Daftar Berita</a>
        
        <div class="bg-white p-8 rounded-3xl shadow-xl border border-gray-100">
            <h1 class="text-3xl font-extrabold text-blue-900 mb-6">Edit Berita</h1>

            <form action="{{ route('berita.update', $berita->slug) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PUT')

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Judul Berita</label>
                    <input type="text" name="judul" value="{{ old('judul', $berita->judul) }}" 
                           class="w-full border border-gray-300 px-4 py-3 rounded-xl focus:ring-2 focus:ring-blue-500 outline-none transition" required>
                    @error('judul') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Isi Berita</label>
                    <textarea name="isi" rows="6" 
                              class="w-full border border-gray-300 px-4 py-3 rounded-xl focus:ring-2 focus:ring-blue-500 outline-none transition" required>{{ old('isi', $berita->isi) }}</textarea>
                    @error('isi') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Ganti Gambar (Kosongkan jika tetap)</label>
                    
                    @if($berita->gambar)
                        <div class="mb-3">
                            <p class="text-xs text-gray-400 mb-1">Gambar saat ini:</p>
                            <img src="{{ asset('storage/' . $berita->gambar) }}" class="w-32 h-20 object-cover rounded-lg shadow-sm border">
                        </div>
                    @endif

                    <input type="file" name="gambar" 
                           class="w-full border border-gray-300 px-4 py-3 rounded-xl focus:ring-2 focus:ring-blue-500 outline-none transition file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                    <p class="text-[10px] text-gray-400 mt-2 italic">*Maksimal ukuran file 10MB</p>
                    @error('gambar') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <button type="submit" 
                        class="w-full bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-4 rounded-2xl transition duration-300 shadow-lg hover:shadow-yellow-200 transform hover:-translate-y-1">
                    Simpan Perubahan Berita
                </button>
            </form>
        </div>
    </div>

</body>
</html>