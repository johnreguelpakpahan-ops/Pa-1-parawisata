@extends('layouts.app')

@section('title', 'Destinasi ' . $kategori . ' - Geosite Danau Toba')

@section('content')

<style>
/* ================= LOGO ================= */
.logo-container {
    position: fixed;
    top: 20px; /* naik ke atas */
    left: 20px;
    z-index: 9999;
    left: 20px;
    z-index: 9999;
    display: flex;
    align-items: center;
    gap: 20px;
    background: rgba(255, 255, 255, 0.98);
    padding: 8px 24px;
    border-radius: 60px;
    backdrop-filter: blur(8px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
}

.flag-img { width: 100px; }
.del-img { width: 50px; }

.logo-divider {
    width: 2px;
    height: 35px;
    background: #e0e0e0;
}

.geotoba-text {
    font-size: 1.5rem;
    font-weight: 800;
    background: linear-gradient(135deg, #1a3c5e, #2c5f8a);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

.geotoba-sub {
    font-size: 0.7rem;
    color: #5a6e7c;
}

/* ================= HERO ================= */
.kategori-hero {
    height: 60vh;
    min-height: 450px;
    position: relative;
    overflow: hidden;
}

/* BACKGROUND IMAGE */
.hero-bg {
    position: absolute;
    width: 100%;
    height: 100%;
    background: url('https://images.unsplash.com/photo-1526779259212-939e64788e3c') center/cover no-repeat;
    transform: scale(1.05);
    animation: zoomHero 12s ease-in-out infinite alternate;
}

/* OVERLAY */
.hero-overlay {
    position: absolute;
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, rgba(0,0,0,0.8), rgba(0,0,0,0.4));
}

/* CONTENT */
.hero-content {
    position: relative;
    z-index: 10;
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    color: white;
    text-align: center;
}

.hero-badge {
    padding: 6px 20px;
    background: rgba(198,164,59,0.3);
    border-radius: 30px;
    margin-bottom: 15px;
    font-size: 0.7rem;
    letter-spacing: 3px;
}

.hero-content h1 {
    font-size: 3rem;
    font-weight: 800;
}

.hero-content p {
    max-width: 600px;
    opacity: 0.9;
}

/* BACK BUTTON */


/* ================= GRID ================= */
.destinasi-section {
    padding: 80px 0;
}

.destinasi-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 30px;
}

.dest-card {
    background: white;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    transition: 0.4s;
}

.dest-card:hover {
    transform: translateY(-10px);
}

.card-image img {
    width: 100%;
    height: 220px;
    object-fit: cover;
}

.card-content {
    padding: 20px;
}

.card-title {
    font-weight: 700;
}

.card-btn {
    border: 2px solid #c6a43b;
    padding: 8px 20px;
    border-radius: 30px;
    color: #c6a43b;
    text-decoration: none;
}

/* ANIMATION */
@keyframes zoomHero {
    from { transform: scale(1.05); }
    to { transform: scale(1.15); }
}
</style>

<!-- LOGO -->
<div class="logo-container">
    <img src="[GANTI_LINK_BENDERA]" class="flag-img">
    <div class="logo-divider"></div>
    <img src="[GANTI_LINK_DEL]" class="del-img">
    <div class="logo-divider"></div>
    <div>
        <div class="geotoba-text">GEOTOBA</div>
        <div class="geotoba-sub">Geopark Danau Toba</div>
    </div>
</div>

<!-- HERO -->
<section class="kategori-hero">

    <div class="hero-bg"></div>
    <div class="hero-overlay"></div>


    <div class="hero-content">
        <span class="hero-badge">{{ strtoupper($kategori) }}</span>
        <h1>Destinasi {{ $kategori }}</h1>
        <p>{{ $deskripsi }}</p>
    </div>

</section>

<!-- GRID -->
<section class="destinasi-section">
    <div class="container">
        <div class="destinasi-grid">

            @forelse($destinasi as $item)
            <div class="dest-card">
                <div class="card-image">
                    <img src="{{ $item['gambar'] ?? $item->gambar }}">
                </div>
                <div class="card-content">
                    <h3 class="card-title">{{ $item['nama'] ?? $item->nama }}</h3>
                    <p>{{ $item['deskripsi'] ?? $item->deskripsi }}</p>
                    <a href="{{ $item['url'] ?? $item->url }}" class="card-btn">Jelajahi</a>
                </div>
            </div>
            @empty
            <p>Tidak ada data</p>
            @endforelse

        </div>
    </div>
</section>

@endsection