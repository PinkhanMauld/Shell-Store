@extends('template.navbar')


@section('content')
{{-- <div class="container">
    <h1>Create</h1>
</div> --}}

<form action="{{ route('data_fuel.ubah.proses', $fuel['id'])}}" method="POST" class="card p-5">
    @csrf
    @method('PATCH')
    @if(Session::get('success'))
        <div class="alert alert-success">
            {{ Session::get('success')}}
        </div>
    @endif
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
   
    <div class="mb-3 row">
        <label for="type" class="col-sm-2 col-form-label">Jenis Bahan Bakar: </label>
        <div class="col-sm-10">
            <select class="form-select" name="type" id="type">
                <option selected disabled hidden>Pilih</option>
                <option value="super" {{ $fuel['type'] == "super" ? 'selected' : '' }}>Super</option>
                <option value="power" {{ $fuel['type'] == "power" ? 'selected' : '' }}>Power</option>
                <option value="powerDiesel" {{ $fuel['type'] == "powerDiesel" ? 'selected' : '' }}>Shell V-Power Diesel</option>
                <option value="powerNitro" {{ $fuel['type'] == "powerNitro" ? 'selected' : '' }}>Shell V-Power Nitro</option>

            </select>
        </div>
    </div>
    <div class="mb-3 row">
        <label for="stock" class="col-sm-2 col-form-label">Stok : </label>
        <div class="col-sm-10">
            <input type="number" class="form-control" id="stock" name="stock">
        </div>
    <div class="mb-3 row">
        <label for="price" class="col-sm-2 col-form-label">Harga: </label>
        <div class="col-sm-10">
            <input type="number" class="form-control" id="price" name="price" value="{{ $fuel['price'] }}">
        </div>
    </div>
    <button type="submit" class="btn btn-primary mt-3">Kirim</button>
</form>
@endsection
