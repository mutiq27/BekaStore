# BekaStore
Proyek tugas akhir semester mata kuliah RPL
Proyek membuat aplikasi berbasis website, di sini kami mengerjakan secara berkelompok yang terdiri dari 4 orang

<h2> Latar Belakang </h2>

BekaStore merupakan platform belanja online yang mengkhususkan diri dalam barang-barang bekas atau tidak terpakai, dengan tujuan agar barang tersebut dapat diberdayakan kembali melalui penjualan atau pemberian kepada mereka yang membutuhkan. Inspirasi kami muncul dari realitas sekitar, terutama di lingkungan mahasiswa yang seringkali merantau dan tinggal di kos-kosan.

Dalam pemahaman akan permasalahan mahasiswa yang ingin pindah atau mengakhiri masa tinggal di kos, kami mengidentifikasi empat situasi umum:

1. Barang Bekas yang Layak: Mahasiswa seringkali memiliki barang-barang yang masih layak, namun tidak terpakai. Melalui BekaStore, mereka dapat menjual atau memberikan barang tersebut kepada orang lain yang membutuhkan.

2. Kesalahan Pembelian: Terkadang, mahasiswa melakukan kesalahan dalam membeli barang. Dengan BekaStore, mereka dapat memberikan atau menjual barang tersebut kepada orang lain yang mungkin membutuhkannya.

3. Sisa Masa Sewa Kos: Mahasiswa yang memiliki masa sewa kos yang masih tersisa dapat menawarkan tempat kosnya kepada orang lain melalui platform kami, memudahkan pencarian tempat tinggal bagi mereka yang membutuhkan.

4. Sewa Kos Sementara: Untuk mahasiswa yang harus meninggalkan kamar kos mereka untuk beberapa bulan, mereka dapat menawarkan tempat kos mereka untuk disewa sementara kepada orang lain.

BekaStore hadir sebagai solusi untuk mempermudah proses pertukaran barang bekas, mengurangi pemborosan, dan memberikan alternatif yang bermanfaat bagi masyarakat mahasiswa yang dinamis. Dengan konsep ini, kami berkomitmen untuk mendukung keberlanjutan, berbagi ekonomi, dan memberikan nilai tambah bagi komunitas kami.

<h2> Proses Development </h2>

<h3> Database </h3>
1. Tabel Produk:
<li>Berfungsi untuk menyimpan dan menampilkan barang-barang yang diunggah oleh seluruh pengguna.
<li>Memiliki kolom seperti Produk_ID (identifikasi unik), Nama_Produk, Deskripsi, Harga, dan Status yang menunjukkan ketersediaan produk (contoh: 'Tersedia').
Terhubung dengan tabel Pengguna melalui Pengguna_ID.
Tabel Pengguna:

Berfungsi untuk menyimpan informasi nama-nama pengguna.
Memiliki kolom seperti Pengguna_ID (identifikasi unik) dan Nama_Pengguna.
Tabel ini memberikan identifikasi untuk setiap pengguna di dalam sistem.
Tabel Cart:

Berfungsi sebagai tempat penyimpanan dan tampilan barang-barang yang telah disimpan oleh pengguna lain dalam cart/keranjang mereka untuk pembelian.
Memiliki kolom seperti Keranjang_ID (identifikasi unik), Pengguna_ID (kunci asing ke tabel Pengguna), Produk_ID (kunci asing ke tabel Produk), dan Jumlah (jumlah barang dalam keranjang).
Tabel Transaksi:

Mencatat informasi transaksi antara penjual dan pembeli.
Memiliki kolom seperti Transaksi_ID (identifikasi unik), Pembeli_ID (kunci asing ke tabel Pengguna), Penjual_ID (kunci asing ke tabel Pengguna), Produk_ID (kunci asing ke tabel Produk), Jumlah (jumlah barang yang dibeli), Total_Harga, dan Tanggal_Transaksi





