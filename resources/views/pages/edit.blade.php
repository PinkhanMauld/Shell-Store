@extends('template.navbar')

@section('content')
 <div>
    <form action="{{ route('data_akun.update', $users['id'])}}" method="POST" class="card p-5">
        @csrf
        @method('PATCH')
        @if (Session::get('success'))
            <div>
                <span class="bg-danger">{{ Session::get('success')}}</span>
            </div>
            
        @endif
        <div class="form-group">
            <label for="name" class="form-label">Username :</label>
            <input type="text" name="name" id="name" class="form-control">
        </div>
        <div class="form-group">
            <label for="email" class="form-label">Email :</label>
            <input type="text" name="email" id="email" class="form-control">
        </div>
        <div class="form-group">
            <label for="password" class="form-label">Password :</label>
            <input type="text" name="password" id="password" class="form-control">
        </div>
        <div class="form-group">
            <label for="role" class="form-label">Role :</label>
            <select name="role" id="role" class="form-select">
                <option value="admin">Admin</option>
                <option value="customer">Customer</option>
            </select>
        </div>
        <div class="form-group">
            <button href="" type="submit" class="btn btn-success mt-3">Kirim</button>
        </div>
    </form>
 </div>
@endsection