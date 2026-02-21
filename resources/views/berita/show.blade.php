<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $berita->judul }} - Yayasan Al-Insan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white font-sans text-gray-900">

    <nav class="bg-white/80 backdrop-blur-md sticky top-0 z-50 border-b border-gray-100">
        <div class="max-w-4xl mx-auto px-6 py-4 flex justify-between items-center">
            <a href="{{ route('berita.index') }}" class="text-blue-600 font-bold flex items-center gap-2 group">
                <span class="transform group-hover:-translate-x-1 transition">←</span> Kembali ke Beranda
            </a>
            <span class="text-xs font-bold text-gray-400 uppercase tracking-widest">Detail Kabar Yayasan</span>
        </div>
    </nav>

    <article class="max-w-4xl mx-auto py-12 px-6">
        <header class="mb-10 text-center md:text-left">
            <div class="mb-4">
                <span class="bg-blue-50 text-blue-600 text-xs font-bold px-4 py-1.5 rounded-full uppercase tracking-wider">Berita Terkini</span>
            </div>
            <h1 class="text-4xl md:text-5xl font-extrabold text-blue-900 leading-tight mb-4">
                {{ $berita->judul }}
            </h1>
            <div class="flex flex-wrap items-center gap-4 text-gray-400 text-sm">
                <div class="flex items-center gap-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <span>Diterbitkan pada {{ $berita->created_at->format('d M Y') }}</span>
                </div>
                <div class="hidden md:block text-gray-300">•</div>
                <div class="flex items-center gap-1">
                    <span>Oleh Admin Yayasan</span>
                </div>
            </div>
        </header>

        @if($berita->gambar)
            <div class="mb-12 rounded-3xl overflow-hidden shadow-2xl">
                <img src="{{ asset('storage/' . $berita->gambar) }}" alt="{{ $berita->judul }}" class="w-full h-auto max-h-[500px] object-cover">
            </div>
        @endif

        <div class="prose prose-lg max-w-none text-gray-700 leading-relaxed space-y-6">
            @foreach(explode("\n", $berita->isi) as $paragraph)
                @if(trim($paragraph))
                    <p class="text-lg md:text-xl">{{ $paragraph }}</p>
                @endif
            @endforeach
        </div>

        <hr class="my-16 border-gray-100">

        <div class="bg-blue-50 rounded-3xl p-8 md:p-12 text-center">
            <h3 class="text-2xl font-bold text-blue-900 mb-4">Ingin tahu lebih banyak tentang kami?</h3>
            <p class="text-gray-600 mb-8">Ikuti terus perkembangan kegiatan dan program Yayasan Al-Insan melalui portal berita ini.</p>
            <a href="{{ route('berita.index') }}" class="inline-block bg-blue-600 text-white font-bold px-8 py-4 rounded-2xl hover:bg-blue-700 transition shadow-lg shadow-blue-200">
                Lihat Berita Lainnya
            </a>
        </div>
    </article>

    <footer class="py-12 border-t border-gray-100 text-center">
        <p class="text-gray-400 text-sm">© 2026 Yayasan Al-Insan. Kebahagiaan Melalui Berbagi.</p>
    </footer>

</body>
</html>