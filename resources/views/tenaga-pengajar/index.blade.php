<?php 
use Illuminate\Support\Facades\DB;

$dosen_staff = DB::table('dosen_staff')->get();




?>
@extends('layout.head')
@section('content')
    <section id="profil" class="profil-home">
        <div class="container" data-aos="zoom-out" data-aos-delay="100">
            <h1 class="tittle mt-5">Tenaga Pengajar</h1>
            <p class="garbar-tittle"></p>
            <div class="row" data-aos="fade-up" data-aos-delay="100">
                <?php foreach($dosen_staff as $dosen_staff) { ?>
                <div class="col-md-3 mt-4">

        
                    @if ($dosen_staff->gambar)
                    <img src="{{ asset('assets/upload/staff/'.$dosen_staff->gambar) }}" class="img-fluid"
                    alt="photo-dosen">                              
                    @else
                    <img id="thumbnail" src="{{ asset('assets/img/thumbnail-user.png') }}"  alt="photo-dosen" style="height: 265px"  class="img-fluid">
      
                    @endif
                   
                        <p class="card-text">{{ $dosen_staff->nama_staff }}</p>
                        </p>                         
                            
                    </div>
                    <div class="col-md-8 mt-4">
                        <div class="fw-bold" style="background-color: #b5e0e2">Nama
                        </div>
                        <p>{{ $dosen_staff->nama_staff }}</p>
                        <div class="fw-bold" style="background-color: #b5e0e2">Email
                        </div>
                        <p>{{ $dosen_staff->email }}</p>
                        <div class="fw-bold" style="background-color: #b5e0e2">Tempat Tanggal Lahir
                        </div>
                        <p>{{ $dosen_staff->tempat_lahir }}</p>
                        <div class="fw-bold" style="background-color: #b5e0e2">Alamat
                        </div>
                        <p>{{ $dosen_staff->alamat }}</p>
                        <div class="fw-bold" style="background-color: #b5e0e2">Pendidikan S1
                        </div>
                        <p>{{ $dosen_staff->pendidikan_s1 }}</p>
                        <div class="fw-bold" style="background-color: #b5e0e2">Pendidikan S2
                        </div>
                        <p>{{ $dosen_staff->pendidikan_s2 }}</p>
                        <div class="faq">
                        <ul class="faq-list mt-3">
                            <li>
                                <div data-bs-toggle="collapse" class="collapsed question fw-bold" href="#faq1">Penelitian
                                     <i class="bi bi-plus icon-show"></i><i
                                        class="bi bi-dash icon-close"></i></div>
                                <div id="faq1" class="collapse" data-bs-parent=".faq-list">
                                    <p class="text-justify">
                                        {{ $dosen_staff->penelitian }}
                                    </p>
                                </div>
                            </li>
                            <li>
                                <div data-bs-toggle="collapse" class="collapsed question fw-bold" href="#faq2">Publikasi
                                     <i class="bi bi-plus icon-show"></i><i
                                        class="bi bi-dash icon-close"></i></div>
                                <div id="faq2" class="collapse" data-bs-parent=".faq-list">
                                    <p class="text-justify">
                                        {{ $dosen_staff->publikasi }}
                                    </p>
                                </div>
                            </li>
    
                        </ul>
                    </div>
                       
                    </div>
                            
                          <?php } ?>
                      </div>

    
                  
                </div>
                   
                        
                      
               
               
               
           
            
    </section>
@endsection
