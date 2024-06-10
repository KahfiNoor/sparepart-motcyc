# Panduan Pengguna

Silahkan mengakses link ini untuk membuka website:

[https://sparepart-motcyc.000webhostapp.com/](https://sparepart-motcyc.000webhostapp.com/)

Untuk melakukan login gunakan username dan password berikut:

### Owner:
- **Username:** owner123
- **Password:** owner123

### Karyawan 1:
- **Username:** karyawan2
- **Password:** karyawan2

### Karyawan 2:
- **Username:** karyawan123
- **Password:** karyawan123

Untuk melakukan registrasi, pastikan terhubung ke internet karena email Anda akan mendapat pesan dari Admin.

Import database `db_sparepart_211149` ke database MySQL Anda di phpMyAdmin.

Buka database untuk mengetahui username dan password akun lain. Akun tidak dapat diregistrasi dan hanya owner yang dapat menambahkan, melihat, mengubah, dan menghapus akun karyawan atau owner lain.

---

Untuk membuka website yang belum dihosting, ikuti langkah-langkah berikut:
1. Buka folder website yang sudah di-extract.
2. Klik kanan dan klik "Open in Terminal".
3. Ketik `php spark serve` dan tekan enter.
4. Akan muncul link `http://localhost:8080/`.
5. Copy dan buka link di browser (Edge atau Chrome).

---

# Informasi Update

## **New Update 1.8.6**
1. Sekarang Anda dapat melakukan registrasi untuk owner pada laman registrasi. Gunakan tombol sign up di bawah form login dan kembali ke laman login dengan menekan tombol sign in di bawah form registrasi.
2. Jika registrasi berhasil, akan ada pesan berwarna hijau dan Anda bisa mengecek email Anda yang sudah dimasukkan. Jika terjadi masalah atau pesan berwarna merah, pastikan untuk terhubung ke internet.
3. Fitur tambah user pada akses owner sekarang berubah menjadi tambah karyawan. User baru yang ditambahkan akan secara otomatis menjadi karyawan. Gunakan fitur edit jika ingin mengubah menjadi owner.
4. Menambahkan input email pada tambah karyawan dan edit data user.
5. Menambahkan kolom email pada database. Jika Anda sudah pernah menggunakan versi sebelumnya, hapus semua tabel pada database lama dan import database terbaru yang sudah disediakan.
6. Memperbaiki validasi data email atau username yang sama atau sudah ada sebelumnya untuk form tambah karyawan dan registrasi.

---

## **Update 1.7.24**
1. Menambahkan kolom jenis barang setelah kolom nama barang pada tabel barang di database.
2. Menampilkan jenis barang pada data barang.
3. Menambahkan fitur input jenis barang pada tambah barang.
4. Menambahkan input jenis barang dan menampilkan jenis barang pada input di edit barang.
5. Menampilkan jenis barang pada detail barang di bawah nama barang.

---

## **Update 1.7.19**
1. Mengubah database tabel `tbl_barang_211149` dengan menambahkan kolom baru bernama `211149_ket` dengan tipe TEXT.
2. Menambahkan fitur tambah data keterangan barang pada manajemen barang.
3. Mempertahankan format teks keterangan sesuai dengan spasi dan baris baru dan memasukkannya ke database.
4. Menambahkan fitur edit data keterangan barang pada manajemen barang.
5. Menampilkan data keterangan pada textarea dan mempertahankan format teks pada keterangan sesuai dengan spasi dan baris baru lalu memasukkannya ke database.
6. Menampilkan data keterangan pada detail barang.

---

## **Update 1.7.13**
1. Terdapat perubahan pada validasi penambahan data user, username dan password tidak boleh kurang dari 8 karakter dan akan menampilkan pesan username atau password minimal 8 karakter.
2. Jika username sudah ada maka akan ada notifikasi username sudah ada.
3. Terdapat perubahan pada validasi data barang. Jika nama barang sudah ada, maka akan ada notifikasi nama barang sudah ada dan akan muncul teks nama barang sudah ada.
4. Terdapat perubahan pada validasi data supplier. Jika nama supplier sudah ada, maka akan ada notifikasi nama supplier sudah ada dan akan muncul teks nama supplier sudah terdaftar.
5. Menambahkan judul dan nama aplikasi pada download PDF.
6. Menambahkan judul dan nama aplikasi pada cetak print.
7. Menambahkan validasi pada halaman login, jika username dan password error maka akan menampilkan notifikasi Username atau password salah.

---

## **Update 1.7.6**
1. Fitur Menu laporan sudah dapat diakses.
2. Terdapat laporan 4 data (data barang, data transaksi, data supplier, dan data user).
3. Sudah dapat melakukan cetak (print) dan download PDF pada laporan data barang.
4. Sudah dapat melakukan cetak (print) dan download PDF pada laporan data transaksi.
5. Sudah dapat melakukan cetak (print) dan download PDF pada laporan data supplier.
6. Sudah dapat melakukan cetak (print) dan download PDF pada laporan data user.

---

## **Update 1.6.7**
1. Dashboard telah terintegrasi database. Terdapat total barang, total transaksi, total supplier, total karyawan. Terdapat juga barang dengan penjualan terbanyak dan total pendapatan.
2. Fitur tambah stok telah ditambahkan ke barang, owner dan karyawan bisa melakukan tambah stok jika ada barang masuk. Stok akan otomatis bertambah sesuai dengan stok lama dan jumlah stok yang ditambahkan.
3. Sekarang owner dapat menghapus transaksi di riwayat transaksi.
4. Sistem tanggal pada riwayat transaksi diubah menjadi lebih mudah untuk dibaca. Terdapat tanggal dan waktu.
5. Total harga, uang dibayar, dan kembalian sekarang sudah mengikuti format pelafalan rupiah.
6. Owner sudah bisa melakukan edit data user.
7. Owner sudah bisa melakukan hapus data user.

---

## **Update Patch 1.5.15**
1. Jika melakukan transaksi dan memasukkan jumlah pesanan maka stok akan berkurang sesuai dengan jumlah pesanan.
2. Jika stok = 0 maka akan menampilkan stok habis dan tombol pesan tidak dapat dipesan.
3. Penyesuaian ukuran font harga dan stok pada transaksi.
4. Jika jumlah pesanan melebihi stok maka akan muncul jumlah pesanan melebihi stok dan tombol bayar tidak dapat di klik.

---

## **Update Patch 1.5.11**
1. Menambahkan kolom foto pada tabel barang.
2. Pada form tambah barang sudah dilengkapi dengan tambah foto.
   - Cat: Jika foto tidak dipilih maka akan mengisi dengan isian "default.png" pada kolom foto.
   - Cat: Jika foto dipilih, maka nama file akan diubah berdasarkan enkripsi MD5 dari nama barang dan file dipindahkan ke folder `public/dist/img/`.
   - Cat: File yang dipilih hanya boleh berformat jpg, jpeg, atau png.
3. Pada form edit barang sudah dilengkapi dengan foto dan input foto baru.
   - Cat: Jika tidak memilih foto maka tidak akan ada perubahan pada foto.
   - Cat: Jika foto dipilih dan foto lama bukan "default.png", maka nama file akan diubah berdasarkan MD5 dari nama barang dan akan dipindahkan ke folder diatas.
   - Cat: Jika foto yang diedit foto awalnya bukan "default.png", file foto lama akan dihapus dan diganti berdasarkan catatan diatas.
   - Cat: Jika foto dipilih dan foto lama adalah "default.png", maka nama file akan diubah berdasarkan enkripsi MD5 dari nama barang dan akan dipindahkan ke folder diatas.
   - Cat: Foto yang diedit tetapi foto awalnya adalah "default.png" tidak akan menghapus file "default.png".
4. Sekarang Anda dapat melihat foto barang pada detail barang.
5. Menambahkan foto barang pada tampilan transaksi.
6. Sekarang fitur hapus tidak akan menghapus file "default.png".
7. Tidak dapat menekan tombol bayar pada pesanan jika nominal lebih kecil dari total harga.
8. Tambahan notifikasi di bagian atas kanan (menutupi tombol logout) jika data berhasil ditambahkan, diubah, atau dihapus.
9. Tambahan notifikasi di bagian atas kanan (menutupi tombol logout) jika file yang dipilih bukan jpg, jpeg, atau png maka menampilkan teks "tidak sesuai format".
10. Lakukan import ulang database. Tutorial ada di paling bawah.
11. Sampel contoh foto dan data barang ada di folder "sampel foto".

---

## **Update Patch 1.5.1**
1. Sekarang karyawan dan owner dapat melakukan transaksi pada menu transaksi cukup dengan mengklik pesan pada barang yang tersedia di transaksi.
2. Karyawan dan owner dapat melihat riwayat transaksi di menu riwayat transaksi setelah melakukan transaksi penjualan.
3. Sekarang owner dapat menghapus data barang.
   - Cat: Hapus data barang hanya dapat dilakukan ketika barang belum di transaksi.
   - Cat: Data yang dapat diedit dan dihapus hanya data barang, data supplier dan user masih dalam tahap pengembangan.
4. Lakukan import ulang database. Tutorial ada di paling bawah.

---

## **Update Patch 1.4.1**
1. Sekarang Anda dapat melakukan login multi user dengan akses yang berbeda.
2. Fitur hak akses owner:
   - Owner dapat mengedit data barang.
   - Cat: Fitur edit hanya bisa berjalan di data barang, data supplier dan user masih dalam tahap pengembangan.
3. Fitur hak akses karyawan:
   - Karyawan hanya bisa melihat menu data barang, data supplier, dan Transaksi.
   - Karyawan hanya bisa melihat data barang dan supplier.
   - Karyawan tidak bisa menambah, mengedit, dan menghapus data barang dan supplier.
4. Sekarang Anda dapat melihat nama orang yang sedang login pada bagian atas sidebar menu.

---

## **Jika Anda sudah punya database, hapus Database Yang lama dan ikuti langkah-langkah di bawah**

### Tutorial Install Project Inventaris
1. Buka XAMPP Control Panel.
2. Klik Start pada Apache dan MySQL, Tunggu sampai hijau.
3. Klik Admin pada MySQL.
4. Klik Databases pada atas kiri.
5. Buat database baru dengan nama `db_inventaris_211171` lalu klik Create.
6. Masuk ke database `db_sparepart_211149` lalu klik Import pada bagian atas.
7. Klik Choose File lalu pilih file `db_sparepart_211149.sql` di dalam folder project ini.
8. Scroll ke bawah lalu klik Import.
