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
                            <h3 class="card-title">Data Bidan</h3>
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
                                                <th>No KTA</th>
                                                <th>Email</th>
                                                <th>Nama</th>
                                                <th>Alamat</th>
                                                <th>Telepon</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 1;
                                            foreach ($bidan_data as $bidan) { ?>
                                                <tr>
                                                    <td style="width: 10px"><?= $i ?></td>
                                                    <td><?= $bidan->no_kta ?></td>
                                                    <td><?= $bidan->email ?></td>
                                                    <td><?= $bidan->nama ?></td>
                                                    <td><?= $bidan->alamat ?></td>
                                                    <td><?= $bidan->telepon ?></td>
                                                    <td>
                                                        <a href="#" class="btn btn-primary btn-view" data-id="<?= $bidan->id; ?>" data-nama="<?= $bidan->nama; ?>" data-no_kta="<?= $bidan->no_kta; ?>" data-alamat="<?= $bidan->alamat; ?>" data-telepon="<?= $bidan->telepon; ?>" data-email="<?= $bidan->email; ?>"><i class="fa fa-eye"></i></a>
                                                        <a href="#" class="btn btn-info btn-edit" data-id="<?= $bidan->id; ?>" data-nama="<?= $bidan->nama; ?>" data-no_kta="<?= $bidan->no_kta; ?>" data-alamat="<?= $bidan->alamat; ?>" data-telepon="<?= $bidan->telepon; ?>" data-email="<?= $bidan->email; ?>"><i class="fa fa-marker"></i></a>
                                                        <a href="#" class="btn btn-danger btn-delete" data-id="<?= $bidan->id; ?>"><i class="fa fa-trash"></i></a>
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
                            <a href="bidan/cetak_pdf" class="btn btn-info">Cetak Data Bidan</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>



<!-- Modal Add Product-->
<form action="<?php echo base_url("bidan/save"); ?>" method="post">
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Bidan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>No KTA</label>
                        <input type="text" class="form-control" name="no_kta" placeholder="No KTA" required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Email" required>
                    </div>
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" name="nama" placeholder="Nama" required>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" class="form-control" name="alamat" placeholder="Alamat" required>
                    </div>
                    <div class="form-group">
                        <label>Telepon</label>
                        <input type="number" class="form-control" name="telepon" placeholder="Telepon" required>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Password" required>
                    </div>
                    <div class="form-group">
				    <label>Posyandu</label>
				      	<select class="bootstrap-select" name="posyandu[]" data-width="100%" data-live-search="true" data-actions-box="true" multiple required>
				      		   <?php foreach ($posyandu_data as $posyandu) : ?>
                                    <option value="<?= $posyandu->id; ?>"><?= $posyandu->nama; ?></option>
                                <?php endforeach; ?>
						</select>
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
<form action="<?php echo base_url("bidan/update"); ?>" method="post">
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Bidan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>No KTA</label>
                        <input type="text" class="form-control no_kta" name="no_kta" placeholder="No KTA">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control email" name="email" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control nama" name="nama" placeholder="Nama">
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" class="form-control alamat" name="alamat" placeholder="Alamat">
                    </div>
                    <div class="form-group">
                        <label>Telepon</label>
                        <input type="number" class="form-control telepon" name="telepon" placeholder="Telepon">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control password" name="password" placeholder="Kosongi jika tidak ingin mengubah password">
                    </div>
                    <div class="form-group">
				        <label>Posyandu</label>
				      	<select class="bootstrap-select strings" name="posyandu[]" data-width="100%" data-live-search="true" data-actions-box="true" multiple required>
				      		   <?php foreach ($posyandu_data as $posyandu) : ?>
                                    <option value="<?= $posyandu->id; ?>"><?= $posyandu->nama; ?></option>
                                <?php endforeach; ?>
						</select>
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

<!-- Modal View Product-->
<form>
    <div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Lihat Bidan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>No KTA</label>
                        <input type="text" class="form-control no_kta" name="no_kta" placeholder="No KTA" disabled>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control email" name="email" placeholder="Email" disabled>
                    </div>
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control nama" name="nama" placeholder="Nama" disabled>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" class="form-control alamat" name="alamat" placeholder="Alamat" disabled>
                    </div>
                    <div class="form-group">
                        <label>Telepon</label>
                        <input type="number" class="form-control telepon" name="telepon" placeholder="Telepon" disabled>
                    </div>
                    <div class="form-group">
				        <label>Posyandu</label>
				      	<textarea rows="5" class="form-control" id="posyandu_data_nama" disabled></textarea>
    				</div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- End Modal View Product-->

<!-- Modal Delete Product-->
<form action="<?php echo base_url("bidan/delete"); ?>" method="post">
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Bidan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5>Apa anda yakin ingin menghapus data bidan?</h5>
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
<script type="text/javascript" src="<?php echo base_url('assets/js/jquery-3.4.1.min.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.bundle.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap-select.js');?>"></script>
<script>
    $(document).ready(function() {
        
        
	    $('.bootstrap-select').selectpicker();

       
        $('.btn-edit').on('click', function() {
            $(".bootstrap-select").val('default');
            $(".bootstrap-select").selectpicker("refresh");
            const id = $(this).data('id');
            const no_kta = $(this).data('no_kta');
            const nama = $(this).data('nama');
            const email = $(this).data('email');
            const alamat = $(this).data('alamat');
            const telepon = $(this).data('telepon');
            $('.id').val(id);
            $('.no_kta').val(no_kta);
            $('.nama').val(nama);
            $('.email').val(email);
            $('.alamat').val(alamat);
            $('.telepon').val(telepon);
            $('#editModal').modal('show');
            

            $.ajax({
                url: "<?php echo site_url('bidan/get_posyandu_by_bidan');?>",
                method: "POST",
                data :{id:id},
                cache:false,
                success : function(data){
                    JSON.parse(data).forEach(function(e){
                        $(".strings option[value='" + e + "']").prop("selected", true).trigger('change');
                        
                    })
                }
                    
            });
            return false;
            
        });

        $('.btn-view').on('click', function() {
            const id = $(this).data('id');
            const no_kta = $(this).data('no_kta');
            const nama = $(this).data('nama');
            const email = $(this).data('email');
            const alamat = $(this).data('alamat');
            const telepon = $(this).data('telepon');
            $('.id').val(id);
            $('.no_kta').val(no_kta);
            $('.nama').val(nama);
            $('.email').val(email);
            $('.alamat').val(alamat);
            $('.telepon').val(telepon);
            $('#viewModal').modal('show');
            
            $.ajax({
                url: "<?php echo site_url('bidan/get_posyandu_data_by_bidan');?>",
                method: "POST",
                data :{id:id},
                cache:false,
                success : function(data){
                    var text = JSON.parse(data).join("\n")
                    document.getElementById("posyandu_data_nama").value = text
                }
                    
            });
            return false;
        });

        $('.btn-delete').on('click', function() {
            const id = $(this).data('id');
            $('.id').val(id);
            $('#deleteModal').modal('show');
        });
        
        $('#datatables').DataTable();

    });
</script>