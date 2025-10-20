<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIMPKF - Sistem Informasi Manajemen Pengaduan Kerusakan Fasilitas</title>
    @vite('resources/css/app.css')
    <style>
        :root {
            --primary: #6366f1;
            --primary-foreground: #ffffff;
            --muted-foreground: #717182;
            --foreground: #0a0a0a;
            --input-background: #f3f3f5;
            --border: rgba(0, 0, 0, 0.1);
        }
    </style>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#6366f1',
                        'primary-foreground': '#ffffff',
                        'muted-foreground': '#717182',
                        foreground: '#0a0a0a',
                        'input-background': '#f3f3f5',
                        border: 'rgba(0, 0, 0, 0.1)',
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-[#FDFDFC] text-[#1b1b18] min-h-screen flex flex-col">

    <!-- Header -->
    <header class="bg-white border-b shadow-sm sticky top-0 z-50">
        <div class="max-w-6xl mx-auto px-4 py-3 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-[#6366f1] rounded-lg flex items-center justify-center">
                    <!-- SVG Logo -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                    </svg>
                </div>
                <div>
                    <h1 class="font-semibold text-[#0a0a0a]">SIMPKF</h1>
                    <p class="text-xs text-[#717182]">Sistem Pengaduan Fasilitas</p>
                </div>
            </div>
            <nav class="hidden md:flex items-center gap-6">
                <a href="/" class="text-[#6366f1] font-medium">Beranda</a>
                <a href="/track" class="text-[#717182] hover:text-[#0a0a0a] transition">Lacak Laporan</a>
            </nav>
            @if (Route::has('login'))
            <nav class="flex items-center gap-2">
                @auth
                <a href="{{ url('/dashboard') }}" class="px-4 py-1.5 border rounded text-sm text-[#1b1b18] border-[#19140035] hover:border-[#6366f1]">Dashboard</a>
                @else
                <a href="{{ route('login') }}" class="px-4 py-1.5 border rounded text-sm text-[#1b1b18] border-transparent hover:border-[#6366f1]">Log in</a>
                @if (Route::has('register'))
                <a href="{{ route('register') }}" class="px-4 py-1.5 border rounded text-sm text-[#1b1b18] border-[#19140035] hover:border-[#6366f1]">Register</a>
                @endif
                @endauth
            </nav>
            @endif
        </div>
    </header>

    <!-- Hero Section -->
    <section class="bg-gradient-to-b from-slate-50 to-white w-full">
        <div class="max-w-6xl mx-auto px-4 py-16 md:py-24">
            <div class="grid md:grid-cols-2 gap-10 items-center">
                <div>
                    <h1 class="text-4xl md:text-5xl font-bold text-[#0a0a0a] mb-6 leading-tight">
                        Laporkan Kerusakan Fasilitas Kampus dengan Mudah
                    </h1>
                    <p class="text-lg text-[#717182] mb-8">
                        Sistem pelaporan kerusakan fasilitas yang cepat, transparan, dan terintegrasi. 
                        Laporkan masalah fasilitas Anda dan lacak progres perbaikannya secara real-time.
                    </p>
                    <a href="#form-section" class="inline-block px-6 py-3 bg-[#6366f1] text-white rounded-lg hover:bg-[#5558e3] transition">Buat Laporan Sekarang</a>
                </div>
                <div class="rounded-xl overflow-hidden shadow-xl">
                    <img src= {{ asset('images/gedung1.jpeg') }} alt="Building" class="w-full h-80 object-cover">
                </div>
            </div>
        </div>
    </section>

    {{-- Page Cara kerja --}}
    <section class="bg-white py-16 border-y">
        <div class="max-w-6xl mx-auto px-4">
            <h2 class="text-center text-3xl font-semibold mb-12">Cara Kerja</h2>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-white border rounded-lg p-6 text-center shadow-sm">
                    <div class="w-16 h-16 bg-[#6366f1]/10 rounded-full flex items-center justify-center mx-auto mb-4">
                        
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-[#6366f1]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                    <h3 class="font-semibold mb-2">1. Isi Formulir</h3>
                    <p class="text-[#717182]">Lengkapi formulir laporan dengan detail kerusakan fasilitas</p>
                </div>
                <div class="bg-white border rounded-lg p-6 text-center shadow-sm">
                    <div class="w-16 h-16 bg-[#6366f1]/10 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-[#6366f1]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                        </svg>
                    </div>
                    <h3 class="font-semibold mb-2">2. Dapatkan ID Laporan</h3>
                    <p class="text-[#717182]">Simpan ID laporan unik untuk tracking pengaduan Anda</p>
                </div>
                <div class="bg-white border rounded-lg p-6 text-center shadow-sm">
                    <div class="w-16 h-16 bg-[#6366f1]/10 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-[#6366f1]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                    <h3 class="font-semibold mb-2">3. Lacak Progress</h3>
                    <p class="text-[#717182]">Pantau status perbaikan fasilitas secara real-time</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Form Section -->
    <section id="form-section" class="bg-gradient-to-b from-white to-slate-50 py-16">
        <div class="max-w-xl mx-auto px-4">
            <div class="bg-white border rounded-lg p-6 shadow">
                <h2 class="text-2xl font-semibold mb-6">Formulir Pengaduan Kerusakan</h2>
                
                {{-- Alert Success --}}
                    @if (session('success'))
                    <div class="mb-6 px-4 py-3 bg-green-50 border border-green-200 text-green-800 rounded-lg">
                        <div class="flex items-start gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <div>
                                <p class="font-semibold">Laporan Berhasil Dikirim!</p>
                                <p class="text-sm">{{ session('success') }}</p>
                                @if (session('no_tiket'))
                                <p class="mt-2 text-sm font-mono bg-white px-3 py-2 rounded border border-green-300">
                                    ID Laporan: <strong>{{ session('no_tiket') }}</strong>
                                </p>
                                <p class="text-xs mt-1">Simpan ID ini untuk melacak laporan Anda.</p>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endif

                    {{-- Alert Errors --}}
                    @if ($errors->any())
                    <div class="mb-6 px-4 py-3 bg-red-50 border border-red-200 text-red-800 rounded-lg">
                        <div class="flex items-start gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <div>
                                <p class="font-semibold">Terjadi Kesalahan:</p>
                                <ul class="mt-1 text-sm list-disc list-inside space-y-1">
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endif

                <form action="{{ route('pengaduan.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    <!-- CSRF Token for Laravel -->
                    @csrf

                    {{-- No Tiker --}}
                    <div>
                        <label for="no_tiket" class="block font-medium mb-1">No Tiket</label>
                        <input 
                            type="text" 
                            id="no_tiket" 
                            name="no_tiket" 
                            value="{{ old('no_tiket', $no_tiket ?? '') }}"
                            placeholder="Otomatis terisi setelah pengajuan" 
                            readonly 
                            class="w-full px-2 py-1 border rounded-lg bg-[#e5e7eb] cursor-not-allowed"
                    >

                    
                    <!-- Nama -->
                    <div>
                        <label for="nama_pelapor" class="block font-medium mb-1">Nama Anda <span class="text-red-500">*</span></label>
                        <input 
                            type="text" 
                            id="nama_pelapor" 
                            name="nama_pelapor" 
                            value="{{ old('nama_pelapor') }}"
                            placeholder="Masukkan nama lengkap" 
                            required 
                            class="w-full px-3 py-2 border rounded-lg bg-[#f3f3f5] focus:outline-none focus:ring-2 focus:ring-[#6366f1] @error('nama_pelapor') border-red-500 @enderror"
                        >
                        @error('nama_pelapor')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    {{-- Email --}}
                    <div>
                        <label for="email_pelapor" class="block font-medium mb-1">Email</label>
                        <input 
                            type="email" 
                            id="email_pelapor" 
                            name="email_pelapor" 
                            value="{{ old('email_pelapor') }}"
                            placeholder="contoh@email.com" 
                            class="w-full px-3 py-2 border rounded-lg bg-[#f3f3f5] focus:outline-none focus:ring-2 focus:ring-[#6366f1] @error('email_pelapor') border-red-500 @enderror"
                        >
                        @error('email_pelapor')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Kontak --}}
                    <div>
                        <label for="kontak" class="block font-medium mb-1">No. Handphone / WhatsApp</label>
                        <input 
                            type="text" 
                            id="kontak" 
                            name="kontak" 
                            value="{{ old('kontak') }}"
                            placeholder="081234567890" 
                            class="w-full px-3 py-2 border rounded-lg bg-[#f3f3f5] focus:outline-none focus:ring-2 focus:ring-[#6366f1] @error('kontak') border-red-500 @enderror"
                        >
                        @error('kontak')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Nama Barang/Fasilitas --}}
                    <div>
                        <label for="nama_barang" class="block font-medium mb-1">Nama Barang/Fasilitas yang Rusak <span class="text-red-500">*</span></label>
                        <input 
                            type="text" 
                            id="nama_barang" 
                            name="nama_barang" 
                            value="{{ old('nama_barang') }}"
                            placeholder="Contoh: AC di Ruang Kelas, Proyektor di Lab Komputer" 
                            required 
                            class="w-full px-3 py-2 border rounded-lg bg-[#f3f3f5] focus:outline-none focus:ring-2 focus:ring-[#6366f1] @error('nama_barang') border-red-500 @enderror"
                        >
                        @error('nama_barang')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                   {{-- Lokasi --}}
                    <div>
                        <label for="lokasi" class="block font-medium mb-1">Lokasi Detail <span class="text-red-500">*</span></label>
                        <input 
                            type="text" 
                            id="lokasi" 
                            name="lokasi" 
                            value="{{ old('lokasi') }}"
                            placeholder="Contoh: Gedung A, Lantai 2, Ruang 7" 
                            required 
                            class="w-full px-3 py-2 border rounded-lg bg-[#f3f3f5] focus:outline-none focus:ring-2 focus:ring-[#6366f1] @error('lokasi') border-red-500 @enderror"
                        >
                        @error('lokasi')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Tingkat Urgensi --}}
                    <div>
                        <label for="tingkat_urgensi" class="block font-medium mb-1">Tingkat Urgensi <span class="text-red-500">*</span></label>
                       <select name="tingkat_urgensi" id="tingkat_urgensi" required class="w-full px-3 py-2 border rounded-lg bg-[#f3f3f5] focus:outline-none focus:ring-2 focus:ring-[#6366f1] @error('tingkat_urgensi') border-red-500 @enderror">
                        <option value="">Pilih Tingkat Urgensi</option>
                        <option value="Rendah" {{ old('tingkat_urgensi') == 'Rendah' ? 'selected' : '' }}>Rendah</option>
                        <option value="Sedang" {{ old('tingkat_urgensi') == 'Sedang' ? 'selected' : '' }} selected>Sedang</option>
                        <option value="Tinggi" {{ old('tingkat_urgensi') == 'Tinggi' ? 'selected' : '' }}>Tinggi</option>
                    </select>
                    @error('tingkat_urgensi')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                    </div>

                    {{-- Deskripsi --}}
                    <div>
                        <label for="deskripsi" class="block font-medium mb-1">Deskripsi Lengkap Kerusakan <span class="text-red-500">*</span></label>
                        <textarea 
                            id="deskripsi" 
                            name="deskripsi" 
                            placeholder="Jelaskan detail kerusakan yang terjadi. Contoh: Lampu di kelas xx mati." 
                            rows="5" 
                            required 
                            class="w-full px-3 py-2 border rounded-lg bg-[#f3f3f5] focus:outline-none focus:ring-2 focus:ring-[#6366f1] @error('deskripsi') border-red-500 @enderror"
                        >{{ old('deskripsi') }}</textarea>
                        @error('deskripsi')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <!-- Upload Foto -->
                    <div>
                        <label for="photo" class="block font-medium mb-1">Unggah Foto (Opsional)</label>
                        <div class="border-2 border-dashed rounded-lg p-6 text-center hover:border-[#6366f1] transition cursor-pointer" id="upload-area">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-[#717182] mx-auto mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                            </svg>
                            <p class="text-sm text-[#717182]">Klik untuk mengunggah foto atau seret file ke sini</p>
                            <p class="text-xs text-[#717182] mt-1">PNG, JPG atau JPEG (Maks. 5MB)</p>
                            <input type="file" id="photo" name="photo" accept="image/*" class="hidden">
                        </div>
                        @error('foto')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <!-- Submit Button -->
                    <button type="submit" class="w-full px-6 py-3 bg-[#6366f1] text-white rounded-lg hover:bg-[#5558e3] transition">Kirim Laporan</button>
                </form>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-slate-50 border-t py-8 mt-auto">
        <div class="max-w-6xl mx-auto px-4 text-center text-[#717182]">
            <p>&copy; 2025 SIMPKF. Sistem Informasi Manajemen Pengaduan Kerusakan Fasilitas.</p>
        </div>
    </footer>

    <!-- Smooth Scroll & File Upload Script -->
    <script>
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({ behavior: 'smooth' });
                }
            });
        });

        // File upload interaction
        const uploadArea = document.getElementById('upload-area');
        const fileInput = document.getElementById('photo');
        if (uploadArea && fileInput) {
           // Click area untuk trigger file input
                uploadArea.addEventListener('click', () => fileInput.click());
                // Drag & drop
                uploadArea.addEventListener('dragover', (e) => {
                    e.preventDefault();
                    uploadArea.classList.add('border-[#6366f1]', 'bg-blue-50');
                });
                uploadArea.addEventListener('dragleave', () => {
                uploadArea.classList.remove('border-[#6366f1]', 'bg-blue-50');
                });
                uploadArea.addEventListener('drop', (e) => {
                e.preventDefault();
                uploadArea.classList.remove('border-[#6366f1]', 'bg-blue-50');
            
                if (e.dataTransfer.files.length > 0) {
                    fileInput.files = e.dataTransfer.files;
                    updateUploadUI(e.dataTransfer.files[0]);
                }
            });
            // File change
            fileInput.addEventListener('change', (e) => {
                if (e.target.files.length > 0) {
                    updateUploadUI(e.target.files[0]);
                }
            });
            // Function update UI setelah file dipilih
            function updateUploadUI(file) {
            const fileSize = (file.size / 1024 / 1024).toFixed(2); // MB
            uploadArea.innerHTML = `
                <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-green-600 mx-auto mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                <p class="text-sm text-green-600 font-semibold">${file.name}</p>
                <p class="text-xs text-[#717182] mt-1">Ukuran: ${fileSize} MB</p>
                <button type="button" onclick="resetUpload()" class="mt-3 text-xs text-red-600 hover:underline">Ganti Foto</button>
            `;
        }
    }
        
            // Function reset upload
            function resetUpload() {
                const uploadArea = document.getElementById('upload-area');
                const fileInput = document.getElementById('foto');
                
                fileInput.value = '';
                uploadArea.innerHTML = `
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-[#717182] mx-auto mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                    </svg>
                    <p class="text-sm text-[#717182]">Klik untuk mengunggah foto atau seret file ke sini</p>
                    <p class="text-xs text-[#717182] mt-1">PNG, JPG atau JPEG (Maks. 2MB)</p>
                `;
            }
    </script>
    @if (Route::has('login'))
    <div class="h-14.5 hidden lg:block"></div>
    @endif
</body>
</html>
