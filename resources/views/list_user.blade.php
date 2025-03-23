@extends('layouts.app')
@section('content')
    <div class="container mx-auto p-4">
        <h2 class="text-2xl font-bold text-blue-500 mb-4">List User</h2>
        <table class="table-auto w-full text-sm text-gray-700">
            <thead class="bg-blue-800 text-white">
                <tr>
                    <th class="px-4 py-2">ID</th>
                    <th class="px-4 py-2">Nama</th>
                    <th class="px-4 py-2">NPM</th>
                    <th class="px-4 py-2">Kelas</th>
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
                        <td class="px-4 py-2"> </tr>                     
                    </td>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </div>
@endsection