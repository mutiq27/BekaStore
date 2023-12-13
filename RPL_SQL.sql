/*produk, pengguna, transaksi, */
-- drop database rpl;
-- create database rpl2;
/*drop table pengguna;*/
-- select*from pengguna;
create table `pengguna`(
	`id_user` int auto_increment,
    `nama_user` varchar (225) not null,
    `email` varchar(100) not null,
    `password` varchar (225) not null,
    `index_nama` int,
	`no_tlp` varchar (20) default null,
    `foto` varchar (225) default null,
    `alamat_user` varchar (225) default null,
    primary key (`id_user`),
    key `index_nama` (`index_nama`),
    constraint `index_nama1`  FOREIGN KEY (`index_nama`) REFERENCES `pengguna` (`id_user`)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*key=>ebagai indeks untuk mempercepat pencarian data dalam tabel. */

-- /*sign up*/
-- insert into pengguna (nama_user, email, password) values ('mutiq','abc1@gmail.com','123');
-- /*sign in*/
-- SELECT * FROM pengguna WHERE email = 'abc1@gmail.com' AND password = '123';


/*drop table produk;*/
-- select*from produk;
create table `produk` (
	`id_barang` int auto_increment not null,
    `kode_user` int,
    `nama_barang` varchar (225) not null,
    `tanggal_upload` datetime,
    `kategori` enum ('Secondhand','Dormitory','Grant'),
    `harga` int default null,
    `index_barang` int,
	`foto` varchar (225) default null,
    `detail` text,
    `status_barang` enum ('Sold Out','Available'),
    primary key (id_barang),
    key `index_barang` (`index_barang`),
    constraint `index_barang1`foreign key (`index_barang`) references `produk` (`id_barang`),
    foreign key (`kode_user`) references `pengguna`(`id_user`)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

alter table produk modify kategori enum ('Secondhand','Dormitory','Grant');

-- /*penjual insert barang*/
-- insert into produk (kode_user, nama_barang, kategori, harga, status_barang) values (3,'bulpen','Grant',4500,'Available');
-- /*penjual klik button jika barang sudah sold out*/
-- UPDATE produk SET status_barang = 'Sold Out' WHERE id_barang = '2';


/*trigger, jika status barang pada tabel produk beruabh menjadi sold out, maka status barang pada cart akan dirubah*/


/*kode_user=user_pembeli, digunakan untuk cart user dan daftar orang yang tertarik*/
-- select*from cart;
create table cart (
	`id_cart` int auto_increment not null,
    `kode_pembeli` int,
    `kode_barang` int not null,
    `status_barang` enum ('Sold Out','Available'),
    primary key(`id_cart`),
    foreign key (`kode_pembeli`) references `pengguna`(`id_user`),
	foreign key (`kode_barang`) references `produk`(`id_barang`)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*pembeli klik cart pada product*/
-- insert into cart (kode_user,kode_barang,status_barang) values (1,1,'Available');

/*trigger, jika status barang pada tabel produk beruabh menjadi sold out, maka akan disalin data barang dan penjual ke tabel transaksi*/


-- select*from transaksi;
create table `transaksi` (
	`id_transaksi` int auto_increment not null,
    `tanggal_transaksi` datetime,
    `id_penjual` int,
    `id_barangTerjual` int not null,
    `id_pembeli` int,
    primary key (`id_transaksi`),
     foreign key (`id_penjual`) references `pengguna`(`id_user`),
	 foreign key (`id_pembeli`) references `pengguna`(`id_user`),
     foreign key (`id_barangTerjual`) references `produk` (`id_barang`)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TRIGGER IF EXISTS update_keranjang_status;
DELIMITER $$
CREATE TRIGGER update_keranjang_status AFTER UPDATE
 ON produk
  FOR EACH ROW
BEGIN
IF NEW.status_barang = 'Sold Out' AND OLD.status_barang = 'Available' THEN
        UPDATE cart SET status_barang = 'Sold Out' WHERE kode_barang = NEW.id_barang AND status_barang = 'Available';
END IF;
END$$

DELIMITER ;
DROP TRIGGER IF EXISTS update_transaksi;
DELIMITER $$
CREATE TRIGGER update_transaksi AFTER UPDATE
 ON produk
  FOR EACH ROW
BEGIN
IF NEW.status_barang = 'Sold Out' AND OLD.status_barang = 'Available' THEN
    INSERT INTO transaksi (tanggal_transaksi, id_penjual, id_barangTerjual) values (NOW(), NEW.kode_user, NEW.id_barang);
END IF;
END$$

DELIMITER ;
-- /*penjual->pilih id_pembeli setekah penjual mengkonfirmasi barang sold out*/
-- SELECT kode_user FROM cart WHERE kode_barang=1;
-- update transaksi set id_pembeli = 2 where id_barangTerjual = 1 ;

-- /*penjual -> (LIST ITEM)menampilkan siapa saja yang tertarik dengan barang dengan id "1"*/
-- select cart.id_cart ,pengguna.nama_user, produk.nama_barang
-- from cart
-- join pengguna on pengguna.id_user = cart.kode_user
-- join produk on produk.id_barang = cart.kode_barang
-- where kode_barang = 1;

-- /*pembeli->(CART)menampilkan barang yang dimasukkan ke keranjang oleh user "2108100"*/
-- select cart.id_cart,produk.nama_barang, produk.harga, produk.detail, pengguna.nama_user, pengguna.id_user, cart.status_barang, produk.kode_user
-- from cart
-- join produk on cart.kode_barang = produk.id_barang
-- join pengguna on pengguna.id_user = cart.kode_user
-- where cart.kode_user="10";


-- /*umum->Catalog*/
-- select*from produk where not status_barang = 'Sold Out';
-- select*from produk where kategori = 'Grant' and not status_barang = 'Sold Out';
-- select*from produk where kategori = 'Secondhand' and not status_barang = 'Sold Out';
-- select*from produk where kategori = 'Dormitory' and not status_barang = 'Sold Out';

-- select produk.nama_barang, produk.harga, produk.kategori, produk.detail, pengguna.nama_user, pengguna.alamat_user, pengguna.no_tlp, produk.id_barang
-- from produk
-- join pengguna on produk.kode_user = pengguna.id_user 
-- where id_barang= 13;

-- select pengguna.id_user, pengguna.nama_user
-- from cart 
-- join pengguna on cart.kode_pembeli = pengguna.id_user
-- where cart.kode_barang = 13;
-- create table `coba`(
--     `nama_user` varchar (225) not null,
--     `email` varchar(100) not null,
--     `password` varchar (225) not null
-- )

-- select*from transaksi;

-- -- TRUNCATE TABLE transaksi;
-- -- TRUNCATE TABLE cart;
-- -- TRUNCATE TABLE pengguna;
-- -- TRUNCATE TABLE produk;
-- select*from coba;

-- -- history beli-- 
-- -- penjual
-- select pengguna.id_user, pengguna.nama_user, transaksi.tanggal_transaksi, produk.nama_barang, produk.tanggal_upload
-- from transaksi
-- join pengguna on transaksi.id_penjual = pengguna.id_user
-- join produk on transaksi.id_barangTerjual = produk.id_barang where id_penjual='1';