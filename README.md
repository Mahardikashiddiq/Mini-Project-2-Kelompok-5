1. Folder .github: Digunakan untuk menyimpan konfigurasi terkait GitHub, seperti workflow untuk Continuous Integration/Continuous Deployment (CI/CD). Folder ini tidak berhubungan langsung dengan kode aplikasi, tetapi dengan proses pengembangan dan pengelolaan proyek di GitHub.

2. Folder app: Folder utama tempat kode aplikasi berada. Di dalam folder app, terdapat beberapa subfolder, termasuk Http, yang digunakan untuk menyimpan kontroler, middleware, dan request yang digunakan oleh aplikasi.

3. Subfolder Http: Folder ini berisi file yang terkait dengan HTTP request, seperti Controllers, Middleware, dan Requests. File-file di sini digunakan untuk menangani request yang datang dari pengguna (browser, API, dll.). Terdapat file controllers dengan penjelasan sebagai berikut:
   
   a. LoginController.php:
      1) Fungsi login
         - Fungsi ini menerima data yang dikirimkan oleh pengguna melalui form login, yaitu role (admin atau user), email, dan password.
         - Berdasarkan nilai role, menentukan tabel yang akan digunakan untuk mencari data pengguna di database. Jika role adalah 'admin', maka tabel yang digunakan adalah admin; jika role adalah 'user', maka tabel yang digunakan adalah user.
         - Fungsi DB::table($table)->where('email', $email)->first() digunakan untuk mencari pengguna berdasarkan email di tabel yang sesuai (admin atau user).
         - Fungsi Hash::check($password, $user->password) digunakan untuk memeriksa apakah password yang dimasukkan cocok dengan password yang ada di database. Jika password salah, maka akan mengembalikan response JSON dengan status false dan pesan "Password salah."
         - Jika login berhasil, data pengguna (seperti email, role, nama, alamat, dan lainnya) disimpan ke dalam session dengan menggunakan Session::put(). Session yang digunakan berbeda-beda tergantung pada apakah pengguna adalah admin atau user.
      2) Fungsi Logout
         - Fungsi ini menghapus data pengguna dari session dengan menggunakan $request->session()->forget('user'). Dengan menghapus session ini, pengguna dianggap sudah keluar dari aplikasi dan tidak dapat mengakses halaman yang dilindungi tanpa login kembali.
         - Setelah session dihapus, pengguna akan diarahkan kembali ke halaman utama atau halaman login menggunakan return redirect('/'). Pada saat yang sama, pesan "Logout berhasil!" ditambahkan ke session dengan menggunakan with().

   b. RegisterController.php: Fungsi utama dari controller ini adalah untuk mengelola pendaftaran pengguna baru (register) dan proses logout (logout).
      1) Fungsi register
         - $validated = $request->validate([...]);: Fungsi ini melakukan validasi terhadap data yang dikirimkan oleh pengguna melalui form.
         - if ($role === 'admin'): Memeriksa apakah role yang dimasukkan adalah 'admin'. Jika iya, maka pendaftaran akan ditolak dengan mengembalikan response JSON yang memberi tahu bahwa "Admin tidak bisa Sign Up."
         - $existingUser = DB::table('user')->where('email', $email)->first();: Mencari apakah sudah ada pengguna dengan email yang sama di database pada tabel user.
         - Session::put('user', [...]);: Menyimpan data pengguna yang baru disimpan ke dalam session, sehingga mereka otomatis login setelah pendaftaran berhasil.
      2) Fungsi logout
         - public function logout(Request $request): Mendeklarasikan fungsi logout yang bertanggung jawab untuk menangani proses logout pengguna.
         - Session::forget('user');: Menghapus data pengguna dari session menggunakan forget(), yang berarti sesi pengguna akan dihapus dan mereka akan keluar dari aplikasi.
         - return redirect('/')->with('message', 'Logout berhasil!');: Setelah logout, pengguna akan diarahkan kembali ke halaman utama (/) atau halaman login dengan pesan "Logout berhasil!" yang ditampilkan.

   c. ProfileController.php:
      1) Fungsi showEditProfileForm
         - Session::get('user') ?? Session::get('admin') mencoba mengambil data pengguna berdasarkan key user atau admin. Jika pengguna belum login (data tidak ditemukan), maka pengguna akan diarahkan ke halaman login dengan return redirect()->route('login').
         - Berdasarkan role yang ada, kode ini akan mengambil data pengguna yang sesuai dari tabel Admin atau User menggunakan query where('email', $sessionUser['email']). Jika role adalah admin, maka data diambil dari model Admin, jika tidak dari model User.
         - Jika data pengguna tidak ditemukan (!$user), pengguna akan diarahkan kembali ke halaman profil dengan pesan kesalahan menggunakan return redirect()->route('profil')->with('error', 'User tidak ditemukan').
         - Jika data pengguna ditemukan, maka fungsi ini akan menampilkan halaman profil dan mengirimkan data pengguna dan role ke view tersebut.
      2) Fungsi update
         - $sessionUser = Session::get('user') ?? Session::get('admin');: Mengambil data pengguna yang login dari session (user atau admin). Jika session user tidak ada, maka akan mengambil session admin.
         - if (!$sessionUser): Mengecek apakah pengguna sudah login dengan memeriksa session. Jika tidak ada data pengguna dalam session, maka mengembalikan response JSON dengan status false dan pesan "Anda belum login."
         - $validator = Validator::make($request->all(), [...]);: Menggunakan Laravel's Validator untuk memvalidasi input yang dikirimkan dalam form. Validasi yang diterapkan meliputi:
            - nama: Harus diisi dan berupa string dengan panjang maksimal 255 karakter.
            - address, bio, phone: Bersifat opsional, tetapi jika diisi, harus berupa string dengan panjang maksimal yang sesuai.
         - if ($validator->fails()): Jika validasi gagal, fungsi ini mengembalikan response JSON dengan status false dan pesan "Validasi gagal" beserta rincian kesalahan validasi.
         - Jika pengguna meng-upload gambar profil baru, file tersebut disimpan di folder public/profile_pictures, dan path gambar yang disimpan di database akan diperbarui.
           
   d. UserController.php:
      1) Fungsi index
         - Session::get('admin'): Fungsi ini mengambil data sesi yang disimpan untuk admin. Biasanya digunakan untuk memastikan bahwa hanya admin yang dapat mengakses daftar pengguna atau melakukan operasi tertentu.
         - $users = User::all();: Mengambil semua data pengguna (User) dari tabel users di database menggunakan model User.
         - return view('tambah_user', ['users' => $users]);: Mengembalikan tampilan (view) tambah_user dan mengirimkan data users ke tampilan tersebut. Data ini digunakan untuk menampilkan daftar pengguna di halaman tersebut.
      2) Fungsi store
         - $request->validate([...]);: Fungsi ini memvalidasi input dari pengguna.
         - Jika pengguna meng-upload gambar avatar, file gambar tersebut akan disimpan di direktori public/avatars. Path dari gambar avatar disimpan dalam variabel $avatarPath.
      3) Fungsi destroy
         - $user = User::findOrFail($id);: Mencari data pengguna berdasarkan ID yang diberikan. Jika pengguna tidak ditemukan, maka findOrFail akan melemparkan pengecualian (exception).
         - $user->delete();: Menghapus pengguna yang ditemukan dari database.
         - return response()->json([...]);: Jika penghapusan berhasil, fungsi ini mengembalikan response JSON dengan status success: true. Jika gagal, mengembalikan pesan kesalahan.
         - $user = User::findOrFail($id);: Mencari data pengguna berdasarkan ID. Jika pengguna tidak ditemukan, maka akan melemparkan pengecualian (exception).
      4) Fungsi update
         - $user = User::findOrFail($id);: Mencari data pengguna berdasarkan ID. Jika pengguna tidak ditemukan, maka akan melemparkan pengecualian (exception).

5. Subfolder Models: Folder ini berisi Model Eloquent di Laravel. Model ini berfungsi untuk berinteraksi dengan database menggunakan ORM Eloquent. Di dalam folder ini, terdapat file Admin.php dan User.php. berikut penjelasannya:

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

   b. User.php: Ini adalah model untuk entitas User. Model ini berfungsi untuk mengelola data yang berhubungan dengan tabel users dalam database.
      1) Deklarasi Kelas User
         - class User extends Model: Kelas User adalah model yang mewakili data pengguna (user) dalam aplikasi. Kelas ini mewarisi dari Model, sehingga dapat berinteraksi langsung dengan tabel yang terhubung (dalam hal ini tabel user) menggunakan metode Eloquent.
      2) Menentukan Nama Tabel
         - protected $table = 'user';: Secara default, Laravel akan mencari tabel dengan nama jamak dari nama model (misalnya, model User akan berhubungan dengan tabel users). Namun, dalam kasus ini, nama tabel Anda adalah user (bukan users), sehingga harus menentukan nama tabel secara eksplisit dengan properti $table. Ini memungkinkan untuk menggunakan nama tabel yang tidak mengikuti konvensi Laravel.
      3) Menentukan Kolom yang Bisa Diisi
         - protected $fillable: Properti ini digunakan untuk menentukan kolom mana yang dapat diisi melalui mass assignment. Artinya, saat membuat atau memperbarui data pengguna menggunakan metode seperti User::create(), hanya kolom-kolom yang terdaftar dalam array $fillable yang dapat diisi. Ini adalah langkah keamanan untuk mencegah Mass Assignment Vulnerability.
         - Kolom yang dapat diisi di sini adalah email, password, nama, address, bio, phone, dan profile_picture. Ini berarti bahwa saat membuat atau memperbarui pengguna, pengguna dapat memberikan nilai untuk kolom-kolom ini.
