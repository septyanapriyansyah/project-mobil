<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Web extends CI_Controller {

	public function index($offset = NULL)
	{

		$jml = $this->db->get('tbl_barang');

			 $config['base_url'] = base_url().'page';
			 $jml_page = 18;

			 $config['total_rows'] = $jml->num_rows();
			 $config['per_page'] = $jml_page; /*Jumlah data yang dipanggil perhalaman*/
			 $config['uri_segment'] = 2; /*data selanjutnya di parse diurisegmen 2*/

			 /*Class bootstrap pagination yang digunakan*/
			 $config['full_tag_open'] = "<ul class='pagination pagination-sm' style='position:relative; top:-25px;'>";
			 $config['full_tag_close'] ="</ul>";
			 $config['num_tag_open'] = '<li>';
			 $config['num_tag_close'] = '</li>';
			 $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a >";
			 $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
			 $config['next_tag_open'] = "<li>";
			 $config['next_tagl_close'] = "</li>";
			 $config['prev_tag_open'] = "<li>";
			 $config['prev_tagl_close'] = "</li>";
			 $config['first_tag_open'] = "<li>";
			 $config['first_tagl_close'] = "</li>";
			 $config['last_tag_open'] = "<li>";
			 $config['last_tagl_close'] = "</li>";

			 $this->pagination->initialize($config);

			 $data['offset'] = $offset;

			  if (isset($_POST['btncari'])) {
		 			$cari = $_POST['cari'];
		 			$data['v_barang']   	= $this->Mcrud->view_barang_cari($config['per_page'], $offset, $cari);
		 		}else{
		 			$data['v_barang']   	= $this->Mcrud->view_perdata('tbl_barang', 'id_barang', $config['per_page'], $offset);
				}

					if ($data['v_barang']->num_rows() > 0 AND $data['v_barang']->num_rows() < $jml_page) {
						 if ($offset == 0) {
							 $data['halaman'] = "";
						 }else{
							 $data['halaman'] = $this->pagination->create_links();
						 }
							//return $query;
					}else{
						 $data['halaman'] = $this->pagination->create_links();
					}

				/*membuat variable halaman untuk dipanggil di view nantinya*/

				$data_web = $this->db->get_where('tbl_web', "id_web='1'")->row();

				$data['judul_web'] = $data_web->nama_web;
				$data['data_web']  = $data_web;
				$data['t_barang']  = $this->Mcrud->get_data('tbl_barang')->num_rows();
				$data['t_artikel'] = $this->Mcrud->get_data('tbl_artikel')->num_rows();

				$this->db->order_by('id_kat','ASC');
				$data['v_kat']     = $this->Mcrud->get_data('tbl_kat');

				$this->load->view('web/header', $data);
				$this->load->view('web/slide', $data);
		 		$this->load->view('web/beranda', $data);
		 		$this->load->view('web/footer', $data);
	}


	function error_not_found()
	{
		$data_web = $this->db->get_where('tbl_web', "id_web='1'")->row();
		$data['t_barang'] 		 = $this->Mcrud->get_data('tbl_barang')->num_rows();
		$data['t_artikel'] = $this->Mcrud->get_data('tbl_artikel')->num_rows();

		$data['judul_web'] = "404 ERROR | Halaman tidak ditemukan";
		$data['data_web']  = $data_web;

		$this->load->view('web/header', $data);
		$this->load->view('404_content', $data);
		$this->load->view('web/footer', $data);
	}


	public function artikel($offset=0)
	{
		$jml = $this->db->get('tbl_artikel');

			 $config['base_url'] = base_url().'artikel';
			 $jml_page = 5;

			 $config['total_rows'] = $jml->num_rows();
			 $config['per_page'] = $jml_page; /*Jumlah data yang dipanggil perhalaman*/
			 $config['uri_segment'] = 2; /*data selanjutnya di parse diurisegmen 2*/

			 /*Class bootstrap pagination yang digunakan*/
			 $config['full_tag_open'] = "<ul class='pagination pagination-sm' style='position:relative; top:-25px;'>";
			 $config['full_tag_close'] ="</ul>";
			 $config['num_tag_open'] = '<li>';
			 $config['num_tag_close'] = '</li>';
			 $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a >";
			 $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
			 $config['next_tag_open'] = "<li>";
			 $config['next_tagl_close'] = "</li>";
			 $config['prev_tag_open'] = "<li>";
			 $config['prev_tagl_close'] = "</li>";
			 $config['first_tag_open'] = "<li>";
			 $config['first_tagl_close'] = "</li>";
			 $config['last_tag_open'] = "<li>";
			 $config['last_tagl_close'] = "</li>";

			 $this->pagination->initialize($config);

			 $data['offset'] = $offset;

			 $data['v_artikel']   	= $this->Mcrud->view_perdata('tbl_artikel', 'id_artikel', $config['per_page'], $offset);

					if ($data['v_artikel']->num_rows() > 0 AND $data['v_artikel']->num_rows() < $jml_page) {
						 if ($offset == 0) {
							 $data['halaman'] = "";
						 }else{
							 $data['halaman'] = $this->pagination->create_links();
						 }
							//return $query;
					}else{
						 $data['halaman'] = $this->pagination->create_links();
					}

				/*membuat variable halaman untuk dipanggil di view nantinya*/

				$data_web = $this->db->get_where('tbl_web', "id_web='1'")->row();

				$data['judul_web'] = "Artikel | $data_web->nama_web";
				$data['data_web']  = $data_web;
				$data['t_barang'] 		 = $this->Mcrud->get_data('tbl_barang')->num_rows();
				$data['t_artikel'] = $this->Mcrud->get_data('tbl_artikel')->num_rows();

				$this->load->view('web/header', $data);
				$this->load->view('web/artikel/artikel', $data);
				$this->load->view('web/footer', $data);
  }

	public function artikel_detail($id='')
	{
		if ($id == '') {
			redirect('artikel');
		}

			 $this->db->where('url', "$id");
			 $data['v_artikel']   	= $this->Mcrud->view_perdata('tbl_artikel', 'id_artikel', 0, 0);

			 $jdl = ucwords($data['v_artikel']->row()->judul);
				/*membuat variable halaman untuk dipanggil di view nantinya*/

				$data_web = $this->db->get_where('tbl_web', "id_web='1'")->row();

				$data['judul_web'] = $jdl." | $data_web->nama_web";
				$data['data_web']  = $data_web;
				$data['t_barang'] 		 = $this->Mcrud->get_data('tbl_barang')->num_rows();
				$data['t_artikel'] = $this->Mcrud->get_data('tbl_artikel')->num_rows();

				$this->load->view('web/header', $data);
				$this->load->view('web/artikel/artikel_detail', $data);
				$this->load->view('web/footer', $data);

				$view = $data['v_artikel']->row()->view + 1;
	 			 $data = array(
	 	 			'view'	=> $view
	 		 	 );
	 		 	 $this->Mcrud->update_data('tbl_artikel', array('url' => $id), $data);
  }




	public function barang($offset=0)
	{
		$jml = $this->db->get('tbl_barang');

			 $config['base_url'] = base_url().'barang';
			 $jml_page = 24;

			 $config['total_rows'] = $jml->num_rows();
			 $config['per_page'] = $jml_page; /*Jumlah data yang dipanggil perhalaman*/
			 $config['uri_segment'] = 2; /*data selanjutnya di parse diurisegmen 2*/

			 /*Class bootstrap pagination yang digunakan*/
			 $config['full_tag_open'] = "<ul class='pagination pagination-sm' style='position:relative; top:-25px;'>";
			 $config['full_tag_close'] ="</ul>";
			 $config['num_tag_open'] = '<li>';
			 $config['num_tag_close'] = '</li>';
			 $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a >";
			 $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
			 $config['next_tag_open'] = "<li>";
			 $config['next_tagl_close'] = "</li>";
			 $config['prev_tag_open'] = "<li>";
			 $config['prev_tagl_close'] = "</li>";
			 $config['first_tag_open'] = "<li>";
			 $config['first_tagl_close'] = "</li>";
			 $config['last_tag_open'] = "<li>";
			 $config['last_tagl_close'] = "</li>";

			 $this->pagination->initialize($config);

			 $data['offset'] = $offset;

			 $data['v_barang']   	= $this->Mcrud->view_perdata('tbl_barang', 'id_barang', $config['per_page'], $offset);

					if ($data['v_barang']->num_rows() > 0 AND $data['v_barang']->num_rows() < $jml_page) {
						 if ($offset == 0) {
							 $data['halaman'] = "";
						 }else{
							 $data['halaman'] = $this->pagination->create_links();
						 }
							//return $query;
					}else{
						 $data['halaman'] = $this->pagination->create_links();
					}

				/*membuat variable halaman untuk dipanggil di view nantinya*/

				$data_web = $this->db->get_where('tbl_web', "id_web='1'")->row();

				$data['judul_web'] = "Produk | $data_web->nama_web";
				$data['data_web']  = $data_web;
				$data['t_barang'] 		 = $this->Mcrud->get_data('tbl_barang')->num_rows();
				$data['t_artikel'] = $this->Mcrud->get_data('tbl_artikel')->num_rows();

				$this->load->view('web/header', $data);
				$this->load->view('web/barang/barang', $data);
				$this->load->view('web/footer', $data);
  }


	public function barang_detail($id='')
	{
		$ceks = $this->session->userdata('username_member@wp');

		if ($id == '') {
			redirect('barang');
		}

			 $this->db->join('tbl_kat','tbl_kat.id_kat=tbl_barang.id_kat');
			 $this->db->where('id_barang', "$id");
			 $data['v_barang']   	= $this->Mcrud->view_perdata('tbl_barang', 'id_barang', 0, 0);

			 $jdl = ucwords($data['v_barang']->row()->judul);
				/*membuat variable halaman untuk dipanggil di view nantinya*/

				$data_web = $this->db->get_where('tbl_web', "id_web='1'")->row();

				$data['judul_web'] = $jdl." | $data_web->nama_web";
				$data['data_web']  = $data_web;
				$data['t_barang']  = $this->Mcrud->get_data('tbl_barang')->num_rows();
				$data['t_artikel'] = $this->Mcrud->get_data('tbl_artikel')->num_rows();

				$this->load->view('web/header', $data);
				$this->load->view('web/barang/barang_detail', $data);
				$this->load->view('web/footer', $data);

				if (!$ceks) {
					$this->session->set_flashdata('msg',
						 '
						 <div class="alert alert-warning alert-dismissible" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times; &nbsp;</span>
								</button>
								<strong>Maaf!</strong> Anda harus Login terlebih dahulu sebagai <b>Member</b> untuk melihat detail selengkapnya.
						 </div>'
					 );

					 redirect('login/'.$id);
				}else{
					$view = $data['v_barang']->row()->view + 1;
		 			 $data = array(
		 	 			'view'	=> $view
		 		 	 );
		 		 	 $this->Mcrud->update_data('tbl_barang', array('id_barang' => $id), $data);
				}

  }


	public function profile()
	{
				$data_web = $this->db->get_where('tbl_web', "id_web='1'")->row();

				$data['judul_web'] = "About | $data_web->nama_web";
				$data['data_web']  = $data_web;
				$data['t_barang']  = $this->Mcrud->get_data('tbl_barang')->num_rows();
				$data['t_artikel'] = $this->Mcrud->get_data('tbl_artikel')->num_rows();
				$data['t_admin']   = $this->Mcrud->get_data('tbl_admin')->row();

				$this->load->view('web/header', $data);
				$this->load->view('web/profile/profile', $data);
				$this->load->view('web/footer', $data);
  }

  public function jualmobil()
	{

		
		
		
				$data_web = $this->db->get_where('tbl_web', "id_web='1'")->row();

			$this->db->order_by('id_kat', 'ASC');
			$data['v_kat'] 			= $this->Mcrud->get_data('tbl_kat');

				$data['judul_web'] = "jualmobil | $data_web->nama_web";
				$data['data_web']  = $data_web;
				$data['t_barang']  = $this->Mcrud->get_data('tbl_barang')->num_rows();
				$data['t_artikel'] = $this->Mcrud->get_data('tbl_artikel')->num_rows();
				$data['t_admin']   = $this->Mcrud->get_data('tbl_admin')->row();

				$this->load->view('web/header', $data);
				$this->load->view('web/jualmobil');
				$this->load->view('web/footer', $data);

				if (isset($_POST['btnsimpan'])) {
							$judul        	= htmlentities(strip_tags($_POST['judul']));
							$id_kat       	= htmlentities(strip_tags($_POST['id_kat']));
							$status       	= htmlentities(strip_tags($_POST['status']));
							$lokasi       	= htmlentities(strip_tags($_POST['lokasi']));
							$luas_tanah     = htmlentities(strip_tags($_POST['luas_tanah']));
							$luas_bangunan  = htmlentities(strip_tags($_POST['luas_bangunan']));
							$kamar_tidur    = htmlentities(strip_tags($_POST['kamar_tidur']));
							$lantai       	= htmlentities(strip_tags($_POST['lantai']));
							$kamar_mandi    = htmlentities(strip_tags($_POST['kamar_mandi']));
							$sertifikat     = htmlentities(strip_tags($_POST['sertifikat']));
							$listrik 			  = htmlentities(strip_tags($_POST['listrik']));
							$deskripsi 			= htmlentities(strip_tags($_POST['deskripsi']));
							$harga         	= htmlentities(strip_tags($_POST['harga']));
							$ket          	= htmlentities(strip_tags($_POST['ket']));

							$file_size = 5500; //5 MB
			        $this->upload->initialize(array(
			          "upload_path"   => "./img/barang/",
			          "allowed_types" => "jpg|jpeg|png|gif",
			          "max_size" => "$file_size"
			        ));

			        if ( ! $this->upload->do_upload('foto'))
			        {
									 $error = $this->upload->display_errors('<p>', '</p>');
									 $simpan = '';
			        }
			         else
			        {
								$gbr = $this->upload->data();
								$simpan = 'yes';
							}

							if ( ! $this->upload->do_upload('foto2'))
							{
								 $error = $this->upload->display_errors('<p>', '</p>');
								 unlink($gbr);
								 $simpan = '';
							}
							 else
							{
							   $gbr2 = $this->upload->data();
								 $simpan = 'yes';
							}

							if ( ! $this->upload->do_upload('foto3'))
							{
								 $error = $this->upload->display_errors('<p>', '</p>');
								 unlink($gbr2);
								 $simpan = '';
							}
							 else
							{
								$gbr3 = $this->upload->data();
								$simpan = 'yes';
							}

							if ( ! $this->upload->do_upload('foto4'))
							{
							  $error = $this->upload->display_errors('<p>', '</p>');
								unlink($gbr3);
								$simpan = '';
							}
							 else
							{
								$gbr4 = $this->upload->data();
								$simpan == 'ya';
							}

							if ($simpan == '') {
									$this->session->set_flashdata('msg',
										 '
										 <div class="alert alert-warning alert-dismissible" role="alert">
												<button type="button" class="close" data-dismiss="alert" aria-label="Close">
													<span aria-hidden="true">&times; &nbsp;</span>
												</button>
												<strong>Gagal!</strong> '.$error.'.
										 </div>'
									 );
							}else{

								$filename = $gbr['file_name'];
								$filename = "img/barang/".$filename;
								$foto 		= preg_replace('/ /', '_', $filename);

								$filename2 = $gbr2['file_name'];
								$filename2 = "img/barang/".$filename2;
								$foto2 		 = preg_replace('/ /', '_', $filename2);

								$filename3 = $gbr3['file_name'];
								$filename3 = "img/barang/".$filename3;
								$foto3 		 = preg_replace('/ /', '_', $filename3);

								$filename4 = $gbr4['file_name'];
								$filename4 = "img/barang/".$filename4;
								$foto4 		 = preg_replace('/ /', '_', $filename4);

									date_default_timezone_set('Asia/Jakarta');
									$tgl = date('d-m-Y');

									$data = array(
										'judul'    	  	=> $judul,
										'id_kat'    		=> $id_kat,
										'status'    		=> $status,
										'lokasi'    		=> $lokasi,
										'luas_tanah'    => $luas_tanah,
										'luas_bangunan' => $luas_bangunan,
										'kamar_tidur'   => $kamar_tidur,
										'lantai'    		=> $lantai,
										'kamar_mandi'   => $kamar_mandi,
										'sertifikat'    => $sertifikat,
										'listrik'  		  => $listrik,
										'deskripsi'     => $deskripsi,
										'harga'    			=> $harga,
										'gambar'   			=> $foto,
										'gambar2'  			=> $foto2,
										'gambar3'  			=> $foto3,
										'gambar4'  			=> $foto4,
										'ket'   		 		=> $ket,
										'view'    			=> 0,
										'tgl_barang'		=> $tgl
									);
									$this->Mcrud->save_data('tbl_barang', $data);

									$this->session->set_flashdata('msg',
										 '
										 <div class="alert alert-success alert-dismissible" role="alert">
												<button type="button" class="close" data-dismiss="alert" aria-label="Close">
													<span aria-hidden="true">&times; &nbsp;</span>
												</button>
												<strong>Sukses!</strong> Barang berhasil ditambahkan.
										 </div>'
									 );
							}
redirect('jualmobil');

  }

}


	public function kontak()
	{
				$data_web = $this->db->get_where('tbl_web', "id_web='1'")->row();

				$data['judul_web'] = "Help | $data_web->nama_web";
				$data['data_web']  = $data_web;
				$data['t_barang']  = $this->Mcrud->get_data('tbl_barang')->num_rows();
				$data['t_artikel'] = $this->Mcrud->get_data('tbl_artikel')->num_rows();

				$this->load->view('web/header', $data);
				$this->load->view('web/kontak/kontak', $data);
				$this->load->view('web/footer', $data);

				if (isset($_POST['btnkirim'])) {
						$nama 					= htmlentities(strip_tags($_POST['nama']));
						$email 					= htmlentities(strip_tags($_POST['email']));
						$komentar   		= htmlentities(strip_tags($_POST['komentar']));

						date_default_timezone_set('Asia/Jakarta');
						$tgl = date('d-m-Y');

						$data = array(
							'nama'				=> $nama,
							'email'				=> $email,
							'komentar'		=> $komentar,
							'tgl_kontak'  => $tgl
						);
						$this->Mcrud->save_data('tbl_kontak', $data);

						$this->session->set_flashdata('msg',
							 '
							 <div class="alert alert-success alert-dismissible" role="alert">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times; &nbsp;</span>
									</button>
									<strong>Sukses!</strong> Berhasil dikirim.
							 </div>'
						 );

						 redirect('help');
				}
  }


	public function login($id='')
	{
				$data_web = $this->db->get_where('tbl_web', "id_web='1'")->row();

				$data['judul_web'] = "Login Member | $data_web->nama_web";
				$data['data_web']  = $data_web;
				$data['t_barang']  = $this->Mcrud->get_data('tbl_barang')->num_rows();
				$data['t_artikel'] = $this->Mcrud->get_data('tbl_artikel')->num_rows();
				$data['t_admin']   = $this->Mcrud->get_data('tbl_admin')->row();

				$this->load->view('web/header', $data);
				$this->load->view('web/login', $data);
				$this->load->view('web/footer', $data);

				if (isset($_POST['btnlogin'])){
						 $username = htmlentities(strip_tags($_POST['username']));
						 $pass	   = htmlentities(strip_tags(md5($_POST['password'])));

						 $query  = $this->Mcrud->get_data_by_pk('tbl_member', 'username', $username);
						 $cek    = $query->result();
						 $cekun  = $cek[0]->username;
						 $jumlah = $query->num_rows();

						 if($jumlah == 0) {
								 $this->session->set_flashdata('msg',
									 '
									 <div class="alert alert-danger alert-dismissible" role="alert">
									 		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times; &nbsp;</span>
											</button>
											<strong>Username "'.$username.'"</strong> belum terdaftar.
									 </div>'
								 );
								 redirect('login');
						 } else {
										 $row = $query->row();
										 $cekpass = $row->password;
										 if($cekpass <> $pass) {
												$this->session->set_flashdata('msg',
													 '<div class="alert alert-warning alert-dismissible" role="alert">
													 		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
																<span aria-hidden="true">&times; &nbsp;</span>
															</button>
															<strong>Username atau Password Salah!</strong>.
													 </div>'
												);
												redirect('login');
										 } else {

														 $this->session->set_flashdata('msg',
																'
																<div class="alert alert-success alert-dismissible" role="alert">
																	 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
																		 <span aria-hidden="true">&times; &nbsp;</span>
																	 </button>
																	 <strong>Sukses!</strong> Selamat datang '.ucwords($row->nama).'.
																</div>'
															);
																$this->session->set_userdata('username_member@wp', "$cekun");

															 date_default_timezone_set('Asia/Jakarta');
		 													 $tgl_jam = date('Y-m-d H:m:i');

																$data = array(
																	'terakhir_login'			=> $tgl_jam
																);
																$this->Mcrud->update_data('tbl_member', array('username' => $cekun), $data);

																if ($id=='') {
																	redirect('');
																}else{
																	redirect('dtl/'.$id);
																}

										 }
						 }
				}

  }

	public function logout() {
     if ($this->session->has_userdata('username_member@wp')) {
         $this->session->sess_destroy();
         redirect('');
     }
     redirect('');
  }


	public function register()
	{
				$data_web = $this->db->get_where('tbl_web', "id_web='1'")->row();

				$data['judul_web'] = "Registrasi Member | $data_web->nama_web";
				$data['data_web']  = $data_web;
				$data['t_barang']  = $this->Mcrud->get_data('tbl_barang')->num_rows();
				$data['t_artikel'] = $this->Mcrud->get_data('tbl_artikel')->num_rows();
				$data['t_admin']   = $this->Mcrud->get_data('tbl_admin')->row();

				$this->load->view('web/header', $data);
				$this->load->view('web/register', $data);
				$this->load->view('web/footer', $data);

				if (isset($_POST['btndaftar'])){
						 $nama	   = htmlentities(strip_tags($_POST['nama']));
						 $email	   = htmlentities(strip_tags($_POST['email']));
						 $no_hp	   = htmlentities(strip_tags($_POST['no_hp']));
						 $alamat	 = htmlentities(strip_tags($_POST['alamat']));
						 $username = htmlentities(strip_tags($_POST['username']));
						 $pass	   = htmlentities(strip_tags(md5($_POST['password'])));
						 $pass2	   = htmlentities(strip_tags(md5($_POST['repassword'])));

						 $query  = $this->Mcrud->get_data_by_pk('tbl_member', 'username', $username);
						 $cek    = $query->result();
						 $cekun  = $cek[0]->username;
						 $jumlah = $query->num_rows();

						 if($jumlah != 0) {
								 $this->session->set_flashdata('msg',
									 '
									 <div class="alert alert-danger alert-dismissible" role="alert">
									 		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times; &nbsp;</span>
											</button>
											<strong>Username "'.$username.'"</strong> sudah terdaftar.
									 </div>'
								 );
								 redirect('register');
						 } else {

										 if($pass <> $pass2) {
												$this->session->set_flashdata('msg',
													 '<div class="alert alert-warning alert-dismissible" role="alert">
													 		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
																<span aria-hidden="true">&times; &nbsp;</span>
															</button>
															<strong>Password tidak cocok!</strong>.
													 </div>'
												);
												redirect('register');
										 } else {

													 date_default_timezone_set('Asia/Jakarta');
													 $tgl = date('Y-m-d');
													 $tgl_jam = date('Y-m-d H:m:i');

													 $data = array(
														 'nama'						 => $nama,
														 'email'					 => $email,
														 'no_hp'					 => $no_hp,
														 'alamat'					 => $alamat,
														 'username'				 => $username,
														 'password'				 => $pass,
														 'tgl_daftar' 		 => $tgl,
														 'terakhir_login'  => $tgl_jam
													 );
													 $this->Mcrud->save_data('tbl_member', $data);

													 $this->session->set_flashdata('msg',
															'
															<div class="alert alert-success alert-dismissible" role="alert">
																 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
																	 <span aria-hidden="true">&times; &nbsp;</span>
																 </button>
																 <strong>Sukses!</strong> Selamat datang '.ucwords($nama).'.
															</div>'
														);

																$this->session->set_userdata('username_member@wp', "$username");

																redirect('');
										 }
						 }
				}

  }


	public function member($aksi='')
	{
		$ceks = $this->session->userdata('username_member@wp');
				$data_web = $this->db->get_where('tbl_web', "id_web='1'")->row();

				$data['judul_web'] = "Member | $data_web->nama_web";
				$data['data_web']  = $data_web;
				$data['t_barang']  = $this->Mcrud->get_data('tbl_barang')->num_rows();
				$data['t_artikel'] = $this->Mcrud->get_data('tbl_artikel')->num_rows();
				$data['t_admin']   = $this->Mcrud->get_data('tbl_admin')->row();
				$data['t_member']  = $this->db->get_where('tbl_member', "username='$ceks'")->row();

				$this->load->view('web/header', $data);
				$this->load->view('web/profile/member', $data);
				$this->load->view('web/footer', $data);


				if (isset($_POST['btnupdate'])) {
					$nama	   = htmlentities(strip_tags($_POST['nama']));
					$email	 = htmlentities(strip_tags($_POST['email']));
					$no_hp	 = htmlentities(strip_tags($_POST['no_hp']));
					$alamat	 = htmlentities(strip_tags($_POST['alamat']));

					$data = array(
						'nama'		=> $nama,
						'email'		=> $email,
						'no_hp'		=> $no_hp,
						'alamat'	=> $alamat
					);
					$this->Mcrud->update_data('tbl_member', array('username' => $ceks), $data);

					 $this->session->set_flashdata('msg',
						 '
						 <div class="alert alert-success alert-dismissible" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times; &nbsp;</span>
								</button>
								<strong>Sukses!</strong> Data Member berhasil diperbarui.
						 </div>'
					 );

					 redirect('member');
				}


				if (isset($_POST['btnupdate2'])) {
					$pass	   = htmlentities(strip_tags(md5($_POST['password'])));
					$pass2	 = htmlentities(strip_tags(md5($_POST['password2'])));

					if ($pass != $pass2) {
						$this->session->set_flashdata('msg',
 						 '
 						 <div class="alert alert-warning alert-dismissible" role="alert">
 								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
 									<span aria-hidden="true">&times; &nbsp;</span>
 								</button>
 								<strong>Gagal!</strong> Password tidak cocok!.
 						 </div>'
 					 );

 					 redirect('member/np');
					}

					$data = array(
						'password'		=> $pass,
					);
					$this->Mcrud->update_data('tbl_member', array('username' => $ceks), $data);

					 $this->session->set_flashdata('msg',
						 '
						 <div class="alert alert-success alert-dismissible" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times; &nbsp;</span>
								</button>
								<strong>Sukses!</strong> Password berhasil diperbarui.
						 </div>'
					 );

					 redirect('member');
				}

  }

}
