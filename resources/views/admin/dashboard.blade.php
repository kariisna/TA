@extends('layouts.app')

@section('content')
    <!DOCTYPE html>
    <html lang="id">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Panel</title>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js"></script>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>

    <body class="bg-emerald-50">
        <!-- Sidebar Toggle Button (Mobile) -->
        <button id="sidebarToggle" class="fixed top-4 left-4 z-50 lg:hidden bg-emerald-600 text-white p-2 rounded-lg">
            <i class="fas fa-bars"></i>
        </button>

        <!-- Sidebar -->
        <aside id="sidebar"
            class="fixed top-0 left-0 z-40 h-screen w-64 transform -translate-x-full lg:translate-x-0 transition-transform duration-300 ease-in-out bg-white shadow-lg">
            <div class="h-full px-3 py-4 flex flex-col">
                <!-- Logo -->
                <div class="flex items-center mb-8 px-2">
                    <i class="fas fa-brain text-3xl text-emerald-600 mr-2"></i>
                    <span class="text-xl font-bold text-gray-800">ADMIN </span>
                </div>

                <!-- Navigation -->
                <nav class="flex-grow space-y-1">
                    <a href="#"
                        class="flex items-center px-4 py-3 text-gray-600 rounded-lg hover:bg-emerald-50 hover:text-emerald-600 group transition-colors">
                        <i class="fas fa-home w-5 h-5 mr-3"></i>
                        <span>Dashboard</span>
                    </a>
                    <a href="{{ route('admin.jadwal') }}"
                        class="flex items-center px-4 py-3 text-gray-600 rounded-lg hover:bg-emerald-50 hover:text-emerald-600 group transition-colors">
                        <i class="fas fa-calendar-days w-5 h-5 mr-3"></i>
                        <span>Jadwal</span>
                    </a>
                    <a href="{{ route('admin.user') }}"
                        class="flex items-center px-4 py-3 text-gray-600 rounded-lg hover:bg-emerald-50 hover:text-emerald-600 group transition-colors">
                        <i class="fas fa-users w-5 h-5 mr-3"></i>
                        <span>Siswa</span>
                    </a>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="flex items-center px-4 py-3 text-gray-600 rounded-lg hover:bg-emerald-50 hover:text-emerald-600 group transition-colors">
                            <i class="fas fa-sign-out w-5 h-5 mr-3"></i>
                            <span>Logout</span>
                        </button>
                    </form>
                    <a href="#"
                        class="flex items-center px-4 py-3 text-gray-600 rounded-lg hover:bg-emerald-50 hover:text-emerald-600 group transition-colors">
                        <!-- <i class="fas fa-gear w-5 h-5 mr-3"></i> -->
                        <span></span>
                    </a>
                </nav>
        </aside>

        <!-- Main Content -->
        <div class="lg:ml-64 min-h-screen p-6">
            <!-- Welcome Header -->
            <div class="bg-gradient-to-r from-emerald-600 to-emerald-500 rounded-xl shadow-lg p-6 mb-8">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-3xl font-bold text-white mb-2 capitalize">Selamat Datang! <span class="text-yellow-200">{{ Auth::check() ? (Auth::user()->username ?? 'kosong cak') : 'Guest' }}</span>☕</h2>
                        <p class="text-emerald-100"></p>
                    </div>
                    <div class="hidden md:block">
                        <i class="fas fa-coffee text-6xl text-emerald-100 opacity-80"></i>
                    </div>
                </div>
            </div>

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                <!-- Total Konseling Card -->
                <div class="bg-white rounded-xl shadow-md p-6 hover:shadow-lg transition-shadow">
                    <div class="flex items-center justify-between mb-4">
                        <div class="bg-emerald-100 p-3 rounded-lg">
                            <i class="fas fa-users text-2xl text-emerald-600"></i>
                        </div>
                        <span class="text-sm font-medium text-emerald-600 bg-emerald-100 px-2 py-1 rounded-full">
                            Bulan Ini
                        </span>
                    </div>
                    <h3 class="text-gray-600 text-sm font-medium mb-2">Total Konseling</h3>
                    <div class="flex items-center justify-between">
                        <span class="text-3xl font-bold text-gray-800">0</span>
                        <span class="text-emerald-500 text-sm flex items-center">
                            <i class="fas fa-arrow-up mr-1"></i>
                            0%
                        </span>
                    </div>
                </div>

                <!-- Jadwal Siswa Card -->
                <div class="bg-white rounded-xl shadow-md p-6 hover:shadow-lg transition-shadow">
                    <div class="flex items-center justify-between mb-4">
                        <div class="bg-emerald-100 p-3 rounded-lg">
                            <i class="fas fa-calendar text-2xl text-emerald-600"></i>
                        </div>
                        <span class="text-sm font-medium text-emerald-600 bg-emerald-100 px-2 py-1 rounded-full">
                            Aktif
                        </span>
                    </div>
                    <h3 class="text-gray-600 text-sm font-medium mb-2">Jadwal Siswa</h3>
                    <div class="flex items-center justify-between">
                        <span class="text-3xl font-bold text-gray-800">0</span>
                        <span class="text-emerald-500 text-sm flex items-center">
                            <i class="fas fa-clock mr-1"></i>
                            Terjadwal
                        </span>
                    </div>
                </div>

                <!-- Quick Action Card -->
                <div class="bg-white rounded-xl shadow-md p-6 hover:shadow-lg transition-shadow">
                    <div class="flex items-center justify-between mb-4">
                        <div class="bg-emerald-100 p-3 rounded-lg">
                            <i class="fas fa-bolt text-2xl text-emerald-600"></i>
                        </div>
                        <span class="text-sm font-medium text-emerald-600 bg-emerald-100 px-2 py-1 rounded-full">
                            Aksi Cepat
                        </span>
                    </div>
                    <h3 class="text-gray-600 text-sm font-medium mb-4">Buat Jadwal Baru</h3>
                    <a href="{{ route('admin.jadwal') }}"
                        class="block text-center bg-emerald-600 hover:bg-emerald-700 text-white font-medium py-2 px-4 rounded-lg transition-colors">
                        <i class="fas fa-plus mr-2"></i>Tambah Jadwal
                    </a>
                </div>
            </div>

            <!-- Upcoming Schedule Section -->
            <div class="bg-white rounded-xl shadow-md p-6">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-xl font-bold text-gray-800">
                        <i class="fas fa-calendar-check text-emerald-600 mr-2"></i>
                        Jadwal Konseling Mendatang
                    </h3>
                </div>

                <!-- Empty State -->
                <div class="text-center py-8">
                    <div class="bg-emerald-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-calendar-xmark text-2xl text-emerald-600"></i>
                    </div>
                    <p class="text-gray-600 mb-2">Tidak ada jadwal konseling mendatang</p>
                    <p class="text-sm text-gray-500">Jadwalkan sesi konseling baru untuk melihat daftar di sini</p>
                </div>
            </div>
        </div>

        <!-- Sidebar Overlay -->
        <div id="sidebarOverlay" class="fixed inset-0 bg-gray-900 bg-opacity-50 z-30 hidden lg:hidden"></div>

        <script>
            // Sidebar Toggle Functionality
            const sidebar = document.getElementById('sidebar');
            const sidebarToggle = document.getElementById('sidebarToggle');
            const sidebarOverlay = document.getElementById('sidebarOverlay');

            function toggleSidebar() {
                sidebar.classList.toggle('-translate-x-full');
                sidebarOverlay.classList.toggle('hidden');
            }

            sidebarToggle.addEventListener('click', toggleSidebar);
            sidebarOverlay.addEventListener('click', toggleSidebar);
        </script>
    </body>

    </html>
@endsection
