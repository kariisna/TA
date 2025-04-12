<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Web Konsul</title>
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

        .login-container {
            background: linear-gradient(135deg, rgba(152, 216, 193, 0.1) 0%, rgba(123, 197, 168, 0.1) 100%);
        }

        .form-input:focus {
            border-color: #7BC5A8;
            box-shadow: 0 0 0 3px rgba(123, 197, 168, 0.2);
        }

        .login-button {
            transition: all 0.3s ease;
        }

        .login-button:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(123, 197, 168, 0.4);
        }

        .illustration-bg {
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1440 320'%3E%3Cpath fill='%2398D8C1' fill-opacity='0.2' d='M0,96L48,112C96,128,192,160,288,165.3C384,171,480,149,576,128C672,107,768,85,864,90.7C960,96,1056,128,1152,133.3C1248,139,1344,117,1392,106.7L1440,96L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z'%3E%3C/path%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: bottom;
            background-size: cover;
        }
    </style>
</head>
<body class="min-h-screen bg-gray-50 illustration-bg">
    <div class="min-h-screen flex flex-col justify-center py-12 sm:px-6 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-md text-center">
            <!-- Logo -->
            <div class="mx-auto w-20 h-20 gradient-bg rounded-xl flex items-center justify-center mb-6">
                <i class="fas fa-comments text-white text-3xl"></i>
            </div>
            
            <h2 class="text-3xl font-bold text-gray-800">Login Konseling Siswa</h2>
            <p class="mt-2 text-gray-600">Masuk ke akun Anda untuk melanjutkan</p>
        </div>

        <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
            <div class="bg-white py-8 px-4 shadow-sm rounded-xl sm:px-10">
                <form class="space-y-6" method="POST" action="{{ route('login.post') }}">
                    @csrf
                    <!-- Email Input -->
                    <div>
                        <label for="user" class="block text-sm font-medium text-gray-700">Username</label>
                        <div class="mt-1 relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-envelope text-gray-400"></i>
                            </div>
                            <input id="email" name="email" type="email" required 
                                class="form-input block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg 
                                       placeholder-gray-400 focus:outline-none transition-all"
                                placeholder="Masukkan Email Anda">
                        </div>
                    </div>

                    <!-- Password Input -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                        <div class="mt-1 relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-lock text-gray-400"></i>
                            </div>
                            <input id="password" name="password" type="password" required 
                                class="form-input block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg 
                                       placeholder-gray-400 focus:outline-none transition-all"
                                placeholder="Masukkan password Anda">
                        </div>
                    </div>

                    <!-- Login Button -->
                    <div>
                        <button type="submit" 
                            class="login-button w-full flex justify-center py-3 px-4 border border-transparent rounded-lg 
                                   shadow-sm text-sm font-medium text-white gradient-bg focus:outline-none">
                            Masuk
                        </button>
                    </div>
                </form>

        <!-- Footer -->
        <div class="mt-8 text-center">
            <p class="text-sm text-gray-500">
                &copy; 2025 Web Konsul. All rights reserved.
            </p>
        </div>
    </div>

    <script src="{{ asset('assets') }}/js/swal.js"></script>

    <script>
    document.querySelector("form").addEventListener("submit", function(event) {
        event.preventDefault(); // Mencegah reload halaman
        
        let username = document.getElementById("username").value.trim();
        let password = document.getElementById("password").value.trim();
        
        if (!username || !password) {
            alert("username dan password harus diisi!");
            return;
        }

        // Simulasi autentikasi
    </script>


</body>
</html>