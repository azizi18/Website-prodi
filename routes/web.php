<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Like;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/* frontend header */
/* frontend profil */
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['guest']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
    $prefix = config('lfm.url_prefix', 'laravel-filemanager');
    $baseURL = config('lfm.base_url', 'public');
    $uploadURL = config('lfm.upload_url', '/upload');


});

Route::get('/', 'App\Http\Controllers\Home@index');
Route::get('home', 'App\Http\Controllers\Home@index');


/* frontend kurikulumk*/
Route::get('kurikulum', 'App\Http\Controllers\Kurikulum@index');


//  frontend tenaga pengajar
Route::get('tenaga-pengajar', 'App\Http\Controllers\TenagaPengajar@index');


/* frontend pengumuman */
Route::get('pengumuman', 'App\Http\Controllers\Pengumuman@index');
Route::get('pengumuman/read/{par1}', 'App\Http\Controllers\Pengumuman@read');
Route::get('pengumuman/unduh/{par1}', 'App\Http\Controllers\Pengumuman@unduh');


/* login */
Route::get('login', function () {
    return view('login/index');
});
Route::post('login/check', 'App\Http\Controllers\Login@check');
Route::get('login/lupa', 'App\Http\Controllers\Login@lupa');
Route::get('login/logout', 'App\Http\Controllers\Login@logout');

// dasbor
Route::get('admin/dasbor', 'App\Http\Controllers\Admin\Dasbor@index');
Route::get('admin/dasbor/konfigurasi', 'App\Http\Controllers\Admin\Dasbor@konfigurasi');

//berita
Route::get('berita', 'App\Http\Controllers\Berita@index');
Route::get('berita/read/{par1}', 'App\Http\Controllers\Berita@read');
Route::get('berita/kategori/{par1}', 'App\Http\Controllers\Berita@kategori');
Route::post('berita/comment_proses/{par1}', 'App\Http\Controllers\Comment@comment_proses');




// berkas
Route::get('berkas', 'App\Http\Controllers\Berkas@index');
Route::get('berkas/unduh/{par1}', 'App\Http\Controllers\Berkas@unduh');
Route::get('berkas/kategori/{par1}', 'App\Http\Controllers\Berkas@kategori');

// Kalender
Route::get('profil', 'App\Http\Controllers\Profil@index');
Route::get('profil/kategori/{par1}', 'App\Http\Controllers\Profil@kategori');



// visi misi
Route::get('visi-misi', 'App\Http\Controllers\Visi@index');
Route::get('visi-misi/kategori/{par1}', 'App\Http\Controllers\Visi@kategori');
// galeri




/* BACK END */

// dasbor
Route::get('admin/dasbor', 'App\Http\Controllers\Admin\Dasbor@index');
Route::get('admin/dasbor/konfigurasi', 'App\Http\Controllers\Admin\Dasbor@konfigurasi');

// user
Route::get('admin/user', 'App\Http\Controllers\Admin\User@index');
Route::post('admin/user/tambah', 'App\Http\Controllers\Admin\User@tambah');
Route::get('admin/user/edit/{par1}', 'App\Http\Controllers\Admin\User@edit');
Route::post('admin/user/proses_edit', 'App\Http\Controllers\Admin\User@proses_edit');
Route::get('admin/user/delete/{par1}', 'App\Http\Controllers\Admin\User@delete');
Route::post('admin/user/proses', 'App\Http\Controllers\Admin\User@proses');
// konfigurasi
Route::get('admin/konfigurasi', 'App\Http\Controllers\Admin\Konfigurasi@index');
Route::get('admin/konfigurasi/logo', 'App\Http\Controllers\Admin\Konfigurasi@logo');
Route::get('admin/konfigurasi/icon', 'App\Http\Controllers\Admin\Konfigurasi@icon');
Route::post('admin/konfigurasi/proses', 'App\Http\Controllers\Admin\Konfigurasi@proses');
Route::post('admin/konfigurasi/proses_logo', 'App\Http\Controllers\Admin\Konfigurasi@proses_logo');
Route::post('admin/konfigurasi/proses_icon', 'App\Http\Controllers\Admin\Konfigurasi@proses_icon');

// berita
Route::get('admin/berita', 'App\Http\Controllers\Admin\Berita@index');
Route::get('admin/berita/cari', 'App\Http\Controllers\Admin\Berita@cari');
Route::get('admin/berita/status_berita/{par1}', 'App\Http\Controllers\Admin\Berita@status_berita');
Route::get('admin/berita/kategori/{par1}', 'App\Http\Controllers\Admin\Berita@kategori');
Route::get('admin/berita/jenis_berita/{par1}', 'App\Http\Controllers\Admin\Berita@jenis_berita');
Route::get('admin/berita/author/{par1}', 'App\Http\Controllers\Admin\Berita@author');
Route::get('admin/berita/tambah', 'App\Http\Controllers\Admin\Berita@tambah');
Route::get('admin/berita/edit/{par1}', 'App\Http\Controllers\Admin\Berita@edit');
Route::get('admin/berita/delete/{par1}', 'App\Http\Controllers\Admin\Berita@delete');
Route::post('admin/berita/tambah_proses', 'App\Http\Controllers\Admin\Berita@tambah_proses');
Route::post('admin/berita/edit_proses', 'App\Http\Controllers\Admin\Berita@edit_proses');
Route::post('admin/berita/proses', 'App\Http\Controllers\Admin\Berita@proses');
Route::get('admin/berita/add', 'App\Http\Controllers\Admin\Berita@add');
Route::post('ckeditor/image_upload', 'App\Http\Controllers\Admin\Berita@upload')->name('upload');





// pengumuman
Route::get('admin/pengumuman', 'App\Http\Controllers\Admin\Pengumuman@index');
Route::get('admin/pengumuman/cari', 'App\Http\Controllers\Admin\Pengumuman@cari');
Route::get('admin/pengumuman/status_pengumuman/{par1}', 'App\Http\Controllers\Admin\Pengumuman@status_pengumuman');
Route::get('admin/pengumuman/kategori/{par1}', 'App\Http\Controllers\Admin\Pengumuman@kategori');
Route::get('admin/pengumuman/jenis_pengumuman/{par1}', 'App\Http\Controllers\Admin\Pengumuman@jenis_pengumuman');
Route::get('admin/pengumuman/author/{par1}', 'App\Http\Controllers\Admin\Pengumuman@author');
Route::get('admin/pengumuman/tambah', 'App\Http\Controllers\Admin\Pengumuman@tambah');
Route::get('admin/pengumuman/edit/{par1}', 'App\Http\Controllers\Admin\Pengumuman@edit');
Route::get('admin/pengumuman/delete/{par1}', 'App\Http\Controllers\Admin\Pengumuman@delete');
Route::post('admin/pengumuman/tambah_proses', 'App\Http\Controllers\Admin\Pengumuman@tambah_proses');
Route::post('admin/pengumuman/edit_proses', 'App\Http\Controllers\Admin\Pengumuman@edit_proses');
Route::post('admin/pengumuman/proses', 'App\Http\Controllers\Admin\Pengumuman@proses');
Route::get('admin/pengumuman/add', 'App\Http\Controllers\Admin\Pengumuman@add');
Route::post('ckeditor/image_upload', 'App\Http\Controllers\Admin\Pengumuman@upload')->name('upload');



// kategori Berita
Route::get('admin/kategori', 'App\Http\Controllers\Admin\Kategori@index');
Route::post('admin/kategori/tambah', 'App\Http\Controllers\Admin\Kategori@tambah');
Route::post('admin/kategori/edit', 'App\Http\Controllers\Admin\Kategori@edit');
Route::get('admin/kategori/delete/{par1}', 'App\Http\Controllers\Admin\Kategori@delete');

// kategori Pengumuman
Route::get('admin/kategori-pengumuman', 'App\Http\Controllers\Admin\Kategori_pengumuman@index');
Route::post('admin/kategori-pengumuman/tambah', 'App\Http\Controllers\Admin\Kategori_pengumuman@tambah');
Route::post('admin/kategori-pengumuman/edit', 'App\Http\Controllers\Admin\Kategori_pengumuman@edit');
Route::get('admin/kategori-pengumuman/delete/{par1}', 'App\Http\Controllers\Admin\Kategori_pengumuman@delete');



// status
Route::get('admin/status_site', 'App\Http\Controllers\Admin\Status_site@index');
Route::post('admin/status_site/tambah', 'App\Http\Controllers\Admin\Status_site@tambah');
Route::post('admin/status_site/edit', 'App\Http\Controllers\Admin\Status_site@edit');
Route::get('admin/status_site/delete/{par1}', 'App\Http\Controllers\Admin\Status_site@delete');



// kategori_profil
Route::get('admin/kategori_profil', 'App\Http\Controllers\Admin\Kategori_profil@index');
Route::post('admin/kategori_profil/tambah', 'App\Http\Controllers\Admin\Kategori_profil@tambah');
Route::post('admin/kategori_profil/edit', 'App\Http\Controllers\Admin\Kategori_profil@edit');
Route::get('admin/kategori_profil/delete/{par1}', 'App\Http\Controllers\Admin\Kategori_profil@delete');

// kategori_akademik
Route::get('admin/kategori_akademik', 'App\Http\Controllers\Admin\Kategori_akademik@index');
Route::post('admin/kategori_akademik/tambah', 'App\Http\Controllers\Admin\Kategori_akademik@tambah');
Route::post('admin/kategori_akademik/edit', 'App\Http\Controllers\Admin\Kategori_akademik@edit');
Route::get('admin/kategori_akademik/delete/{par1}', 'App\Http\Controllers\Admin\Kategori_akademik@delete');


// galeri
Route::get('admin/galeri', 'App\Http\Controllers\Admin\Galeri@index');
Route::get('admin/galeri/cari', 'App\Http\Controllers\Admin\Galeri@cari');
Route::get('admin/galeri/status_galeri/{par1}', 'App\Http\Controllers\Admin\Galeri@status_galeri');
Route::get('admin/galeri/tambah', 'App\Http\Controllers\Admin\Galeri@tambah');
Route::get('admin/galeri/edit/{par1}', 'App\Http\Controllers\Admin\Galeri@edit');
Route::get('admin/galeri/delete/{par1}', 'App\Http\Controllers\Admin\Galeri@delete');
Route::post('admin/galeri/tambah_proses', 'App\Http\Controllers\Admin\Galeri@tambah_proses');
Route::post('admin/galeri/edit_proses', 'App\Http\Controllers\Admin\Galeri@edit_proses');
Route::post('admin/galeri/proses', 'App\Http\Controllers\Admin\Galeri@proses');

//   Dosen staff
Route::get('admin/dosen-staff', 'App\Http\Controllers\Admin\DosenStaff@index');
Route::get('admin/dosen-staff/cari', 'App\Http\Controllers\Admin\DosenStaff@cari');
Route::get('admin/dosen-staff/status_staff/{par1}', 'App\Http\Controllers\Admin\DosenStaff@status_staff');
Route::get('admin/dosen-staff/kategori/{par1}', 'App\Http\Controllers\Admin\DosenStaff@kategori');
Route::get('admin/dosen-staff/detail/{par1}', 'App\Http\Controllers\Admin\DosenStaff@detail');
Route::get('admin/dosen-staff/tambah', 'App\Http\Controllers\Admin\DosenStaff@tambah');
Route::get('admin/dosen-staff/edit/{par1}', 'App\Http\Controllers\Admin\DosenStaff@edit');
Route::get('admin/dosen-staff/delete/{par1}', 'App\Http\Controllers\Admin\DosenStaff@delete');
Route::post('admin/dosen-staff/tambah_proses', 'App\Http\Controllers\Admin\DosenStaff@tambah_proses');
Route::post('admin/dosen-staff/edit_proses', 'App\Http\Controllers\Admin\DosenStaff@edit_proses');
Route::post('admin/dosen-staff/proses', 'App\Http\Controllers\Admin\DosenStaff@proses');



// site
Route::get('admin/site', 'App\Http\Controllers\Admin\Site@index');
Route::get('admin/site/cari', 'App\Http\Controllers\Admin\Site@cari');
Route::get('admin/site/status_site/{par1}', 'App\Http\Controllers\Admin\Site@status_site');
Route::get('admin/site/kategori/{par1}', 'App\Http\Controllers\Admin\Site@kategori');
Route::get('admin/site/detail/{par1}', 'App\Http\Controllers\Admin\Site@detail');
Route::get('admin/site/tambah', 'App\Http\Controllers\Admin\Site@tambah');
Route::get('admin/site/edit/{par1}', 'App\Http\Controllers\Admin\Site@edit');
Route::get('admin/site/status/{par1}', 'App\Http\Controllers\Admin\Site@status');
Route::get('admin/site/delete/{par1}', 'App\Http\Controllers\Admin\Site@delete');
Route::post('admin/site/tambah_proses', 'App\Http\Controllers\Admin\Site@tambah_proses');
Route::post('admin/site/edit_proses', 'App\Http\Controllers\Admin\Site@edit_proses');
Route::post('admin/site/proses', 'App\Http\Controllers\Admin\Site@proses');




//Prodi Nama Pengajar
Route ::get('admin/nama-pengajar', 'App\Http\Controllers\Admin\NamaPengajar@index');
Route::get('admin/nama-pengajar/cari', 'App\Http\Controllers\Admin\NamaPengajar@cari');
Route::get('admin/nama-pengajar/tambah', 'App\Http\Controllers\Admin\NamaPengajar@tambah');
Route::get('admin/nama-pengajar/edit/{par1}', 'App\Http\Controllers\Admin\NamaPengajar@edit');
Route::get('admin/nama-pengajar/delete/{par1}', 'App\Http\Controllers\Admin\NamaPengajar@delete');
Route::post('admin/nama-pengajar/tambah_proses', 'App\Http\Controllers\Admin\NamaPengajar@tambah_proses');
Route::post('admin/nama-pengajar/edit_proses', 'App\Http\Controllers\Admin\NamaPengajar@edit_proses');
Route::post('admin/nama-pengajar/proses', 'App\Http\Controllers\Admin\NamaPengajar@proses');
Route::post('admin/nama-pengajar/import', 'App\Http\Controllers\Admin\NamaPengajar@import');

//Prodi Semester satu
Route ::get('admin/semester-satu', 'App\Http\Controllers\Admin\SemesterSatu@index');
Route::get('admin/semester-satu/cari', 'App\Http\Controllers\Admin\SemesterSatu@cari');
Route::get('admin/semester-satu/tambah', 'App\Http\Controllers\Admin\SemesterSatu@tambah');
Route::get('admin/semester-satu/edit/{par1}', 'App\Http\Controllers\Admin\SemesterSatu@edit');
Route::get('admin/semester-satu/delete/{par1}', 'App\Http\Controllers\Admin\SemesterSatu@delete');
Route::post('admin/semester-satu/tambah_proses', 'App\Http\Controllers\Admin\SemesterSatu@tambah_proses');
Route::post('admin/semester-satu/edit_proses', 'App\Http\Controllers\Admin\SemesterSatu@edit_proses');
Route::post('admin/semester-satu/proses', 'App\Http\Controllers\Admin\SemesterSatu@proses');
Route::post('admin/semester-satu/import', 'App\Http\Controllers\Admin\SemesterSatu@import');


//Prodi Semesterdua
Route ::get('admin/semester-dua', 'App\Http\Controllers\Admin\SemesterDua@index');
Route::get('admin/semester-dua/cari', 'App\Http\Controllers\Admin\SemesterDua@cari');
Route::get('admin/semester-dua/tambah', 'App\Http\Controllers\Admin\SemesterDua@tambah');
Route::get('admin/semester-dua/edit/{par1}', 'App\Http\Controllers\Admin\SemesterDua@edit');
Route::get('admin/semester-dua/delete/{par1}', 'App\Http\Controllers\Admin\SemesterDua@delete');
Route::post('admin/semester-dua/tambah_proses', 'App\Http\Controllers\Admin\SemesterDua@tambah_proses');
Route::post('admin/semester-dua/edit_proses', 'App\Http\Controllers\Admin\SemesterDua@edit_proses');
Route::post('admin/semester-dua/proses', 'App\Http\Controllers\Admin\SemesterDua@proses');
Route::post('admin/semester-dua/import', 'App\Http\Controllers\Admin\SemesterDua@import');

//Prodi Semestertiga
Route ::get('admin/semester-tiga', 'App\Http\Controllers\Admin\SemesterTiga@index');
Route::get('admin/semester-tiga/cari', 'App\Http\Controllers\Admin\SemesterTiga@cari');
Route::get('admin/semester-tiga/tambah', 'App\Http\Controllers\Admin\SemesterTiga@tambah');
Route::get('admin/semester-tiga/edit/{par1}', 'App\Http\Controllers\Admin\SemesterTiga@edit');
Route::get('admin/semester-tiga/delete/{par1}', 'App\Http\Controllers\Admin\SemesterTiga@delete');
Route::post('admin/semester-tiga/tambah_proses', 'App\Http\Controllers\Admin\SemesterTiga@tambah_proses');
Route::post('admin/semester-tiga/edit_proses', 'App\Http\Controllers\Admin\SemesterTiga@edit_proses');
Route::post('admin/semester-tiga/proses', 'App\Http\Controllers\Admin\SemesterTiga@proses');
Route::post('admin/semester-tiga/import', 'App\Http\Controllers\Admin\SemesterTiga@import');


//Prodi Semesterempat
Route ::get('admin/semester-empat', 'App\Http\Controllers\Admin\SemesterEmpat@index');
Route::get('admin/semester-empat/cari', 'App\Http\Controllers\Admin\SemesterEmpat@cari');
Route::get('admin/semester-empat/tambah', 'App\Http\Controllers\Admin\SemesterEmpat@tambah');
Route::get('admin/semester-empat/edit/{par1}', 'App\Http\Controllers\Admin\SemesterEmpat@edit');
Route::get('admin/semester-empat/delete/{par1}', 'App\Http\Controllers\Admin\SemesterEmpat@delete');
Route::post('admin/semester-empat/tambah_proses', 'App\Http\Controllers\Admin\SemesterEmpat@tambah_proses');
Route::post('admin/semester-empat/edit_proses', 'App\Http\Controllers\Admin\SemesterEmpat@edit_proses');
Route::post('admin/semester-empat/proses', 'App\Http\Controllers\Admin\SemesterEmpat@proses');
Route::post('admin/semester-empat/import', 'App\Http\Controllers\Admin\SemesterEmpat@import');

//Prodi Semesterlima
Route ::get('admin/semester-lima', 'App\Http\Controllers\Admin\SemesterLima@index');
Route::get('admin/semester-lima/cari', 'App\Http\Controllers\Admin\SemesterLima@cari');
Route::get('admin/semester-lima/tambah', 'App\Http\Controllers\Admin\SemesterLima@tambah');
Route::get('admin/semester-lima/edit/{par1}', 'App\Http\Controllers\Admin\SemesterLima@edit');
Route::get('admin/semester-lima/delete/{par1}', 'App\Http\Controllers\Admin\SemesterLima@delete');
Route::post('admin/semester-lima/tambah_proses', 'App\Http\Controllers\Admin\SemesterLima@tambah_proses');
Route::post('admin/semester-lima/edit_proses', 'App\Http\Controllers\Admin\SemesterLima@edit_proses');
Route::post('admin/semester-lima/proses', 'App\Http\Controllers\Admin\SemesterLima@proses');
Route::post('admin/semester-lima/import', 'App\Http\Controllers\Admin\SemesterLima@import');

//Prodi SemesterEnam
Route ::get('admin/semester-enam', 'App\Http\Controllers\Admin\SemesterEnam@index');
Route::get('admin/semester-enam/cari', 'App\Http\Controllers\Admin\SemesterEnam@cari');
Route::get('admin/semester-enam/tambah', 'App\Http\Controllers\Admin\SemesterEnam@tambah');
Route::get('admin/semester-enam/edit/{par1}', 'App\Http\Controllers\Admin\SemesterEnam@edit');
Route::get('admin/semester-enam/delete/{par1}', 'App\Http\Controllers\Admin\SemesterEnam@delete');
Route::post('admin/semester-enam/tambah_proses', 'App\Http\Controllers\Admin\SemesterEnam@tambah_proses');
Route::post('admin/semester-enam/edit_proses', 'App\Http\Controllers\Admin\SemesterEnam@edit_proses');
Route::post('admin/semester-enam/proses', 'App\Http\Controllers\Admin\SemesterEnam@proses');
Route::post('admin/semester-enam/import', 'App\Http\Controllers\Admin\SemesterEnam@import');

//Prodi SemesterTujuh
Route ::get('admin/semester-tujuh', 'App\Http\Controllers\Admin\SemesterTujuh@index');
Route::get('admin/semester-tujuh/cari', 'App\Http\Controllers\Admin\SemesterTujuh@cari');
Route::get('admin/semester-tujuh/tambah', 'App\Http\Controllers\Admin\SemesterTujuh@tambah');
Route::get('admin/semester-tujuh/edit/{par1}', 'App\Http\Controllers\Admin\SemesterTujuh@edit');
Route::get('admin/semester-tujuh/delete/{par1}', 'App\Http\Controllers\Admin\SemesterTujuh@delete');
Route::post('admin/semester-tujuh/tambah_proses', 'App\Http\Controllers\Admin\SemesterTujuh@tambah_proses');
Route::post('admin/semester-tujuh/edit_proses', 'App\Http\Controllers\Admin\SemesterTujuh@edit_proses');
Route::post('admin/semester-tujuh/proses', 'App\Http\Controllers\Admin\SemesterTujuh@proses');
Route::post('admin/semester-tujuh/import', 'App\Http\Controllers\Admin\SemesterTujuh@import');

//Prodi SemesterTujuh
Route ::get('admin/semester-delapan', 'App\Http\Controllers\Admin\SemesterDelapan@index');
Route::get('admin/semester-delapan/cari', 'App\Http\Controllers\Admin\SemesterDelapan@cari');
Route::get('admin/semester-delapan/tambah', 'App\Http\Controllers\Admin\SemesterDelapan@tambah');
Route::get('admin/semester-delapan/edit/{par1}', 'App\Http\Controllers\Admin\SemesterDelapan@edit');
Route::get('admin/semester-delapan/delete/{par1}', 'App\Http\Controllers\Admin\SemesterDelapan@delete');
Route::post('admin/semester-delapan/tambah_proses', 'App\Http\Controllers\Admin\SemesterDelapan@tambah_proses');
Route::post('admin/semester-delapan/edit_proses', 'App\Http\Controllers\Admin\SemesterDelapan@edit_proses');
Route::post('admin/semester-delapan/proses', 'App\Http\Controllers\Admin\SemesterDelapan@proses');
Route::post('admin/semester-delapan/import', 'App\Http\Controllers\Admin\SemesterDelapan@import');

// berkas
Route::get('admin/berkas', 'App\Http\Controllers\Admin\Berkas@index');
Route::get('admin/berkas/cari', 'App\Http\Controllers\Admin\Berkas@cari');
Route::get('admin/berkas/tambah', 'App\Http\Controllers\Admin\Berkas@tambah');
Route::get('admin/berkas/edit/{par1}', 'App\Http\Controllers\Admin\Berkas@edit');
Route::get('admin/berkas/unduh/{par1}', 'App\Http\Controllers\Admin\Berkas@unduh');
Route::get('admin/berkas/delete/{par1}', 'App\Http\Controllers\Admin\Berkas@delete');
Route::post('admin/berkas/tambah_proses', 'App\Http\Controllers\Admin\Berkas@tambah_proses');
Route::post('admin/berkas/edit_proses', 'App\Http\Controllers\Admin\Berkas@edit_proses');
Route::post('admin/berkas/proses', 'App\Http\Controllers\Admin\Berkas@proses');
Route::post('ckeditor/image_upload', 'App\Http\Controllers\Admin\Berkas@upload')->name('upload');


// profil
Route::get('admin/profil', 'App\Http\Controllers\Admin\Profil@index');
Route::get('admin/profil/cari', 'App\Http\Controllers\Admin\Profil@cari');
Route::get('admin/profil/kategori/{par1}', 'App\Http\Controllers\Admin\Profil@kategori');
Route::get('admin/profil/tambah', 'App\Http\Controllers\Admin\Profil@tambah');
Route::get('admin/profil/edit/{par1}', 'App\Http\Controllers\Admin\Profil@edit');
Route::get('admin/profil/delete/{par1}', 'App\Http\Controllers\Admin\Profil@delete');
Route::post('admin/profil/tambah_proses', 'App\Http\Controllers\Admin\Profil@tambah_proses');
Route::post('admin/profil/edit_proses', 'App\Http\Controllers\Admin\Profil@edit_proses');
Route::post('admin/profil/proses', 'App\Http\Controllers\Admin\Profil@proses');
Route::post('ckeditor/image_upload', 'App\Http\Controllers\Admin\Profil@upload')->name('upload');





/* END BACK END*/
