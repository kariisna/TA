<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Konseling - Web Konsul</title>
    <style>
        :root {
            --primary-color: #75C9B7;
            --primary-dark: #5BA697;
            --primary-light: #A8DED3;
            --secondary-color: #e8e8e8;
            --text-color: #2D3748;
            --light-bg: #F7FAFC;
            --white: #ffffff;
            --success: #48BB78;
            --warning: #ED8936;
            --danger: #F56565;
            --info: #4299E1;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: var(--light-bg);
            color: var(--text-color);
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 24px;
        }

        /* Header Styles */
        .header {
            background-color: var(--primary-color);
            padding: 16px 24px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: var(--white);
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .logo h1 {
            font-size: 24px;
            letter-spacing: 0.5px;
        }

        .profile {
            display: flex;
            align-items: center;
            gap: 16px;
            font-weight: 500;
        }

        .notification-icon {
            position: relative;
            padding: 8px;
            cursor: pointer;
        }

        .notification-icon .badge {
            position: absolute;
            top: 4px;
            right: 4px;
            background-color: var(--danger);
            color: white;
            border-radius: 50%;
            width: 8px;
            height: 8px;
        }

        /* Page Title */
        .page-title {
            margin: 32px 0 24px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .page-title h2 {
            color: var(--text-color);
            font-size: 24px;
        }

        .btn-add {
            background-color: var(--primary-color);
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 8px;
            font-weight: 500;
            transition: background-color 0.2s;
        }

        .btn-add:hover {
            background-color: var(--primary-dark);
        }

        /* Tabs */
        .tabs {
            display: flex;
            margin-bottom: 24px;
            border-bottom: 2px solid var(--secondary-color);
        }

        .tab {
            padding: 12px 24px;
            cursor: pointer;
            border-bottom: 2px solid transparent;
            margin-bottom: -2px;
            color: var(--text-color);
            transition: all 0.2s;
        }

        .tab:hover {
            color: var(--primary-color);
        }

        .tab.active {
            border-bottom: 2px solid var(--primary-color);
            color: var(--primary-color);
            font-weight: 600;
        }

        /* Table Styles */
        .schedule-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            background-color: var(--white);
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0,0,0,0.06);
        }

        .schedule-table th,
        .schedule-table td {
            text-align: left;
            padding: 16px;
            border-bottom: 1px solid var(--secondary-color);
        }

        .schedule-table thead {
            background-color: var(--primary-color);
            color: var(--white);
        }

        .schedule-table thead th {
            font-weight: 600;
            letter-spacing: 0.5px;
        }

        .schedule-table tbody tr:hover {
            background-color: var(--light-bg);
        }

        /* Status Badges */
        .status {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: 500;
            text-align: center;
            display: inline-block;
        }

        .status-scheduled {
            background-color: var(--info);
            color: white;
        }

        .status-completed {
            background-color: var(--success);
            color: white;
        }

        .status-cancelled {
            background-color: var(--danger);
            color: white;
        }

        /* Actions */
        .actions {
            display: flex;
            gap: 8px;
        }

        .btn-action {
            background: none;
            border: none;
            cursor: pointer;
            color: var(--text-color);
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 4px;
            padding: 6px 12px;
            border-radius: 4px;
            transition: background-color 0.2s;
        }

        .btn-action:hover {
            background-color: var(--light-bg);
        }

        .btn-edit {
            color: var(--info);
        }

        .btn-cancel {
            color: var(--danger);
        }

        /* Modal */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.5);
            align-items: center;
            justify-content: center;
            z-index: 1000;
        }

        .modal-content {
            background-color: var(--white);
            padding: 24px;
            border-radius: 12px;
            width: 100%;
            max-width: 500px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
        }

        .modal-header h3 {
            color: var(--text-color);
            font-size: 20px;
        }

        .modal-header button {
            background: none;
            border: none;
            font-size: 20px;
            cursor: pointer;
            color: var(--text-color);
        }

        .modal-form {
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .form-group label {
            font-weight: 500;
            color: var(--text-color);
        }

        .form-group input,
        .form-group select {
            padding: 10px;
            border: 1px solid var(--secondary-color);
            border-radius: 6px;
            font-size: 14px;
            transition: border-color 0.2s;
        }

        .form-group input:focus,
        .form-group select:focus {
            outline: none;
            border-color: var(--primary-color);
        }

        .modal-footer {
            margin-top: 24px;
            display: flex;
            justify-content: flex-end;
            gap: 12px;
        }

        .modal-footer button {
            padding: 10px 20px;
            border-radius: 6px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.2s;
        }

        .modal-footer button[type="button"] {
            background: var(--secondary-color);
            border: none;
            color: var(--text-color);
        }

        .modal-footer button[type="submit"] {
            background: var(--primary-color);
            border: none;
            color: white;
        }

        .modal-footer button:hover {
            opacity: 0.9;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <div class="header">
        <div class="logo">
            <h1 > <a style="text-decoration: none; color: #ffffff" href="{{ route('user.dashboard') }}">WEB KONSUL</a></h1>
        </div>
        <div class="profile">
            <div class="notification-icon">
                <span class="badge"></span>
                <span>🔔</span>
            </div>
            <span>Sarah Putri</span>
        </div>
    </div>

    <div class="container">
        <!-- Page Title -->
        <div class="page-title">
            <h2>Jadwal Konseling</h2>
            <button class="btn-add" onclick="openModal()">
                <span>+</span> Tambah Jadwal Baru
            </button>
        </div>

        <!-- Tabs -->
        <div class="tabs">
            <div class="tab active" onclick="switchTab('upcoming')">Jadwal Mendatang</div>
            <div class="tab" onclick="switchTab('completed')">Jadwal Selesai</div>
        </div>

        <!-- Upcoming Schedules -->
        <div id="upcoming-schedules">
            <table class="schedule-table">
                <thead>
                    <tr>
                        <th>Nama Siswa</th>
                        <th>Konselor</th>
                        <th>Tanggal & Waktu</th>
                        <th>Jenis Sesi</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Ahmad Reza</td>
                        <td>Dr. Budi</td>
                        <td>15 Feb 2025, 14:00 WIB</td>
                        <td>Online</td>
                        <td><span class="status status-scheduled">Terjadwal</span></td>
                        <td class="actions">
                            <button class="btn-action btn-edit" onclick="editSchedule(1)">
                                ✏️ Edit
                            </button>
                            <button class="btn-action btn-cancel" onclick="cancelSchedule(1)">
                                ❌ Batalkan
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>Dina Pertiwi</td>
                        <td>Dr. Ani</td>
                        <td>19 Feb 2025, 10:00 WIB</td>
                        <td>Tatap Muka</td>
                        <td><span class="status status-scheduled">Terjadwal</span></td>
                        <td class="actions">
                            <button class="btn-action btn-edit" onclick="editSchedule(2)">
                                ✏️ Edit
                            </button>
                            <button class="btn-action btn-cancel" onclick="cancelSchedule(2)">
                                ❌ Batalkan
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>Budi Santoso</td>
                        <td>Dr. Maya</td>
                        <td>20 Feb 2025, 13:30 WIB</td>
                        <td>Tatap Muka</td>
                        <td><span class="status status-scheduled">Terjadwal</span></td>
                        <td class="actions">
                            <button class="btn-action btn-edit" onclick="editSchedule(3)">
                                ✏️ Edit
                            </button>
                            <button class="btn-action btn-cancel" onclick="cancelSchedule(3)">
                                ❌ Batalkan
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Completed Schedules (initially hidden) -->
        <div id="completed-schedules" style="display: none;">
            <table class="schedule-table">
                <thead>
                    <tr>
                        <th>Nama Siswa</th>
                        <th>Konselor</th>
                        <th>Tanggal & Waktu</th>
                        <th>Jenis Sesi</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Fitra Ramadhan</td>
                        <td>Dr. Budi</td>
                        <td>10 Feb 2025, 09:00 WIB</td>
                        <td>Online</td>
                        <td><span class="status status-completed">Selesai</span></td>
                        <td class="actions">
                            <button class="btn-action">
                                📋 Lihat Catatan
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>Lina Kusuma</td>
                        <td>Dr. Ani</td>
                        <td>08 Feb 2025, 11:00 WIB</td>
                        <td>Tatap Muka</td>
                        <td><span class="status status-completed">Selesai</span></td>
                        <td class="actions">
                            <button class="btn-action">
                                📋 Lihat Catatan
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>Rizky Pratama</td>
                        <td>Dr. Maya</td>
                        <td>05 Feb 2025, 14:30 WIB</td>
                        <td>Online</td>
                        <td><span class="status status-cancelled">Dibatalkan</span></td>
                        <td class="actions">
                            <button class="btn-action">
                                📋 Lihat Alasan
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Add/Edit Schedule Modal -->
    <div id="scheduleModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3 id="modalTitle">Tambah Jadwal Baru</h3>
                <button onclick="closeModal()">✕</button>
            </div>
            <form class="modal-form" id="scheduleForm">
                <div class="form-group">
                    <label for="student">Nama Siswa</label>
                    <input type="text" id="student" required>
                </div>
                <div class="form-group">
                    <label for="counselor">Konselor</label>
                    <select id="counselor" required>
                        <option value="">Pilih Konselor</option>
                        <option value="Dr. Budi">Dr. Budi</option>
                        <option value="Dr. Ani">Dr. Ani</option>
                        <option value="Dr. Maya">Dr. Maya</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="date">Tanggal</label>
                    <input type="date" id="date" required>
                </div>
                <div class="form-group">
                    <label for="time">Waktu</label>
                    <input type="time" id="time" required>
                </div>
                <div class="form-group">
                    <label for="sessionType">Jenis Sesi</label>
                    <select id="sessionType" required>
                        <option value="">Pilih Jenis Sesi</option>
                        <option value="Online">Online</option>
                        <option value="Tatap Muka">Tatap Muka</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="closeModal()">Batal</button>
                    <button type="submit">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function switchTab(tab) {
            const tabs = document.querySelectorAll('.tab');
            tabs.forEach(t => t.classList.remove('active'));
            
            if (tab === 'upcoming') {
                document.getElementById('upcoming-schedules').style.display = 'block';
                document.getElementById('completed-schedules').style.display = 'none';
                tabs[0].classList.add('active');
            } else {
                document.getElementById('upcoming-schedules').style.display = 'none';
                document.getElementById('completed-schedules').style.display = 'block';
                tabs[1].classList.add('active');
            }
        }

        function openModal(scheduleId = null) {
            const modal = document.getElementById('scheduleModal');
            const modalTitle = document.getElementById('modalTitle');
            
            if (scheduleId) {
                modalTitle.textContent = 'Edit Jadwal Konseling';
                // Here you would typically fetch the schedule data and populate the form
                // For demo purposes, we're not implementing this functionality
            } else {
                modalTitle.textContent = 'Tambah Jadwal Baru';
                document.getElementById('scheduleForm').reset();
            }
            
            modal.style.display = 'flex';
        }

        function closeModal() {
            document.getElementById('scheduleModal').style.display = 'none';
        }

        function editSchedule(id) {
            openModal(id);
        }

        function cancelSchedule(id) {
            if (confirm('Apakah Anda yakin ingin membatalkan jadwal ini?')) {
                // Here you would typically send a request to cancel the schedule
                alert('Jadwal berhasil dibatalkan');
            }
        }

        // Form submission handler
        document.getElementById('scheduleForm').addEventListener('submit', function(e) {
            e.preventDefault();
            // Here you would typically handle the form submission
            alert('Jadwal berhasil disimpan');
            closeModal();
        });

        // Close modal when clicking outside
        window.onclick = function(event) {
            const modal = document.getElementById('scheduleModal');
            if (event.target === modal) {
                closeModal();
            }
        }
    </script>
</body>
</html>