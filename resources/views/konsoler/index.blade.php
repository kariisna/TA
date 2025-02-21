<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Konselor - Website Konseling Siswa</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #000;
            --secondary-color: #1ad6ff;
            --accent-color: #f9a826;
            --text-dark: #333;
            --text-light: #f5f5f5;
            --background-light: #f9f9f9;
            --border-color: #e0e0e0;
            --success-color: #4CAF50;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: var(--background-light);
            color: var(--text-dark);
            line-height: 1.6;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Header Styles */
        header {
            background: linear-gradient(141deg, var(--primary-color), var(--secondary-color));
            color: var(--text-light);
            padding: 20px 0;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 1.8rem;
            font-weight: bold;
            display: flex;
            align-items: center;
        }

        .logo i {
            margin-right: 10px;
            font-size: 2rem;
        }

        nav ul {
            display: flex;
            list-style: none;
        }

        nav ul li {
            margin-left: 20px;
        }

        nav ul li a {
            color: var(--text-light);
            text-decoration: none;
            padding: 8px 15px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        nav ul li a:hover {
            background-color: rgba(255, 255, 255, 0.2);
        }

        .mobile-menu-toggle {
            display: none;
            background: none;
            border: none;
            color: var(--text-light);
            font-size: 1.5rem;
            cursor: pointer;
        }

        /* Main Content */
        main {
            padding: 40px 0;
        }

        /* Profile Section */
        .profile-section {
            display: flex;
            flex-wrap: wrap;
            margin-bottom: 40px;
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 3px 15px rgba(0, 0, 0, 0.1);
        }

        .profile-image {
            flex: 0 0 300px;
            position: relative;
            overflow: hidden;
        }

        .profile-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .profile-details {
            flex: 1;
            padding: 30px;
        }

        .profile-details h1 {
            color: var(--primary-color);
            margin-bottom: 10px;
        }

        .profile-details .specialty {
            color: var(--secondary-color);
            font-size: 1.1rem;
            margin-bottom: 20px;
        }

        .profile-details .bio {
            margin-bottom: 20px;
            line-height: 1.8;
        }

        .expertise-list {
            display: flex;
            flex-wrap: wrap;
            margin-top: 20px;
        }

        .expertise-badge {
            background-color: rgba(58, 123, 213, 0.1);
            color: var(--primary-color);
            padding: 5px 15px;
            border-radius: 20px;
            margin-right: 10px;
            margin-bottom: 10px;
            font-size: 0.9rem;
        }

        .counselor-stats {
            display: flex;
            margin-top: 30px;
            flex-wrap: wrap;
        }

        .stat-item {
            flex: 1;
            min-width: 120px;
            text-align: center;
            padding: 15px;
            margin: 0 5px 10px 0;
            background-color: rgba(58, 123, 213, 0.05);
            border-radius: 5px;
        }

        .stat-value {
            font-size: 1.5rem;
            font-weight: bold;
            color: var(--primary-color);
            margin-bottom: 5px;
        }

        .stat-label {
            font-size: 0.9rem;
            color: #666;
        }

        /* Tabs */
        .tabs {
            margin-bottom: 40px;
        }

        .tab-buttons {
            display: flex;
            background-color: white;
            border-radius: 8px 8px 0 0;
            overflow: hidden;
            border: 1px solid var(--border-color);
            border-bottom: none;
        }

        .tab-button {
            flex: 1;
            padding: 15px;
            background: none;
            border: none;
            cursor: pointer;
            font-size: 1rem;
            font-weight: 600;
            transition: background-color 0.3s;
            color: #666;
        }

        .tab-button.active {
            background-color: var(--primary-color);
            color: white;
        }

        .tab-content {
            background-color: white;
            padding: 30px;
            border-radius: 0 0 8px 8px;
            box-shadow: 0 3px 15px rgba(0, 0, 0, 0.1);
            border: 1px solid var(--border-color);
            min-height: 400px;
        }

        .tab-panel {
            display: none;
        }

        .tab-panel.active {
            display: block;
        }

        /* Schedule Tab */
        .week-selector {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .week-navigator {
            background: none;
            border: none;
            font-size: 1.5rem;
            color: var(--primary-color);
            cursor: pointer;
        }

        .current-week {
            font-size: 1.1rem;
            font-weight: 600;
        }

        .schedule-grid {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 10px;
            margin-bottom: 30px;
        }

        .schedule-day {
            border: 1px solid var(--border-color);
            border-radius: 8px;
            overflow: hidden;
        }

        .day-header {
            background-color: rgba(58, 123, 213, 0.1);
            padding: 10px;
            text-align: center;
            font-weight: 600;
        }

        .day-slots {
            padding: 10px;
        }

        .time-slot {
            padding: 8px;
            margin-bottom: 8px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            text-align: center;
        }

        .time-slot.available {
            background-color: rgba(76, 175, 80, 0.1);
            color: var(--success-color);
        }

        .time-slot.available:hover {
            background-color: rgba(76, 175, 80, 0.2);
        }

        .time-slot.booked {
            background-color: rgba(200, 200, 200, 0.3);
            color: #999;
            cursor: not-allowed;
        }

        /* Booking Form */
        .booking-form {
            max-width: 600px;
            margin: 0 auto;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
        }

        .form-control {
            width: 100%;
            padding: 12px;
            border: 1px solid var(--border-color);
            border-radius: 5px;
            font-size: 1rem;
        }

        textarea.form-control {
            min-height: 120px;
            resize: vertical;
        }

        .btn {
            display: inline-block;
            padding: 12px 24px;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.2s;
            text-align: center;
        }

        .btn-primary {
            background-color: var(--primary-color);
            color: white;
        }

        .btn-primary:hover {
            background-color: #2e69c0;
            transform: translateY(-2px);
        }

        /* Chat Tab */
        .chat-container {
            display: flex;
            flex-direction: column;
            height: 500px;
            border: 1px solid var(--border-color);
            border-radius: 8px;
            overflow: hidden;
        }

        .chat-header {
            padding: 15px;
            background-color: var(--primary-color);
            color: white;
            display: flex;
            align-items: center;
        }

        .chat-header .avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 15px;
            object-fit: cover;
        }

        .chat-history {
            flex: 1;
            padding: 20px;
            overflow-y: auto;
            background-color: #f5f7fa;
        }

        .message-group {
            margin-bottom: 20px;
        }

        .message {
            display: flex;
            margin-bottom: 10px;
        }

        .message.received {
            justify-content: flex-start;
        }

        .message.sent {
            justify-content: flex-end;
        }

        .message-bubble {
            max-width: 70%;
            padding: 12px 15px;
            border-radius: 18px;
            position: relative;
        }

        .message.received .message-bubble {
            background-color: white;
            border-bottom-left-radius: 5px;
            box-shadow: 0 1px 2px rgba(0,0,0,0.1);
        }

        .message.sent .message-bubble {
            background-color: var(--primary-color);
            color: white;
            border-bottom-right-radius: 5px;
            box-shadow: 0 1px 2px rgba(0,0,0,0.1);
        }

        .message-time {
            display: block;
            font-size: 0.75rem;
            margin-top: 5px;
            opacity: 0.7;
        }

        .chat-input {
            display: flex;
            padding: 15px;
            background-color: white;
            border-top: 1px solid var(--border-color);
        }

        .message-input {
            flex: 1;
            padding: 12px;
            border: 1px solid var(--border-color);
            border-radius: 30px;
            margin-right: 10px;
            font-size: 1rem;
        }

        .send-button {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background-color: var(--primary-color);
            color: white;
            border: none;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .send-button:hover {
            background-color: #2e69c0;
        }

        /* Reviews Section */
        .reviews {
            margin-top: 20px;
        }

        .review-card {
            background-color: white;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        .review-header {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }

        .reviewer-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            margin-right: 15px;
            object-fit: cover;
        }

        .reviewer-info {
            flex: 1;
        }

        .reviewer-name {
            font-weight: 600;
            margin-bottom: 5px;
        }

        .review-date {
            font-size: 0.85rem;
            color: #777;
        }

        .rating {
            display: flex;
            margin-bottom: 10px;
        }

        .star {
            color: var(--accent-color);
            margin-right: 2px;
        }

        .review-content {
            line-height: 1.7;
        }

        /* Footer */
        footer {
            background-color: var(--text-dark);
            color: var(--text-light);
            padding: 40px 0 20px;
        }

        .footer-content {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin-bottom: 30px;
        }

        .footer-section {
            flex: 1;
            min-width: 200px;
            margin-bottom: 20px;
            padding-right: 20px;
        }

        .footer-section h3 {
            margin-bottom: 15px;
            font-size: 1.2rem;
        }

        .footer-links li {
            margin-bottom: 10px;
            list-style: none;
        }

        .footer-links a {
            color: var(--text-light);
            opacity: 0.8;
            text-decoration: none;
            transition: opacity 0.3s;
        }

        .footer-links a:hover {
            opacity: 1;
        }

        .social-links {
            display: flex;
            margin-top: 15px;
        }

        .social-link {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 36px;
            height: 36px;
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            margin-right: 10px;
            transition: background-color 0.3s;
        }

        .social-link:hover {
            background-color: rgba(255, 255, 255, 0.2);
        }

        .copyright {
            text-align: center;
            padding-top: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            font-size: 0.9rem;
            opacity: 0.7;
        }

        /* Responsive Design */
        @media (max-width: 992px) {
            .profile-image {
                flex: 0 0 250px;
            }
        }

        @media (max-width: 768px) {
            .profile-section {
                flex-direction: column;
            }
            
            .profile-image {
                flex: 0 0 250px;
                height: 250px;
                margin: 0 auto;
            }
            
            .schedule-grid {
                grid-template-columns: repeat(3, 1fr);
            }
            
            nav ul {
                display: none;
                flex-direction: column;
                position: absolute;
                top: 70px;
                left: 0;
                right: 0;
                background-color: var(--primary-color);
                padding: 20px;
                z-index: 100;
            }
            
            nav ul.show {
                display: flex;
            }
            
            nav ul li {
                margin: 10px 0;
            }
            
            .mobile-menu-toggle {
                display: block;
            }
            
            .footer-content {
                flex-direction: column;
            }
        }

        @media (max-width: 576px) {
            .schedule-grid {
                grid-template-columns: repeat(1, 1fr);
            }
            
            .counselor-stats {
                flex-direction: column;
            }
            
            .stat-item {
                margin-bottom: 10px;
            }
            
            .profile-details {
                padding: 20px;
            }
        }

    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <div class="container header-content">
            <div class="logo">
                <i class="fas fa-hands-helping"></i>
                <span>KonselorSiswa</span>
            </div>
            <nav>
                <button class="mobile-menu-toggle" id="menuToggle">
                    <i class="fas fa-bars"></i>
                </button>
                <ul id="navMenu">
                    <li><a href="#"><i class="fas fa-home"></i> Beranda</a></li>
                    <li><a href="#"><i class="fas fa-users"></i> Konselor</a></li>
                    <li><a href="#"><i class="fas fa-book"></i> Artikel</a></li>
                    <li><a href="#"><i class="fas fa-question-circle"></i> FAQ</a></li>
                    <li><a href="#"><i class="fas fa-user"></i> Akun Saya</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container">
        <!-- Profile Section -->
        <section class="profile-section">
            <div class="profile-image">
                <img src="" alt="Budi Santoso">
            </div>
            <div class="profile-details">
                <h1>Budi Santoso, M.Psi.</h1>
                <div class="specialty">Psikolog Pendidikan & Konseling Remaja</div>
                <p class="bio">
                    Saya adalah seorang psikolog pendidikan berpengalaman dengan spesialisasi dalam konseling remaja dan anak. Dengan pengalaman lebih dari 10 tahun di berbagai sekolah dan lembaga pendidikan, saya berkomitmen untuk membantu siswa dalam mengatasi tantangan akademik, sosial, dan emosional mereka. Pendekatan saya berfokus pada membangun kepercayaan diri siswa, meningkatkan resiliensi, dan mengembangkan keterampilan hidup yang penting untuk kesuksesan jangka panjang.
                </p>
                <p class="bio">
                    Saya percaya bahwa setiap siswa memiliki potensi unik dan layak mendapatkan dukungan untuk mengembangkan diri mereka sepenuhnya. Saya menerapkan metode pendekatan yang beragam, termasuk terapi kognitif perilaku, mindfulness, dan terapi positif untuk membantu siswa mengatasi berbagai masalah seperti kecemasan, stres, konflik sosial, dan tantangan belajar.
                </p>
                <div class="expertise-list">
                    <span class="expertise-badge">Konseling Remaja</span>
                    <span class="expertise-badge">Masalah Pembelajaran</span>
                    <span class="expertise-badge">Motivasi Belajar</span>
                    <span class="expertise-badge">Kecemasan Akademik</span>
                    <span class="expertise-badge">Konflik Pertemanan</span>
                    <span class="expertise-badge">Pengembangan Diri</span>
                </div>
                <div class="counselor-stats">
                    <div class="stat-item">
                        <div class="stat-value">950+</div>
                        <div class="stat-label">Sesi Konseling</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-value">4.9/5</div>
                        <div class="stat-label">Rating</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-value">10+</div>
                        <div class="stat-label">Tahun Pengalaman</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-value">89%</div>
                        <div class="stat-label">Tingkat Keberhasilan</div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Tabs Section -->
        <section class="tabs">
            <div class="tab-buttons">
                <button class="tab-button active" data-tab="schedule">Jadwal Konseling</button>
                <button class="tab-button" data-tab="booking">Pesan Sesi</button>
                <button class="tab-button" data-tab="chat">Konsultasi Online</button>
                <button class="tab-button" data-tab="reviews">Ulasan</button>
            </div>
            <div class="tab-content">
                <!-- Schedule Tab -->
                <div class="tab-panel active" id="schedule">
                    <div class="week-selector">
                        <button class="week-navigator" id="prevWeek"><i class="fas fa-chevron-left"></i></button>
                        <span class="current-week">17 - 23 Februari 2025</span>
                        <button class="week-navigator" id="nextWeek"><i class="fas fa-chevron-right"></i></button>
                    </div>
                    <div class="schedule-grid">
                        <!-- Senin -->
                        <div class="schedule-day">
                            <div class="day-header">Senin, 17 Feb</div>
                            <div class="day-slots">
                                <div class="time-slot available">09:00 - 10:00</div>
                                <div class="time-slot available">10:30 - 11:30</div>
                                <div class="time-slot booked">13:00 - 14:00</div>
                                <div class="time-slot available">14:30 - 15:30</div>
                                <div class="time-slot booked">16:00 - 17:00</div>
                            </div>
                        </div>
                        <!-- Selasa -->
                        <div class="schedule-day">
                            <div class="day-header">Selasa, 18 Feb</div>
                            <div class="day-slots">
                                <div class="time-slot booked">09:00 - 10:00</div>
                                <div class="time-slot available">10:30 - 11:30</div>
                                <div class="time-slot available">13:00 - 14:00</div>
                                <div class="time-slot booked">14:30 - 15:30</div>
                                <div class="time-slot available">16:00 - 17:00</div>
                            </div>
                        </div>
                        <!-- Rabu -->
                        <div class="schedule-day">
                            <div class="day-header">Rabu, 19 Feb</div>
                            <div class="day-slots">
                                <div class="time-slot available">09:00 - 10:00</div>
                                <div class="time-slot booked">10:30 - 11:30</div>
                                <div class="time-slot available">13:00 - 14:00</div>
                                <div class="time-slot available">14:30 - 15:30</div>
                                <div class="time-slot available">16:00 - 17:00</div>
                            </div>
                        </div>
                        <!-- Kamis -->
                        <div class="schedule-day">
                            <div class="day-header">Kamis, 20 Feb</div>
                            <div class="day-slots">
                                <div class="time-slot available">09:00 - 10:00</div>
                                <div class="time-slot available">10:30 - 11:30</div>
                                <div class="time-slot booked">13:00 - 14:00</div>
                                <div class="time-slot booked">14:30 - 15:30</div>
                                <div class="time-slot available">16:00 - 17:00</div>
                            </div>
                        </div>
                        <!-- Jumat -->
                        <div class="schedule-day">
                            <div class="day-header">Jumat, 21 Feb</div>
                            <div class="day-slots">
                                <div class="time-slot booked">09:00 - 10:00</div>
                                <div class="time-slot available">10:30 - 11:30</div>
                                <div class="time-slot available">13:00 - 14:00</div>
                                <div class="time-slot available">14:30 - 15:30</div>
                                <div class="time-slot booked">16:00 - 17:00</div>
                            </div>
                        </div>
                        <!-- Sabtu -->
                        <div class="schedule-day">
                            <div class="day-header">Sabtu, 22 Feb</div>
                            <div class="day-slots">
                                <div class="time-slot available">09:00 - 10:00</div>
                                <div class="time-slot available">10:30 - 11:30</div>
                                <div class="time-slot available">13:00 - 14:00</div>
                                <div class="time-slot booked">14:30 - 15:30</div>
                                <div class="time-slot booked">16:00 - 17:00</div>
                            </div>
                        </div>
                        <!-- Minggu -->
                        <div class="schedule-day">
                            <div class="day-header">Minggu, 23 Feb</div>
                            <div class="day-slots">
                                <div class="time-slot booked">09:00 - 10:00</div>
                                <div class="time-slot available">10:30 - 11:30</div>
                                <div class="time-slot booked">13:00 - 14:00</div>
                                <div class="time-slot available">14:30 - 15:30</div>
                                <div class="time-slot available">16:00 - 17:00</div>
                            </div>
                        </div>
                    </div>
                    <p class="schedule-note" style="text-align: center; margin-top: 20px;">
                        <i class="fas fa-info-circle"></i> Klik pada slot waktu yang tersedia untuk melakukan pemesanan. <br>
                        <span style="color: var(--success-color);"><i class="fas fa-circle"></i> Tersedia</span> &nbsp;&nbsp;
                        <span style="color: #999;"><i class="fas fa-circle"></i> Sudah Dipesan</span>
                    </p>
                </div>

                <!-- Booking Tab -->
                <div class="tab-panel" id="booking">
                    <form class="booking-form">
                        <div class="form-group">
                            <label for="selected-date">Tanggal dan Waktu yang Dipilih</label>
                            <input type="text" id="selected-date" class="form-control" placeholder="Pilih dari jadwal tersedia" readonly>
                        </div>
                        <div class="form-group">
                            <label for="consultation-type">Jenis Konsultasi</label>
                            <select id="consultation-type" class="form-control">
                                <option value="">Pilih jenis konsultasi</option>
                                <option value="academic">Konsultasi Akademik</option>
                                <option value="personal">Konsultasi Pribadi</option>
                                <option value="career">Konsultasi Karir</option>
                                <option value="social">Konsultasi Sosial</option>
                                <option value="emotional">Konsultasi Emosional</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="consultation-mode">Mode Konsultasi</label>
                            <select id="consultation-mode" class="form-control">
                                <option value="">Pilih mode konsultasi</option>
                                <option value="video">Video Call</option>
                                <option value="audio">Audio Call</option>
                                <option value="chat">Chat</option>
                                <option value="in-person">Tatap Muka</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="concerns">Ceritakan Kekhawatiran atau Masalah Anda</label>
                            <textarea id="concerns" class="form-control" placeholder="Jelaskan masalah Anda agar konselor dapat mempersiapkan sesi dengan lebih baik..."></textarea>
                        </div>
                        <div class="form-group">
                            <label>Apakah Anda pernah berkonsultasi sebelumnya?</label>
                            <div style="display: flex; gap: 20px; margin-top: 10px;">
                                <label style="font-weight: normal;">
                                    <input type="radio" name="previous-consultation" value="yes"> Ya
                                </label>
                                <label style="font-weight: normal;">
                                    <input type="radio" name="previous-consultation" value="no"> Tidak
                                </label>
                            </div