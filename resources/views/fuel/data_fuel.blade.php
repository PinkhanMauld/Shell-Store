@extends('template.navbar')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-end">
        <form class="d-flex me-3" action="" method="GET">
            <input type="text" name="cari" placeholder="Cari Bahan Bakar..." class="form-control me-2">
            <button type="submit" class="btn btn-primary">Cari </button>
        </form>
        <a href="{{ route('data_fuel.tambah')}}" class="btn btn-success">+ Tambah</a>
    </div>
    @if (Session::get('success'))
    <div class="alert alert-success" id="alert-user">
    {{ Session::get('success') }}
    </div>
@endif
        <table class="table table-stripped table-bordered mt-3 text-center">
            <thead>
                <th>#</th>
                <th>Jenis Bahan Bakar</th>
                <th>Stok (liter)</th>
                <th>Harga/L</th>
                <th>Aksi</th>
                
            </thead>
            <tbody>
                @php
                $no = 1;
            @endphp
            @if (count($fuels) < 0)
                <tr>
                    <td colspan="6">Data Kosong</td>
                </tr>
            @else
                 @foreach ($fuels as $index => $item)
                    <tr>
                        {{-- <td>{{ ($fuels->currentPage() - 1) * $fuels->perpage() + ($index + 1) }}</td> --}}
                        <td>{{$no++}}</td>
                        <td>{{ $item['type'] }}</td>
                        <td>{{ $item['stock'] }}</td>
                        <td>Rp. {{ number_format($item['price'], 0, ',', '.') }}</td>
                        {{-- <td>Rp. {{ number_format($item['price'], 0, ',', '.') }}</td>
                        <td class="{{ $item['stock'] <= 3 ? 'bg-danger text-white' : '' }}" style="cursor: pointer" onclick="showModalStock({{ $item['id'] }}, {{ $item['stock'] }})">
                            {{ $item['stock'] }}</td> --}}
                            {{-- $item['column_di_migration'] --}}
                            <td class="d-flex justify-content-center">
                                <a href="{{ route('data_fuel.ubah', $item['id']) }}" class="btn btn-primary me-2">Edit</a>
                                <button class="btn btn-danger"
                                onclick="showModalDelete('{{ $item->id }}', '{{ $item->type }}')">Hapus</button>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
            <div class="d-flex justify-content-end my-3">
                {{ $fuels->links() }}
            </div>
            {{-- modal --}}
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <form action="" id="form-delete-akun" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus data Bensin</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                apakah anda yakin akan menghapus data Bensin <span id="nama-akun"
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
            let action = '{{ route('data_fuel.hapus', ':id') }}';
            action = action.replace(':id', id);
            $('#form-delete-akun').attr('action', action);
            $('#exampleModal').modal('show');
            console.log(name);
            $('#nama-akun').text(name);
        }
    </script>
@endpush