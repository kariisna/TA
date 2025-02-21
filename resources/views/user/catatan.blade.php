<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WEB KONSUL - Catatan Sesi</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        :root {
            --primary-color: #75C9B7;
            --secondary-color: #5BA697;
            --light-bg: #F7FAFC;
            --dark-text: #2D3748;
            --light-text: #FFF;
            --border-radius: 8px;
            --card-shadow: 0 2px 8px rgba(0,0,0,0.06);
            --online-bg: #E3F2FD;
            --online-text: #1976D2;
            --offline-bg: #E8F5E9;
            --offline-text: #2E7D32;
        }
        body {
            background-color: var(--light-bg);
            color: var(--dark-text);
        }
        .header {
            background-color: var(--primary-color);
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .header h1 {
            color: var(--light-text);
            font-weight: 600;
            font-size: 24px;
            letter-spacing: 0.5px;
        }
        .user-profile {
            display: flex;
            align-items: center;
            color: var(--light-text);
        }
        .notification-icon {
            margin-right: 15px;
            position: relative;
        }
        .notification-dot {
            position: absolute;
            top: 0;
            right: 0;
            width: 8px;
            height: 8px;
            background-color: #F56565;
            border-radius: 50%;
        }
        .page-title {
            display: flex;
            align-items: center;
            margin: 30px 20px 20px;
        }
        .page-title .icon {
            background-color: var(--primary-color);
            width: 56px;
            height: 56px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            box-shadow: 0 3px 6px rgba(0,0,0,0.1);
            font-size: 24px;
            color: var(--light-text);
        }
        .search-filter-container {
            background-color: white;
            margin: 20px;
            padding: 25px;
            border-radius: var(--border-radius);
            box-shadow: var(--card-shadow);
        }
        .search-box {
            display: flex;
            margin-bottom: 20px;
        }
        .search-box input {
            flex: 1;
            padding: 12px 15px;
            border: 1px solid #e0e0e0;
            border-radius: var(--border-radius) 0 0 var(--border-radius);
            font-size: 14px;
            transition: border-color 0.2s;
        }
        .search-box input:focus {
            outline: none;
            border-color: var(--primary-color);
        }
        .search-box button {
            background-color: var(--primary-color);
            color: white;
            border: none;
            padding: 0 20px;
            border-radius: 0 var(--border-radius) var(--border-radius) 0;
            cursor: pointer;
            transition: background-color 0.2s;
        }
        .search-box button:hover {
            background-color: var(--secondary-color);
        }
        .filter-options {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
        }
        .filter-options select {
            padding: 10px 15px;
            border: 1px solid #e0e0e0;
            border-radius: var(--border-radius);
            min-width: 180px;
            font-size: 14px;
            appearance: none;
            background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%23333' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right 10px center;
            background-size: 16px;
            transition: border-color 0.2s;
        }
        .filter-options select:focus {
            outline: none;
            border-color: var(--primary-color);
        }
        .session-list {
            margin: 25px 20px;
        }
        .session-card {
            background-color: white;
            border-radius: var(--border-radius);
            padding: 22px;
            margin-bottom: 20px;
            box-shadow: var(--card-shadow);
            transition: transform 0.2s, box-shadow 0.2s;
            border-left: 4px solid var(--primary-color);
        }
        .session-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        .session-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }
        .session-title {
            font-weight: 600;
            font-size: 18px;
            color: var(--dark-text);
        }
        .session-type {
            display: inline-block;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: 500;
        }
        .session-type.online {
            background-color: var(--online-bg);
            color: var(--online-text);
        }
        .session-type.offline {
            background-color: var(--offline-bg);
            color: var(--offline-text);
        }
        .session-details {
            color: #666;
            margin-bottom: 18px;
            font-size: 14px;
            line-height: 1.6;
        }
        .session-details i {
            color: var(--primary-color);
            margin-right: 8px;
            width: 20px;
        }
        .session-summary {
            background-color: var(--light-bg);
            padding: 15px;
            border-radius: 6px;
            font-size: 14px;
            line-height: 1.6;
        }
        .pagination {
            display: flex;
            justify-content: center;
            margin: 35px 0;
        }
        .pagination button {
            border: 1px solid #e0e0e0;
            background-color: white;
            padding: 8px 14px;
            margin: 0 5px;
            border-radius: 4px;
            cursor: pointer;
            transition: all 0.2s;
            font-size: 14px;
        }
        .pagination button:hover:not(.active) {
            background-color: var(--light-bg);
        }
        .pagination button.active {
            background-color: var(--primary-color);
            color: white;
            border-color: var(--primary-color);
        }

        @media (max-width: 768px) {
            /* Mobile styles remain the same */
        }
        
        @media (max-width: 480px) {
            /* Mobile styles remain the same */
        }
    </style>
</head>
<body>
    <!-- Header -->
    <div class="header">
        <h1 > <a style="text-decoration: none; color: #ffffff" href="{{ route('user.dashboard') }}">WEB KONSUL</a></h1>
        <div class="user-profile">
            <div class="notification-icon">
                <i class="fas fa-bell"></i>
                <span class="notification-dot"></span>
            </div>
            <span>Sarah Putri</span>
            <i class="fas fa-chevron-down dropdown-icon" style="margin-left: 5px;"></i>
        </div>
    </div>

    <!-- Page Title -->
    <div class="page-title">
        <div class="icon">
            <i class="fas fa-clipboard-list"></i>
        </div>
        <h2>Catatan Sesi</h2>
    </div>

    <!-- Search and Filter -->
    <div class="search-filter-container">
        <div class="search-box">
            <input type="text" placeholder="Cari berdasarkan nama konselor atau kata kunci">
            <button><i class="fas fa-search"></i> Cari</button>
        </div>
        <div class="relative">
            <select id="filter-date" class="appearance-none bg-white border border-gray-300 rounded-md px-6 py-3 pr-10">
                <option value="">Filter Berdasarkan Tanggal</option>
                <option value="week">Minggu Ini</option>
                <option value="month">Bulan Ini</option>
                <option value="threemonths">3 Bulan Terakhir</option>
                <option value="year">Tahun Ini</option>
            </select>
            <select id="filter-counselor">
                <option value="">Filter Berdasarkan Konselor</option>
                <option value="dr-budi">Dr. Budi</option>
                <option value="dr-ani">Dr. Ani</option>
                <option value="dr-rini">Dr. Rini</option>
                <option value="dr-tono">Dr. Tono</option>
            </select>
            <select id="filter-type">
                <option value="">Filter Berdasarkan Jenis Sesi</option>
                <option value="online">Online</option>
                <option value="offline">Tatap Muka</option>
            </select>
           
        </div>

    <!-- Session List -->
    <div class="session-list">
        <!-- Session Card 1 -->
        <div class="session-card">
            <div class="session-header">
                <h3 class="session-title">Sesi dengan Dr. Budi</h3>
                <span class="session-type online">Online</span>
            </div>
            <div class="session-details">
                <p><i class="far fa-calendar-alt"></i> Kamis, 15 Februari 2025, 14:00 WIB</p>
                <p><i class="far fa-clock"></i> Durasi: 60 menit</p>
            </div>
            <div class="session-summary">
                <p><strong>Ringkasan:</strong> Diskusi mengenai strategi pengelolaan kecemasan dalam menghadapi ujian. Klien melaporkan perbaikan dalam pola tidur setelah menerapkan teknik relaksasi yang direkomendasikan pada sesi sebelumnya. Disetujui untuk melanjutkan latihan pernapasan dan menambahkan journaling harian.</p>
            </div>
        </div>

        <!-- Session Card 2 -->
        <div class="session-card">
            <div class="session-header">
                <h3 class="session-title">Sesi dengan Dr. Ani</h3>
                <span class="session-type offline">Tatap Muka</span>
            </div>
            <div class="session-details">
                <p><i class="far fa-calendar-alt"></i> Senin, 12 Februari 2025, 10:00 WIB</p>
                <p><i class="far fa-clock"></i> Durasi: 90 menit</p>
            </div>
            <div class="session-summary">
                <p><strong>Ringkasan:</strong> Evaluasi kemajuan dalam mengatasi konflik interpersonal di tempat kerja. Klien berhasil menerapkan teknik komunikasi asertif yang telah dibahas. Diidentifikasi beberapa pemicu stress baru terkait dengan perubahan tanggung jawab pekerjaan. Direncanakan untuk menyusun strategi coping yang lebih efektif untuk pertemuan berikutnya.</p>
            </div>
        </div>

        <!-- Session Card 3 -->
        <div class="session-card">
            <div class="session-header">
                <h3 class="session-title">Sesi dengan Dr. Rini</h3>
                <span class="session-type online">Online</span>
            </div>
            <div class="session-details">
                <p><i class="far fa-calendar-alt"></i> Jumat, 9 Februari 2025, 16:30 WIB</p>
                <p><i class="far fa-clock"></i> Durasi: 45 menit</p>
            </div>
            <div class="session-summary">
                <p><strong>Ringkasan:</strong> Pembahasan progres dalam membangun kebiasaan positif untuk mendukung kesehatan mental. Klien melaporkan konsistensi dalam rutinitas olahraga pagi dan meditasi. Tantangan masih ditemui dalam menjaga pola makan sehat saat berada dalam situasi sosial. Diberikan beberapa strategi dan sumber daya untuk mendukung pengambilan keputusan yang lebih baik terkait nutrisi.</p>
            </div>
        </div>

        <!-- Session Card 4 -->
        <div class="session-card">
            <div class="session-header">
                <h3 class="session-title">Sesi dengan Dr. Tono</h3>
                <span class="session-type offline">Tatap Muka</span>
            </div>
            <div class="session-details">
                <p><i class="far fa-calendar-alt"></i> Rabu, 7 Februari 2025, 13:00 WIB</p>
                <p><i class="far fa-clock"></i> Durasi: 60 menit</p>
            </div>
            <div class="session-summary">
                <p><strong>Ringkasan:</strong> Eksplorasi dinamika keluarga dan pengaruhnya terhadap pola pikir klien. Teridentifikasi beberapa core beliefs yang bersifat maladaptif dan pengalaman masa kecil yang mungkin berkontribusi. Dimulai proses reframing dan pengenalan konsep self-compassion. Klien menunjukkan keterbukaan terhadap pendekatan ini dan berkomitmen untuk melanjutkan refleksi di rumah.</p>
            </div>
        </div>
    </div>

    <!-- Pagination -->
    <div class="pagination">
        <button><i class="fas fa-chevron-left"></i></button>
        <button class="active">1</button>
        <button>2</button>
        <button>3</button>
        <button><i class="fas fa-chevron-right"></i></button>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const filterDate = document.getElementById('filter-date');
            const filterCounselor = document.getElementById('filter-counselor');
            const filterType = document.getElementById('filter-type');
            const searchButton = document.querySelector('.search-box button');
            
            function applyFilters() {
                console.log('Applied filters:');
                console.log('Date:', filterDate.value);
                console.log('Counselor:', filterCounselor.value);
                console.log('Session Type:', filterType.value);
                console.log('Search:', document.querySelector('.search-box input').value);
                
                // In a real application, this would trigger an API call or data filtering
                alert('Filter diterapkan! (Pada implementasi sebenarnya, ini akan memfilter data)');
            }
            
            searchButton.addEventListener('click', applyFilters);
        });
    </script>
</body>
</html>