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
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white rounded-lg shadow p-8 flex items-center">
                    <div class="p-4 bg-blue-100 rounded-full">
                        <i class="fas fa-user-graduate text-blue-600 text-2xl"></i>
                    </div>
                    <div class="ml-6">
                        <p class="text-sm text-gray-500">Total Siswa</p>
                        <p class="text-3xl font-semibold text-gray-800">
                            {{ $users->where('role', 'student')->count() }}
                        </p>
                    </div>
                </div>
                <div class="bg-white rounded-lg shadow p-8 flex items-center">
                    <div class="p-4 bg-purple-100 rounded-full">
                        <i class="fas fa-chalkboard-teacher text-purple-600 text-2xl"></i>
                    </div>
                    <div class="ml-6">
                        <p class="text-sm text-gray-500">Total Guru</p>
                        <p class="text-3xl font-semibold text-gray-800">
                            {{ $users->where('role', 'teacher')->count() }}
                        </p>
                    </div>
                </div>
                <div class="bg-white rounded-lg shadow p-8 flex items-center">
                    <div class="p-4 bg-amber-100 rounded-full">
                        <i class="fas fa-user-shield text-amber-600 text-2xl"></i>
                    </div>
                    <div class="ml-6">
                        <p class="text-sm text-gray-500">Total Admin</p>
                        <p class="text-3xl font-semibold text-gray-800">
                            {{ $users->where('role', 'admin')->count() }}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tab Navigation -->
        <div class="mb-6 border-b border-gray-200">
            <ul class="flex flex-wrap -mb-px text-sm font-medium text-center">
                <li class="mr-2">
                    <a href="#" onclick="switchTab('all')" id="all-tab" class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 active-tab">
                        Semua Pengguna
                    </a>
                </li>
                <li class="mr-2">
                    <a href="#" onclick="switchTab('student')" id="student-tab" class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300">
                        Siswa
                    </a>
                </li>
                <li class="mr-2">
                    <a href="#" onclick="switchTab('teacher')" id="teacher-tab" class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300">
                        Guru
                    </a>
                </li>
                <li class="mr-2">
                    <a href="#" onclick="switchTab('admin')" id="admin-tab" class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300">
                        Admin
                    </a>
                </li>
            </ul>
        </div>

        <!-- Search and Add User Section -->
        <div class="flex justify-end items-center p-4 mb-6">
            <button onclick="openModal()" class="w-full sm:w-auto bg-emerald-600 hover:bg-emerald-700 text-white px-6 py-2 rounded-lg flex items-center justify-center space-x-2 transition-colors">
                <i class="fas fa-plus"></i>
                <span>Tambah Pengguna</span>
            </button>
        </div>

        <!-- Users Table -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="overflow-x-auto">
                <table id="usersTable" class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr class="bg-gray-50">
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Pengguna</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kelas</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No Telepon</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Role</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($users as $index => $user)
                        <tr data-role="{{ $user->role }}" class="hover:bg-gray-50 transition-colors user-row">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $index + 1 }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $user->username }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $user->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $user->email }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $user->kelas ?? '-' }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $user->no_hp ?? '-' }}</td>
                            <td class="px-6 py-4 whitespace-nowrap capitalize">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                    {{ $user->role == 'admin' ? 'bg-red-100 text-red-800' : '' }}
                                    {{ $user->role == 'teacher' ? 'bg-purple-100 text-purple-800' : '' }}
                                    {{ $user->role == 'student' ? 'bg-blue-100 text-blue-800' : '' }}">
                                    {{ $user->role }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-2">
                                <button onclick="openEditModal('{{ $user->id }}', '{{ $user->name }}', '{{ $user->username }}', '{{ $user->email }}', '{{ $user->kelas }}', '{{ $user->no_hp }}', '{{ $user->role }}')" class="text-amber-500 hover:text-amber-600 transition-colors">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button onclick="confirmDelete('{{ $user->id }}')" class="text-red-500 hover:text-red-600 transition-colors ml-2">
                                    <i class="fas fa-trash"></i>
                                </button>
                                <form id="delete-form-{{ $user->id }}" action="{{ route('admin.user.destroy', $user->id) }}" method="POST" class="hidden">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Create User Modal -->
    <div id="createUserModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden overflow-y-auto h-full w-full">
        <div class="relative top-20 mx-auto p-5 border w-full max-w-xl shadow-lg rounded-lg bg-white">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-xl font-semibold text-gray-800">Tambah Pengguna Baru</h3>
                <button onclick="closeModal()" class="text-gray-600 hover:text-gray-800">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <form action="{{ route('admin.user.store') }}" method="POST">
                @csrf
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                        <input type="text" name="name" class="block w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:border-emerald-500" placeholder="Masukkan nama lengkap" required>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Username</label>
                        <input type="text" name="username" class="block w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:border-emerald-500" placeholder="Masukkan username" required>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                        <input type="email" name="email" class="block w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:border-emerald-500" placeholder="Masukkan alamat email" required>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                        <input type="password" name="password" class="block w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:border-emerald-500" placeholder="Masukkan password" required>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Konfirmasi Password</label>
                        <input type="password" name="password_confirmation" class="block w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:border-emerald-500" placeholder="Konfirmasi password" required>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Peran</label>
                        <select name="role" id="createUserRole" class="block w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:border-emerald-500" required>
                            <option value="">Pilih peran</option>
                            <option value="admin">Admin</option>
                            <option value="teacher">Guru</option>
                            <option value="student">Siswa</option>
                        </select>
                    </div>

                    <div id="classField" class="hidden">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Kelas</label>
                        <input type="text" name="kelas" class="block w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:border-emerald-500" placeholder="Masukkan kelas">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">No Telepon</label>
                        <input type="text" name="no_hp" class="block w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:border-emerald-500" placeholder="Masukkan nomor telepon">
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
                        <input type="text" id="editName" name="name" class="block w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:border-emerald-500" required>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Username</label>
                        <input type="text" id="editUsername" name="username" class="block w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:border-emerald-500" required>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                        <input type="email" id="editEmail" name="email" class="block w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:border-emerald-500" required>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Kelas</label>
                        <input type="text" id="editClass" name="kelas" class="block w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:border-emerald-500">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">No Telepon</label>
                        <input type="text" id="editPhone" name="no_hp" class="block w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:border-emerald-500">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Peran</label>
                        <select id="editRole" name="role" class="block w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:border-emerald-500" required>
                            <option value="admin">Admin</option>
                            <option value="teacher">Guru</option>
                            <option value="student">Siswa</option>
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
        let activeTab = 'all';

        // Switch between tabs
        function switchTab(tabName) {
            // Update active tab
            activeTab = tabName;
            
            // Remove active class from all tabs
            document.querySelectorAll('a[id$="-tab"]').forEach(tab => {
                tab.classList.remove('text-emerald-600', 'border-emerald-600', 'active-tab');
                tab.classList.add('border-transparent');
            });
            
            // Add active class to selected tab
            const selectedTab = document.getElementById(`${tabName}-tab`);
            selectedTab.classList.add('text-emerald-600', 'border-emerald-600', 'active-tab');
            selectedTab.classList.remove('border-transparent');
            
            // Filter table rows
            filterRows(tabName);
        }

        function filterRows(role) {
            const rows = document.querySelectorAll('.user-row');
            
            rows.forEach(row => {
                const rowRole = row.getAttribute('data-role');
                if (role === 'all' || rowRole === role) {
                    row.classList.remove('hidden');
                } else {
                    row.classList.add('hidden');
                }
            });
        }

        function confirmDelete(userId) {
            Swal.fire({
                title: "Apakah Anda yakin?",
                text: "Data yang dihapus tidak dapat dikembalikan!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Ya, hapus!",
                cancelButtonText: "Batal"
            }).then((result) => {
                if (result.isConfirmed) {
                    // Submit the form after confirmation
                    document.getElementById(`delete-form-${userId}`).submit();
                    
                    // Show success message
                    Swal.fire(
                        "Terhapus!",
                        "Data pengguna telah dihapus.",
                        "success"
                    );
                }
            });
        }

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
        
        function openEditModal(id, name, username, email, className, phone, role) {
            // Set form action
            document.getElementById('editUserForm').action = `/admin/user/update/${id}`;
            // Populate the form with existing data
            document.getElementById('editUserId').value = id;
            document.getElementById('editName').value = name;
            document.getElementById('editUsername').value = username;
            document.getElementById('editEmail').value = email;
            document.getElementById('editClass').value = className || '';
            document.getElementById('editPhone').value = phone || '';
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

        // Show class field if role is student
        document.getElementById('createUserRole').addEventListener('change', function() {
            const classField = document.getElementById('classField');
            if (this.value === 'student') {
                classField.classList.remove('hidden');
            } else {
                classField.classList.add('hidden');
            }
        });

        // Initialize the first tab (All)
        document.addEventListener('DOMContentLoaded', function() {
            switchTab('all');
        });
    </script>

</body>

</html>