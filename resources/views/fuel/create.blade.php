@extends('template.navbar')

@section('content')
 <div>
    <form action="{{ route('data_fuel.kirim')}}" method="POST" class="card p-5">
        @csrf
        @if (Session::get('success'))
            <div>
                <span class="bg-danger">{{ Session::get('success')}}</span>
            </div>
            
        @endif
        <div class="form-group">
            <label for="type" class="form-label">Jenis Bahan Bakar</label>
            <select name="type" id="type" class="form-select">
                <option value="super">Shell Super</option>
                <option value="power">Shell Power</option>
                <option value="powerDiesel">Shell V-Power Diesel</option>
                <option value="powerNitro">Shell V-Power Nitro</option>
            </select>
        </div>
        <div class="form-group">
            <label for="stock" class="form-label">Stok</label>
            <input type="number" name="stock" id="stock" class="form-control">
        </div>
        <div class="form-group">
            <label for="price" class="form-label">Harga/L</label>
            <input type="number" name="price" id="price" class="form-control">
        </div>
        <div class="form-group">
            <button href="" type="submit" class="btn btn-success">Kirim</button>
        </div>
    </form>
 </div>
@endsection