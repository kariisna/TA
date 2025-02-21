<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Users - School Counseling</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js"></script>
</head>

<body class="bg-gray-100 min-h-screen">
    <!-- Navigation Bar -->
    <nav class="bg-emerald-600 text-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex items-center">
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-2">
                        <i class="fas fa-arrow-left"></i>
                        <span>Kembali ke Dashboard</span>
                    </a>
                </div>
                <div class="flex items-center space-x-4">
                    <span class="text-sm">Selamat Datang, Admin</span>
                    <img class="h-8 w-8 rounded-full" src="http://127.0.0.1:8000/storage/profile.jpeg" alt="User avatar">
                </div>
            </div>
        </div>
    </nav>

    <div class="p-6 max-w-7xl mx-auto">
        <!-- Header Section with Stats -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-800 mb-6">Manajemen Pengguna</h1>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-white rounded-lg shadow p-8 flex items-center">
                    <div class="p-4 bg-blue-100 rounded-full">
                        <i class="fas fa-user-graduate text-blue-600 text-2xl"></i>
                    </div>
                    <div class="ml-6">
                        <p class="text-sm text-gray-500">Total Siswa</p>
                        <p class="text-3xl font-semibold text-gray-800">0</p>
                    </div>
                </div>
                <div class="bg-white rounded-lg shadow p-8 flex items-center">
                    <div class="p-4 bg-purple-100 rounded-full">
                        <i class="fas fa-chalkboard-teacher text-purple-600 text-2xl"></i>
                    </div>
                    <div class="ml-6">
                        <p class="text-sm text-gray-500">Total Guru</p>
                        <p class="text-3xl font-semibold text-gray-800">0</p>
                    </div>
                </div>
            </div>
        </div>


        <!-- Search and Add User Section -->
        <div class="bg-white rounded-lg shadow-md p-6 mb-6">
            <div class="flex flex-col sm:flex-row justify-between items-center gap-4">
                <div class="relative w-full sm:w-96">
                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center">
                        <i class="fas fa-search text-gray-500"></i>
                    </span>
                    <input type="text" placeholder="Cari berdasarkan nama, email, atau kelas..." class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                </div>
                <div class="flex space-x-4 w-full sm:w-auto">
                    <select id="filterBulan" class="w-full sm:w-auto bg-gray-200 hover:bg-gray-300 text-gray-700 px-4 py-2 rounded-lg flex items-center justify-center space-x-2 transition-colors">
                        <option value="">Filter</option>
                        <option value="">Role</option>
                    </select>
                    <button onclick="openModal()" class="w-full sm:w-auto bg-emerald-600 hover:bg-emerald-700 text-white px-6 py-2 rounded-lg flex items-center justify-center space-x-2 transition-colors">
                        <i class="fas fa-plus"></i>
                        <span>Tambah Pengguna</span>
                    </button>
                </div>
            </div>
        </div>

        <!-- Users Table -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr class="bg-gray-50">
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kelas</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No Telepon</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Role</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">001</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <img class="h-8 w-8 rounded-full" src="http://127.0.0.1:8000/storage/profile.jpeg" alt="">
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">Budi Santoso</div>
                                        <div class="text-sm text-gray-500">Bergabung Sept 2023</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">budi.s@school.com</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">XI IPA 1</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">081234567890</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-emerald-100 text-emerald-800">
                                    Siswa
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-2">
                                <button onclick="openEditModal('001', 'Budi Santoso', 'budi.s@school.com', 'XI IPA 1', '081234567890', 'siswa')" class="text-amber-500 hover:text-amber-600 transition-colors">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="text-red-500 hover:text-red-600 transition-colors ml-auto" onclick="confirmDelete()">
                                    <i class="fas fa-trash"></i>
                                </button>

                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- Pagination -->
            <div class="bg-white px-4 py-3 flex items-center justify-between border-t border-gray-200 sm:px-6">
                <div class="flex-1 flex justify-between sm:hidden">
                    <button class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                        Previous
                    </button>
                    <button class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                        Next
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div id="createUserModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden overflow-y-auto h-full w-full">
        <div class="relative top-20 mx-auto p-5 border w-full max-w-xl shadow-lg rounded-lg bg-white">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-xl font-semibold text-gray-800">Tambah Pengguna Baru</h3>
                <button onclick="closeModal()" class="text-gray-600 hover:text-gray-800">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <form action="" method="POST">
                @csrf
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                        <input type="text" name="name" class="block w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:border-emerald-500" placeholder="Masukkan nama lengkap">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                        <input type="email" name="email" class="block w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:border-emerald-500" placeholder="Masukkan alamat email">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                        <input type="password" name="password" class="block w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:border-emerald-500" placeholder="Masukkan password">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Konfirmasi Password</label>
                        <input type="password" name="password_confirmation" class="block w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:border-emerald-500" placeholder="Konfirmasi password">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Peran</label>
                        <select name="role" class="block w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:border-emerald-500">
                            <option value="">Pilih peran</option>
                            <option value="admin">Admin</option>
                            <option value="guru">Guru</option>
                            <option value="konselor">Konselor</option>
                            <option value="siswa">Siswa</option>
                        </select>
                    </div>
                </div>

                <div class="flex gap-3 mt-6">
                    <button type="button" onclick="closeModal()" class="flex-1 px-4 py-2 text-sm text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50">
                        Batal
                    </button>
                    <button type="submit" class="flex-1 px-4 py-2 text-sm text-white bg-emerald-600 rounded-md hover:bg-emerald-700">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Edit User Modal -->
    <div id="editUserModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden overflow-y-auto h-full w-full">
        <div class="relative top-20 mx-auto p-5 border w-full max-w-xl shadow-lg rounded-lg bg-white">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-xl font-semibold text-gray-800">Edit Pengguna</h3>
                <button onclick="closeEditModal()" class="text-gray-600 hover:text-gray-800">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <form action="" method="POST" id="editUserForm">
                @csrf
                @method('PUT')
                <input type="hidden" id="editUserId" name="id">
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                        <input type="text" id="editName" name="name" class="block w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:border-emerald-500">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                        <input type="email" id="editEmail" name="email" class="block w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:border-emerald-500">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Kelas</label>
                        <input type="text" id="editClass" name="class" class="block w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:border-emerald-500">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">No Telepon</label>
                        <input type="text" id="editPhone" name="phone" class="block w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:border-emerald-500">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Peran</label>
                        <select id="editRole" name="role" class="block w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:border-emerald-500">
                            <option value="admin">Admin</option>
                            <option value="guru">Guru</option>
                            <option value="konselor">Konselor</option>
                            <option value="siswa">Siswa</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Password Baru (Opsional)</label>
                        <input type="password" name="password" class="block w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:border-emerald-500" placeholder="Kosongkan jika tidak ingin mengubah password">
                    </div>
                </div>

                <div class="flex gap-3 mt-6">
                    <button type="button" onclick="closeEditModal()" class="flex-1 px-4 py-2 text-sm text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50">
                        Batal
                    </button>
                    <button type="submit" class="flex-1 px-4 py-2 text-sm text-white bg-emerald-600 rounded-md hover:bg-emerald-700">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function confirmDelete() {
            Swal.fire({
                title: "Apakah Anda yakin?",
                text: "Data yang dihapus tidak dapat dikembalikan!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Ya, hapus!"
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire("Dihapus!", "Data telah dihapus.", "success");
                }
            });
        }
    </script>

    <script>
        function openModal() {
            document.getElementById('createUserModal').classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeModal() {
            document.getElementById('createUserModal').classList.add('hidden');
            document.body.style.overflow = 'auto';
        }

        // Close modal when clicking outside
        document.getElementById('createUserModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeModal();
            }
        });

        // Existing modal functions...

        function openEditModal(id, name, email, className, phone, role) {
            // Populate the form with existing data
            document.getElementById('editUserId').value = id;
            document.getElementById('editName').value = name;
            document.getElementById('editEmail').value = email;
            document.getElementById('editClass').value = className;
            document.getElementById('editPhone').value = phone;
            document.getElementById('editRole').value = role;

            // Show the modal
            document.getElementById('editUserModal').classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeEditModal() {
            document.getElementById('editUserModal').classList.add('hidden');
            document.body.style.overflow = 'auto';
        }

        // Close modal when clicking outside
        document.getElementById('editUserModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeEditModal();
            }
        });
    </script>

</body>

</html>