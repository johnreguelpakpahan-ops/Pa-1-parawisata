@extends('layouts.app')

@section('title', 'Galeri - Geosite Danau Toba')

@section('content')

<style>
/* ===== STYLE KAMU TETAP ===== */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

.logo-container {
    position: fixed;
    top: 20px;
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

.galeri-hero {
    min-height: 400px;
    background: url('{{ asset("image/galeri.jpg") }}') center/contain no-repeat;
    background-color: #0d1b2a;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-top: 0px;
    position: relative;
}

.galeri-hero::before {
    content: '';
    position: absolute;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,0.5);
}

.galeri-hero > div { position: relative; z-index: 2; color: white; }

.container { max-width: 1100px; margin: auto; padding: 0 20px; }

.galeri-tabs {
    display: flex;
    justify-content: center;
    gap: 10px;
    flex-wrap: wrap;
    margin: 30px 0;
}

.tab-btn {
    border: none;
    padding: 8px 20px;
    border-radius: 30px;
    cursor: pointer;
    background: #eee;
}

.tab-btn.active {
    background: #c6a43b;
    color: white;
}

.galeri-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 15px;
}

.galeri-item {
    aspect-ratio: 1/1;
    overflow: hidden;
    border-radius: 10px;
}

.galeri-item img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

/* RESPONSIVE */
@media(max-width:768px){
    .galeri-grid{grid-template-columns:repeat(2,1fr);}
}
@media(max-width:576px){
    .galeri-grid{grid-template-columns:1fr;}
}
.logo-container {
    position: fixed;
    top: 20px;
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
    border: 1px solid rgba(255, 255, 255, 0.8);
}

.flag-img {
    width: 100px;
    height: auto;
    border-radius: 6px;
}

.logo-divider {
    width: 2px;
    height: 35px;
    background: #e0e0e0;
}

.del-img {
    width: 50px;
    height: auto;
    border-radius: 8px;
}

.geotoba-text {
    font-size: 1.5rem;
    font-weight: 800;
    letter-spacing: 1px;
    background: linear-gradient(135deg, #1a3c5e, #2c5f8a);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

.geotoba-sub {
    font-size: 0.7rem;
    font-weight: 500;
    color: #5a6e7c;
}
</style>

<div class="logo-container">
    <div>
        <img src="[GANTI_LINK_BENDERA]" alt="Bendera" class="flag-img">
    </div>
    <div class="logo-divider"></div>
    <div>
        <img src="[GANTI_LINK_DEL]" alt="D el" class="del-img">
    </div>
    <div class="logo-divider"></div>
    <div>
        <div class="geotoba-text">GEOTOBA</div>
        <div class="geotoba-sub">Geopark Danau Toba</div>
    </div>
</div>
<section class="galeri-hero">
    <div>
        <h1 data-aos="fade-up">Galeri Geosite</h1>
        <p data-aos="fade-up">Dokumentasi Geopark Danau Toba</p>
    </div>
</section>

<!-- TAB KATEGORI (FIX SAFE) -->
<div class="container">
    <div class="galeri-tabs">

        <button class="tab-btn active" data-tab="all">Semua</button>

        @foreach(($kategoriGaleri ?? []) as $kategori)
            <button class="tab-btn" data-tab="{{ $kategori }}">
                {{ $kategori }}
            </button>
        @endforeach

    </div>
</div>

<!-- GRID -->
<div class="container">
    <div class="galeri-grid" id="galeriGrid">

        @forelse($galeri ?? [] as $item)
            <div class="galeri-item" data-kategori="{{ $item->kategori }}">
                <img src="{{ asset($item->gambar) }}" alt="{{ $item->judul }}">
            </div>
        @empty
            <div style="grid-column:1/-1; text-align:center; padding:50px">
                Belum ada galeri
            </div>
        @endforelse

    </div>
</div>

<!-- LIGHTBOX -->
<div class="lightbox" id="lightbox">
    <img id="lightboxImg">
</div>

<script>
const items = document.querySelectorAll('.galeri-item');
const tabs = document.querySelectorAll('.tab-btn');

tabs.forEach(tab => {
    tab.addEventListener('click', function () {

        tabs.forEach(t => t.classList.remove('active'));
        this.classList.add('active');

        const filter = this.dataset.tab;

        items.forEach(item => {
            const kategori = item.dataset.kategori;

            if (filter === 'all' || kategori === filter) {
                item.style.display = 'block';
            } else {
                item.style.display = 'none';
            }
        });
    });
});

const lightbox = document.getElementById('lightbox');
const lightboxImg = document.getElementById('lightboxImg');

document.querySelectorAll('.galeri-item img').forEach(img => {
    img.addEventListener('click', () => {
        lightbox.style.display = 'flex';
        lightboxImg.src = img.src;
    });
});

lightbox.addEventListener('click', () => {
    lightbox.style.display = 'none';
});
</script>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
AOS.init({ duration: 700 });
</script>

@endsection