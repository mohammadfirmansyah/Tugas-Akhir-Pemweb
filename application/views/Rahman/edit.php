<div class="container pt-5">
    <h3><?= $title ?></h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb ">
            <li class="breadcrumb-item"><a>Tiket Kereta Api</a></li>
            <li class="breadcrumb-item "><a href="<?= base_url('yusuf'); ?>">Daftar Tiket</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Pesanan</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <?php
                    //create form
                    $attributes = array('id' => 'FrmEditTiket', 'method' => "post", "autocomplete" => "off");
                    echo form_open('', $attributes);
                    ?>
                    <div class="form-group row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                        <input type="hidden" class="form-control" id="idBooking" name="idBooking" value=" <?= $data_pesanan->idBooking; ?>">
                            <input type="text" class="form-control" id="nama" name="nama" value=" <?= $data_pesanan->nama; ?>">
                            <small class="text-danger">
                                <?php echo form_error('nama') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="nik" class="col-sm-2 col-form-label">NIK</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nik" name="nik" value=" <?= $data_pesanan->nik; ?>">
                            <small class="text-danger">
                                <?php echo form_error('nik') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="noHP" class="col-sm-2 col-form-label">Nomor HP</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="noHP" name="noHP" value="<?= $data_pesanan->noHP; ?>">
                            <small class="text-danger">
                                <?php echo form_error('noHP') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="email" name="email" value="<?= $data_pesanan->email; ?>">
                            <small class="text-danger">
                                <?php echo form_error('') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="alamat" name="alamat" rows="3"><?= $data_pesanan->alamat; ?></textarea>
                            <small class="text-danger">
                                <?php echo form_error('alamat') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="Alamat" class="col-sm-2 col-form-label">Stasiun Asal</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="stasAsal" name="stasAsal">
                                <option value="Belum Memilih" selected disabled>Pilih</option>
                                <option value="Stasiun Kota Baru Malang" <?php if ($data_pesanan->stasAsal == "Stasiun Kota Baru Malang") : echo "selected";
                                                        endif; ?>>Stasiun Kota Baru Malang</option>
                                <option value="Stasiun Kota Lama Malang" <?php if ($data_pesanan->stasAsal == "Stasiun Kota Lama Malang") : echo "selected";
                                                            endif; ?>>Stasiun Kota Lama Malang</option>
                                <option value="Stasiun Blimbing Malang" <?php if ($data_pesanan->stasAsal == "Stasiun Blimbing Malang") : echo "selected";
                                                        endif; ?>>Stasiun Blimbing Malang</option>
                            </select>
                            <small class="text-danger">
                                <?php echo form_error('stasAsal') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="Alamat" class="col-sm-2 col-form-label">Stasiun Tujuan</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="stasTujuan" name="stasTujuan">
                                <option value="Belum Memilih" selected disabled>Pilih</option>
                                <option value="Stasiun Gubeng Surabaya" <?php if ($data_pesanan->stasTujuan == "Stasiun Gubeng Surabaya") : echo "selected";
                                                        endif; ?>>Stasiun Gubeng Surabaya</option>
                                <option value="Stasiun Tugu Yogyakarta" <?php if ($data_pesanan->stasTujuan == "Stasiun Tugu Yogyakarta") : echo "selected";
                                                            endif; ?>>Stasiun Tugu Yogyakarta</option>
                                <option value="Stasiun Gambir Jakarta" <?php if ($data_pesanan->stasTujuan == "Stasiun Gambir Jakarta") : echo "selected";
                                                        endif; ?>>Stasiun Gambir Jakarta</option>
                            </select>
                            <small class="text-danger">
                                <?php echo form_error('stasTujuan') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="Alamat" class="col-sm-2 col-form-label">Jadwal</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="JadwalPesanan" name="JadwalPesanan">
                                <option value="Belum Memilih" selected disabled>Pilih</option>
                                <option value="Pagi" <?php if ($data_pesanan->JadwalPesanan == "Pagi") : echo "selected";
                                                        endif; ?>>Pagi</option>
                                <option value="Siang" <?php if ($data_pesanan->JadwalPesanan == "Siang") : echo "selected";
                                                            endif; ?>>Siang</option>
                                <option value="Malam" <?php if ($data_pesanan->JadwalPesanan == "Malam") : echo "selected";
                                                        endif; ?>>Malam</option>
                            </select>
                            <small class="text-danger">
                                <?php echo form_error('JadwalPesanan') ?>
                            </small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-10 offset-md-2">
                            <button type="submit" class="btn btn-primary">Simpan Pesanan</button>
                            <a class="btn btn-secondary" href="javascript:history.back()">Kembali</a>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>