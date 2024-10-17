@extends('template.navbar')


@section('content')
    <div class="container mt-5">
        <div class="d-flex justify-content-end">
            <form class="d-flex me-3" action="{{ route('data_akun.index') }}" method="GET">
                <input type="text" name="cari" placeholder="Cari Nama User..." class="form-control me-2">
                <button type="submit" class="btn btn-primary">Cari </button>
            </form>
            <a href="{{ route('data_akun.create') }}" class="btn btn-success">+ Tambah</a>
        </div>
        @if (Session::get('success'))
            <div class="alert alert-success" id="alert-user">
            {{ Session::get('success') }}
            </div>
        @endif
            <table class="table table-stripped table-bordered mt-3 text-center">
                <thead>
                    <th>#</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Aksi</th>
                </thead>
                <tbody>
                    {{-- jika data  kosong --}}
                    @php
                        $no = 1;
                    @endphp
                    @if (count($users) < 0)
                        <tr>
                            <td colspan="6">Data Kosong</td>
                        </tr>
                    @else
                        {{-- $medicines : dari compact controller nya, diakses dengan loop karna data $medicines banyak (array) --}}
                        @foreach ($users as $index => $item)
                            <tr>
                                {{-- <td>{{ ($users->currentPage() - 1) * $users->perpage() + ($index + 1) }}</td> --}}
                                <td>{{$no++}}</td>
                                <td>{{ $item['name'] }}</td>
                                <td>{{ $item['email'] }}</td>
                                <td>{{ $item['role'] }}</td>
                                {{-- <td>Rp. {{ number_format($item['price'], 0, ',', '.') }}</td>
                                <td class="{{ $item['stock'] <= 3 ? 'bg-danger text-white' : '' }}" style="cursor: pointer" onclick="showModalStock({{ $item['id'] }}, {{ $item['stock'] }})">
                                    {{ $item['stock'] }}</td> --}}
                                {{-- $item['column_di_migration'] --}}
                                <td class="d-flex justify-content-center">
                                    <a href="{{ route('data_akun.edit', $item['id']) }}" class="btn btn-primary me-2">Edit</a>
                                    <a class="btn btn-danger" onclick="showModalDelete('{{ $item->id }}', '{{ $item->name }}')">Hapus</a>
                                    {{-- mengambil data id dan name dari controller --}}
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
                
            </table>
            {{-- untuk memanggil pagination --}}
            <div class="d-flex justify-content-end my-3">
                {{ $users->links() }}
            </div>
            
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <form action="" id="form-delete-akun" method="POST">
                                @csrf
                                @method('DELETE')
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus data Akun</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        apakah anda yakin akan menghapus data Akun <span id="nama-akun"
                                            style="font-weight: bolder"></span> ?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-danger">Tetap Hapus</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endsection
        
        @push('script')
            <script src="https://code.jquery.com/jquery-3.7.1.min.js"
                integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
            <script>
                function showModalDelete(id, name) {
                    let action = '{{ route('data_akun.delete', ':id') }}';
                    action = action.replace(':id', id);
                    $('#form-delete-akun').attr('action', action);
                    $('#exampleModal').modal('show');
                    console.log(name);
                    $('#nama-akun').text(name);
                }
            </script>
        @endpush