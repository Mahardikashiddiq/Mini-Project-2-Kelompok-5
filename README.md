1. Folder .github: Digunakan untuk menyimpan konfigurasi terkait GitHub, seperti workflow untuk Continuous Integration/Continuous Deployment (CI/CD). Folder ini tidak berhubungan langsung dengan kode aplikasi, tetapi dengan proses pengembangan dan pengelolaan proyek di GitHub.

2. Folder app: Folder utama tempat kode aplikasi berada. Di dalam folder app, terdapat beberapa subfolder, termasuk Http, yang digunakan untuk menyimpan kontroler, middleware, dan request yang digunakan oleh aplikasi.

3. Subfolder Http: Folder ini berisi file yang terkait dengan HTTP request, seperti Controllers, Middleware, dan Requests. File-file di sini digunakan untuk menangani request yang datang dari pengguna (browser, API, dll.).

4. Subfolder Models: Folder ini berisi Model Eloquent di Laravel. Model ini berfungsi untuk berinteraksi dengan database menggunakan ORM Eloquent. Di dalam folder ini, terdapat file Admin.php dan User.php. berikut penjelasannya:

   a. Admin.php: Ini adalah file model untuk entitas Admin. Model ini berfungsi untuk mengelola data yang berhubungan dengan tabel admin dalam database.
      1) Namespace dan Penggunaan Trait
         - namespace App\Models;: Menyatakan bahwa file ini berada dalam folder app/Models di dalam aplikasi Laravel. Laravel menggunakan namespace untuk mengorganisir kode agar lebih terstruktur dan tidak terjadi konflik nama kelas.
         - use Illuminate\Database\Eloquent\Factories\HasFactory;: Trait ini digunakan untuk mendukung pembuatan Factory model, yang berguna untuk menghasilkan data dummy (contoh) untuk pengujian atau pengembangan. Factory mempermudah pembuatan data dalam jumlah besar untuk testing aplikasi.
         - use Illuminate\Database\Eloquent\Model;: Kelas Model adalah kelas dasar yang digunakan untuk semua model di Laravel. Dengan mewarisi kelas ini, model Admin dapat menggunakan semua metode Eloquent untuk berinteraksi dengan database.
      2) Deklarasi Kelas Admin
         - class Admin extends Model: Kelas Admin adalah sebuah Model yang akan mewakili entitas admin di dalam aplikasi. Dengan mewarisi Model, kelas ini bisa melakukan operasi database seperti insert, update, dan query lainnya menggunakan Eloquent ORM.
         - use HasFactory;: Menambahkan trait HasFactory, yang memungkinkan untuk membuat factory untuk model Admin. Hal ini memudahkan pembuatan data dummy untuk pengujian.
      3) Menentukan Nama Tabel
         - protected $table = 'admin';: Secara default, Laravel akan mencari tabel dengan nama yang sesuai dengan jamak dari nama model (misalnya, tabel untuk model Admin akan disebut admins). Jika nama tabel tidak mengikuti konvensi tersebut, kita bisa mendeklarasikannya secara manual menggunakan properti $table. Dalam hal ini, tabel yang digunakan adalah admin (bukan admins).
      4) Menentukan Kolom yang Bisa Diisi
         - protected $fillable: Properti ini digunakan untuk menentukan kolom mana saja yang dapat diisi secara massal. Hanya kolom yang ada di dalam array $fillable yang dapat diisi oleh input pengguna (misalnya, saat melakukan Admin::create($data)).
         - Kolom yang bisa diisi pada model Admin ini adalah email, password, role, nama, address, phone, dan bio. Dengan menggunakan properti ini, Laravel akan melindungi aplikasi dari serangan Mass Assignment, di mana kolom-kolom yang tidak diinginkan bisa saja dimanipulasi oleh pengguna.
      5) Pengaturan Timestamps
         - public $timestamps = true;: Laravel secara default mengelola kolom created_at dan updated_at pada setiap tabel. Dengan mengatur properti ini ke true, Laravel akan otomatis mengisi kolom created_at dan updated_at ketika data dibuat atau diperbarui.

   b. User.php: Ini adalah model untuk entitas User di aplikasi Anda. Model ini berfungsi untuk mengelola data yang berhubungan dengan tabel users dalam database.
      1) Deklarasi Kelas User
         - class User extends Model: Kelas User adalah model yang mewakili data pengguna (user) dalam aplikasi. Kelas ini mewarisi dari Model, sehingga dapat berinteraksi langsung dengan tabel yang terhubung (dalam hal ini tabel user) menggunakan metode Eloquent.
      2) Menentukan Nama Tabel
         - protected $table = 'user';: Secara default, Laravel akan mencari tabel dengan nama jamak dari nama model (misalnya, model User akan berhubungan dengan tabel users). Namun, dalam kasus ini, nama tabel Anda adalah user (bukan users), sehingga harus menentukan nama tabel secara eksplisit dengan properti $table. Ini memungkinkan untuk menggunakan nama tabel yang tidak mengikuti konvensi Laravel.
      3) Menentukan Kolom yang Bisa Diisi
         - protected $fillable: Properti ini digunakan untuk menentukan kolom mana yang dapat diisi melalui mass assignment. Artinya, saat membuat atau memperbarui data pengguna menggunakan metode seperti User::create(), hanya kolom-kolom yang terdaftar dalam array $fillable yang dapat diisi. Ini adalah langkah keamanan untuk mencegah Mass Assignment Vulnerability.
         - Kolom yang dapat diisi di sini adalah email, password, nama, address, bio, phone, dan profile_picture. Ini berarti bahwa saat membuat atau memperbarui pengguna, pengguna dapat memberikan nilai untuk kolom-kolom ini.
