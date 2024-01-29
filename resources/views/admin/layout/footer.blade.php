
<script>
    @if ($message = Session::get('sukses'))
        // Notifikasi
        swal("Berhasil", "<?php echo $message; ?>", "success")
    @endif

    @if ($message = Session::get('warning'))
        // Notifikasi
        swal("Oops..", "<?php echo $message; ?>", "warning")
    @endif

    // Popup Delete
    $(document).on("click", ".delete-link", function(e) {
        e.preventDefault();
        url = $(this).attr("href");
        swal({
                title: "Yakin akan menghapus data ini?",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: 'btn btn-danger',
                cancelButtonClass: 'btn btn-success',
                buttonsStyling: false,
                confirmButtonText: "Delete",
                cancelButtonText: "Cancel",
                closeOnConfirm: false,
                showLoaderOnConfirm: true,
            },
            function(isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        url: url,
                        success: function(resp) {
                            window.location.href = url;
                        }
                    });
                }
                return false;
            });
    });
    // Popup disable
    $(document).on("click", ".disable-link", function(e) {
        e.preventDefault();
        url = $(this).attr("href");
        swal({
                title: "Yakin akan menonaktifkan data ini?",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: 'btn btn-danger',
                cancelButtonClass: 'btn btn-success',
                buttonsStyling: false,
                confirmButtonText: "Non Aktifkan",
                cancelButtonText: "Cancel",
                closeOnConfirm: false,
                showLoaderOnConfirm: true,
            },
            function(isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        url: url,
                        success: function(resp) {
                            window.location.href = url;
                        }
                    });
                }
                return false;
            });
    });

    // Popup approval
    $(document).on("click", ".approval-link", function(e) {
        e.preventDefault();
        url = $(this).attr("href");
        swal({
                title: "Anda yakin ingin menyetujui data ini?",
                type: "info",
                showCancelButton: true,
                confirmButtonClass: 'btn btn-danger',
                cancelButtonClass: 'btn btn-success',
                buttonsStyling: false,
                confirmButtonText: "Ya, Setujui",
                cancelButtonText: "Cancel",
                closeOnConfirm: false,
                showLoaderOnConfirm: true,
            },
            function(isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        url: url,
                        success: function(resp) {
                            window.location.href = url;
                        }
                    });
                }
                return false;
            });
    });
</script>
</div>
</div>
<!-- /.card-body -->
</div>
<!-- /.card -->
</div>
<!-- /.col -->
</div>
<!-- /.row -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!-- /.content-wrapper -->



<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>

<!-- Bootstrap 4 -->
<script src="{{ asset('assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- Select2 -->
<script src="{{ asset('assets/admin/plugins/select2/js/select2.full.min.js') }}"></script>
<!-- DataTables -->
<script src="{{ asset('assets/admin/plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('assets/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('assets/admin/plugins/sparklines/sparkline.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('assets/admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}">
</script>
<!-- Summernote -->
<script src="{{ asset('assets/admin/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- tinymce -->
<!-- overlayScrollbars -->
<script src="{{ asset('assets/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<!-- pace-progress -->
<script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{ asset('assets/admin/plugins/pace-progress/pace.min.js') }}"></script>
<script src="{{ asset('assets/admin/dist/js/adminlte.js') }}"></script>
<script src="{{ asset('assets/admin/dist/js/admin.js') }}"></script>


<script>
    $(function() {
        //Initialize Select2 Elements
        //Initialize Select2 Elements
        $('.select2').select2({
            theme: 'bootstrap4'
        })

        $('.mselect2').select2({
            dropdownParent: $('.Tambah')
        });

        $('.checkbox-toggle').click(function() {
            var clicks = $(this).data('clicks')
            if (clicks) {
                //Uncheck all checkboxes
                $('.mailbox-messages input[type=\'checkbox\']').prop('checked', false)
                $('.checkbox-toggle .far.fa-check-square').removeClass('fa-check-square').addClass(
                    'fa-square')
            } else {
                //Check all checkboxes
                $('.mailbox-messages input[type=\'checkbox\']').prop('checked', true)
                $('.checkbox-toggle .far.fa-square').removeClass('fa-square').addClass(
                    'fa-check-square')
            }
            $(this).data('clicks', !clicks)
        })

        //Handle starring for glyphicon and font awesome
        $('.mailbox-star').click(function(e) {
            e.preventDefault()
            //detect type
            var $this = $(this).find('a > i')
            var glyph = $this.hasClass('glyphicon')
            var fa = $this.hasClass('fa')

            //Switch states
            if (glyph) {
                $this.toggleClass('glyphicon-star')
                $this.toggleClass('glyphicon-star-empty')
            }

            if (fa) {
                $this.toggleClass('fa-star')
                $this.toggleClass('fa-star-o')
            }
        })
    })
</script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('assets/admin/dist/js/demo.js') }}"></script>
<!-- page script -->
<script>
    $(function() {
        $("#example1").DataTable();
        $('#example2').DataTable({
            "paging": false,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
        });
    });
</script>



</body>

</html>
