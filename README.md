Cara Menjalankan Program

1. Clone repositori ini lewat code editor
2. Jalankan Apache dan MySQL server lewat XAMPP / sejenisnya
3. Buka folder SuperAdmin
4. Pada ProjectManagementController di bagian store function terdapat variable seperti ini
   $sourceFolder = 'F:\ASSET_MANAGEMENT\template';
   $destination = 'F:\ASSET_MANAGEMENT';
   sesuaikan isi variable dengan folder tempat menyimpan repo ini di komputer lokal masing-masing
5. Jalankan project SuperAdmin dengan double click file server_bat
6. Akses url dashboard SuperAdmin di http://127.0.0.1
7. Login ke dalam dashboard superadmin proking melalui akun berikut
   - email = nabilaputri@gmail.com
   - password = superadmin123_
8. Atau bisa juga login ke dalam dashboard project AMS P-1 melalui akun berikut
   - email = superadmin@gmail.com
   - password = superadminpw


Apabila akan membuat dashboard project baru, caranya 
- Akses dashboard superadmin proking
- Tambah dashboard project baru melalui menu Create New Dashboard
- Buka folder dashboard yang baru dibuat
- Edit file .env, pada bagian DB_DATABASE ubah nama database sesuai dengan nama projectnya (tidak pakai spasi)
- Edit file start_server.bat, pada bagian directory of laravel project sesuaikan dengan direktori penyimpanan folder.
  Lalu, pada bagian directory of public (where image saved) juga sesuaikan dengan direktori penyimpanan folder dan tambah '\public' diakhirnya
- Terakhir, pada bagian Running Server ganti port-nya selain dari 8000, 8001, 8002, misal menjadi 8003
- Save file, lalu run proyeknya dengan double click file start_server.bat
- Kembali ke dashboard superadmin proking, akses menu portal login
- Tambah data portal login untuk dashboard barunya

