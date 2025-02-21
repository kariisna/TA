<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penjadwalan Konseling</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js"></script>
</head>
<body class="bg-gray-50 min-h-screen">
    <!-- Navigation with enhanced shadow and transition -->
    <nav class="bg-white shadow-md border-b sticky top-0 z-30 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <div class="flex items-center">
                        <a href="{{ route('admin.dashboard') }}" class="text-gray-600 hover:text-gray-900 flex items-center gap-2 px-4 py-2 rounded-lg text-sm font-medium transition-colors duration-200 hover:bg-gray-100">
                            <i class="fas fa-arrow-left"></i>
                            <span>Kembali ke Dashboard</span>
                        </a>
                    </div>
                </div>
                <div class="flex items-center gap-4">
                    <div class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-gray-100 transition-colors duration-200 cursor-pointer">
                        <img class="h-8 w-8 rounded-full ring-2 ring-emerald-500" src="http://127.0.0.1:8000/storage/profile.jpeg" alt="User Profile">
                        <span class="text-sm font-medium text-gray-700">Admin</span>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Enhanced Header Stats -->
        <div class="mb-8">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-3xl font-bold text-gray-900">Penjadwalan Konseling</h1>
                <div class="text-sm text-gray-500">
                    <i class="fas fa-calendar-alt mr-2"></i>
                    <span>21 Februari 2025</span>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                <!-- Enhanced stat cards with hover effects -->
                <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100 hover:shadow-md transition-all duration-300 cursor-pointer">
                    <div class="flex items-center">
                        <div class="p-3 bg-yellow-100 rounded-lg">
                            <i class="fas fa-clock text-yellow-600 text-xl"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-500">Menunggu</p>
                            <p class="text-2xl font-semibold text-gray-900">4</p>
                        </div>
                    </div>
                </div>
                <!-- Similar enhancements for other stat cards -->
                <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100 hover:shadow-md transition-all duration-300 cursor-pointer">
                    <div class="flex items-center">
                        <div class="p-3 bg-blue-100 rounded-lg">
                            <i class="fas fa-spinner text-blue-600 text-xl"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-500">Berlangsung</p>
                            <p class="text-2xl font-semibold text-gray-900">2</p>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100 hover:shadow-md transition-all duration-300 cursor-pointer">
                    <div class="flex items-center">
                        <div class="p-3 bg-green-100 rounded-lg">
                            <i class="fas fa-check text-green-600 text-xl"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-500">Selesai</p>
                            <p class="text-2xl font-semibold text-gray-900">3</p>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100 hover:shadow-md transition-all duration-300 cursor-pointer">
                    <div class="flex items-center">
                        <div class="p-3 bg-red-100 rounded-lg">
                            <i class="fas fa-times text-red-600 text-xl"></i>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-500">Dibatalkan</p>
                            <p class="text-2xl font-semibold text-gray-900">1</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Enhanced Search & Filter Bar -->
        <div class="bg-white rounded-xl shadow-sm p-6 mb-8 border border-gray-100">
            <div class="flex flex-col sm:flex-row justify-between items-center gap-4">
                <div class="relative w-full sm:w-96">
                    <input type="text" 
                           placeholder="Cari berdasarkan nama atau kelas..." 
                           class="w-full pl-12 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-all duration-200">
                    <i class="fas fa-search absolute left-4 top-1/2 -translate-y-1/2 text-gray-400"></i>
                </div>
                <div class="flex gap-4 w-full sm:w-auto">
                    <button class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 transition-colors duration-200">
                        <i class="fas fa-filter mr-2"></i>
                        Filter
                    </button>
                    <button id="openModalBtn" class="inline-flex items-center px-4 py-2 bg-emerald-600 hover:bg-emerald-700 text-white font-medium rounded-lg transition-colors duration-200 text-sm">
                        <i class="fas fa-plus mr-2"></i>
                        Tambah Jadwal
                    </button>
                </div>
            </div>
        </div>

        <!-- Enhanced Tabs -->
        <div class="border-b border-gray-200 mb-8">
            <nav class="-mb-px flex space-x-8" aria-label="Tabs">
                <button class="border-emerald-500 text-emerald-600 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm hover:text-emerald-700 transition-colors duration-200">
                    Semua Jadwal
                </button>
                <button class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm transition-all duration-200">
                    Hari Ini
                </button>
                <button class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm transition-all duration-200">
                    Minggu Ini
                </button>
            </nav>
        </div>

        <!-- Modal -->
        <div id="scheduleModal" class="fixed inset-0 z-50 hidden overflow-y-auto">
            <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:p-0">
                <div class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-75" id="modalOverlay"></div>

                <div class="relative inline-block p-8 overflow-hidden text-left align-bottom transition-all transform bg-white rounded-xl shadow-xl sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-xl font-semibold text-gray-900">Tambah Jadwal Konseling</h3>
                        <button type="button" class="text-gray-400 hover:text-gray-500" id="closeModal">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>

                    <form id="scheduleForm" class="space-y-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Nama Siswa</label>
                            <input type="text" name="student_name" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500" required>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Kelas</label>
                            <select name="class" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500" required>
                                <option value="">Pilih Kelas</option>
                                <option value="X IPA 1">X IPA 1</option>
                                <option value="X IPA 2">X IPA 2</option>
                                <option value="X IPS 1">X IPS 1</option>
                                <option value="X IPS 2">X IPS 2</option>
                                <option value="XI IPA 1">XI IPA 1</option>
                                <option value="XI IPA 2">XI IPA 2</option>
                                <option value="XI IPS 1">XI IPS 1</option>
                                <option value="XI IPS 2">XI IPS 2</option>
                                <option value="XII IPA 1">XII IPA 1</option>
                                <option value="XII IPA 2">XII IPA 2</option>
                                <option value="XII IPS 1">XII IPS 1</option>
                                <option value="XII IPS 2">XII IPS 2</option>
                            </select>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Tanggal</label>
                                <input type="date" name="date" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500" required>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Waktu</label>
                                <input type="time" name="time" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500" required>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Durasi</label>
                            <select name="duration" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500" required>
                                <option value="30">30 Menit</option>
                                <option value="45">45 Menit</option>
                                <option value="60">60 Menit</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Catatan (Opsional)</label>
                            <textarea name="notes" rows="3" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500"></textarea>
                        </div>

                        <div class="flex justify-end gap-3 mt-8">
                            <button type="button" class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors duration-200" id="cancelBtn">
                                Batal
                            </button>
                            <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-emerald-600 border border-transparent rounded-lg hover:bg-emerald-700 transition-colors duration-200">
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Modal functionality
        const modal = document.getElementById('scheduleModal');
        const openModalBtn = document.getElementById('openModalBtn');
        const closeModal = document.getElementById('closeModal');
        const cancelBtn = document.getElementById('cancelBtn');
        const modalOverlay = document.getElementById('modalOverlay');
        const scheduleForm = document.getElementById('scheduleForm');

        function showModal() {
            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

            function hideModal() {
                modal.classList.add('hidden');
                document.body.style.overflow = 'auto';
                scheduleForm.reset();
            }

            // Fix the event listeners
            openModalBtn.addEventListener('click', showModal);
            closeModal.addEventListener('click', hideModal);
            cancelBtn.addEventListener('click', hideModal);
            modalOverlay.addEventListener('click', hideModal);

            // Form submission handler
            scheduleForm.addEventListener('submit', function(e) {
                e.preventDefault();
                
                const formData = new FormData(scheduleForm);
                const data = Object.fromEntries(formData);
                
                // Add loading state to submit button
                const submitBtn = scheduleForm.querySelector('button[type="submit"]');
                submitBtn.disabled = true;
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Menyimpan...';
                
                // Simulate API call with setTimeout
                setTimeout(() => {
                    console.log('Submitted data:', data);
                    showNotification('Jadwal berhasil ditambahkan!', 'success');
                    hideModal();
                    submitBtn.disabled = false;
                    submitBtn.innerHTML = 'Simpan';
                    addNewScheduleCard(data);
                }, 1000);
            });

            // Memastikan script dijalankan setelah DOM sepenuhnya dimuat
            document.addEventListener('DOMContentLoaded', function() {
                // Menginisialisasi ulang event listener untuk tombol
                const openModalBtn = document.getElementById('openModalBtn');
                if (openModalBtn) {
                    openModalBtn.addEventListener('click', showModal);
                }
            });

        // Notification system
        function showNotification(message, type = 'success') {
            const notification = document.createElement('div');
            notification.className = `fixed top-4 right-4 px-6 py-3 rounded-lg shadow-lg z-50 transform transition-all duration-300 translate-y-0 flex items-center ${
                type === 'success' ? 'bg-green-500' : 'bg-red-500'
            } text-white`;
            
            notification.innerHTML = `
                <i class="fas ${type === 'success' ? 'fa-check-circle' : 'fa-exclamation-circle'} mr-2"></i>
                ${message}
            `;
            
            document.body.appendChild(notification);
            
            // Animate in
            setTimeout(() => {
                notification.style.transform = 'translateY(0)';
            }, 100);
            
            // Remove after 3 seconds
            setTimeout(() => {
                notification.style.transform = 'translateY(-100%)';
                setTimeout(() => {
                    notification.remove();
                }, 300);
            }, 3000);
        }

        // Function to add new schedule card to UI
        function addNewScheduleCard(data) {
            const pendingColumn = document.querySelector('.space-y-4');
            const newCard = document.createElement('div');
            
            const formattedDate = new Date(data.date + 'T' + data.time).toLocaleString('id-ID', {
                day: 'numeric',
                month: 'short',
                year: 'numeric',
                hour: '2-digit',
                minute: '2-digit'
            });
            
            newCard.className = 'bg-white border border-gray-200 rounded-xl p-4 hover:shadow-md transition-all cursor-pointer group opacity-0 transform translate-y-4';
            newCard.innerHTML = `
                <div class="flex items-center gap-3 mb-3">
                    <img src="/api/placeholder/40/40" alt="Student" class="w-10 h-10 rounded-full">
                    <div>
                        <h3 class="font-medium text-gray-900 group-hover:text-emerald-600 transition-colors">${data.student_name}</h3>
                        <p class="text-sm text-gray-500">${data.class}</p>
                    </div>
                </div>
                <div class="flex items-center gap-2 text-sm text-gray-500">
                    <i class="fas fa-calendar-alt text-emerald-500"></i>
                    <span>${formattedDate}</span>
                </div>
                <div class="mt-3 pt-3 border-t border-gray-100 flex justify-between items-center">
                    <span class="text-xs text-gray-500">${data.duration} menit</span>
                    <div class="flex gap-2">
                        <button class="p-1 text-gray-400 hover:text-emerald-500 transition-colors">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="p-1 text-gray-400 hover:text-red-500 transition-colors">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                </div>
            `;
            
            // Insert at the top of the pending column
            pendingColumn.insertBefore(newCard, pendingColumn.firstChild);
            
            // Update counter
            const counter = document.querySelector('.bg-yellow-100.text-yellow-800');
            const currentCount = parseInt(counter.textContent);
            counter.textContent = currentCount + 1;
            
            // Animate in
            setTimeout(() => {
                newCard.style.opacity = '1';
                newCard.style.transform = 'translateY(0)';
            }, 100);
        }

        // Form validation
        const inputs = scheduleForm.querySelectorAll('input[required], select[required]');
        inputs.forEach(input => {
            input.addEventListener('input', function() {
                if (this.value.trim() === '') {
                    this.classList.add('border-red-500');
                } else {
                    this.classList.remove('border-red-500');
                }
            });
        });

        // Add datepicker validation to prevent selecting past dates
        const dateInput = scheduleForm.querySelector('input[type="date"]');
        dateInput.min = new Date().toISOString().split('T')[0];

        // Add time input validation
        const timeInput = scheduleForm.querySelector('input[type="time"]');
        timeInput.addEventListener('change', function() {
            const selectedTime = this.value;
            const [hours, minutes] = selectedTime.split(':');
            
            // Restrict scheduling between 7 AM and 5 PM
            if (hours < 7 || hours >= 17) {
                showNotification('Jadwal hanya tersedia antara jam 07:00 - 17:00', 'error');
                this.value = '';
            }
        });

        // Initialize tabs functionality
        const tabs = document.querySelectorAll('nav button');
        tabs.forEach(tab => {
            tab.addEventListener('click', function() {
                // Remove active state from all tabs
                tabs.forEach(t => {
                    t.classList.remove('border-emerald-500', 'text-emerald-600');
                    t.classList.add('border-transparent', 'text-gray-500');
                });
                
                // Add active state to clicked tab
                this.classList.remove('border-transparent', 'text-gray-500');
                this.classList.add('border-emerald-500', 'text-emerald-600');
            });
        });
    </script>
</body>
</html>