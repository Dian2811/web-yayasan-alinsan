<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Berita Yayasan Al-Insan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 font-sans text-gray-900">

    @auth
    <nav class="bg-blue-900 text-white py-3 px-6 shadow-md">
        <div class="max-w-6xl mx-auto flex justify-between items-center">
            <div class="flex gap-4 items-center">
                <span class="text-xs font-semibold bg-blue-700 px-3 py-1 rounded-full">Mode Admin</span>
                <span class="text-sm">Halo, **{{ Auth::user()->name }}**</span>
            </div>
            <div class="flex gap-6 items-center">
                <a href="{{ route('users.index') }}" class="text-sm hover:text-blue-200 transition">Manajemen User</a>
                
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="bg-red-500 hover:bg-red-600 px-4 py-1 rounded-lg text-xs font-bold transition">Keluar</button>
                </form>
            </div>
        </div>
    </nav>
    @endauth

    <div class="max-w-6xl mx-auto py-12 px-4">
        <div class="flex flex-col md:flex-row justify-between items-center mb-12 gap-6">
            <div class="text-center md:text-left">
                <h1 class="text-5xl font-extrabold text-blue-900 tracking-tight">Kabar Yayasan</h1>
                <p class="text-gray-500 mt-2 text-lg">Informasi terbaru seputar kegiatan Yayasan Al-Insan.</p>
            </div>
            
            @auth
            <a href="{{ route('berita.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 px-8 rounded-2xl transition duration-300 shadow-xl hover:shadow-blue-200 transform hover:-translate-y-1 text-center">
                (+) Tulis Berita Baru
            </a>
            @endauth
        </div>

        @if (session('status'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 px-6 py-4 rounded-r-xl mb-8 shadow-sm">
                {{ session('status') }}
            </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
            @forelse ($semuaBerita as $item)
                <div class="bg-white rounded-3xl overflow-hidden shadow-sm border border-gray-100 hover:shadow-2xl transition duration-500 flex flex-col group">
                    
                    <div class="relative overflow-hidden">
                        @if($item->gambar)
                            <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->judul }}" class="w-full h-60 object-cover group-hover:scale-110 transition duration-500">
                        @else
                            <div class="w-full h-60 bg-gray-100 flex items-center justify-center">
                                <span class="text-gray-400 italic text-sm">Dokumentasi belum tersedia</span>
                            </div>
                        @endif
                        <div class="absolute top-4 left-4">
                            <span class="bg-blue-600 text-white text-[10px] font-bold px-3 py-1 rounded-full uppercase tracking-widest shadow-lg">Berita</span>
                        </div>
                    </div>

                    <div class="p-8 flex-grow">
                        <h2 class="text-2xl font-bold text-gray-800 mb-4 leading-tight group-hover:text-blue-700 transition">
                            {{ $item->judul }}
                        </h2>
                        <p class="text-gray-500 text-sm leading-relaxed mb-6">
                            {{ Str::limit($item->isi, 100) }}
                        </p>
                    </div>

                    <div class="px-8 py-5 bg-gray-50 border-t border-gray-50 flex justify-between items-center mt-auto">
                        <a href="{{ route('berita.show', $item->slug) }}" class="text-blue-600 text-sm font-bold hover:text-blue-800 transition">Baca Selengkapnya →</a>
                        
                        @auth
                        <div class="flex items-center gap-4">
                            <a href="{{ route('berita.edit', $item->slug) }}" class="text-yellow-500 hover:text-yellow-600 transition text-sm font-semibold">Edit</a>

                            <form action="{{ route('berita.destroy', $item->slug) }}" method="POST" onsubmit="return confirm('Hapus berita ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-400 hover:text-red-600 transition">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                        @endauth
                    </div>
                </div>
            @empty
                <div class="col-span-full py-24 text-center">
                    <p class="text-gray-400 text-xl italic">Belum ada kabar terbaru dari yayasan.</p>
                </div>
            @endforelse
        </div>
    </div>

    <footer class="mt-20 py-10 border-t border-gray-200 text-center">
        <p class="text-gray-400 text-sm">© 2026 Yayasan Al-Insan. Semua Hak Dilindungi.</p>
        
        @guest
            <a href="{{ route('login') }}" class="text-gray-300 hover:text-gray-500 text-[10px] mt-4 inline-block tracking-widest uppercase font-bold">Admin Portal</a>
        @endguest
    </footer>

</body>
</html>