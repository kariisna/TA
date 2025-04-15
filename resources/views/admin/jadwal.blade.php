<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penjadwalan Konseling</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body class="bg-gray-50 min-h-screen">
    <nav class="bg-white shadow-md border-b sticky top-0 z-30 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <div class="flex items-center">
                        <a href="{{ route('admin.dashboard') }}"
                            class="text-gray-600 hover:text-gray-900 flex items-center gap-2 px-4 py-2 rounded-lg text-sm font-medium transition-colors duration-200 hover:bg-gray-100">
                            <i class="fas fa-arrow-left"></i>
                            <span>Kembali ke Dashboard</span>
                        </a>
                    </div>
                </div>
                <div class="flex items-center gap-4">
                    <div
                        class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-gray-100 transition-colors duration-200 cursor-pointer">
                        <img class="h-8 w-8 rounded-full ring-2 ring-emerald-500"
                            src="http://127.0.0.1:8000/storage/profile.jpeg" alt="User Profile">
                        <span class="text-sm font-medium text-gray-700">Admin</span>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="bg-white rounded-xl shadow-sm p-6 mb-8 border border-gray-100">
            <div class="flex flex-col sm:flex-row justify-between items-center gap-4">
                <div>
                    <h1 class="font-semibold text-xl">Manajemen Jadwal Konseling</h1>
                </div>
                <button id="openModalBtn"
                    class="inline-flex items-center px-4 py-2 bg-emerald-600 hover:bg-emerald-700 text-white font-medium rounded-lg transition-colors duration-200 text-sm">
                    <i class="fas fa-plus mr-2"></i>
                    Tambah Jadwal
                </button>
            </div>
        </div>

        <!-- Flash Messages -->
        @if (session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded" role="alert">
                <p>{{ session('success') }}</p>
            </div>
        @endif

        <div class="border-b border-gray-200 mb-8">
            <nav class="-mb-px flex space-x-8" aria-label="Tabs">
                <a href="{{ route('jadwal.index') }}"
                    class="{{ request()->routeIs('jadwal.index') && !request()->routeIs('jadwal.today') && !request()->routeIs('jadwal.this-week') ? 'border-emerald-500 text-emerald-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300' }} whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm transition-all duration-200">
                    Semua Jadwal
                </a>
                <a href="{{ route('jadwal.today') }}"
                    class="{{ request()->routeIs('jadwal.today') ? 'border-emerald-500 text-emerald-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300' }} whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm transition-all duration-200">
                    Hari Ini
                </a>
                <a href="{{ route('jadwal.this-week') }}"
                    class="{{ request()->routeIs('jadwal.this-week') ? 'border-emerald-500 text-emerald-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300' }} whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm transition-all duration-200">
                    Minggu Ini
                </a>
            </nav>
        </div>

        <!-- Schedule Table -->
        <div class="bg-white shadow-sm rounded-xl overflow-hidden border border-gray-100">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Siswa
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Kelas
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Tanggal & Waktu
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Durasi
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Status
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Catatan
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($schedules as $schedule)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900">{{ $schedule->student->name }}</div>
                                    <div class="text-sm text-gray-500">{{ $schedule->student->email }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $schedule->student->kelas }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">
                                        {{ \Carbon\Carbon::parse($schedule->counseling_date)->format('d M Y') }}</div>
                                    <div class="text-sm text-gray-500">
                                        {{ \Carbon\Carbon::parse($schedule->counseling_time)->format('H:i') }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $schedule->duration }} Menit</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if ($schedule->status == 'scheduled')
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                            Dijadwalkan
                                        </span>
                                    @elseif($schedule->status == 'completed')
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            Selesai
                                        </span>
                                    @else
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                            Dibatalkan
                                        </span>
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-900 max-w-xs truncate">{{ $schedule->notes }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                    <div class="flex justify-center space-x-2">
                                        {{-- <button type="button" class="edit-btn text-indigo-600 hover:text-indigo-900"
                                            data-id="{{ $schedule->id }}">
                                            <i class="fas fa-edit"></i>
                                        </button> --}}

                                        <form id="delete-form-{{ $schedule->id }}"
                                            action="{{ route('jadwal.destroy', $schedule->id) }}"
                                            method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" onclick="confirmDelete({{ $schedule->id }})"
                                                class="text-red-600 hover:text-red-900">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>

                                        <div class="relative inline-block text-left" x-data="{ open: false }">
                                            <button @click="open = !open" type="button"
                                                class="text-gray-500 hover:text-gray-700">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </button>

                                            <div x-show="open" @click.away="open = false"
                                                class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 z-20">
                                                <div class="py-1" role="menu" aria-orientation="vertical">
                                                    @if ($schedule->status != 'completed')
                                                        <form
                                                            action="{{ route('jadwal.update-status', $schedule->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('PATCH')
                                                            <input type="hidden" name="status" value="completed">
                                                            <button type="submit"
                                                                class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                                                role="menuitem">
                                                                <i class="fas fa-check text-green-500 mr-2"></i> Tandai
                                                                Selesai
                                                            </button>
                                                        </form>
                                                    @endif

                                                    @if ($schedule->status != 'canceled')
                                                        <form
                                                            action="{{ route('jadwal.update-status', $schedule->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('PATCH')
                                                            <input type="hidden" name="status" value="canceled">
                                                            <button type="submit"
                                                                class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                                                role="menuitem">
                                                                <i class="fas fa-times text-red-500 mr-2"></i> Batalkan
                                                            </button>
                                                        </form>
                                                    @endif

                                                    @if ($schedule->status == 'canceled' || $schedule->status == 'completed')
                                                        <form
                                                            action="{{ route('jadwal.update-status', $schedule->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('PATCH')
                                                            <input type="hidden" name="status" value="scheduled">
                                                            <button type="submit"
                                                                class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                                                role="menuitem">
                                                                <i class="fas fa-calendar text-blue-500 mr-2"></i>
                                                                Jadwalkan Ulang
                                                            </button>
                                                        </form>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-6 py-10 text-center">
                                    <div class="text-gray-500">Tidak ada jadwal yang ditemukan</div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Modal -->
        <div id="scheduleModal" class="fixed inset-0 z-50 hidden overflow-y-auto">
            <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:p-0">
                <div class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-75" id="modalOverlay"></div>

                <div
                    class="relative inline-block p-8 overflow-hidden text-left align-bottom transition-all transform bg-white rounded-xl shadow-xl sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-xl font-semibold text-gray-900" id="modalTitle">Tambah Jadwal Konseling</h3>
                        <button type="button" class="text-gray-400 hover:text-gray-500" id="closeModal">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>

                    <form id="scheduleForm" action="{{ route('jadwal.store') }}" method="POST"
                        class="space-y-6">
                        @csrf
                        <div id="method-field"></div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Siswa</label>
                            <select id="student_id" name="student_id"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500"
                                required>
                                <option value="">-- Pilih Siswa --</option>
                                @foreach ($students as $student)
                                    <option value="{{ $student->id }}">{{ $student->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Kelas</label>
                            <input type="text" id="student_class"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-gray-100" readonly>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Tanggal</label>
                                <input type="date" name="counseling_date" id="counseling_date"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500"
                                    required>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Waktu</label>
                                <input type="time" name="counseling_time" id="counseling_time"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500"
                                    required>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Durasi</label>
                            <select name="duration" id="duration"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500"
                                required>
                                <option value="30">30 Menit</option>
                                <option value="45">45 Menit</option>
                                <option value="60">60 Menit</option>
                            </select>
                        </div>

                        <div id="status-field" class="hidden">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                            <select name="status" id="status"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500">
                                <option value="scheduled">Dijadwalkan</option>
                                <option value="completed">Selesai</option>
                                <option value="canceled">Dibatalkan</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Catatan (Opsional)</label>
                            <textarea name="notes" id="notes" rows="3"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500"></textarea>
                        </div>

                        <div class="flex justify-end gap-3 mt-8">
                            <button type="button"
                                class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors duration-200"
                                id="cancelBtn">
                                Batal
                            </button>
                            <button type="submit"
                                class="px-4 py-2 text-sm font-medium text-white bg-emerald-600 border border-transparent rounded-lg hover:bg-emerald-700 transition-colors duration-200">
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Modal elements
            const modal = document.getElementById('scheduleModal');
            const modalOverlay = document.getElementById('modalOverlay');
            const openModalBtn = document.getElementById('openModalBtn');
            const closeModal = document.getElementById('closeModal');
            const cancelBtn = document.getElementById('cancelBtn');
            const scheduleForm = document.getElementById('scheduleForm');
            const modalTitle = document.getElementById('modalTitle');
            const methodField = document.getElementById('method-field');
            const statusField = document.getElementById('status-field');

            // Student select
            const studentSelect = document.getElementById('student_id');
            const studentClass = document.getElementById('student_class');

            // Open modal for creating new schedule
            openModalBtn.addEventListener('click', function() {
                modalTitle.textContent = 'Tambah Jadwal Konseling';
                scheduleForm.action = "{{ route('jadwal.store') }}";
                methodField.innerHTML = '';
                statusField.classList.add('hidden');
                scheduleForm.reset();
                studentClass.value = '';
                modal.classList.remove('hidden');
            });

            // Close modal functions
            function hideModal() {
                modal.classList.add('hidden');
            }

            closeModal.addEventListener('click', hideModal);
            cancelBtn.addEventListener('click', hideModal);
            modalOverlay.addEventListener('click', hideModal);

            // Get student class when student is selected
            studentSelect.addEventListener('change', function() {
                const selectedStudentId = this.value;
                if (selectedStudentId) {
                    // Find student class from the options data
                    const students = JSON.parse('{{ json_encode($students) }}'.replace(/&quot;/g,
                        '"'));
                    const selectedStudent = students.find(student => student.id == selectedStudentId);
                    if (selectedStudent) {
                        studentClass.value = selectedStudent.kelas;
                    }
                } else {
                    studentClass.value = '';
                }
            });

            // Edit schedule
            const editButtons = document.querySelectorAll('.edit-btn');
            editButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const scheduleId = this.getAttribute('data-id');

                    // Get schedule data
                    fetch(`/jadwal/${scheduleId}/edit`)
                        .then(response => response.json())
                        .then(data => {
                            // Set form values
                            scheduleForm.action = `/jadwal/${scheduleId}`;
                            methodField.innerHTML =
                                '<input type="hidden" name="_method" value="PUT">';
                            modalTitle.textContent = 'Edit Jadwal Konseling';

                            // Set values
                            document.getElementById('student_id').value = data.student_id;
                            document.getElementById('student_class').value = data.student
                                .kelas;
                            document.getElementById('counseling_date').value = data
                                .counseling_date;
                            document.getElementById('counseling_time').value = data
                                .counseling_time;
                            document.getElementById('duration').value = data.duration;
                            document.getElementById('notes').value = data.notes;

                            // Show status field for editing
                            statusField.classList.remove('hidden');
                            document.getElementById('status').value = data.status;

                            // Show modal
                            modal.classList.remove('hidden');
                        })
                        .catch(error => {
                            console.error('Error:', error);
                        });
                });
            });

            // Delete confirmation using SweetAlert
            window.confirmDelete = function(scheduleId) {
                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: "Jadwal konseling ini akan dihapus secara permanen!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Submit the form if confirmed
                        document.getElementById(`delete-form-${scheduleId}`).submit();
                    }
                });
            };

            // Set minimum date for counseling date to today
            const today = new Date();
            const yyyy = today.getFullYear();
            const mm = String(today.getMonth() + 1).padStart(2, '0');
            const dd = String(today.getDate()).padStart(2, '0');
            const todayFormatted = `${yyyy}-${mm}-${dd}`;
            document.getElementById('counseling_date').min = todayFormatted;

            // Form validation
            scheduleForm.addEventListener('submit', function(e) {
                e.preventDefault();

                // Validate required fields
                const studentId = document.getElementById('student_id').value;
                const counselingDate = document.getElementById('counseling_date').value;
                const counselingTime = document.getElementById('counseling_time').value;

                if (!studentId || !counselingDate || !counselingTime) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Mohon lengkapi semua field yang diperlukan!'
                    });
                    return;
                }

                // If all validations pass, submit the form
                this.submit();
            });

            // Make Enter key work correctly in the modal
            modal.addEventListener('keydown', function(e) {
                if (e.key === 'Enter' && e.target.tagName !== 'TEXTAREA') {
                    e.preventDefault();
                    scheduleForm.dispatchEvent(new Event('submit'));
                }
            });

            // Close modal when pressing Escape key
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape' && !modal.classList.contains('hidden')) {
                    hideModal();
                }
            });
        });
    </script>
</body>
</html>