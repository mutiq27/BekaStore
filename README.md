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

<li>Implementasi HTML dan CSS:

Setelah mockup selesai, kami mentranslasikannya ke dalam kode menggunakan HTML dan CSS.
Struktur halaman web dibangun dengan menggunakan elemen HTML semantik untuk meningkatkan aksesibilitas dan SEO.

<li>Memanfaatkan Bootstrap Framework:['Bootsrap'](https://getbootstrap.com/)

Untuk meningkatkan efisiensi dan responsivitas, kami menggunakan Bootstrap, yaitu framework front-end open source.
Bootstrap membantu kami dengan komponen UI, grid system, dan gaya bawaan untuk mempercepat pembangunan tampilan depan.

<li>Icon menggunakan FontAwesome:[FontAwesome](https://fontawesome.com/)

Kami mengintegrasikan FontAwesome, toolkit ikon dan library dari internet, untuk menyertakan ikon-ikon yang diperlukan.
Penggunaan kelas FontAwesome memungkinkan kami menyematkan ikon ke elemen-elemen HTML sesuai kebutuhan.
