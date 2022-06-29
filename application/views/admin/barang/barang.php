<!-- Main content -->
<div class="content-wrapper">
  <br><br><br>
  <!-- Content area -->
  <div class="content">

    <!-- Dashboard content -->
    <div class="row">
      <!-- Basic datatable -->
      <div class="panel panel-flat">
        <div class="panel-heading">
          <h5 class="panel-title">Tambah Barang</h5>
          <div class="heading-elements">
            <ul class="icons-list">
              <li><a data-action="collapse"></a></li>
            </ul>
          </div>
        </div>
        <hr>
        <div class="panel-body">
          <?php
          echo $this->session->flashdata('msg');
          ?>
          <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
            <div class="col-md-12">
              <div class="col-md-12">
                <div class="form-group">
                  <label class="control-label col-lg-2">Model</label>
                  <div class="col-lg-10">
                    <input type="text" name="judul" class="form-control" value="" placeholder="Model Mobil" required maxlength="300">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-2">Kategori Mobil</label>
                  <div class="col-lg-10">
                    <select class="form-control" name="id_kat" required>
                      <option value="">-- Pilih Kategori Mobil --</option>
                      <?php
                      foreach ($v_kat->result() as $baris) {?>
                        <option value="<?php echo $baris->id_kat; ?>"><?php echo $baris->nama_kat; ?></option>
                      <?php
                      } ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-2">Status</label>
                  <div class="col-lg-10">
                    <select class="form-control" name="status" required>
                      <option value="">-- Pilih Status --</option>
                      <option value="DI JUAL">DI JUAL</option>
                      <option value="DI SEWA">DI SEWA</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-2">Varian</label>
                  <div class="col-lg-10">
                    <textarea name="lokasi" class="form-control" rows="2" cols="80" required placeholder="cth:TRD Sportivo"></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-2">Jarak Tempuh</label>
                  <div class="col-lg-10">
                    <input type="text" name="luas_tanah" class="form-control" value="" placeholder="cth: 10000 KM" required maxlength="300">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-2">Warna</label>
                  <div class="col-lg-10">
                    <input type="text" name="luas_bangunan" class="form-control" value="" placeholder="cth: Hitam" required maxlength="300">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-2">Kapasitas Mesin</label>
                  <div class="col-lg-10">
                    <input type="text" name="kamar_tidur" class="form-control" value="" placeholder="cth: >1.000 -1.500 cc" required maxlength="300">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-2">Tahun</label>
                  <div class="col-lg-10">
                    <input type="text" name="lantai" class="form-control" value="" placeholder="cth: 2010" required maxlength="300">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-2">Sistem Penggerak</label>
                  <div class="col-lg-10">
                    <input type="text" name="kamar_mandi" class="form-control" value="" placeholder="Sistem Penggerak" required maxlength="300">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-2">Tipe Bahan Bakar</label>
                  <div class="col-lg-10">
                    <select class="form-control" name="sertifikat" required>
                      <option value="">-- Pilih Tipe Bahan Bakar --</option>
                      <option value="premium">Premium</option>
                      <option value="solar">Solar</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-2">Transmisi</label>
                  <div class="col-lg-10">
                    <input type="text" name="listrik" class="form-control" value="" placeholder="Transmisi" required maxlength="300">
                  </div>
                 
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-2">Deskripsi</label>
                  <div class="col-lg-10">
                    <textarea name="deskripsi" class="form-control" rows="4" cols="80" placeholder="Deskripsi"></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-2">Harga</label>
                  <div class="col-lg-10">
                    <input type="number" name="harga" class="form-control" value="" placeholder="Harga" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-2">Keterangan</label>
                  <div class="col-lg-10">
                    <select class="form-control" name="ket" required>
                      <option value="">-- Pilih Keterangan --</option>
                      <option value="nego">Nego</option>
                      <option value="net">Net</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-2">Gambar</label>
                  <div class="col-lg-10">
                    <input type="file" name="foto" class="form-control" value="" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-2">Gambar 2</label>
                  <div class="col-lg-10">
                    <input type="file" name="foto2" class="form-control" value="" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-2">Gambar 3</label>
                  <div class="col-lg-10">
                    <input type="file" name="foto3" class="form-control" value="" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-2">Gambar 4</label>
                  <div class="col-lg-10">
                    <input type="file" name="foto4" class="form-control" value="" required>
                  </div>
                </div>
              </div>
            </div>

            <br>
            <hr>
            <button type="submit" name="btnsimpan" class="btn btn-primary" style="float:right;">Simpan</button>

          </form>
        </div>
        <br>

        <hr>
        <div class="table-responsive">
        <table class="table datatable-basic" width="100%">
          <thead>
            <tr>
              <th width="30px;">No.</th>
              <th>Gambar</th>
              <th>Kategori Mobil</th>
              <th>Harga</th>
              <th>Status</th>
              <th>Dilihat</th>
              <th>Tanggal</th>
              <th class="text-center" width="100"></th>
            </tr>
          </thead>
          <tbody>
              <?php
              $no = 1;
              foreach ($v_barang->result() as $baris) {
              ?>
                <tr>
                  <td><?php echo $no.'.'; ?></td>
                  <td><img src="<?php echo $baris->gambar; ?>" alt="" width="100"></td>
                  <td><?php echo $baris->nama_kat; ?></td>
                  <td>Rp. <?php echo number_format($baris->harga,0,",","."); ?></td>
                  <td><?php echo $baris->status; ?></td>
                  <td><?php echo $baris->view; ?></td>
                  <td><?php echo $baris->tgl_barang; ?></td>
                  <td>
                    <a href="admin/barang_edit/<?php echo $baris->id_barang; ?>" title="Edit"><span class="icon-pencil"></span></a> &nbsp;
                    <a href="admin/barang_hapus/<?php echo $baris->id_barang; ?>" title="Hapus" onclick="return confirm('Apakah Anda yakin?')"><span class="icon-trash"></span></a>
                  </td>
                </tr>
              <?php
              $no++;
              } ?>
          </tbody>
        </table>
        </div>
      </div>
      <!-- /basic datatable -->
    </div>
    <!-- /dashboard content -->
