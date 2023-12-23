# BekaStore
Proyek tugas akhir semester mata kuliah RPL
Proyek membuat aplikasi berbasis website, di sini kami mengerjakan secara berkelompok yang terdiri dari 4 orang

<p align="center">
  <img src="https://github.com/mutiq27/BekaStore/assets/125734108/a2572bdd-861a-4024-9cca-0335aff6d87c" width="700"/>
</p>

 
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
<li>Berfungsi untuk menyimpan dan menampilkan barang-barang yang diunggah oleh seluruh pengguna dan masih memiliki status_barang 'Available'.
<li>Memiliki kolom seperti id_barang (primary key), nama_barang, tanggal_upload, kategori, harga, Foto, Detail, dan status_barang. 
<li>Terhubung dengan tabel Pengguna melalui kode_user.
  <br>
2. Tabel Pengguna:
<li>Berfungsi untuk menyimpan informasi nama-nama pengguna.
<li>Memiliki kolom seperti id_user (primary_key), nama_user, email, password, no_tlp, alamat_user
<li>Tabel ini memberikan identifikasi untuk setiap pengguna di dalam sistem.
  <br>
3. Tabel Cart:
<li>Berfungsi sebagai tempat penyimpanan dan tampilan barang-barang yang telah disimpan oleh pengguna lain dalam cart/keranjang mereka untuk pembelian.
<li>Memiliki kolom seperti id_cart (primary), kode_pembeli (foreign key ke tabel pengguna), kode_barang (foreign key ke tabel Produk), dan status_barang.
  <br>
4. Tabel Transaksi:
<li>Mencatat informasi transaksi antara penjual dan pembeli.
<li>Memiliki kolom seperti id_transaksi (primary key),id_penjual (foreign key ke tabel Pengguna), id_pembeli (foreign key ke tabel Pengguna), id_barangTerjual (foreignkey ke tabel Produk),  dan Tanggal_Transaksi


<h3> Front End </h3>

Dalam pengembangan tampilan depan platform website yang kami buat, kami mengadopsi pendekatan berikut:

<li>Desain Awal menggunakan Figma:

Kami memulai proses dengan membuat mockup dan desain awal menggunakan Figma.
Desain ini mencakup tata letak, elemen-elemen, dan estetika keseluruhan platform.

<li>Implementasi HTML, Javascript, dan  CSS:

Setelah mockup selesai, kami mentranslasikannya ke dalam kode menggunakan HTML, Javascript, dan  CSS.
Struktur halaman web dibangun dengan menggunakan elemen HTML semantik untuk meningkatkan aksesibilitas dan SEO.

<li>Memanfaatkan Bootstrap Framework:

Untuk meningkatkan efisiensi dan responsivitas, kami menggunakan ['Bootsrap'](https://getbootstrap.com/), yaitu framework front-end open source.
Bootstrap membantu kami dengan komponen UI, grid system, dan gaya bawaan untuk mempercepat pembangunan tampilan depan.

<li>Icon menggunakan  Fontawesome:

Kami mengintegrasikan [FontAwesome](https://fontawesome.com/), toolkit ikon dan library dari internet, untuk menyertakan ikon-ikon yang diperlukan.
Penggunaan kelas FontAwesome memungkinkan kami menyematkan ikon ke elemen-elemen HTML sesuai kebutuhan.

<h3>Back End</h3>

Dalam pengembangan back-end untuk website kami, kami menggunakan bahasa PHP untuk merancang logika bisnis dan juga memproses pemanggilan SQL ke database.

Berikut ini bentuk implementasi yang kami lakukan:
<li>Koneksi Database:
Kami menggunakan fungsi PHP seperti mysqli atau PDO untuk mengatur koneksi ke database. Informasi koneksi disimpan secara terpisah dalam file untuk keamanan.

<li>Query SQL:
Panggilan query SQL kami diimplementasikan dengan metode yang aman, termasuk penggunaan parameter terikat, guna mengurangi risiko SQL injection. Tools yang kami gunakan melibatkan MySQL sebagai alat penyunting dan penyimpanan data. Untuk server, saat ini kami masih mengandalkan server lokal melalui XAMPP.

<li>Logika Bisnis:
Kami memisahkan logika bisnis dari tampilan agar lebih mudah dalam pemeliharaan dan pengujian.
Fungsi dan kelas PHP dibuat untuk tugas dan fungsionalitas tertentu.

<h2>Hasil Website kami</h2>

<details>
  <summary>Tampilan Awal</summary>
  <img src="https://github.com/mutiq27/BekaStore/assets/125734108/c2dddd83-ae7b-4e61-837a-26c0fa4e806c" width="500"/>
</details>

<details>
  <summary>Sign Up/Daftar</summary>
  <img src="https://github.com/mutiq27/BekaStore/assets/125734108/47f09502-43d4-4cce-a354-cf974e694443" width="500"/>
</details>

<details>
  <summary>Sign In/Masuk</summary>
  <img src="https://github.com/mutiq27/BekaStore/assets/125734108/7421548a-9f45-4f42-ae2c-1ca6c829db5f" width="500"/>
</details>

<details>
  <summary>Catalog</summary>
  <img src="https://github.com/mutiq27/BekaStore/assets/125734108/6b335c9d-b926-425b-baeb-6ff00b19ac1b" width="500"/>
  <br>
  <img src="https://github.com/mutiq27/BekaStore/assets/125734108/15b2f4fb-156a-40d8-99b0-f086f744fde1" height="500"/>
    <summary>Catalog Dorm</summary>
    <img src="https://github.com/mutiq27/BekaStore/assets/125734108/44b1e07d-625e-45d1-913b-7e81e3805c3a" width="500"/>
    <summary>Catalog Secondhand</summary>
    <img src="https://github.com/mutiq27/BekaStore/assets/125734108/8f8c0aaf-48f3-49f8-8e21-f63821e450de" width="500"/>
    <summary>Catalog Grant</summary>
    <img src="https://github.com/mutiq27/BekaStore/assets/125734108/ef79f75b-e9c0-43e2-8eb1-079a62c3e69f" width="500"/>
</details>

<details>
  <summary>Upload Barang</summary>
  <img src="https://github.com/mutiq27/BekaStore/assets/125734108/04de7dd3-5181-481e-9ecc-f5bf64679162" width="500"/>
  <br>
  <img src="https://github.com/mutiq27/BekaStore/assets/125734108/19f48630-60db-45fe-8e16-ec0b93b8d8bb" width="500"/>
</details>

<details>
  <summary>List Barang yang di Upload User</summary>
  <img src="https://github.com/mutiq27/BekaStore/assets/125734108/46df8e5b-219c-407c-b88e-74986bf89665" width="500"/>
  <br>
  <img src="https://github.com/mutiq27/BekaStore/assets/125734108/3db9b594-d392-47ef-89f2-d68d3e19ed55" width="500"/>
</details>

<details>
  <summary>Detail Produk</summary>
  <img src="https://github.com/mutiq27/BekaStore/assets/125734108/de78c811-c9ad-4690-9b36-7675eeff69a0" width="500"/>
</details>

<details>
  <summary>Keranjang User</summary>
  <img src="https://github.com/mutiq27/BekaStore/assets/125734108/48d97aa7-714c-46dc-9090-a3435a5f8d6c" width="500"/>
</details>

<details>
  <summary>History Penjualan</summary>
  <img src="https://github.com/mutiq27/BekaStore/assets/125734108/0c28d35b-1e13-4e46-b7e9-539c5d4a1dd9" width="500"/>
</details>

<details>
  <summary>History Pembelian</summary>
  <img src="https://github.com/mutiq27/BekaStore/assets/125734108/87809338-3660-4adc-9aa7-0ae63d53956b" width="500"/>
</details>







