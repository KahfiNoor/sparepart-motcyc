Panduan Penguna
=============================================================
silahkan mengakses link ini untuk membuka website :

https://sparepart-motcyc.000webhostapp.com/

untuk melakukan login gunakan username dan password berikut
Owner :
username : owner123
password : owner123

Karyawan 1 :
username : karyawan2
password : karyawan2

Karyawan 2 : 
username : karyawan123
password : karyawan123

untuk melakukan registrasi pastikan terhubung ke internet karena email anda akan mendapat pesan dari Admin

import database db_sparepart_211149 ke database MySQL anda di phpMyAdmin

Buka database untuk mengetahui username dan password akun lain. akun tidak dapat diregistrasi dan hanya owner yang dapat menambahkan, melihat, mengubah, dan menghapus akun karyawan atau owner lain.
----------------------------------------------------------------
untuk membuka website yang belum dihosting ikuti langkah-langkah berikut :
1. buka folder website yang  sudah di extract
2. klik kanan dan klik "Open in Terminal"
3. ketik "php spark serve" dan tekan enter
4. akan muncul link "http://localhost:8080/"
5. copy dan buka link di browser (egde atau chrome)
----------------------------------------------------------------


Informasi Update
===============================================================

**New Update 1.8.6**
1. Sekarang anda dapat melakukan registrasi untuk owner pada laman registrasi. gunakan tombol sign up di bawah form login dan kembali ke laman login dengan menekan tombol sign in di bawah form regis.
2. jika registrasi berhasil, akan ada pesan berwarna hijau dan anda bisa mengecek email anda yang sudah anda masukkan. jika terjadi masalah atau pesan berwarna merah, pastikan untuk terhubung ke internet.
3. fitur tambah user pada akses owner sekarang berubah menjadi tambah karyawan. user baru yang ditambahkan akan secara otomatis menjadi karyawan. gunakan fitur edit jika ingin mengubahkan menjadi owner.
4. menambahkan input email pada tambah karyawan dan edit data user. 
5. menambahkan kolom email pada database. jika anda sudah pernah menggunakan versi sebelumnya, hapus semua tabel pada database lama dan import database terbaru yang sudah disediakan. 
6. memperbaiki validasi data email atau username yang sama atau sudah ada sebelumnya untuk form tambah karyawan dan registrasi

===============================================================

**Update 1.7.24**
1. menambahkan kolom jenis barang setelah kolom nama barang pada tabel barang di database
2. menampilkan jenis barang pada data barang
3. menambahkan fitur input jenis barang pada tambah barang
4. menampilkan menambahkan input jenis barang dan menampilkan jenis barang pada input di edit barang 
5. menampilkan jenis barang pada detail barang di bawah nama barang

================================================================
**Update 1.7.19**
1. mengubah database tabel tbl_barang_211149 dengan menambahkan kolom baru bernama 211149_ket dengan tipe TEXT
2. menambahkan fitur tambah data keterangan barang pada manajemen barang
3. mempertahankan format text keterangan sesuai dengan spasi dan baris baru dan memasukkannya ke database
4. menambahkan fitur edit data keterangan barang pada manajemen barang
5. menampilkan data keterangan pada textarea dan mempertahankan format text pada keterangan sesuai dengan spasi dan baris baru lalu memasukkannya ke database
6. menampilkan data keterangan pada detail barang. 

================================================================
**Update 1.7.13**
1. terdapat perubahan pada validasi penambahan data user, username dan password tidak boleh kurang dari 8 karakter dan akan menampilkan pesan username atau password minimal 8 karakter 
2. jika username sudah ada maka akan ada notif username sudah ada.
3. terdapat perubahan pada validasi data barang. jika nama barang sudah ada, maka akan ada notif nama barang sudah ada dan akan muncul text nama barang sudah ada.
4. terdapat perubahan pada validasi data supplier. jika nama supplier sudah ada, maka akan ada notif nama supplier sudah ada dan akan muncul text nama suupliersudah terdaftar.
5. menambahkan judul dan nama aplikasi pada download pdf.
6. menambahkan judul dan nama aplikasi pada cetak print.
7. menambahkan validasi pada lama login, jika username dan password error maka akan menampilkan notif Username atau password salah

================================================================
**Update 1.7.6**
1. Fitur Menu laporan Sudah dapat diakses.
2. terdapat laporan 4 data (data barang, data transaksi, data supplier, dan data user).
3. sudah dapat melakukan cetak (print) dan download pdf pada laporan data barang
4. sudah dapat melakukan cetak (print) dan download pdf pada laporan data transaksi
5. sudah dapat melakukan cetak (print) dan download pdf pada laporan data supplier
6. sudah dapat melakukan cetak (print) dan download pdf pada laporan data user

================================================================
**Update 1.6.7**
1. Dashboard telah terintegrasi database. terdapat total barang, total transaksi, total supplier, total karyawan. terdapat juga barang dengan penjualan terbanyak dan total pendapatan.
2. fitur tambah stok telah ditambahkan ke barang, owner dan karyawan bisa melakukan tambah stok jika ada barang masuk. stok akan ootomatis bertambah sesuai dengan stok lama dan jumlah stok yang ditambahkan. 
3. sekarang owner dapat menghapus transaksi di riwayat transaksi.
4. sistem tanggal pada riwayat transaksi diubah menjadi lebih mudah untuk dibaca. terdapat tanggal dan waktu. 
5. total harga, uang dibayar, dan kembalian sekarang sudah mengikuti format pelafalan rupiah.
6. owner sudah bisa melakukan edit data user
7. owner sudah bisa melakukan hapus data user. 

================================================================
**Update Patch 1.5.15**
1. jika melakukan transaksi dan memasukkan jumlah pesanan maka stok akan berkurang sesuai dengan jumlah pesanan
2. jika stok = 0 maka akan menampilkan stok habis dan tombol pesan tidak dapat dipesan
3. penyesuaian ukuran font harga dan stok pada transaksi 
4. jika jumlah pesanan melebihi stok maka akan muncul jumlah pesanan melebihi stok dan tombol bayar tidak dapat di klik

================================================================
**Update Patch 1.5.11**
1. menambahkan kolom foto pada tabel barang.
2. pada form tambah barang sudah dilengkapi dengan tambah foto
   cat : jika foto tidak dipilih maka akan mengisi dengan isian "default.png" pada kolom foto
   cat : jika foto dipilih, maka nama file akan diubah berdasarkan enkripsi MD5 dari nama barang dan file dipindahkan ke folder public/dist/img/
   cat : file yang dipilih hanya boleh berformat jpg, jprg, atau png. 
3. pada form edit barang sudah dilengkapi dengan foto dan input foto baru. 
   cat : jika tidak memilih foto maka tidak akan ada perubahan pada foto.
   cat : jika foto dipilih dan foto lama bukan default.png, maka nama file akan diubah berdasarkan MD5 dari nama barang dan akan dipindahkan ke folder diatas.
   cat : jika foto yang diedit foto awalnya bukan default.png, file foto lama akan dihapus dan diganti berdasarkan catatan diatas.
   cat : jika foto dipilih dan foto lama adalah "default.png", maka nama file akan diubah berdasarkan enkripsi MD5 dari nama barang dan akan dipindahkan ke folder diatas.
   cat : foto yang diedit tetapi foto awalnya adalah default.png tidak akan menghapus file default.png.
4. sekarang anda dapat melihat foto barang pada detail barang.
5. menambahkan foto barang pada tampilan transaksi. 
6. sekarang fitur hapus tidak akan menghapus file default.png
7. tidak dapat menekan tombol bayar pada pesanan jika nominal lebih kecil dari total harga
8. tambahan notifikasi dibagian atas kanan (menutupi tombol logout) jika data berhasil ditambahkan, diubah, atau dihapus. 
9. tambahan notifikasi dibagian atas kanan (menutupi tombol logout) jika file yang dipilih bukan jpg, jpeg, atau png maka menampilkan teks "tidak sesuai format"
10. lakukan import ulang database. tutorial ada di paling bawah.
11. sampel contoh foto dan data barang ada di folder "sampel foto".

================================================================
**Update Patch 1.5.1**
1. Sekarang karyawan dan owner dapat melakukan transaksi pada menu transaksi cukup dengan mengklik pesan pada barang yang tersedia di transaksi.
2. Karyawan dan owner dapat melihat riwayat transaksi di menu riwayat transaksi setelah melakukan transaksi penjualan.
3. Sekarang owner dapat menghapus data barang. 
   cat : hapus data barang hanya dapat dilakukan ketika barang belum di transaksi.
   cat : data yang dapat diedit dan dihapus hanya data barang, data supplier dan user masih dalam tahap pengembangan.
4. lakukan import ulang database. tutorial ada di paling bawah

================================================================
**Update Patch 1.4.1**
1. Sekarang anda dapat melakukan login multi user dengan akses yang berbeda
2. Fitur hak akses owner : 
   a. owner dapat mengedit data barang
   cat : fitur edit hanya bisa berjalan di data barang, data supplier dan user masih dalam tahap pengembangan.
3. Fitur hak akses karyawan : 
   a. karyawan hanya bisa melihat menu data barang, data supplier, dan Transaksi
   b. karyawan hanya bisa melihat data barang dan supplier
   c. karyawan tidak bisa menambah, mengedit, dan menghapus data barang dan supplier
4. sekarang anda dapat melihat nama orang yang sedang login pada bagian atas sidebar menu

================================================================
**Jika anda sudah punya database, hapus Database Yang lama dan ikuti langkah-langkah dibawah**

Tutorial Install Project Inventaris
1. Buka XAMPP Control Panel
2. Klik Start pada Apache dan MySQL, Tunggu sampai hijau
3. Klik Admin pada MySQL
4. Klik Databases pada atas kiri
5. Buat database baru dengan nama db_inventaris_211171 lalu klik Create
6. Masuk Ke database db_sparepart_211149 lalu klik Import pada bagian atas. 
7. Klik Choose File lalu pilih file db_sparepart_211149.sql di dalam folder project ini.
8. Scroll ke bawah lalu klik Import. 