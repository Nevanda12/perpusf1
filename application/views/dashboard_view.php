<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<?php if($this->session->userdata('level') == 'Anggota'){ redirect(base_url('transaksi'));}?>

<style>
  /* 1. Background Halaman Utama */
  .content-wrapper {
    background-image: url('<?= base_url("assets_style/image/bukulonjong.jpeg"); ?>');
    background-size: cover;
    background-position: center center;
    background-attachment: fixed;
  }

  /* 2. Kustomisasi Warna Tulisan Header */
  .content-header h1 { color: #d7ccc8 !important; }
  .content-header h1 small { color: #b0bec5 !important; }
  .content-header .breadcrumb > li > a, 
  .content-header .breadcrumb > li { color: #d7ccc8 !important; }
  .content-header .breadcrumb > li.active { color: #bcaaa4 !important; }
  .content-header .breadcrumb > li > a > .fa { color: #d7ccc8 !important; }

  /* 3. CSS KUSTOM UNTUK KOTAK KERTAS */
  .kertas-custom {
    background-size: cover;
    color: #3e2723 !important;
    border: 1px solid #d7ccc8;
    box-shadow: 3px 3px 6px rgba(0,0,0,0.3);
  }
  .kertas-custom .small-box-footer {
    color: #3e2723 !important;
    background: rgba(0, 0, 0, 0.08) !important;
  }
  .kertas-custom .icon { color: rgba(62, 39, 35, 0.15) !important; }

  .kertas-merah { background-image: url('<?= base_url("assets_style/image/merah.jpg"); ?>'); background-color: #f8d7da; }
  .kertas-biru { background-image: url('<?= base_url("assets_style/image/ungu.jpg"); ?>'); background-color: #d1ecf1; }
  .kertas-kuning { background-image: url('<?= base_url("assets_style/image/kuning.jpg"); ?>'); background-color: #fff3cd; }
  .kertas-hijau { background-image: url('<?= base_url("assets_style/image/ijo.jpg"); ?>'); background-color: #d4edda; }

  /* =========================================================
     4. CSS UNTUK KUIS LITERASI (TAMPILAN BARU DIPERBAIKI)
     ========================================================= */
  
  /* Garis pembatas yang diperbaiki agar pasti muncul */
  .garis-pembatas {
    border: 0;
    height: 2px;
    background: linear-gradient(to right, transparent, rgba(255, 255, 255, 0.6), transparent);
    margin: 35px 0;
    position: relative;
  }
  .garis-pembatas::after {
    content: '✧'; /* Ornamen kecil di tengah garis */
    position: absolute;
    left: 50%;
    top: -12px;
    font-size: 20px;
    color: rgba(255, 255, 255, 0.6);
    transform: translateX(-50%);
  }

  /* --- MODIFIKASI KOTAK KUIS --- */
  .kuis-container {

  /* Tambahkan baris font-family di bawah ini (Pilih salah satu contoh di bawah) */
    font-family: 'Geneva', Tahoma, Geneva, Verdana, sans-serif;
    /* Tumpuk gambar latar belakang: Rakun di atas, Bintang di bawah */
    background-image: 
        url('<?= base_url("assets_style/image/rakun.png"); ?>'),
        url('<?= base_url("assets_style/image/bg_starry.jpg"); ?>');
    background-color: #2b3343; /* Fallback color */
    
    /* Ukuran spesifik untuk masing-masing: Contain untuk rakun, Cover untuk bintang */
    background-size: contain, cover; 
    
    /* Posisikan rakun di kiri, bintang di tengah */
    background-position: left center, center center; 
    
    /* Nonaktifkan pengulangan untuk keduanya */
    background-repeat: no-repeat, no-repeat;
    
    border-radius: 12px;
    padding: 30px;
    color: #ffffff;
    box-shadow: 0 8px 16px rgba(0,0,0,0.5);
    position: relative;
    border: 1px solid rgba(255,255,255,0.2);
    overflow: hidden; /* Tambahkan overflow hidden agar rakun tidak keluar container */
  }

  .kuis-layout {
    /* Hapus flex untuk memposisikan kuis-kanan secara absolut/dengan margin */
    /* display: flex;
    align-items: center;
    gap: 20px;
    flex-wrap: wrap; */
  }

  /* --- HAPUS .kuis-kiri SEPENUHNYA --- */
  /* .kuis-kiri {
    flex: 0 0 35%;
    display: flex;
    justify-content: center;
    align-items: center;
  }
  .kuis-kiri img {
    width: 100%;
    max-width: 320px;
    height: auto;
    object-fit: contain;
    filter: drop-shadow(0 10px 15px rgba(0,0,0,0.4));
  } */

  /* Kuis Kanan untuk Soal & Opsi - MODIFIKASI UNTUK POSISI */
  .kuis-kanan {
    /* Ubah dari flex-item menjadi block-item dengan margin */
    /* flex: 1;
    min-width: 55%; */
    
    /* Tentukan lebar kuis dan beri margin di kiri untuk rakun */
    width: 55%; /* Sesuaikan berdasarkan min-width asli */
    margin-left: auto; /* Dorong ke kanan sejauh mungkin */
    margin-right: 0;
    position: relative; /* Buat konteks penempatan untuk konten di dalamnya */
  }

  .kuis-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 15px;
  }
  .kuis-header h3 {
    font-family: 'Century Gothic', Sans-Serif;
    margin: 0; 
    font-size: 24px; 
    font-weight: normal; 
    letter-spacing: 1px; 
    text-transform: uppercase;
  }
  
  .skor-badge { 
    display: flex; 
    align-items: center; 
    gap: 15px; 
    text-align: right; 
  }
  .skor-badge-teks h4 { margin: 0; font-size: 18px; font-weight: normal; }
  .skor-badge-teks small { font-size: 13px; color: #a9b1c2; }
  .ikon-lencana { font-size: 38px; }

  .divider-kuis {
    border: 0;
    height: 1px;
    background: rgba(255, 255, 255, 0.2);
    margin: 15px 0 25px 0;
  }

  .soal-teks { font-size: 20px; margin-bottom: 25px; line-height: 1.4; }

  /* Grid untuk tombol opsi 2x2 */
  .grid-opsi {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 15px;
  }

  .btn-opsi {
    width: 100%;
    text-align: left;
    padding: 15px 20px;
    border: 1px solid rgba(255,255,255,0.2);
    border-radius: 8px;
    color: white;
    font-size: 16px;
    cursor: pointer;
    transition: transform 0.2s, filter 0.2s;
    box-shadow: inset 0 -3px 0 rgba(0,0,0,0.2); 
  }
  
  .btn-opsi:hover { transform: translateY(-2px); filter: brightness(1.1); }

  /* Warna Tombol Opsi Sesuai Gambar */
  .opsi-0 { background-color: #cd2e3e; } 
  .opsi-1 { background-color: #9b59b6; } 
  .opsi-2 { background-color: #f1c40f; color: #333; font-weight: bold;} 
  .opsi-3 { background-color: #359585; } 

  .notifikasi {
    padding: 15px;
    border-radius: 8px;
    margin-bottom: 20px;
    display: none;
    font-weight: bold;
    text-align: center;
    font-size: 16px;
  }
  .notif-benar { background-color: rgba(46, 204, 113, 0.95); border: 1px solid #27ae60; color: white;}
  .notif-salah { background-color: rgba(231, 76, 60, 0.95); border: 1px solid #c0392b; color: white;}

  .hasil-akhir {
    text-align: center;
    padding: 40px 0;
  }
  .hasil-akhir h2 { color: #f1c40f; font-size: 36px; margin-bottom: 10px; }
  .hasil-akhir p { font-size: 20px; }

  /* Responsif untuk layar HP kecil - DIPERBARUI */
  @media (max-width: 991px) {
    /* Setel ulang background-position untuk layar kecil agar kuis terlihat di atas rakun */
    .kuis-container {
        background-position: center top, center center; 
        background-size: contain, cover; 
    }

    .kuis-kanan {
        width: 100%;
        margin-left: 0;
        margin-top: 20px; /* Celah jika tumpang tindih */
    }
    
    .kuis-header { flex-direction: column; gap: 15px; }
    .skor-badge { text-align: center; justify-content: center; }
    .grid-opsi { grid-template-columns: 1fr; }
  }
</style>

<div class="content-wrapper">
  <section class="content-header">
    <h1>Dashboard <small>Control panel</small></h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <div class="col-lg-3 col-xs-6">
        <div class="small-box kertas-custom kertas-merah">
          <div class="inner">
            <h3><?= $count_pengguna;?></h3>
            <p>Anggota</p>
          </div>
          <div class="icon"><i class="fa fa-edit"></i></div>
          <a href="user" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <div class="col-lg-3 col-xs-6">
        <div class="small-box kertas-custom kertas-biru">
          <div class="inner">
            <h3><?= $count_buku;?></h3>
            <p>Jenis Buku</p>
          </div>
          <div class="icon"><i class="fa fa-book"></i></div>
          <a href="data" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div> 

      <div class="col-lg-3 col-xs-6">
        <div class="small-box kertas-custom kertas-kuning">
          <div class="inner">
            <h3><?= $count_pinjam;?></h3>
            <p>Pinjam</p>
          </div>
          <div class="icon"><i class="fa fa-user-plus"></i></div>
          <a href="transaksi" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <div class="col-lg-3 col-xs-6">
        <div class="small-box kertas-custom kertas-hijau">
          <div class="inner">
            <h3><?= $count_kembali;?></h3>
            <p>Di Kembalikan</p>
          </div>
          <div class="icon"><i class="fa fa-list"></i></div>
          <a href="transaksi/kembali" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
    </div>

    <div class="garis-pembatas"></div>

    <div class="row">
      <div class="col-md-12">
        <div class="kuis-container" id="kuisArea">
          
          <div class="kuis-layout">
            
            <div class="kuis-kanan">
              
              <div class="kuis-header" id="kuisHeader">
                <h3>TANTANGAN LITERASI HARI INI</h3>
                <div class="skor-badge">
                  <div class="skor-badge-teks">
                    <h4>Skor Literasi Anda: <span id="teksSkor">0</span></h4>
                    <small>Lencana Pembaca Pintar</small>
                  </div>
                  <div class="ikon-lencana">🎖️</div>
                </div>
              </div>

              <hr class="divider-kuis">

              <div id="notifikasiArea" class="notifikasi"></div>

              <div id="kontenKuis">
                <p class="soal-teks" id="teksSoal">Memuat pertanyaan...</p>
                <div class="grid-opsi" id="areaOpsi">
                  </div>
              </div>

            </div>

          </div> </div>
      </div>
    </div>

  </section>
</div>

<script>
  // DAFTAR PERTANYAAN
  const bankSoal = [
    {
    pertanyaan: "Novel 'Laskar Pelangi' ditulis oleh siapa?",
    opsi: ["A. Andrea Hirata", "B. Tere Liye", "C. Sapardi Djoko Damono", "D. Dee Lestari"],
    jawabanBenar: 0
  },
  {
    pertanyaan: "Siapa penulis novel legendaris 'Bumi Manusia'?",
    opsi: ["A. Ahmad Tohari", "B. Pramoedya Ananta Toer", "C. Chairil Anwar", "D. Raditya Dika"],
    jawabanBenar: 1
  },
  {
    pertanyaan: "Buku 'Hujan' merupakan karya fiksi dari penulis...?",
    opsi: ["A. Pidi Baiq", "B. Eka Kurniawan", "C. Tere Liye", "D. Ayu Utami"],
    jawabanBenar: 2
  },
  {
    pertanyaan: "Tempat yang digunakan untuk meminjam dan membaca buku disebut...?",
    opsi: ["A. Laboratorium", "B. Museum", "C. Perpustakaan", "D. Galeri"],
    jawabanBenar: 2
  },
  {
    pertanyaan: "Orang yang bertugas mengelola perpustakaan disebut...?",
    opsi: ["A. Editor", "B. Pustakawan", "C. Penulis", "D. Penerbit"],
    jawabanBenar: 1
  },
  {
    pertanyaan: "Apa fungsi utama katalog di perpustakaan?",
    opsi: ["A. Menghias rak", "B. Menentukan harga buku", "C. Membantu mencari koleksi", "D. Menulis isi buku"],
    jawabanBenar: 2
  },
  {
    pertanyaan: "Ilmu yang mempelajari makhluk hidup disebut...?",
    opsi: ["A. Fisika", "B. Kimia", "C. Biologi", "D. Astronomi"],
    jawabanBenar: 2
  },
  {
    pertanyaan: "Planet terbesar di Tata Surya adalah...?",
    opsi: ["A. Mars", "B. Jupiter", "C. Venus", "D. Saturnus"],
    jawabanBenar: 1
  },
  {
    pertanyaan: "Buku yang berisi kumpulan kata beserta artinya disebut...?",
    opsi: ["A. Novel", "B. Kamus", "C. Atlas", "D. Ensiklopedia"],
    jawabanBenar: 1
  },
  {
    pertanyaan: "Ensiklopedia biasanya digunakan untuk...?",
    opsi: ["A. Menulis surat", "B. Bermain", "C. Mencari informasi tentang berbagai topik", "D. Menggambar"],
    jawabanBenar: 2
  },
  {
    pertanyaan: "Siapa penulis seri novel Harry Potter?",
    opsi: ["A. J.R.R. Tolkien", "B. J.K. Rowling", "C. Dan Brown", "D. Rick Riordan"],
    jawabanBenar: 1
  },
  {
    pertanyaan: "Novel 'Negeri 5 Menara' ditulis oleh...?",
    opsi: ["A. Ahmad Fuadi", "B. Andrea Hirata", "C. Habiburrahman El Shirazy", "D. Raditya Dika"],
    jawabanBenar: 0
  },
  {
    pertanyaan: "Apa judul novel terkenal karya Dee Lestari?",
    opsi: ["A. Supernova", "B. Dilan", "C. Ayat-Ayat Cinta", "D. Ronggeng Dukuh Paruk"],
    jawabanBenar: 0
  },
  {
    pertanyaan: "Buku yang berisi peta disebut...?",
    opsi: ["A. Atlas", "B. Kamus", "C. Almanak", "D. Komik"],
    jawabanBenar: 0
  },
  {
    pertanyaan: "Nomor ISBN pada buku berfungsi sebagai...?",
    opsi: ["A. Harga buku", "B. Nomor identitas unik buku", "C. Nomor halaman", "D. Kode warna buku"],
    jawabanBenar: 1
  },
  {
    pertanyaan: "Perpustakaan digital adalah...?",
    opsi: ["A. Tempat menjual komputer", "B. Koleksi buku yang dapat diakses secara elektronik", "C. Gudang buku bekas", "D. Tempat servis laptop"],
    jawabanBenar: 1
  },
  {
    pertanyaan: "Apa manfaat utama membaca buku?",
    opsi: ["A. Menambah wawasan dan pengetahuan", "B. Mengurangi jumlah halaman buku", "C. Membuat buku lebih berat", "D. Mengubah warna sampul"],
    jawabanBenar: 0
  },
  {
    pertanyaan: "Siapa penulis novel 'Ayat-Ayat Cinta'?",
    opsi: ["A. Andrea Hirata", "B. Habiburrahman El Shirazy", "C. Ahmad Fuadi", "D. Tere Liye"],
    jawabanBenar: 1
  },
  {
    pertanyaan: "Cabang ilmu yang mempelajari benda langit disebut...?",
    opsi: ["A. Geologi", "B. Astronomi", "C. Ekologi", "D. Zoologi"],
    jawabanBenar: 1
  },
  {
    pertanyaan: "Alat yang digunakan untuk melihat benda langit adalah...?",
    opsi: ["A. Mikroskop", "B. Teleskop", "C. Periskop", "D. Termometer"],
    jawabanBenar: 1
  },
  {
    pertanyaan: "Penulis novel 'Dilan 1990' adalah...?",
    opsi: ["A. Pidi Baiq", "B. Tere Liye", "C. Dee Lestari", "D. Ahmad Tohari"],
    jawabanBenar: 0
  },
  {
    pertanyaan: "Apa kepanjangan dari e-book?",
    opsi: ["A. Easy Book", "B. Electronic Book", "C. Education Book", "D. Encyclopedia Book"],
    jawabanBenar: 1
  },
  {
    pertanyaan: "Salah satu etika di perpustakaan adalah...?",
    opsi: ["A. Berteriak keras", "B. Menjaga ketenangan", "C. Membuang buku sembarangan", "D. Berlari di antara rak"],
    jawabanBenar: 1
  },
  {
    pertanyaan: "Ilmu yang mempelajari zat dan perubahannya disebut...?",
    opsi: ["A. Kimia", "B. Biologi", "C. Geografi", "D. Sosiologi"],
    jawabanBenar: 0
  },
  {
    pertanyaan: "Apa fungsi daftar pustaka dalam sebuah karya tulis?",
    opsi: ["A. Menghias halaman", "B. Menunjukkan sumber referensi yang digunakan", "C. Menambah jumlah halaman", "D. Menentukan harga buku"],
    jawabanBenar: 1
  },
  {
    pertanyaan: "Siapa penulis novel 'Ronggeng Dukuh Paruk'?",
    opsi: ["A. Ahmad Tohari", "B. Andrea Hirata", "C. Tere Liye", "D. Eka Kurniawan"],
    jawabanBenar: 0
  },
  {
    pertanyaan: "Buku yang menceritakan kehidupan seseorang berdasarkan kisah nyata disebut...?",
    opsi: ["A. Fabel", "B. Biografi", "C. Cerpen", "D. Dongeng"],
    jawabanBenar: 1
  },
  {
    pertanyaan: "Apa simbol kimia untuk air?",
    opsi: ["A. CO₂", "B. O₂", "C. H₂O", "D. NaCl"],
    jawabanBenar: 2
  },
  {
    pertanyaan: "Matahari merupakan...?",
    opsi: ["A. Planet", "B. Satelit", "C. Bintang", "D. Asteroid"],
    jawabanBenar: 2
  },
  {
    pertanyaan: "Rak buku di perpustakaan biasanya disusun berdasarkan...?",
    opsi: ["A. Warna sampul saja", "B. Sistem klasifikasi tertentu", "C. Tinggi badan peminjam", "D. Tahun lahir penulis"],
    jawabanBenar: 1
  }
  ];

  let indeksSoal = 0;
  let skor = 0;

  const teksSkor = document.getElementById('teksSkor');
  const teksSoal = document.getElementById('teksSoal');
  const areaOpsi = document.getElementById('areaOpsi');
  const notifikasiArea = document.getElementById('notifikasiArea');
  const kontenKuis = document.getElementById('kontenKuis');
  const kuisHeader = document.getElementById('kuisHeader');

  function renderKuis() {
    teksSkor.innerText = skor;

    if (indeksSoal >= bankSoal.length) {
      tampilkanHasilAkhir();
      return;
    }

    const soalSekarang = bankSoal[indeksSoal];
    teksSoal.innerText = soalSekarang.pertanyaan;
    areaOpsi.innerHTML = "";

    soalSekarang.opsi.forEach((teks, index) => {
      const btn = document.createElement('button');
      btn.className = `btn-opsi opsi-${index}`;
      btn.innerText = teks;
      btn.onclick = () => cekJawaban(index, soalSekarang.jawabanBenar);
      areaOpsi.appendChild(btn);
    });
  }

  function cekJawaban(jawabanUser, jawabanAsli) {
    if (jawabanUser === jawabanAsli) {
      skor += 50; 
      tampilkanNotifikasi(true, "Benar sekali! Skor Anda bertambah.");
    } else {
      tampilkanNotifikasi(false, "Sayang sekali, jawaban Anda kurang tepat.");
    }

    indeksSoal++;

    setTimeout(() => {
      notifikasiArea.style.display = 'none';
      renderKuis();
    }, 1500);
  }

  function tampilkanNotifikasi(isBenar, pesan) {
    notifikasiArea.innerText = pesan;
    notifikasiArea.style.display = 'block';
    if (isBenar) {
      notifikasiArea.className = 'notifikasi notif-benar';
    } else {
      notifikasiArea.className = 'notifikasi notif-salah';
    }
  }

  function tampilkanHasilAkhir() {
    kuisHeader.style.display = 'none';
    kontenKuis.innerHTML = `
      <div class="hasil-akhir">
        <h2>Selamat!</h2>
        <p>Anda telah menyelesaikan Tantangan Literasi hari ini.</p>
        <p>Total Skor Literasi Anda: <strong>${skor}</strong></p>
        <br>
        <small>Kuis akan diulang otomatis saat halaman ini direfresh.</small>
      </div>
    `;
  }

  window.onload = renderKuis;
</script>