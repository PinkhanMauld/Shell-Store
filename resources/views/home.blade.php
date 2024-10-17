
@extends('template.navbar')

@section('content')
<div class="container mt-5">
    <h1 class="text-center text-dark mb-4">Dashboard Bahan Bakar</h1>
    
    <div class="card bg-light mb-4 ">
        <div class="card-header bg-dark text-white">
            <h5>Selamat Datang, Admin!</h5>
        </div>
        <div class="card-body">
            <p class="card-text text-dark">Sebagai admin, Anda memiliki akses penuh untuk mengelola dan memonitor semua aktivitas yang terkait dengan penyimpanan, distribusi, dan harga bahan bakar. Tetap waspada terhadap data yang diperbarui dan pastikan sistem berjalan dengan efisien untuk mendukung kebutuhan pengguna dan operasional perusahaan.</p>
            <p>Tugas utama yang bisa Anda lakukan yaitu mengelola data fuel dan mengelola data akun</p>
            <p><b>Selamat bekerja, dan terima kasih telah menjaga sistem tetap berjalan dengan lancar!</b></p>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-header bg-primary text-white">
            Aksi
        </div>
        <div class="card-body">
            <p class="card-text">Pilih salah satu tindakan berikut:</p>
            <div class="d-flex justify-content">
                <a href="" class="btn btn-light">Kelola Data Bahan Bakar</a>
                <a href="" class="btn btn-light">Kelola Data Akun</a>           
            </div>
        </div>
    </div>
</div>
@endsection

