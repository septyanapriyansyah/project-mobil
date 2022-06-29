<!-- Page heading -->
<!-- Give background color class on below line (bred, bgreen, borange, bviolet, blightblue, bblue) -->
<div class="page-heading blightblue">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h2 class="pull-left"><i class="fa fa-key title-icon"></i>Formulir Jual Mobil</h2>
        <div class="pull-right heading-meta" style="font-size:15px;"><a href="<?php echo base_url(); ?>" style="color:#f1f1f1;">Home</a> / <a href="#"><span class="lightblue">Formulir Jual Mobil</span></a></div>
      </div>
    </div>
  </div>
</div>
<!-- Page heading ends -->


<!-- Content starts -->
<div class="content">

  <!-- Content starts -->
  <div class="content">
    <div class="container">

      <div class="contact">

                        <div class="row">
                                    <?php
          echo $this->session->flashdata('msg');
          ?>
                           <div class="col-md-3 col-sm-3"></div>
                           <div class="col-md-6 col-sm-6">
                             
                                 <!-- Contact form -->
                                    <h3 class="title">Formulir Jual Mobil</h3>
                          
                                    <div class="form">

                     
                   
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
  <label class="control-label col-lg-2">Kategori</label>
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
              <div align="center">
              <button type="submit" name="btnsimpan" class="btn btn-primary">Simpan</button>
            </div>
            </div>

            
        

          </form>
        
                                    </div>
                                 
                           </div>

                        </div>

                     </div>

    </div>
  </div>
  <!-- Content ends -->



</div>
<!-- Content ends -->
