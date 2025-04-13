@extends('layouts.app')
@section('content')
    <div class="container mx-auto p-4">
        <a href="{{ route('user.create') }}" class="btn btn-primary mb-3">Tambah Pengguna Baru</a>
        <table class="table-auto w-full text-sm text-gray-700">
            <thead class="bg-blue-800 text-white">
                <tr>
                    <th class="px-4 py-2">ID</th>
                    <th class="px-4 py-2">Nama</th>
                    <th class="px-4 py-2">NPM</th>
                    <th class="px-4 py-2">Kelas</th>
                    <th class="px-4 py-2">Foto</th>
                    <th class="px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($users as $user) {
                    ?>
                    <tr class="bg-blue-200 hover:bg-blue-300 ">
                        <td class="px-4 py-2"><?= $user['id'] ?></td>
                        <td class="px-4 py-2"><?= $user['nama'] ?></td>
                        <td class="px-4 py-2"><?= $user['npm'] ?></td>
                        <td class="px-4 py-2"><?= $user['nama_kelas'] ?></td>
                        <td>
                            <img src="{{ asset('assets/upload/img/'. $user->foto) }}" alt="Foto User" width="80">
                        </td>
                        <td class="px-4 py-2"> 
                            <a href="{{ route('users.show', $user['id']) }}" class="btn btn-primary">Detail</a>
                            
                    </td>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </div>
@endsection