<div class="container pt-5">
    <h3><?= $title ?></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a>Tiket Kereta Api</a></li>
            <li class="breadcrumb-item active" aria-current="page">Daftar Tiket</li>
        </ol>
    </nav>

    <div class="cardtiket">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="tableTiket">
                            <thead>
                                <tr class="table-success">
                                    <th>STASIUN ASAL</th>
                                    <th>STASIUN TUJUAN</th>
                                    <th>JADWAL</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data_tiket as $row) : ?>
                                    <tr>
                                        <td><?= $row->staAsal ?></td>
                                        <td><?= $row->staTujuan ?></td>
                                        <td><?= $row->jadwal ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

    <div class="row">
        <div class="col-md-12">
            <a class="btn btn-primary mb-2" href="<?= base_url('yusuf/add'); ?>">Pesan Tiket</a>
            <div mb-2>
                <!-- Menampilkan flashh data (pesan saat data berhasil disimpan)-->
                <?php if ($this->session->flashdata('message')) :
                    echo $this->session->flashdata('message');
                endif; ?>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="tablePesanan">
                            <thead>
                                <tr class="table-success">
                                    <th>MODIFIKASI</th>
                                    <th>NAMA</th>
                                    <th>KODE TIKET</th>
                                    <th>STASIUN ASAL</th>
                                    <th>STASIUN TUJUAN</th>
                                    <th>JADWAL</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data_pesanan as $row) : ?>
                                    <tr>
                                        <td>
                                            <a href="<?= site_url('yusuf/edit/' . $row->idBooking) ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i> </a>
                                            <a href="<?= site_url('yusuf/delete/' . $row->idBooking) ?>" class="btn btn-danger btn-sm item-delete"><i class="fa fa-trash"></i> </a>
                                        </td>
                                        <td><?= $row->nama ?></td>
                                        <td><?= $row->idBooking ?></td>
                                        <td><?= $row->stasAsal ?></td>
                                        <td><?= $row->stasTujuan ?></td>
                                        <td><?= $row->JadwalPesanan ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    //menampilkan data ketabel dengan plugin datatables
    $('#tableTiket').DataTable();
</script>