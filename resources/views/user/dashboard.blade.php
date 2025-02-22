<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Konseling</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        
        * {
            font-family: 'Poppins', sans-serif;
        }

        .gradient-bg {
            background: linear-gradient(135deg, #98D8C1 0%, #7BC5A8 100%);
        }

        .card-hover {
            transition: all 0.3s ease;
        }

        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .notification-dot {
            position: absolute;
            top: -2px;
            right: -2px;
            width: 8px;
            height: 8px;
            background-color: #EF4444;
            border-radius: 50%;
        }

        .session-card {
            transition: all 0.3s ease;
            border-left: 4px solid transparent;
        }

        .session-card:hover {
            border-left-color: #98D8C1;
            background-color: #F8FAFC;
        }

        .notification-card {
            transition: all 0.3s ease;
        }

        .notification-card:hover {
            background-color: #F8FAFC;
        }

        .stats-card {
            background: linear-gradient(135deg, #B5C9B7 0%, #A3B7A5 100%);
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Top Navigation -->
    <nav class="gradient-bg shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <span class="text-2xl font-bold text-white">WEB KONSUL</span>
                </div>
                <div class="flex items-center space-x-6">
                    <div class="relative">
                        <button class="p-2 rounded-full hover:bg-white/20 transition-colors">
                            <i class="fas fa-bell text-white"></i>
                            <span class="notification-dot"></span>
                        </button>
                    </div>
                    <div class="relative">
                        <div id="profileButton" class="flex items-center space-x-3 bg-white/10 px-4 py-2 rounded-full cursor-pointer">
                            <span class="text-white font-medium">{{ Auth::check() ? (Auth::user()->username ?? 'kosong cak') : 'Guest' }}</span>
                            <i class="fas fa-chevron-down text-white text-sm"></i>
                        </div>

                        <div id="dropdownMenu" class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg hidden">
                            <a href="{{ route('user.profile') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Profile</a>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                                    <span>Logout</span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Quick Actions -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
            <a href="{{ route('user.jadwal') }}" class="card-hover bg-white p-6 rounded-xl shadow-sm flex items-center justify-center space-x-3 transition-colors hover:bg-gray-50">
                <div class="gradient-bg p-3 rounded-full">
                    <i class="fas fa-calendar-plus text-white text-xl"></i>
                </div>
                <span class="text-gray-800 font-semibold text-lg">Jadwal Konseling</span>            
            </a>
            <a href="{{ route('user.catatan') }}" class="card-hover bg-white p-6 rounded-xl shadow-sm flex items-center justify-center space-x-3 transition-colors hover:bg-gray-50">
                <div class="gradient-bg p-3 rounded-full">
                    <i class="fas fa-calendar-plus text-white text-xl"></i>
                </div>
                <span class="text-gray-800 font-semibold text-lg">Catatan Sesi</span>
            </a>            
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
            <div class="stats-card p-6 rounded-xl shadow-sm card-hover">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-white/80 font-medium">Total Jadwal Konseling</p>
                        <h3 class="text-3xl font-bold text-white mt-2">12</h3>
                    </div>
                    <div class="bg-white/20 p-4 rounded-full">
                        <i class="fas fa-clock text-2xl text-white"></i>
                    </div>
                </div>
            </div>
            <div class="stats-card p-6 rounded-xl shadow-sm card-hover">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-white/80 font-medium">Konseling Bulan Ini</p>
                        <h3 class="text-3xl font-bold text-white mt-2">3</h3>
                    </div>
                    <div class="bg-white/20 p-4 rounded-full">
                        <i class="fas fa-calendar text-2xl text-white"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Upcoming Sessions & Notifications -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Upcoming Sessions -->
            <div class="bg-white rounded-xl shadow-sm p-6">
                <h2 class="text-xl font-bold text-gray-800 mb-6">Sesi Mendatang</h2>
                <div class="space-y-4">
                    <div class="session-card flex items-center p-4 bg-gray-50 rounded-lg">
                        <div class="gradient-bg p-3 rounded-full">
                            <i class="fas fa-video text-white"></i>
                        </div>
                        <div class="ml-4">
                            <p class="font-semibold text-gray-800">Sesi Online dengan Dr. Budi</p>
                            <p class="text-gray-600 mt-1 flex items-center">
                                <i class="fas fa-clock text-sm mr-2"></i>
                                Kamis, 15 Feb 2025 - 14:00 WIB
                            </p>
                        </div>
                    </div>
                    <div class="session-card flex items-center p-4 bg-gray-50 rounded-lg">
                        <div class="gradient-bg p-3 rounded-full">
                            <i class="fas fa-user text-white"></i>
                        </div>
                        <div class="ml-4">
                            <p class="font-semibold text-gray-800">Sesi Tatap Muka dengan Dr. Ani</p>
                            <p class="text-gray-600 mt-1 flex items-center">
                                <i class="fas fa-clock text-sm mr-2"></i>
                                Senin, 19 Feb 2025 - 10:00 WIB
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Notifications -->
            <div class="bg-white rounded-xl shadow-sm p-6">
                <h2 class="text-xl font-bold text-gray-800 mb-6">Notifikasi</h2>
                <div class="space-y-4">
                    <div class="notification-card flex items-start p-4 bg-gray-50 rounded-lg">
                        <div class="gradient-bg p-2 rounded-full">
                            <i class="fas fa-bell text-white"></i>
                        </div>
                        <div class="ml-4 flex-1">
                            <div class="flex justify-between items-start">
                                <p class="font-semibold text-gray-800">Pengingat Sesi</p>
                                <span class="text-sm text-gray-500">2 jam yang lalu</span>
                            </div>
                            <p class="text-gray-600 mt-1">Jangan lupa sesi online besok dengan Dr. Budi</p>
                        </div>
                    </div>
                    <div class="notification-card flex items-start p-4 bg-gray-50 rounded-lg">
                        <div class="gradient-bg p-2 rounded-full">
                            <i class="fas fa-envelope text-white"></i>
                        </div>
                        <div class="ml-4 flex-1">
                            <div class="flex justify-between items-start">
                                <p class="font-semibold text-gray-800">Pesan dari Dr. Ani</p>
                                <span class="text-sm text-gray-500">1 hari yang lalu</span>
                            </div>
                            <p class="text-gray-600 mt-1">Mohon isi form evaluasi sebelum sesi berikutnya</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>


    <script>
    document.getElementById("profileButton").addEventListener("click", function(event) {
        event.stopPropagation();
        document.getElementById("dropdownMenu").classList.toggle("hidden");
    });
    
    document.addEventListener("click", function(event) {
        var dropdown = document.getElementById("dropdownMenu");
        if (!dropdown.contains(event.target)) {
            dropdown.classList.add("hidden");
        }
    });

    document.getElementById("logoutButton").addEventListener("click", function(event) {
        event.preventDefault();
        localStorage.removeItem("userSession"); // Hapus sesi pengguna jika ada
        window.location.href = "{{ route('login') }}"; // Redirect ke halaman login
    });

    </script>
</body>
</html>