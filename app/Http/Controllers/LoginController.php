// <?php

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Storage;
// use Illuminate\Support\Facades\Session;
// use Illuminate\Support\Facades\Cookie;
// use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\Redirect;

// class LoginController extends Controller
// {
//     // Path file JSON di dalam disk 'local' (storage/app)
//     private $dataFile = 'data/user.json';
//     private $disk = 'local';

//     /**
//      * Helper untuk memuat data pengguna dari file JSON.
//      * @return array
//      */
//     private function loadUsers(): array
//     {
//         if (!Storage::disk($this->disk)->exists('data')) {
//             Storage::disk($this->disk)->makeDirectory('data');
//         }

//         if (
//             !Storage::disk($this->disk)->exists($this->dataFile) ||
//             Storage::disk($this->disk)->size($this->dataFile) === 0
//         ) {
//             Storage::disk($this->disk)->put($this->dataFile, '[]');
//             return [];
//         }

//         $content = Storage::disk($this->disk)->get($this->dataFile);
//         $users = json_decode($content, true);

//         return is_array($users) ? $users : [];
//     }

//     /**
//      * Helper untuk menyimpan data pengguna kembali ke file JSON.
//      * @param array $users
//      * @return bool
//      */
//     private function saveUsers(array $users): bool
//     {
//         $updated_data = json_encode($users, JSON_PRETTY_PRINT);
//         return Storage::disk($this->disk)->put($this->dataFile, $updated_data);
//     }

//     /**
//      * Display the login/register form.
//      */
//     public function index()
//     {
//         if (Session::has('auth')) {
//             return redirect('home');
//         }
//         return view('index');
//     }

//     /**
//      * Show the form for creating a new resource (Repurposed as the login form display).
//      */
//     public function create()
//     {
//         return $this->index();
//     }

//     /**
//      * Store a newly created resource in storage (Handles Login/Register logic).
//      */
//     public function store(Request $request)
//     {
//         $request->validate([
//             'nama' => 'required|string|max:255',
//             'password' => 'required|string',
//             'nowa' => 'required|numeric',
//         ]);

//         $password_input = $request->password;
//         $nowa = trim($request->nowa);
//         $nama = trim($request->nama);

//         $users = $this->loadUsers();
//         $nowaExists = false;

//         foreach ($users as $user) {
//             if ($user['nowa'] == $nowa) {
//                 $nowaExists = true;

//                 if (Hash::check($password_input, $user['password'])) {
//                     Session::put('auth', $user['nama']);
//                     Session::put('user_id', $nowa);

//                     return redirect('home');

//                     $nama_cookie = 'user_bxm';
//                     $nilai_cookie = $nowa;
//                     $menit_berlaku = 120;

//                     Cookie::queue($nama_cookie, $nilai_cookie, $menit_berlaku);

//                     return response('Cookie diantrekan, akan terkirim dengan response.');
//                 } else {
//                     return Redirect::back()->withErrors(['password' => 'Nomor Wa ditemukan, tetapi Password Salah.'])->withInput();
//                 }
//             }
//         }

//         if (!$nowaExists) {
//             $hashed_password = Hash::make($password_input);

//             $new_user = [
//                 'nama' => $nama,
//                 'password' => $hashed_password,
//                 'nowa' => $nowa
//             ];

//             $users[] = $new_user;

//             if ($this->saveUsers($users)) {
//                 Session::put('auth', $nama);
//                 Session::put('user_id', $nowa);
//                 return redirect('home');

//                 $nama_cookie = 'user_bxm';
//                 $nilai_cookie = $nowa;
//                 $menit_berlaku = 120;

//                 Cookie::queue($nama_cookie, $nilai_cookie, $menit_berlaku);

//                 return response('Cookie diantrekan, akan terkirim dengan response.');
//             } else {
//                 return Redirect::back()->withErrors(['save' => 'Gagal menyimpan data pengguna. Mohon coba lagi.'])->withInput();
//             }
//         }
//     }

//     /**
//      * Display the specified resource.
//      */
//     public function show(string $id)
//     {
//         //
//     }

//     /**
//      * Show the form for editing the specified resource.
//      */
//     public function edit(string $id)
//     {
//         //
//     }

//     /**
//      * Update the specified resource in storage.
//      */
//     public function update(Request $request, string $id)
//     {
//         //
//     }

//     /**
//      * Remove the specified resource from storage.
//      */
//     public function destroy(string $id)
//     {
//         //
//     }

//     /**
//      * Handle user signout.
//      */
//     public function signout()
//     {

//         Session::forget(['auth', 'user_id']);
//         Session::flush();

//         return redirect('/');
//     }
// }
