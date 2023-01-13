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
                            <h3 class="card-title">Data Detail Balita</h3>
                        </div>
                        <div class="card-header">
                            <button type="button" class="btn btn-primary btn-add" data-toggle="modal" data-target="#addModal">Tambah</button>
                        </div>

                        
                        <div class="card-body">
                            <div class="col-md-12">
                                <div class="card-body p-0">
                                    <h5>NIK : </h5><p><?=$balita_row->nik?></p>
                                    <h5>Nama : </h5><p><?=$balita_row->nama?></p>
                                    <h5>Tanggal Lahir : </h5><p><?=$balita_row->tanggal_lahir?></p>
                                    <h5>Jenis Kelamin : </h5><p><?=$balita_row->jenis_kelamin?></p>
                                    <h5>Orangtua : </h5><p><?=$balita_row->orangtua?></p>
                                    <br>
                                    <table class="table table-bordered" id="datatables">
                                        <thead>
                                            <tr>
                                                <th style="width: 10px">No</th>
                                                <th>Tanggal Ukur</th>
                                                <th>Umur (bulan)</th>
                                                <th>Tinggi (cm)</th>
                                                <th>Cara Ukur</th>
                                                <th>Berat (kg)</th>
                                                <th>Lingkar Kepala (cm)</th>
                                                <th>Vit A</th>
                                                <th>Obat Cacing</th>
                                                <th>Imunisasi</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 1;
                                            foreach ($balita_data as $balita) { ?>
                                                <tr>
                                                    <td style="width: 10px"><?= $i ?></td>
                                                    <td><?= date("d-m-Y", strtotime($balita->tanggal_ukur))?></td>
                                                    <td><?= $balita->umur ?></td>
                                                    <td><?= $balita->tinggi_badan ?></td>
                                                    <td><?= $balita->cara_ukur ?></td>
                                                    <td><?= $balita->berat_badan ?></td>
                                                    <td><?= $balita->lingkar_kepala ?></td>
                                                    <td><?= $balita->vitamin_a ?></td>
                                                    <td><?= $balita->obat_cacing ?></td>
                                                    <td><?= $balita->imunisasi_balita_nama ?></td>
                                                    <td>
                                                        <a href="#" class="btn btn-primary btn-view" data-id="<?= $balita->id; ?>" data-nik="<?= $balita->nik; ?>" data-nama="<?= $balita->nama; ?>"  data-jenis_kelamin="<?= $balita->jenis_kelamin; ?>" data-tanggal_lahir="<?= $balita->tanggal_lahir; ?>" data-tanggal_ukur="<?= $balita->tanggal_ukur; ?>" data-umur="<?= $balita->umur; ?>" data-tinggi_badan="<?= $balita->tinggi_badan; ?>" data-cara_ukur="<?= $balita->cara_ukur; ?>" data-berat_badan="<?= $balita->berat_badan; ?>" data-lingkar_kepala="<?= $balita->lingkar_kepala; ?>" data-vitamin_a="<?= $balita->vitamin_a; ?>" data-obat_cacing="<?= $balita->obat_cacing; ?>" data-alamat="<?= $balita->alamat; ?>" data-rt="<?= $balita->rt; ?>" data-rw="<?= $balita->rw; ?>" data-telepon="<?= $balita->telepon; ?>" data-orangtua="<?= $balita->orangtua; ?>" data-posyandu_nama="<?= $balita->posyandu_nama; ?>" data-imunisasi_balita_nama="<?= $balita->imunisasi_balita_nama; ?>"><i class="fa fa-eye"></i></a>
                                                        <a href="#" class="btn btn-info btn-edit" data-id="<?= $balita->id; ?>" data-nik="<?= $balita->nik; ?>" data-nama="<?= $balita->nama; ?>" data-jenis_kelamin="<?= $balita->jenis_kelamin; ?>" data-tanggal_lahir="<?= $balita->tanggal_lahir; ?>" data-tanggal_ukur="<?= $balita->tanggal_ukur; ?>" data-umur="<?= $balita->umur; ?>" data-tinggi_badan="<?= $balita->tinggi_badan; ?>" data-cara_ukur="<?= $balita->cara_ukur; ?>" data-berat_badan="<?= $balita->berat_badan; ?>" data-lingkar_kepala="<?= $balita->lingkar_kepala; ?>" data-vitamin_a="<?= $balita->vitamin_a; ?>" data-obat_cacing="<?= $balita->obat_cacing; ?>" data-alamat="<?= $balita->alamat; ?>" data-rt="<?= $balita->rt; ?>" data-rw="<?= $balita->rw; ?>" data-telepon="<?= $balita->telepon; ?>" data-orangtua="<?= $balita->orangtua; ?>" data-posyandu_id="<?= $balita->posyandu_id; ?>" data-imunisasi_balita_id="<?= $balita->imunisasi_balita_id; ?>"><i class="fa fa-marker"></i></a>
                                                        <a href="#" class="btn btn-danger btn-delete" data-id="<?= $balita->id; ?>"><i class="fa fa-trash"></i></a>
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
                            <?php
                            $id = basename($_SERVER['REQUEST_URI']);
                       
                            ?>
                            <!--<a href=" <?php echo base_url("balita/cetak_pdf/$id"); ?>" class="btn btn-info">Cetak Data Balita</a>-->
                            <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Cetak Data Periode Bulan</button>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

            <div id="myModal" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        
                        <?php
                            $id = basename($_SERVER['REQUEST_URI']);
                        ?>
                     
                      <form method="GET" action="<?php echo base_url("balita/cetak_pdf/$id"); ?>">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">Cetak Data Periode Bulan</h5>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                          </div>
                          <div class="modal-body">
                             <div class="form-group">
                                 <label>Filter Bulan</label><br>
                                 <input type="month" class="form-control" id="filter" name="filter" min="2018-03">
                             </div>
                          <div class="modal-footer">
                            <button class="btn btn-info" type="submit">Filter</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          </div>
                      </form>
                    </div>
                  </div>
                </div>
            </div>

<!-- Modal Add Product-->
<form action="<?php echo base_url("balita/save"); ?>" method="post">
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Balita</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-header row d-flex justify-content-between mx-1 mx-sm-3 mb-0 pb-0 border-0">
                    <div class="tabs active" id="tab01">
                        <h6 class="text-muted">Data Balita</h6>
                    </div>
                    <div class="tabs" id="tab02">
                        <h6 class="font-weight-bold">Data Pemeriksaan</h6>
                    </div>
                       
                </div>
                <div class="line"></div>
                <div class="modal-body p-0">
                    <fieldset class="show" id="tab011">
                            <div class="modal-body">
                                <div class="form-group" id="nik_lama">
                                    <label>NIK Peserta Lama (Opsional)</label>
                                    <select name="nik" id="data_nik" class="form-control" >
                                        <option value="">-- Pilih NIK --</option>
                        
                                            <option value="<?= $balita_data[0]->id; ?>"><?= $balita_data[0]->nik; ?></option>
                                       
                                    </select>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label>NIK</label>
                                    <input type="text" class="form-control nik" name="nik" placeholder="NIK" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" class="form-control nama" name="nama" placeholder="Nama" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Jenis Kelamin</label>
                                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-control jenis_kelamin" readonly>
                                        <option value="">-- Pilih Jenis Kelamin --</option>
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Lahir</label>
                                    <input type="date" class="form-control tanggal_lahir" name="tanggal_lahir" placeholder="Tanggal Lahir" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Orangtua</label>
                                    <input type="text" class="form-control orangtua" name="orangtua" placeholder="Orangtua" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Telepon</label>
                                    <input type="number" class="form-control telepon" name="telepon" placeholder="Telepon" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <input type="text" class="form-control alamat" name="alamat" placeholder="Alamat" readonly>
                                </div>
                                <div class="form-group">
                                    <label>RT</label>
                                    <input type="text" class="form-control rt" name="rt" placeholder="RT" readonly>
                                </div>
                                <div class="form-group">
                                    <label>RW</label>
                                    <input type="text" class="form-control rw" name="rw" placeholder="RW" readonly>
                                </div>
                                <?php
                                if ($this->session->userdata('level') != 'kader') {
                                ?>
                                    <div class="form-group">
                                        <label>Posyandu</label>
                                        <select name="posyandu_id" class="form-control posyandu_id" readonly>
                                            <option value="">-- Pilih Posyandu --</option>
                                            <?php foreach ($posyandu_data as $posyandu) : ?>
                                                <option value="<?= $posyandu->id; ?>"><?= $posyandu->nama; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                <?php
                                } else {
                                ?>
                                    <input type="hidden" name="posyandu_id" class="posyandu_id" value="<?= $this->session->userdata('posyandu_id') ?>">
                                <?php
                                }
                                ?>
                            </div>
                        </fieldset>
                    <fieldset id="tab021">
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Tanggal Ukur</label>
                                <input type="date" class="form-control" name="tanggal_ukur" placeholder="Tanggal Ukur" required>
                            </div>
                            <div class="form-group">
                                <label>Umur (bulan)</label>
                                <input type="number" class="form-control umur" name="umur" placeholder="Umur" required>
                            </div>
                            <div class="form-group">
                                <label>Tinggi Badan (cm)</label>
                                <input type="number"  step="0.1" class="form-control" name="tinggi_badan" placeholder="Tinggi Badan" required>
                            </div>
                            <div class="form-group">
                                <label>Cara Ukur</label>
                                <select name="cara_ukur" class="form-control" required>
                                    <option value="">-- Pilih Cara Ukur --</option>
                                    <option value="Tidur">Tidur</option>
                                    <option value="Berdiri">Berdiri</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Berat Badan (kg)</label>
                                <input type="number"  step="0.1" class="form-control" name="berat_badan" placeholder="Berat Badan" required>
                            </div>
                            <div class="form-group">
                                <label>Lingkar Kepala (cm)</label>
                                <input type="number"  step="0.1" class="form-control" name="lingkar_kepala" placeholder="Lingkar Kepala" required>
                            </div>
                            <div class="form-group">
                                <label>Vitamin A</label>
                                <select name="vitamin_a" class="form-control" required>
                                    <option value="">-- Pilih Status Vitamin A --</option>
                                    <option value="1">Sudah</option>
                                    <option value="0">Belum</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Obat Cacing</label>
                                <select name="obat_cacing" class="form-control" required>
                                    <option value="">-- Pilih Status Obat Cacing --</option>
                                    <option value="1">Sudah</option>
                                    <option value="0">Belum</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Imunisasi</label>
                                <select name="imunisasi_balita_id" class="form-control imunisasi_balita_id" required>
                                    <option value="">-- Pilih Imunisasi --</option>
                                    <?php foreach ($imunisasi_balita_data as $imunisasi_balita) : ?>
                                        <option value="<?= $imunisasi_balita->id; ?>"><?= $imunisasi_balita->nama; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </fieldset>
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
<form action="<?php echo base_url("balita/update_detail"); ?>" method="post">
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Balita</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-header row d-flex justify-content-between mx-1 mx-sm-3 mb-0 pb-0 border-0">
                    <div class="tabs active" id="tab03">
                        <h6 class="text-muted">Data Balita</h6>
                    </div>
                    <div class="tabs" id="tab04">
                        <h6 class="font-weight-bold">Data Pemeriksaan</h6>
                </div>
                       
                </div>
                <div class="line"></div>
                <div class="modal-body p-0">
                    <fieldset class="show" id="tab031">
                        <div class="modal-body">
                            <div class="form-group">
                                <label>NIK</label>
                                <input type="text" class="form-control nik" name="nik" placeholder="NIK" readonly>
                            </div>
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" class="form-control nama" name="nama" placeholder="Nama" readonly>
                            </div>
                              <div class="form-group">
                                <label>Jenis Kelamin</label>
                                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control jenis_kelamin" readonly>
                                    <option value="">-- Pilih Jenis Kelamin --</option>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tanggal Lahir</label>
                                <input type="date" class="form-control tanggal_lahir" name="tanggal_lahir" placeholder="Tanggal Lahir" readonly>
                            </div>
                             <div class="form-group">
                                <label>Orangtua</label>
                                <input type="text" class="form-control orangtua" name="orangtua" placeholder="Orangtua" readonly>
                            </div>
                            <div class="form-group">
                                <label>Telepon</label>
                                <input type="number" class="form-control telepon" name="telepon" placeholder="Telepon" readonly>
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <input type="text" class="form-control alamat" name="alamat" placeholder="Alamat" readonly>
                            </div>
                            <div class="form-group">
                                <label>RT</label>
                                <input type="text" class="form-control rt" name="rt" placeholder="RT" readonly>
                            </div>
                            <div class="form-group">
                                <label>RW</label>
                                <input type="text" class="form-control rw" name="rw" placeholder="RW" readonly>
                            </div>
                            <?php
                            if ($this->session->userdata('level') != 'kader') {
                            ?>
                                <div class="form-group">
                                    <label>Posyandu</label>
                                    <select name="posyandu_id" class="form-control posyandu_id" readonly>
                                        <option value="">-- Pilih Posyandu --</option>
                                        <?php foreach ($posyandu_data as $posyandu) : ?>
                                            <option value="<?= $posyandu->id; ?>"><?= $posyandu->nama; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            <?php
                            } else {
                            ?>
                                <input type="hidden" name="posyandu_id" class="posyandu_id" value="<?= $this->session->userdata('posyandu_id') ?>">
                            <?php
                            }
                            ?>
                            </div>
                        </fieldset>
                    <fieldset id="tab041">
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Tanggal Ukur</label>
                                <input type="date" class="form-control tanggal_ukur" name="tanggal_ukur" placeholder="Tanggal Ukur" required>
                            </div>
                            <div class="form-group">
                                <label>Umur (bulan)</label>
                                <input type="number" class="form-control umur" name="umur" placeholder="Umur" required>
                            </div>
                            <div class="form-group">
                                <label>Tinggi Badan (cm)</label>
                                <input type="number"  step="0.1" class="form-control tinggi_badan" name="tinggi_badan" placeholder="Tinggi Badan" required>
                            </div>
                            <div class="form-group">
                                <label>Cara Ukur</label>
                                <select name="cara_ukur" class="form-control cara_ukur" required>
                                    <option value="">-- Pilih Cara Ukur --</option>
                                    <option value="Tidur">Tidur</option>
                                    <option value="Berdiri">Berdiri</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Berat Badan (kg)</label>
                                <input type="number"  step="0.1" class="form-control berat_badan" name="berat_badan" placeholder="Berat Badan" required>
                            </div>
                            <div class="form-group">
                                <label>Lingkar Kepala (cm)</label>
                                <input type="number"  step="0.1" class="form-control lingkar_kepala" name="lingkar_kepala" placeholder="Lingkar Kepala" required>
                            </div>
                            <div class="form-group">
                                <label>Vitamin A</label>
                                <select name="vitamin_a" class="form-control vitamin_a" required>
                                    <option value="">-- Pilih Status Vitamin A --</option>
                                    <option value="1">Sudah</option>
                                    <option value="0">Belum</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Obat Cacing</label>
                                <select name="obat_cacing" class="form-control obat_cacing" required>
                                    <option value="">-- Pilih Status Obat Cacing --</option>
                                    <option value="1">Sudah</option>
                                    <option value="0">Belum</option>
                                </select>
                            </div>
                           
                            <div class="form-group">
                                <label>Imunisasi</label>
                                <select name="imunisasi_balita_id" class="form-control imunisasi_balita_id" required>
                                    <option value="">-- Pilih Imunisasi --</option>
                                    <?php foreach ($imunisasi_balita_data as $imunisasi_balita) : ?>
                                        <option value="<?= $imunisasi_balita->id; ?>"><?= $imunisasi_balita->nama; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </fieldset>
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
                    <h5 class="modal-title" id="exampleModalLabel">Lihat Balita</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-header row d-flex justify-content-between mx-1 mx-sm-3 mb-0 pb-0 border-0">
                    <div class="tabs active" id="tab05">
                        <h6 class="text-muted">Data Balita</h6>
                    </div>
                    <div class="tabs" id="tab06">
                        <h6 class="font-weight-bold">Data Pemeriksaan</h6>
                    </div>
                       
                </div>
                <div class="line"></div>
                <div class="modal-body p-0">
                    <fieldset class="show" id="tab051">
                        <div class="modal-body">
                            <div class="form-group">
                                <label>NIK</label>
                                <input type="text" class="form-control nik" name="nik" placeholder="NIK" disabled>
                            </div>
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" class="form-control nama" name="nama" placeholder="Nama" disabled>
                            </div>
                             <div class="form-group">
                                <label>Jenis Kelamin</label>
                                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control jenis_kelamin" disabled>
                                    <option value="">-- Pilih Jenis Kelamin --</option>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tanggal Lahir</label>
                                <input type="date" class="form-control tanggal_lahir" name="tanggal_lahir" placeholder="Tanggal Lahir" disabled>
                            </div>
                             <div class="form-group">
                                <label>Orangtua</label>
                                <input type="text" class="form-control orangtua" name="orangtua" placeholder="Orangtua" disabled>
                            </div>
                            <div class="form-group">
                                <label>Telepon</label>
                                <input type="number" class="form-control telepon" name="telepon" placeholder="Telepon" disabled>
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <input type="text" class="form-control alamat" name="alamat" placeholder="Alamat" disabled>
                            </div>
                            <div class="form-group">
                                <label>RT</label>
                                <input type="text" class="form-control rt" name="rt" placeholder="RT" disabled>
                            </div>
                            <div class="form-group">
                                <label>RW</label>
                                <input type="text" class="form-control rw" name="rw" placeholder="RW" disabled>
                            </div>
                           
                            <div class="form-group">
                                <label>Posyandu</label>
                                <input type="text" class="form-control posyandu_nama" name="posyandu_id" placeholder="Posyandu" disabled>
                            </div>
                        </div>     
                        
                        </fieldset>
                    <fieldset id="tab061">
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Tanggal Ukur</label>
                                <input type="date" class="form-control tanggal_ukur" name="tanggal_ukur" placeholder="Tanggal Ukur" disabled>
                            </div>
                            <div class="form-group">
                                <label>Umur (bulan)</label>
                                <input type="number" class="form-control umur" name="umur" placeholder="Umur" disabled>
                            </div>
                            <div class="form-group">
                                <label>Tinggi Badan (cm)</label>
                                <input type="number"  step="0.1" class="form-control tinggi_badan" name="tinggi_badan" placeholder="Tinggi Badan" disabled>
                            </div>
                            <div class="form-group">
                                <label>Cara Ukur</label>
                                <select name="cara_ukur" class="form-control cara_ukur" disabled>
                                    <option value="">-- Pilih Cara Ukur --</option>
                                    <option value="Tidur">Tidur</option>
                                    <option value="Berdiri">Berdiri</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Berat Badan (kg)</label>
                                <input type="number"  step="0.1" class="form-control berat_badan" name="berat_badan" placeholder="Berat Badan" disabled>
                            </div>
                            <div class="form-group">
                                <label>Lingkar Kepala (cm)</label>
                                <input type="number"  step="0.1" class="form-control lingkar_kepala" name="lingkar_kepala" placeholder="Lingkar Kepala" disabled>
                            </div>
                            <div class="form-group">
                                <label>Vitamin A</label>
                                <select name="vitamin_a" class="form-control vitamin_a" disabled>
                                    <option value="">-- Pilih Status Vitamin A --</option>
                                    <option value="1">Sudah</option>
                                    <option value="0">Belum</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Obat Cacing</label>
                                <select name="obat_cacing" class="form-control obat_cacing" disabled>
                                    <option value="">-- Pilih Status Obat Cacing --</option>
                                    <option value="1">Sudah</option>
                                    <option value="0">Belum</option>
                                </select>
                            </div>
                             <div class="form-group">
                                <label>Imunisasi</label>
                                <input type="text" class="form-control imunisasi_balita_nama" name="imunisasi_balita_nama" placeholder="Imunisasi" disabled>
                            </div>
                        </div>
                    </fieldset>
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
<form action="<?php echo base_url("balita/delete_detail"); ?>" method="post">
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus balita</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5>Apa anda yakin ingin menghapus data balita?</h5>
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
       
        $(".tabs").click(function(){
            $(".tabs").removeClass("active");
            $(".tabs h6").removeClass("font-weight-bold");    
            $(".tabs h6").addClass("text-muted");    
            $(this).children("h6").removeClass("text-muted");
            $(this).children("h6").addClass("font-weight-bold");
            $(this).addClass("active");
        
            current_fs = $(".active");
        
            next_fs = $(this).attr('id');
            next_fs = "#" + next_fs + "1";
        
            $("fieldset").removeClass("show");
            $(next_fs).addClass("show");
        
            current_fs.animate({}, {
                step: function() {
                    current_fs.css({
                        'display': 'none',
                        'position': 'relative'
                    });
                    next_fs.css({
                        'display': 'block'
                    });
                }
            });
        });
        
        $('#data_nik').change(function() {
            var id = $(this).val();
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url('balita/cek_data_balita') ?>',
                Cache: false,
                dataType: "json",
                data: 'id=' + id,
                success: function(resp) {
                    $('.nik').val(resp.nik);
                    $('.nama').val(resp.nama);
                    $('.umur').val(resp.umur);
                    $('.jenis_kelamin').val(resp.jenis_kelamin);
                    $('.tanggal_lahir').val(resp.tanggal_lahir);
                    $('.orangtua').val(resp.orangtua);
                    $('.alamat').val(resp.alamat);
                    $('.rt').val(resp.rt);
                    $('.rw').val(resp.rw);
                    $('.telepon').val(resp.telepon);
                    $('.posyandu_id').val(resp.posyandu_id);
                    $('.imunisasi_balita_id').val(resp.imunisasi_balita_id);
                }
            });
        });
        $('.btn-add').on('click', function() {
            $("#tab01").addClass("active")
            $("#tab01 h6").addClass("font-weight-bold");
            $("#tab01 h6").removeClass("text-muted");
            
            $("#tab02").removeClass("active")
            $("#tab02 h6").removeClass("font-weight-bold");
            $("#tab02 h6").addClass("text-muted");
            
            $("#tab011").addClass("show")
        });
        $('.btn-edit').on('click', function() {
            $("#tab03").addClass("active")
            $("#tab03 h6").addClass("font-weight-bold");
            $("#tab03 h6").removeClass("text-muted");
            
            $("#tab04").removeClass("active")
            $("#tab04 h6").removeClass("font-weight-bold");
            $("#tab04 h6").addClass("text-muted");
            
            $("#tab031").addClass("show")
            
            const id = $(this).data('id');
            const nik = $(this).data('nik');
            const nama = $(this).data('nama');
            const jenis_kelamin = $(this).data('jenis_kelamin');
            const tanggal_lahir = $(this).data('tanggal_lahir');
            const tanggal_ukur = $(this).data('tanggal_ukur');
            const umur = $(this).data('umur');
            const tinggi_badan = $(this).data('tinggi_badan');
            const cara_ukur = $(this).data('cara_ukur');
            const berat_badan = $(this).data('berat_badan');
            const lingkar_kepala = $(this).data('lingkar_kepala');
            const vitamin_a = $(this).data('vitamin_a');
            const obat_cacing = $(this).data('obat_cacing');
            const orangtua = $(this).data('orangtua');
            const telepon = $(this).data('telepon');
            const alamat = $(this).data('alamat');
            const rt = $(this).data('rt');
            const rw = $(this).data('rw');
            const posyandu_id = $(this).data('posyandu_id');
            const imunisasi_balita_id = $(this).data('imunisasi_balita_id');
            $('.id').val(id);
            $('.nik').val(nik);
            $('.nama').val(nama);
            $('.jenis_kelamin').val(jenis_kelamin);
            $('.tanggal_lahir').val(tanggal_lahir);
            $('.tanggal_ukur').val(tanggal_ukur);
            $('.umur').val(umur);
            $('.tinggi_badan').val(tinggi_badan);
            $('.cara_ukur').val(cara_ukur);
            $('.berat_badan').val(berat_badan);
            $('.lingkar_kepala').val(lingkar_kepala);
            $('.vitamin_a').val(vitamin_a);
            $('.obat_cacing').val(obat_cacing);
            $('.orangtua').val(orangtua);
            $('.telepon').val(telepon);
            $('.alamat').val(alamat);
            $('.rt').val(rt);
            $('.rw').val(rw);
            $('.posyandu_id').val(posyandu_id);
            $('.imunisasi_balita_id').val(imunisasi_balita_id);
            $('#editModal').modal('show');
        });

        $('.btn-view').on('click', function() {
            $("#tab05").addClass("active")
            $("#tab05 h6").addClass("font-weight-bold");
            $("#tab05 h6").removeClass("text-muted");
            
            $("#tab06").removeClass("active")
            $("#tab06 h6").removeClass("font-weight-bold");
            $("#tab06 h6").addClass("text-muted");
            
            $("#tab051").addClass("show")
            
            const id = $(this).data('id');
            const nik = $(this).data('nik');
            const nama = $(this).data('nama');
            const jenis_kelamin = $(this).data('jenis_kelamin');
            const tanggal_lahir = $(this).data('tanggal_lahir');
            const tanggal_ukur = $(this).data('tanggal_ukur');
            const umur = $(this).data('umur');
            const tinggi_badan = $(this).data('tinggi_badan');
            const cara_ukur = $(this).data('cara_ukur');
            const berat_badan = $(this).data('berat_badan');
            const lingkar_kepala = $(this).data('lingkar_kepala');
            const vitamin_a = $(this).data('vitamin_a');
            const obat_cacing = $(this).data('obat_cacing');
            const orangtua = $(this).data('orangtua');
            const telepon = $(this).data('telepon');
            const alamat = $(this).data('alamat');
            const rt = $(this).data('rt');
            const rw = $(this).data('rw');
            const posyandu_nama = $(this).data('posyandu_nama');
            const imunisasi_balita_nama = $(this).data('imunisasi_balita_nama');
            $('.id').val(id);
            $('.nik').val(nik);
            $('.nama').val(nama);
            $('.jenis_kelamin').val(jenis_kelamin);
            $('.tanggal_lahir').val(tanggal_lahir);
            $('.tanggal_ukur').val(tanggal_ukur);
            $('.umur').val(umur);
            $('.tinggi_badan').val(tinggi_badan);
            $('.cara_ukur').val(cara_ukur);
            $('.berat_badan').val(berat_badan);
            $('.lingkar_kepala').val(lingkar_kepala);
            $('.vitamin_a').val(vitamin_a);
            $('.obat_cacing').val(obat_cacing);
            $('.orangtua').val(orangtua);
            $('.telepon').val(telepon);
            $('.alamat').val(alamat);
            $('.rt').val(rt);
            $('.rw').val(rw);
            $('.posyandu_nama').val(posyandu_nama);
            $('.imunisasi_balita_nama').val(imunisasi_balita_nama);
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