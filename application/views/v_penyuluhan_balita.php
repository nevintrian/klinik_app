<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">

        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data Penyuluhan Balita</h3>
                        </div>
                        <div class="card-header">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal">Tambah</button>
                        </div>
                        <div class="card-body">
                            <div class="col-md-12">
                                <div class="card-body p-0">
                                    <table class="table table-bordered" id="datatables">
                                        <thead>
                                            <tr>
                                                <th style="width: 10px">No</th>
                                                <th>Nama</th>
                                                <th>Deskripsi</th>
                                                <th>File</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 1;
                                            foreach ($penyuluhan_balita_data as $penyuluhan_balita) { ?>
                                                <tr>
                                                    <td style="width: 10px"><?= $i ?></td>
                                                    <td><?= $penyuluhan_balita->nama ?></td>
                                                    <td><?= $penyuluhan_balita->deskripsi ?></td>
                                                    
                                                    <?php if ($penyuluhan_balita->file != null) { ?>
                                                        <td><a href="<?php echo base_url();?>assets/file/<?=$penyuluhan_balita->file?>"  class="btn btn-primary" download>Lihat File</a></td>
                                                    <?php }else{ ?>
                                                        <td></td>
                                                    <?php } ?>
                                                    <td>
                                                        <a href="#" class="btn btn-primary btn-view" data-id="<?= $penyuluhan_balita->id; ?>" data-nama="<?= $penyuluhan_balita->nama; ?>"data-deskripsi="<?= $penyuluhan_balita->deskripsi; ?>" ><i class="fa fa-eye"></i></a>
                                                        <a href="#" class="btn btn-info btn-edit" data-id="<?= $penyuluhan_balita->id; ?>" data-nama="<?= $penyuluhan_balita->nama; ?>" data-deskripsi="<?= $penyuluhan_balita->deskripsi; ?>" ><i class="fa fa-marker"></i></a>
                                                        <a href="#" class="btn btn-danger btn-delete" data-id="<?= $penyuluhan_balita->id; ?>"><i class="fa fa-trash"></i></a>
                                                    </td>
                                                </tr>
                                            <?php
                                                $i++;
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="penyuluhan_balita/cetak_pdf" class="btn btn-info">Cetak Data Penyuluhan Balita</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


<!-- Modal Add Product-->
<form action="<?php echo base_url("penyuluhan_balita/save"); ?>" method="post" enctype="multipart/form-data">
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Penyuluhan Balita</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" name="nama" placeholder="Nama Penyuluhan Balita" required>
                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea type="text" class="form-control" name="deskripsi" required></textarea>
                    </div>
                        <div class="form-group">
                        <label>File</label>
                        <input type="file" class="form-control" name="file">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- End Modal Add Product-->

<!-- Modal Edit Product-->
<form action="<?php echo base_url("penyuluhan_balita/update"); ?>" method="post" enctype="multipart/form-data">
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Penyuluhan Balita</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control nama" name="nama" placeholder="Nama Penyuluhan Balita">
                    </div>
                     <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea type="text" class="form-control deskripsi" name="deskripsi" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>File</label>
                        <input type="file" class="form-control" name="file">
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id" class="id">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- End Modal Edit Product-->

<!-- Modal Edit Product-->
<form>
    <div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Lihat Penyuluhan Balita</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control nama" name="nama" placeholder="Nama Penyuluhan Balita" disabled>
                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea type="text" class="form-control deskripsi" name="deskripsi" disabled></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- End Modal Edit Product-->

<!-- Modal Delete Product-->
<form action="<?php echo base_url("penyuluhan_balita/delete"); ?>" method="post">
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Penyuluhan Balita</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5>Apa anda yakin ingin menghapus data penyuluhan balita?</h5>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id" class="id">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                    <button type="submit" class="btn btn-primary">Ya</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- End Modal Delete Product-->

<script src="<?php echo base_url('templates/plugins/jquery/jquery.min.js'); ?>"></script>
<script src="<?php echo base_url('templates/plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
<script>
    $(document).ready(function() {
        $('.btn-edit').on('click', function() {
            const id = $(this).data('id');
            const nama = $(this).data('nama');
            const deskripsi = $(this).data('deskripsi');
            $('.id').val(id);
            $('.nama').val(nama);
            $('.deskripsi').val(deskripsi);
            $('#editModal').modal('show');
        });

        $('.btn-view').on('click', function() {
            const id = $(this).data('id');
            const nama = $(this).data('nama');
            const deskripsi = $(this).data('deskripsi');
            $('.id').val(id);
            $('.nama').val(nama);
            $('.deskripsi').val(deskripsi);
            $('#viewModal').modal('show');
        });

        $('.btn-delete').on('click', function() {
            const id = $(this).data('id');
            $('.id').val(id);
            $('#deleteModal').modal('show');
        });

        $('#datatables').DataTable();
    });
</script>