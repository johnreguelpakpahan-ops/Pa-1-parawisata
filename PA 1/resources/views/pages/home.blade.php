    @extends('layouts.app')

    @section('content')

<style>
    /* ==================== LOGO SECTION STYLE ==================== */
    .logo-container {
        position: fixed;
        top: 20px;
        left: 20px;
        z-index: 9999;
        display: flex;
        align-items: center;
        gap: 20px;
        background: rgba(0, 51, 102, 0.98);
        padding: 8px 24px;
        border-radius: 60px;
        backdrop-filter: blur(8px);
        box-shadow: 0 8px 25px rgba(0, 51, 102, 0.3);
        transition: all 0.3s cubic-bezier(0.2, 0.9, 0.4, 1.1);
        border: 1px solid rgba(255, 255, 255, 0.2);
    }
    
    .logo-container:hover {
        background: #0a4a7a;
        box-shadow: 0 12px 30px rgba(0, 51, 102, 0.4);
        transform: translateY(-2px);
    }
    
    .flag-logo-wrapper {
        display: flex;
        align-items: center;
        gap: 12px;
    }
    
    .flag-img {
        width: 100px;
        height: auto;
        border-radius: 6px;
        box-shadow: 0 3px 10px rgba(0,0,0,0.15);
        transition: transform 0.2s ease;
        border: 1px solid rgba(255,255,255,0.3);
    }
    
    .flag-img:hover {
        transform: scale(1.05);
    }
    
    .logo-divider {
        width: 2px;
        height: 35px;
        background: rgba(255,255,255,0.3);
        border-radius: 2px;
    }
    
    .del-logo-wrapper {
        display: flex;
        align-items: center;
        gap: 10px;
        cursor: pointer;
        transition: all 0.2s ease;
    }
    
    .del-logo-wrapper:hover {
        transform: scale(1.02);
    }
    
    .del-img {
        width: 50px;
        height: auto;
        border-radius: 8px;
        transition: transform 0.2s ease;
    }
    
    .del-img:hover {
        transform: scale(1.05);
    }
    
    .geotoba-wrapper {
        display: flex;
        align-items: center;
        gap: 12px;
    }
    
    .geotoba-text {
        font-size: 1.5rem;
        font-weight: 800;
        letter-spacing: 1px;
        color: white;
        font-family: 'Inter', 'Poppins', sans-serif;
        line-height: 1.2;
    }
    
    .geotoba-sub {
        font-size: 0.7rem;
        font-weight: 500;
        color: rgba(255,255,255,0.8);
        letter-spacing: 0.5px;
    }
    
    @media (max-width: 768px) {
        .logo-container {
            top: 12px;
            left: 12px;
            padding: 6px 18px;
            gap: 14px;
        }
        .flag-img {
            width: 60px;
        }
        .del-img {
            width: 35px;
        }
        .geotoba-text {
            font-size: 1.2rem;
        }
        .geotoba-sub {
            font-size: 0.6rem;
        }
        .logo-divider {
            height: 28px;
        }
    }
    
    @media (max-width: 576px) {
        .logo-container {
            padding: 5px 14px;
            gap: 10px;
        }
        .flag-img {
            width: 45px;
        }
        .del-img {
            width: 28px;
        }
        .geotoba-text {
            font-size: 0.9rem;
        }
        .geotoba-sub {
            font-size: 0.5rem;
        }
        .logo-divider {
            height: 24px;
        }
    }
    
    /* ==================== HERO SLIDER ==================== */
    .hero-section {
        height: 100vh;
        position: relative;
        overflow: hidden;
        margin-top: 0;
    }
    
    .slides-container {
        position: relative;
        width: 100%;
        height: 100%;
    }
    
    .slide {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        opacity: 0;
        transform: scale(1.05);
        transition: opacity 1.5s ease-in-out, transform 6s ease-out;
        z-index: 1;
    }
    
    .slide.active {
        opacity: 1;
        z-index: 2;
        transform: scale(1);
    }
    
    /* Overlay biru gradasi pada slide */
    .slide-1 { background-image: linear-gradient(rgba(0, 51, 102, 0.5), rgba(0, 102, 153, 0.3)), url('/image/meat/slide1.jpg'); }
    .slide-2 { background-image: linear-gradient(rgba(0, 51, 102, 0.5), rgba(0, 102, 153, 0.3)), url('/image/meat/slide2.jpg'); }
    .slide-3 { background-image: linear-gradient(rgba(0, 51, 102, 0.5), rgba(0, 102, 153, 0.3)), url('/image/meat/slide3.jpg'); }
    .slide-4 { background-image: linear-gradient(rgba(0, 51, 102, 0.5), rgba(0, 102, 153, 0.3)), url('/image/meat/slide4.jpg'); }
    .slide-5 { background-image: linear-gradient(rgba(0, 51, 102, 0.5), rgba(0, 102, 153, 0.3)), url('/image/meat/slide5.jpg'); }
    
    .hero-content {
        position: absolute;
        z-index: 10;
        bottom: 20%;
        left: 0;
        right: 0;
        text-align: center;
        color: white;
        padding: 0 20px;
    }
    
    .hero-subtitle {
        font-size: 0.7rem;
        letter-spacing: 0.35em;
        text-transform: uppercase;
        margin-bottom: 20px;
        font-weight: 300;
        opacity: 0.9;
        animation: fadeUp 0.8s ease;
    }
    
    .hero-title {
        font-size: 3.8rem;
        font-weight: 700;
        font-family: 'Cormorant Garamond', serif;
        line-height: 1.2;
        margin-bottom: 25px;
        color: white;
        text-shadow: 0 2px 15px rgba(0, 0, 0, 0.4);
        animation: fadeUp 0.8s ease 0.1s both;
    }
    
    .hero-divider {
        width: 60px;
        height: 2px;
        background: #c6a43b;
        margin: 0 auto 30px;
        animation: fadeUp 0.8s ease 0.2s both;
    }
    
    .hero-btn {
        display: inline-block;
        background: #c6a43b;
        color: #003366;
        padding: 14px 42px;
        font-size: 0.75rem;
        letter-spacing: 0.25em;
        text-transform: uppercase;
        transition: all 0.4s ease;
        text-decoration: none;
        font-weight: 600;
        border-radius: 40px;
        animation: fadeUp 0.8s ease 0.3s both;
        border: none;
        cursor: pointer;
    }
    
    .hero-btn:hover {
        background: white;
        color: #003366;
        transform: translateY(-3px);
        letter-spacing: 0.3em;
    }
    
    @keyframes fadeUp {
        from { opacity: 0; transform: translateY(40px); }
        to { opacity: 1; transform: translateY(0); }
    }
    
    /* Slider Dots */
    .slider-dots {
        position: absolute;
        bottom: 30px;
        left: 50%;
        transform: translateX(-50%);
        display: flex;
        gap: 12px;
        z-index: 15;
    }
    
    .dot {
        width: 10px;
        height: 10px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.5);
        cursor: pointer;
        transition: all 0.4s ease;
    }
    
    .dot.active {
        background: #c6a43b;
        width: 28px;
        border-radius: 10px;
    }
    
    .dot:hover {
        background: #c6a43b;
    }
    
    /* Scroll Indicator */
    .scroll-indicator {
        position: absolute;
        bottom: 30px;
        left: 50%;
        transform: translateX(-50%);
        z-index: 15;
        animation: bounce 2.5s infinite;
        cursor: pointer;
        color: white;
        font-size: 0.65rem;
        letter-spacing: 0.25em;
        text-transform: uppercase;
        opacity: 0.8;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 8px;
    }
    
    .scroll-indicator .line {
        width: 1px;
        height: 30px;
        background: white;
        margin-top: 5px;
    }
    
    @keyframes bounce {
        0%, 100% { transform: translateX(-50%) translateY(0); opacity: 0.8; }
        50% { transform: translateX(-50%) translateY(-10px); opacity: 0.4; }
    }
    
    /* ==================== SECTION UMUM ==================== */
    .section { padding: 90px 0; }
    .section-white { background: linear-gradient(135deg, #f0f7ff 0%, #e8f0fa 100%); }
    .section-light { background: linear-gradient(135deg, #e0ecf7 0%, #d4e4f2 100%); }
    .container { max-width: 1200px; margin: 0 auto; padding: 0 20px; }
    
    .section-title {
        text-align: center;
        margin-bottom: 60px;
    }
    .section-title h2 {
        font-size: 2.2rem;
        font-family: 'Cormorant Garamond', serif;
        font-weight: 500;
        margin-bottom: 15px;
        color: #003366;
    }
    .section-title .divider {
        width: 50px;
        height: 2px;
        background: #c6a43b;
        margin: 0 auto;
    }
    .section-title p {
        color: #2c5f8a;
        max-width: 550px;
        margin: 20px auto 0;
        font-size: 0.85rem;
        line-height: 1.6;
    }
    
    /* ==================== STATS ==================== */
    .stats-grid {
        display: flex;
        justify-content: space-between;
        text-align: center;
        flex-wrap: wrap;
        gap: 40px;
    }
    .stat-item { 
        flex: 1; 
        min-width: 100px; 
        transition: transform 0.3s ease;
        padding: 20px;
        background: rgba(0, 51, 102, 0.05);
        border-radius: 16px;
    }
    .stat-item:hover { 
        transform: translateY(-5px);
        background: rgba(0, 51, 102, 0.1);
    }
    .stat-number {
        font-size: 2.5rem;
        font-family: 'Cormorant Garamond', serif;
        font-weight: 600;
        color: #c6a43b;
        margin-bottom: 8px;
    }
    .stat-label {
        font-size: 0.65rem;
        letter-spacing: 0.2em;
        text-transform: uppercase;
        color: #003366;
        font-weight: 600;
    }
    
    /* ==================== ABOUT ==================== */
    .about-grid {
        display: flex;
        align-items: center;
        gap: 60px;
        flex-wrap: wrap;
    }
    .about-content { flex: 1; }
    .about-content h3 {
        font-size: 2rem;
        font-family: 'Cormorant Garamond', serif;
        font-weight: 500;
        margin-bottom: 20px;
        line-height: 1.3;
        color: #003366;
    }
    .about-content p {
        color: #2c5f8a;
        line-height: 1.8;
        margin-bottom: 20px;
        font-size: 0.9rem;
    }
    .about-image {
        flex: 1;
        border-radius: 12px;
        overflow: hidden;
        transition: transform 0.5s ease, box-shadow 0.3s ease;
        box-shadow: 0 10px 30px rgba(0, 51, 102, 0.15);
    }
    .about-image:hover { transform: scale(1.02); box-shadow: 0 20px 40px rgba(0, 51, 102, 0.25); }
    .about-image img { width: 100%; height: auto; display: block; }
    
    /* ==================== DESTINASI ==================== */
    .destinasi-list { display: flex; flex-direction: column; gap: 80px; }
    .destinasi-item {
        display: flex;
        align-items: center;
        gap: 60px;
        flex-wrap: wrap;
    }
    .destinasi-item.reverse { flex-direction: row-reverse; }
    .destinasi-image {
        flex: 1;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0, 51, 102, 0.15);
        transition: all 0.5s ease;
    }
    .destinasi-image:hover { transform: scale(1.02); box-shadow: 0 20px 40px rgba(0, 51, 102, 0.25); }
    .destinasi-image img { width: 100%; height: auto; display: block; transition: transform 0.5s ease; }
    .destinasi-content { flex: 1; }
    .destinasi-number {
        font-size: 0.7rem;
        letter-spacing: 0.2em;
        color: #c6a43b;
        margin-bottom: 12px;
        text-transform: uppercase;
        font-weight: 600;
    }
    .destinasi-content h3 {
        font-size: 2rem;
        font-family: 'Cormorant Garamond', serif;
        font-weight: 500;
        margin-bottom: 15px;
        color: #003366;
    }
    .destinasi-location {
        font-size: 0.7rem;
        letter-spacing: 0.1em;
        color: #2c5f8a;
        margin-bottom: 20px;
        text-transform: uppercase;
        font-weight: 500;
    }
    .destinasi-desc {
        color: #2c5f8a;
        line-height: 1.8;
        margin-bottom: 25px;
        font-size: 0.9rem;
    }
    .destinasi-tags {
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
        margin-bottom: 30px;
    }
    .destinasi-tags span {
        background: rgba(0, 51, 102, 0.1);
        padding: 5px 16px;
        font-size: 0.7rem;
        color: #003366;
        border-radius: 30px;
        transition: all 0.3s ease;
        cursor: pointer;
        font-weight: 500;
    }
    .destinasi-tags span:hover {
        background: #c6a43b;
        color: #003366;
        transform: translateY(-2px);
    }
    .destinasi-link {
        display: inline-block;
        border: 1px solid #c6a43b;
        color: #c6a43b;
        padding: 10px 28px;
        font-size: 0.7rem;
        letter-spacing: 0.15em;
        text-transform: uppercase;
        text-decoration: none;
        transition: all 0.4s ease;
        border-radius: 40px;
        background: transparent;
    }
    .destinasi-link:hover {
        background: #c6a43b;
        color: #003366;
        letter-spacing: 0.2em;
        transform: translateY(-2px);
    }
    
    /* ==================== GALLERY ==================== */
    .gallery-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 3px;
    }
    .gallery-item {
        position: relative;
        aspect-ratio: 1/1;
        overflow: hidden;
        cursor: pointer;
    }
    .gallery-item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.6s ease;
    }
    .gallery-item:hover img { transform: scale(1.05); }
    .gallery-item::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 51, 102, 0.5);
        opacity: 0;
        transition: opacity 0.3s ease;
    }
    .gallery-item:hover::after { opacity: 1; }
    
    /* ==================== CTA ==================== */
    .cta-section {
        background: linear-gradient(135deg, #003366 0%, #0a4a7a 50%, #005c8a 100%);
        padding: 80px 0;
        text-align: center;
        position: relative;
        overflow: hidden;
    }
    .cta-section::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba(255,255,255,0.05) 0%, transparent 70%);
        animation: rotate 20s linear infinite;
    }
    @keyframes rotate {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }
    .cta-content { 
        max-width: 600px; 
        margin: 0 auto;
        position: relative;
        z-index: 2;
    }
    .cta-content h3 {
        font-size: 2rem;
        font-family: 'Cormorant Garamond', serif;
        font-weight: 500;
        margin-bottom: 20px;
        color: white;
    }
    .cta-content .divider {
        width: 50px;
        height: 2px;
        background: #c6a43b;
        margin: 0 auto 25px;
    }
    .cta-content p {
        color: rgba(255, 255, 255, 0.8);
        margin-bottom: 35px;
        font-size: 0.9rem;
        line-height: 1.7;
    }
    .cta-btn {
        display: inline-block;
        background: #c6a43b;
        color: #003366;
        padding: 14px 42px;
        font-size: 0.75rem;
        letter-spacing: 0.2em;
        text-transform: uppercase;
        transition: all 0.4s ease;
        text-decoration: none;
        border-radius: 40px;
        font-weight: 600;
    }
    .cta-btn:hover {
        background: white;
        color: #003366;
        transform: translateY(-3px);
    }
    
    /* ==================== RESPONSIVE ==================== */
    @media (max-width: 992px) {
        .hero-title { font-size: 2.8rem; }
        .destinasi-item, .destinasi-item.reverse { flex-direction: column; gap: 30px; }
        .about-grid { flex-direction: column; text-align: center; }
        .gallery-grid { grid-template-columns: repeat(2, 1fr); }
    }
    @media (max-width: 768px) {
        .hero-title { font-size: 2rem; }
        .hero-subtitle { font-size: 0.6rem; letter-spacing: 0.2em; }
        .hero-btn { padding: 10px 28px; font-size: 0.65rem; }
        .section { padding: 60px 0; }
        .section-title h2 { font-size: 1.6rem; }
        .destinasi-content h3 { font-size: 1.6rem; }
        .stats-grid { flex-direction: column; align-items: center; gap: 25px; }
        .stat-number { font-size: 2rem; }
        .about-content h3 { font-size: 1.6rem; }
        .cta-content h3 { font-size: 1.6rem; }
        .cta-btn { padding: 10px 28px; font-size: 0.65rem; }
    }
    @media (max-width: 480px) {
        .hero-title { font-size: 1.6rem; }
        .hero-subtitle { font-size: 0.5rem; letter-spacing: 0.15em; }
        .dot { width: 8px; height: 8px; }
        .dot.active { width: 20px; }
    }
</style>

    <!-- ==================== LOGO SECTION ==================== -->
    <div class="logo-container">
        
        <!-- [GANTI_LINK_BENDERA] - Ganti dengan link gambar bendera Indonesia -->
        <div class="flag-logo-wrapper">
                <img src="data:image/jpeg;base64,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" 
                alt="Bendera Indonesia" 
                class="flag-img"
                title="Indonesia">
        </div>
        
        <div class="logo-divider"></div>
        
        <!-- [GANTI_LINK_DEL] - Ganti dengan link gambar logo D EL -->
        <div class="del-logo-wrapper">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcThY4yORALIvsjHi1T6lhDZogLcYcnjLfSZPQ&s"
                class="del-img"
                title="DDel">
        </div>
        
        <div class="logo-divider"></div>
        
        <!-- LOGO GEOTOBA -->
        <div class="geotoba-wrapper">
            <div style="display: flex; flex-direction: column; line-height: 1.2;">
                <span class="geotoba-text">GEOTOBA</span>
                <span class="geotoba-sub">Geopark Danau Toba</span>
            </div>
        </div>
        
    </div>

    <!-- ==================== HERO SLIDER ==================== -->
    <section class="hero-section" id="home">
        <div class="slides-container">
            <div class="slide slide-1 active"></div>
            <div class="slide slide-2"></div>
            <div class="slide slide-3"></div>
            <div class="slide slide-4"></div>
            <div class="slide slide-5"></div>
        </div>
        
        <div class="slider-dots">
            <div class="dot active" data-slide="0"></div>
            <div class="dot" data-slide="1"></div>
            <div class="dot" data-slide="2"></div>
            <div class="dot" data-slide="3"></div>
            <div class="dot" data-slide="4"></div>
        </div>
        
        <div class="hero-content">
            <div>
                <div class="hero-subtitle"> Global Geopark</div>
                <h1 class="hero-title"> BALIGE · MEAT · BATU BAHISAN<br>LIANG SIPEGE</h1>
                <div class="hero-divider"></div>
                <a href="#destinasi" class="hero-btn">Jelajahi Sekarang</a>
            </div>
        </div>
        
        <div class="scroll-indicator" onclick="document.getElementById('destinasi').scrollIntoView({behavior:'smooth'})">
            <span>SCROLL</span>
            <div class="line"></div>
        </div>
    </section>

    <!-- ==================== STATISTICS ==================== -->
    <section class="section section-white">
        <div class="container">
            <div class="stats-grid">
                <div class="stat-item" data-aos="fade-up">
                    <div class="stat-number">3</div>
                    <div class="stat-label">GEOSITES</div>
                </div>
                <div class="stat-item" data-aos="fade-up" data-aos-delay="100">
                    <div class="stat-number">74.000</div>
                    <div class="stat-label">TAHUN SEJARAH</div>
                </div>
                <div class="stat-item" data-aos="fade-up" data-aos-delay="200">
                    <div class="stat-number">15+</div>
                    <div class="stat-label">WARISAN BUDAYA</div>
                </div>
                <div class="stat-item" data-aos="fade-up" data-aos-delay="300">
                    <div class="stat-number">100+</div>
                    <div class="stat-label">UMKM LOKAL</div>
                </div>
            </div>
        </div>
    </section>

    <!-- ==================== ABOUT ==================== -->
    <section class="section section-light" id="about">
        <div class="container">
            <div class="about-grid">
                <div class="about-content" data-aos="fade-right">
                    <h3>Warisan Geologi Kelas Dunia</h3>
                    <p>Danau Toba, terbentuk dari letusan supervolcano 74.000 tahun lalu, adalah danau vulkanik terbesar di dunia. Diakui UNESCO sebagai Global Geopark pada tahun 2020.</p>
                    <p>Kawasan ini menyimpan nilai geologi luar biasa, keanekaragaman hayati, dan warisan budaya Batak yang autentik. Tiga geosite unggulan di Pulau Sibandang menanti Anda jelajahi.</p>
                </div>
                <div class="about-image" data-aos="fade-left">
                    <img src="/image/about-toba.jpg" alt="Danau Toba">
                </div>
            </div>
        </div>
    </section>

    <!-- ==================== DESTINASI ==================== -->
    <section id="destinasi" class="section section-white">
        <div class="container">
            <div class="section-title" data-aos="fade-up">
                <h2>Destinasi Unggulan</h2>
                <div class="divider"></div>
                <p>Tiga geosite di Pulau Sibandang, Caldera Danau Toba</p>
            </div>
            <div class="destinasi-list">
                
                <!-- MEAT -->
                <div class="destinasi-item" data-aos="fade-up">
                    <div class="destinasi-image">
                        <img src="/image/meat/meat-detail.jpg" alt="Meat">
                    </div>
                    <div class="destinasi-content">
                        <div class="destinasi-number">01 — GEOSITE</div>
                        <h3>Meat</h3>
                        <div class="destinasi-location">Pulau Sibandang, Danau Toba</div>
                        <p class="destinasi-desc">Desa adat yang kaya budaya Batak. Makam Opung Raja Hunsa, rumah adat tradisional, tarian Tortor, dan tenun ulos khas Meat.</p>
                        <div class="destinasi-tags">
                            <span>Makam Raja Hunsa</span>
                            <span>Tari Tortor</span>
                            <span>Tenun Ulos</span>
                            <span>Rumah Adat Batak</span>
                        </div>
                        <a href="{{ url('/geosite/meat') }}" class="destinasi-link">Jelajahi Lebih Lanjut →</a>
                    </div>
                </div>
                
                <!-- BATU BAHISAN -->
                <div class="destinasi-item reverse" data-aos="fade-up">
                    <div class="destinasi-image">
                        <img src="/image/meat/batu-detail.jpg" alt="Batu Bahisan">
                    </div>
                    <div class="destinasi-content">
                        <div class="destinasi-number">02 — GEOSITE</div>
                        <h3>Batu Bahisan</h3>
                        <div class="destinasi-location">Pulau Sibandang, Danau Toba</div>
                        <p class="destinasi-desc">Formasi batuan unik hasil erosi ribuan tahun. Spot favorit untuk sunrise, sunset, dan fotografi landscape.</p>
                        <div class="destinasi-tags">
                            <span>Formasi Batuan Unik</span>
                            <span>Spot Fotografi</span>
                            <span>Sunrise View</span>
                            <span>Sunset View</span>
                        </div>
                        <a href="{{ url('/geosite/batu-bahisan') }}" class="destinasi-link">Jelajahi Lebih Lanjut →</a>
                    </div>
                </div>
                
                <!-- LIANG SIPEGE -->
                <div class="destinasi-item" data-aos="fade-up">
                    <div class="destinasi-image">
                        <img src="/image/meat/liang-detail.jpg" alt="Liang Sipege">
                    </div>
                    <div class="destinasi-content">
                        <div class="destinasi-number">03 — GEOSITE</div>
                        <h3>Liang Sipege</h3>
                        <div class="destinasi-location">Pulau Sibandang, Danau Toba</div>
                        <p class="destinasi-desc">Goa alami dengan stalaktit dan stalakmit menakjubkan. Cocok untuk caving, eksplorasi, dan edukasi geologi.</p>
                        <div class="destinasi-tags">
                            <span>Goa Alami</span>
                            <span>Caving</span>
                            <span>Stalaktit dan Stalakmit</span>
                            <span>Edukasi Geologi</span>
                        </div>
                        <a href="{{ url('/geosite/liang-sipege') }}" class="destinasi-link">Jelajahi Lebih Lanjut →</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ==================== GALLERY ==================== -->
    <section class="section section-light">
        <div class="container">
            <div class="section-title" data-aos="fade-up">
                <h2>Galeri Keindahan</h2>
                <div class="divider"></div>
                <p>Momen terbaik dari Geosite Danau Toba</p>
            </div>
        </div>
        <div class="gallery-grid">
            <div class="gallery-item" data-aos="zoom-in">
                <img src="/image/galerihome/gallery-1.jpg" alt="Galeri 1">
            </div>
            <div class="gallery-item" data-aos="zoom-in" data-aos-delay="50">
                <img src="/image/galerihome/gallery-2.jpg" alt="Galeri 2">
            </div>
            <div class="gallery-item" data-aos="zoom-in" data-aos-delay="100">
                <img src="/image/galerihome/gallery-3.jpg" alt="Galeri 3">
            </div>
            <div class="gallery-item" data-aos="zoom-in" data-aos-delay="150">
                <img src="/image/galerihome/gallery-4.jpg" alt="Galeri 4">
            </div>
        </div>
    </section>

    <!-- ==================== CTA ==================== -->
    <section class="cta-section">
        <div class="container">
            <div class="cta-content" data-aos="fade-up">
                <h3>Mulai Petualangan Anda</h3>
                <div class="divider"></div>
                <p>Temukan keajaiban geologi dan kekayaan budaya Batak di Geopark Toba, warisan dunia yang diakui UNESCO.</p>
                <a href="#destinasi" class="cta-btn">Jelajahi Sekarang</a>
            </div>
        </div>
    </section>

    <script>
        // ==================== HERO SLIDER ====================
        let currentSlide = 0;
        const slides = document.querySelectorAll('.slide');
        const dots = document.querySelectorAll('.dot');
        let slideInterval;
        const slideCount = slides.length;

        function showSlide(index) {
            slides.forEach((slide, i) => {
                slide.classList.remove('active');
                if (dots[i]) dots[i].classList.remove('active');
            });
            
            slides[index].classList.add('active');
            if (dots[index]) dots[index].classList.add('active');
            currentSlide = index;
        }

        function nextSlide() {
            let next = (currentSlide + 1) % slideCount;
            showSlide(next);
        }

        function startSlider() {
            if (slideInterval) clearInterval(slideInterval);
            slideInterval = setInterval(nextSlide, 5000);
        }

        dots.forEach((dot, index) => {
            dot.addEventListener('click', () => {
                clearInterval(slideInterval);
                showSlide(index);
                startSlider();
            });
        });

        startSlider();

        // ==================== SMOOTH SCROLL ====================
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            });
        });
    </script>

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script>AOS.init({ duration: 800, once: true, offset: 50 });</script>

    @endsection