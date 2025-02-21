<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Siswa - Web Konsul</title>
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

        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1000;
        }

        .modal.active {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .session-card {
            transition: all 0.3s ease;
            border-left: 4px solid transparent;
        }

        .session-card:hover {
            border-left-color: #98D8C1;
            background-color: #F8FAFC;
        }

        .profile-image-container:hover .edit-overlay {
            opacity: 1;
        }

        .edit-overlay {
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        a {
            text-decoration: none !important;
            border-bottom: none !important;
        }

        a:hover {
            text-decoration: none !important;
            border-bottom: none !important;
        }
    </style>
</head>

<body class="bg-gray-50">
    <!-- Top Navigation -->
    <nav class="gradient-bg shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <a href="{{ route('user.dashboard') }}" class="text-2xl font-bold text-white hover:underline">WEB KONSUL</a>
                </div>
                <div class="flex items-center space-x-6">
                    <div class="flex items-center space-x-3 bg-white/10 px-4 py-2 rounded-full">
                        <span class="text-white font-medium">Sarah Putri</span>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Profile Section -->
        <div class="bg-white rounded-xl shadow-sm p-8">
            <div class="flex flex-col md:flex-row items-start gap-8">
                <!-- Profile Image Section -->
                <div class="w-full md:w-1/4">
                    <div class="relative profile-image-container group">
                        <img src="http://127.0.0.1:8000/storage/profile.jpeg" alt=" Profile" class="w-full rounded-xl shadow-sm">
                        <div class="edit-overlay absolute inset-0 bg-black/50 rounded-xl flex items-center justify-center cursor-pointer">
                            <i class="fas fa-camera text-white text-3xl"></i>
                        </div>
                    </div>
                </div>

                <!-- Profile Info Section -->
                <div class="flex-1">
                    <div class="flex justify-between items-start mb-6">
                        <div>
                            <h1 class="text-3xl font-bold text-gray-800">Sarah Putri</h1>
                            <p class="text-gray-600 mt-1">Kelas XI IPA 2</p>
                        </div>
                        <button onclick="openModal()" class="gradient-bg text-white px-6 py-2 rounded-lg flex items-center gap-2 hover:opacity-90 transition-opacity">
                            <i class="fas fa-edit"></i>
                            Edit Profil
                        </button>
                    </div>

                    <!-- Profile Details -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                        <div>
                            <h3 class="text-gray-500 text-sm mb-1">Email</h3>
                            <p class="text-gray-800 font-medium">sarah.putri@email.com</p>
                        </div>
                        <div>
                            <h3 class="text-gray-500 text-sm mb-1">Nomor Telepon</h3>
                            <p class="text-gray-800 font-medium">+62 812-3456-7890</p>
                        </div>
                        <div>
                            <h3 class="text-gray-500 text-sm mb-1">Tanggal Lahir</h3>
                            <p class="text-gray-800 font-medium">15 Mei 2008</p>
                        </div>
                        <div>
                            <h3 class="text-gray-500 text-sm mb-1">Wali Kelas</h3>
                            <p class="text-gray-800 font-medium">Ibu Siti Aminah</p>
                        </div>
                    </div>

                    <!-- Counseling History -->
                    <div>
                        <h2 class="text-xl font-bold text-gray-800 mb-4">Riwayat Konseling</h2>
                        <div class="space-y-4">
                            <div class="session-card flex items-start p-4 bg-gray-50 rounded-lg">
                                <div class="gradient-bg p-3 rounded-full">
                                    <i class="fas fa-video text-white"></i>
                                </div>
                                <div class="ml-4 flex-1">
                                    <div class="flex justify-between items-start">
                                        <div>
                                            <p class="font-semibold text-gray-800">Sesi Online dengan Dr. Budi</p>
                                            <p class="text-gray-600 mt-1">Konseling Akademik</p>
                                        </div>
                                        <span class="text-sm text-gray-500">10 Feb 2025</span>
                                    </div>
                                    <p class="text-gray-600 mt-2 text-sm">Diskusi tentang persiapan ujian dan manajemen waktu</p>
                                </div>
                            </div>

                            <div class="session-card flex items-start p-4 bg-gray-50 rounded-lg">
                                <div class="gradient-bg p-3 rounded-full">
                                    <i class="fas fa-user text-white"></i>
                                </div>
                                <div class="ml-4 flex-1">
                                    <div class="flex justify-between items-start">
                                        <div>
                                            <p class="font-semibold text-gray-800">Sesi Tatap Muka dengan Dr. Ani</p>
                                            <p class="text-gray-600 mt-1">Konseling Karir</p>
                                        </div>
                                        <span class="text-sm text-gray-500">5 Feb 2025</span>
                                    </div>
                                    <p class="text-gray-600 mt-2 text-sm">Eksplorasi minat dan bakat untuk perencanaan kuliah</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Edit Profile Modal -->
    <div class="modal" id="editModal">
        <div class="bg-white rounded-xl shadow-lg w-full max-w-2xl mx-4">
            <div class="p-6">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-bold text-gray-800">Edit Profil</h2>
                    <button onclick="closeModal()" class="text-gray-500 hover:text-gray-700">
                        <i class="fas fa-times text-xl"></i>
                    </button>
                </div>

                <form class="space-y-6">
                    <!-- Profile Image Upload -->
                    <div class="flex justify-center">
                        <div class="relative">
                            <img src="http://127.0.0.1:8000/storage/profile.jpeg" alt="Profile" class="rounded-full w-32 h-32">
                            <label class="absolute bottom-0 right-0 gradient-bg p-2 rounded-full cursor-pointer">
                                <i class="fas fa-camera text-white"></i>
                                <input type="file" class="hidden" accept="image/*">
                            </label>
                        </div>
                    </div>

                    <!-- Form Fields -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap</label>
                            <input type="text" value="Sarah Putri" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-200 focus:border-green-400 outline-none transition-all">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Kelas</label>
                            <input type="text" value="XI IPA 2" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-200 focus:border-green-400 outline-none transition-all">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                            <input type="email" value="sarah.putri@email.com" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-200 focus:border-green-400 outline-none transition-all">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Nomor Telepon</label>
                            <input type="tel" value="+62 812-3456-7890" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-200 focus:border-green-400 outline-none transition-all">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Tanggal Lahir</label>
                            <input type="date" value="2008-05-15" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-200 focus:border-green-400 outline-none transition-all">
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex justify-end gap-4 pt-4">
                        <button type="button" onclick="closeModal()" class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors">
                            Batal
                        </button>
                        <button type="submit" class="gradient-bg px-6 py-2 rounded-lg text-white hover:opacity-90 transition-opacity">
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function openModal() {
            document.getElementById('editModal').classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function closeModal() {
            document.getElementById('editModal').classList.remove('active');
            document.body.style.overflow = 'auto';
        }
    </script>
</body>

</html>