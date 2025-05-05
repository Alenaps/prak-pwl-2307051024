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
                            <!-- <img src="{{ asset('assets/upload/img/'. $user->foto) }}" alt="Foto User" width="80"> -->
                            @php
                                $pathStorage = 'storage/uploads/' . $user->foto;
                                $pathAsset = 'assets/upload/img/' . $user->foto;
                            @endphp

                            @if($user->foto && file_exists(public_path($pathStorage)))
                                <img src="{{ asset($pathStorage) }}" alt="Foto User" width="80">
                            @elseif($user->foto && file_exists(public_path($pathAsset)))
                                <img src="{{ asset($pathAsset) }}" alt="Foto User" width="80">
                            @else
                                <img src="{{ asset('assets/img/fotoprofile.jpeg') }}" alt="Default User" width="80">
                            @endif
                        </td>
                        <td class="px-4 py-2"> 
                            <!--Detail-->
                            <a href="{{ route('user.show', $user['id']) }}" class="btn btn-primary">Detail</a>
                            <!--Edit-->
                            <a href="{{ route('user.edit', $user['id']) }}" class="btn btn-warning">Edit</a>
                            <!---Delete-->
                            <form action="{{ route('user.destroy', $user['id']) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')    
                                <button type="button" class="btn btn-danger btn-hapus">Hapus</button>
                            </form>
                        </td>
                    </td>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </div>
 
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.btn-hapus').forEach(button => {
            button.addEventListener('click', function () {
                const form = this.closest('form');
                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: "Data akan dihapus secara permanen!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    cancelButtonText: 'Batal',
                    confirmButtonText: 'Ya, hapus!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    });
</script>
@if(session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: "{{ session('success') }}",
                position: 'top-center',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            });
        </script>
    @endif
@endsection