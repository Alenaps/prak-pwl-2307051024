<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\UserModel;
use App\Http\Requests\UserRequest;
use App\Models\User;
class UserController extends Controller
{
    public function profile($nama = "", $kelas = "", $npm = "")
    {
        $data = [
            'nama'=> $nama,
            'kelas'=> $kelas,
            'npm' => $npm,
        ];
        
        return view('profile', $data);
    }

    public function create()
    {
        $kelasModel = new Kelas();

        $kelas = $kelasModel->getKelas();

        $data = [
            'title' => 'Create User',
            'kelas' => $kelas,
        ];

        return view('create_user', $data);
    }   
    public function store(UserRequest $request)
    {
        // $validatedData = $request->validate([
        //     'nama' =>'required|string|max:255',
        //     'npm' => 'required|string|max:255',
        //     'kelas_id' =>'required|exists:kelas,id',
        //     'foto' =>'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        // ], [
        //     'nama.required' => 'Nama tidak boleh kosong.',
        //     'nama.max' => 'Nama tidak boleh lebih dari 255 karakter.',
        //     'npm.required' => 'NPM wajib diisi.',
        //     'npm.size' => 'NPM harus terdiri dari 10 digit.',
        //     'foto.image' => 'Foto harus berupa gambar.',
        //     'foto.max' => 'Ukuran gambar tidak boleh lebih dari 2 MB.',
        // ]);
        
        // validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'npm' => 'required|string|max:255',
            'kelas_id' => 'required|exists:kelas,id',
            'foto' => 'image|file|max:2048', //validasi foto
        ]);

        // proses upload foto
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $filename = time().'_'.$foto->getClientOriginalName();
            $foto->storeAs('uploads', $filename); // menyimpan file ke storage
        
            //simpan data user ke database
            $this->userModel->create([
                'nama' => $request->input('nama'),
                'npm' => $request->input('npm'),
                'kelas_id' => $request->input('kelas_id'),
                'foto' => $filename, // menyimpan nama file ke database
            ]);
        }

        return redirect()->to('/')->with('success', 'User berhasil dibuat.'); 
    }

    public $userModel;
    public $kelasModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->kelasModel = new Kelas();
    }
    public function index()
    {
        $data = [
            'title' => 'List User',
            'users' => $this->userModel->getUser(),
        ];
        
        return view('list_user', $data); 
    }

    public function show($id){
        $user = $this->userModel->getUser($id);
        $data = [
            'title' => 'Profille',
            'user'  => $user,
        ];

        return view('profile', $data);
    }
    public function edit($id)
    {
        // dd($id);

        $user = UserModel::findOrFail($id);
        $kelasModel = new Kelas();
        $kelas = $kelasModel->getKelas();
        $title = 'Edit User';       
        return view('edit_user', compact('user', 'kelas', 'title'));
    }

    public function update(Request $request, $id)
    {
        $user = UserModel::findOrFail($id);

        $user->nama = $request->nama;
        $user->npm = $request->npm;
        $user->kelas_id = $request->kelas_id;

        if ($request->hasFile('foto')) {
            $fileName = time() . '.' . $request->foto->extension();
            $request->foto->move(public_path('assets/upload/img/'), $fileName);
            $user->foto = $fileName;
        }

        $user->save();

        return redirect()->route('user.list')->with('success', 'User Berhasil di Update');
    }

    public function destroy($id)
    {
        $user = UserModel::findOrFail($id);
        $user->delete();

        return redirect()->to('/')->with('success', 'User Berhasil di Hapus');
    }

    public function showDetail($id){
        $user = UserModel::findOrFail($id);
        $kelas = Kelas::find($user->kelas_id);

        $title = 'Detail'.$user->nama;

        return view('user.show', compact('user', 'kelas', 'title'));
    }

}
