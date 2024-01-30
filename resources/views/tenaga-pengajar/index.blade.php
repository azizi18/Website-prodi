<?php 
use Illuminate\Support\Facades\DB;

$dosen_staff = DB::table('dosen_staff')->get();
$pengajar = DB::table('nama_pengajar')->get();



?>
@extends('layout.head')
@section('content')
    <section id="profil" class="profil-home">
        <div class="container" data-aos="zoom-out" data-aos-delay="100">
            <h1 class="tittle mt-5">Tenaga Pengajar</h1>
            <p class="garbar-tittle"></p>
            <div class="row" data-aos="fade-up" data-aos-delay="100">
                <div class="col-md-2 mt-4">
                    <ul class="menu">
                        <div class="menu-item active">List Nama Pengajar</div>
                        <div class="menu-item">Nama Dan Photo</div>
                        
                    </ul>
                </div>
                    <div class="col-md-10 mt-4">
                        <div id="content">
                            <div class="content-item" data-aos="fade-up" data-aos-delay="50">
                                    <table id="example" class="display" style="width:100%">
                                        <thead class="thead">
                                            <tr>
                                                <th>NIDN</th>
                                                <th>NIK/NIP</th>
                                                <th>NAMA</th>
        
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i=1; foreach($pengajar as $pengajar) { ?>
                                            <tr>
                                                <td><?php echo $pengajar->nidn; ?></td>
                                                <td><?php echo $pengajar->nik_nip; ?></td>
                                                <td><?php echo $pengajar->nama; ?></td>
        
                                            </tr>
                                            <?php $i++; } ?>
                                        </tbody>
                                    </table>
                            </div>
                        </div>
    
                        <div class="content-item hidden" data-aos="fade-up" data-aos-delay="50">
                            <div class="row justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="100">
                                <?php foreach($dosen_staff as $dosen_staff) { ?>
                                <div class="col-md-10 card-kaprodi">
                                    <div class="card mx-auto" style="width: 12rem;">
                                        <div class="">
                                            @if ($dosen_staff->gambar)
                                            <img src="{{ asset('assets/upload/staff/'.$dosen_staff->gambar) }}" class="img-fluid"
                                            style="height:276px" alt="photo-dosen">                              
                                            @else
                                            <img id="thumbnail" src="{{ asset('assets/img/thumbnail-user.png') }}"  alt="photo-dosen"  style="height:276px"  class="img-fluid">
                              
                                            @endif
                                            
                                            <div class="card-body">
                                                <p class="card-text">{{ $dosen_staff->nama_staff }}</p>
                                                <p class="card-text">NIK/NIP : {{ $dosen_staff->nik }}</p>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                                </div>
                        </div>
                       
                </div>
            </div>
               
               
            </div>
            
    </section>
@endsection
