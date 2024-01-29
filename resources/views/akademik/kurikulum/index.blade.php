@extends('layout.head')
@section('content')
    <section id="kurikulum" class="d-flex align-items-center">
        <div class="container" data-aos="zoom-out" data-aos-delay="100">
            <h1 class="mt-5 tittle">Kurikulum</h1>
            <p class="garbar-tittle"></p>
            <div class="row" data-aos="fade-up" data-aos-delay="100">
                <div class="col-md-4">
                    <ul class="menu">
                        <div class="menu-item active">Kurikulum 2020</div>
                        
                    </ul>
                </div>
                    <div id="content">
                        <div class="content-item" data-aos="fade-up" data-aos-delay="50">
                                <table id="example" class="display" style="width:100%">
                                    <thead class="thead">
                                        <tr>
                                            <th>NO.</th>
                                            <th>KODE MATAKULIAH</th>
                                            <th>NAMA MATAKULIAH</th>
                                            <th>SKS</th>
    
                                        </tr>
                                    </thead>
                                    <tbody>
                                      
                                        
                                            <tr class="no-border">
                                                <td>SEMESTER 1</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
        
                                            </tr>
                                            <?php $i=1; foreach($semester_satu as $semester_satu) { ?>
                                            <tr>
                                                <td><?php echo $semester_satu->id_kurikulum; ?></td>
                                                <td><?php echo $semester_satu->kode_mk; ?></td>
                                                <td><?php echo $semester_satu->nama_mk; ?></td>
                                                <td><?php echo $semester_satu->sks; ?></td>
        
                                            </tr>
                                            <?php $i++; } ?>

                                            <tr class="no-border">
                                                <td>SEMESTER 2</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
        
                                            </tr>
                                            <?php $i=1; foreach($semester_dua as $semester_dua) { ?>
                                            <tr>
                                                <td><?php echo $semester_dua->id_kurikulum; ?></td>
                                                <td><?php echo $semester_dua->kode_mk; ?></td>
                                                <td><?php echo $semester_dua->nama_mk; ?></td>
                                                <td><?php echo $semester_dua->sks; ?></td>
        
                                            </tr>
                                            <?php $i++; } ?>
                                            <tr class="no-border">
                                                <td>SEMESTER 3</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
        
                                            </tr>
                                            <?php $i=1; foreach($semester_tiga as $semester_tiga) { ?>
                                            <tr>
                                                <td><?php echo $semester_tiga->id_kurikulum; ?></td>
                                                <td><?php echo $semester_tiga->kode_mk; ?></td>
                                                <td><?php echo $semester_tiga->nama_mk; ?></td>
                                                <td><?php echo $semester_tiga->sks; ?></td>
        
                                            </tr>
                                            <?php $i++; } ?>
                                            <tr class="no-border">
                                                <td>SEMESTER 4</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
        
                                            </tr>
                                            <?php $i=1; foreach($semester_empat as $semester_empat) { ?>
                                            <tr>
                                                <td><?php echo $semester_empat->id_kurikulum; ?></td>
                                                <td><?php echo $semester_empat->kode_mk; ?></td>
                                                <td><?php echo $semester_empat->nama_mk; ?></td>
                                                <td><?php echo $semester_empat->sks; ?></td>
        
                                            </tr>
                                            <?php $i++; } ?>
                                            <tr class="no-border">
                                                <td>SEMESTER 5</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
        
                                            </tr>
                                            <?php $i=1; foreach($semester_lima as $semester_lima) { ?>
                                            <tr>
                                                <td><?php echo $semester_lima->id_kurikulum; ?></td>
                                                <td><?php echo $semester_lima->kode_mk; ?></td>
                                                <td><?php echo $semester_lima->nama_mk; ?></td>
                                                <td><?php echo $semester_lima->sks; ?></td>
        
                                            </tr>
                                            <?php $i++; } ?>
                                            <tr class="no-border">
                                                <td>SEMESTER 6</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
        
                                            </tr>
                                            <?php $i=1; foreach($semester_enam as $semester_enam) { ?>
                                            <tr>
                                                <td><?php echo $semester_enam->id_kurikulum; ?></td>
                                                <td><?php echo $semester_enam->kode_mk; ?></td>
                                                <td><?php echo $semester_enam->nama_mk; ?></td>
                                                <td><?php echo $semester_enam->sks; ?></td>
        
                                            </tr>
                                            <?php $i++; } ?>
                                            <tr class="no-border">
                                                <td>SEMESTER 7</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
        
                                            </tr>
                                            <?php $i=1; foreach($semester_tujuh as $semester_tujuh) { ?>
                                            <tr>
                                                <td><?php echo $semester_tujuh->id_kurikulum; ?></td>
                                                <td><?php echo $semester_tujuh->kode_mk; ?></td>
                                                <td><?php echo $semester_tujuh->nama_mk; ?></td>
                                                <td><?php echo $semester_tujuh->sks; ?></td>
        
                                            </tr>
                                            <?php $i++; } ?>
                                            <tr class="no-border">
                                                <td>SEMESTER 8</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
        
                                            </tr>
                                            <?php $i=1; foreach($semester_delapan as $semester_delapan) { ?>
                                            <tr>
                                                <td><?php echo $semester_delapan->id_kurikulum; ?></td>
                                                <td><?php echo $semester_delapan->kode_mk; ?></td>
                                                <td><?php echo $semester_delapan->nama_mk; ?></td>
                                                <td><?php echo $semester_delapan->sks; ?></td>
        
                                            </tr>
                                            <?php $i++; } ?>
                                       
                                    </tbody>
                                </table>
                        </div>
                    </div>

               
            </div>
    </section>
@endsection
