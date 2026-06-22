<?php if(! defined('BASEPATH')) exit('No direct script acess allowed');?>
<style>
    /* 1. Menargetkan wrapper utama konten halaman ini */
    .content-wrapper {
        background-image: url('<?= base_url('assets_style/image/bukulonjong.jpeg'); ?>');
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
        background-attachment: fixed;
    }

    /* 2. Mengubah warna tulisan judul utama menjadi coklat terang */
    .content-header h1 {
        color: #c49a6c !important;
        font-weight: bold;
    }

    /* ============================================================== */
    /* REAL GLASSMORPHISM EFFECT (EFEK KACA ASLI)                     */
    /* ============================================================== */
    
    /* 3. Membuat kotak utama menjadi setipis kaca dengan efek blur di belakangnya */
    .box, .box-primary {
        background: rgba(255, 255, 255, 0.25) !important; /* Putih super tipis (hanya menyisakan 25% warna) */
        backdrop-filter: blur(10px) !important;         /* Trik utama: Membuat gambar di belakang kotak jadi blur seperti kaca */
        -webkit-backdrop-filter: blur(10px) !important; /* Dukungan untuk browser Safari/iOS */
        
        border: 1px solid rgba(255, 255, 255, 0.3) !important; /* Garis tepi tipis warna putih untuk mempertegas sudut kaca */
        border-top: 4px solid #3c8dbc !important;              /* Tetap mempertahankan ciri khas garis biru AdminLTE */
        border-radius: 12px !important;                        /* Membuat sudut kotak sedikit melengkung agar lebih modern */
        box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.15) !important; /* Bayangan halus di bawah kaca */
    }

    /* 4. Menghapus semua background bawaan elemen di dalam box agar tidak menumpuk pekat */
    .box-header, 
    .box-body, 
    .table-responsive, 
    table, 
    table.dataTable,
    table.dataTable tbody tr {
        background: transparent !important;
        background-color: transparent !important;
    }

    /* 5. Menjaga teks di dalam tabel tetap tajam dan kontras tinggi agar sangat mudah dibaca */
    .box-body, table, th, td, label, .dataTables_info {
        color: #111111 !important; /* Hitam pekat agar tidak tersaru dengan background */
        font-weight: 500 !important;
    }
    
    th {
        font-weight: bold !important;
        border-bottom: 2px solid rgba(0, 0, 0, 0.1) !important;
    }

    /* 6. Modifikasi efek baris belang (striped) agar sangat transparan dan menyatu dengan tema kaca */
    .table-striped > tbody > tr:nth-of-type(odd) {
        background-color: rgba(255, 255, 255, 0.1) !important; /* Efek kilau putih tipis */
    }
    .table-striped > tbody > tr:nth-of-type(even) {
        background-color: rgba(0, 0, 0, 0.02) !important;    /* Efek bayangan gelap super tipis */
    }

    /* 7. Menyesuaikan kotak input Search dan Dropdown halaman agar semi-transparan juga */
    .dataTables_wrapper .dataTables_filter input, 
    .dataTables_wrapper .dataTables_length select {
        background-color: rgba(255, 255, 255, 0.6) !important;
        backdrop-filter: blur(5px) !important;
        border: 1px solid rgba(255, 255, 255, 0.5) !important;
        color: #000 !important;
        border-radius: 4px;
    }
</style>
<style>
    /* Menargetkan wrapper utama konten halaman ini */
    .content-wrapper {
        /* Menggunakan base_url() untuk path gambar */
        background-image: url('<?= base_url('assets_style/image/bukulonjong.jpeg'); ?>');
        
        /* Pengaturan agar background terlihat bagus */
        background-size: cover;      /* Gambar menutupi seluruh area */
        background-repeat: no-repeat;  /* Gambar tidak mengulang */
        background-position: center;   /* Gambar rata tengah */
        
        /* Optional: Pastikan konten di dalamnya tetap terbaca jika gambarnya gelap */
        /*
        color: white; 
        */
    }

    /* Optional: Jika kotaknya (box) putihnya menutupi background dan Anda ingin kotaknya semi-transparan */
    /*
    .box {
        background: rgba(168, 19, 19, 0.8) !important; 
    }
    */
</style>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      <i class="fa fa-edit" style="color:green"> </i>  <?= $title_web;?>
    </h1>
    <ol class="breadcrumb">
			<li><a href="<?php echo base_url('dashboard');?>"><i class="fa fa-dashboard"></i>&nbsp; Dashboard</a></li>
			<li class="active"><i class="fa fa-file-text"></i>&nbsp; <?= $title_web;?></li>
    </ol>
  </section>
  <section class="content">
	<?php if(!empty($this->session->flashdata())){ echo $this->session->flashdata('pesan');}?>
	<div class="row">
	    <div class="col-md-12">
	        <div class="box box-primary">
                <div class="box-header with-border"><?php if($this->session->userdata('level') == 'Petugas'){ ?>
                    <a href="transaksi/pinjam"><button class="btn btn-primary">
				<i class="fa fa-plus"> </i> Tambah Pinjam</button></a><?php }?>

                </div>
				<!-- /.box-header -->
				<div class="box-body">
                    <br/>
					<div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped table" width="100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>No Pinjam</th>
                                <th>ID Anggota</th>
                                <th>Nama</th>
                                <th>Pinjam</th>
                                <th>Balik</th>
                                <th style="width:10%">Status</th>
                                <th>Denda</th>
                                <th>Aksi</th>
                            </tr>
						</thead>
						<tbody>
						<?php 
							$no=1;
							foreach($pinjam->result_array() as $isi){
									$anggota_id = $isi['anggota_id'];
									$ang = $this->db->query("SELECT * FROM tbl_login WHERE anggota_id = '$anggota_id'")->row();

									$pinjam_id = $isi['pinjam_id'];
									$denda = $this->db->query("SELECT * FROM tbl_denda WHERE pinjam_id = '$pinjam_id'");
									$total_denda = $denda->row();
						?>
                            <tr>
                                <td><?= $no;?></td>
                                <td><?= $isi['pinjam_id'];?></td>
                                <td><?= $isi['anggota_id'];?></td>
                                <td><?= $ang->nama;?></td>
                                <td><?= $isi['tgl_pinjam'];?></td>
                                <td><?= $isi['tgl_balik'];?></td>
                                <td><?= $isi['status'];?></td>
                                <td>
									<?php 
										if($isi['status'] == 'Di Kembalikan')
										{
											echo $this->M_Admin->rp($total_denda->denda);
										}else{
											$jml = $this->db->query("SELECT * FROM tbl_pinjam WHERE pinjam_id = '$pinjam_id'")->num_rows();			
											$date1 = date('Ymd');
											$date2 = preg_replace('/[^0-9]/','',$isi['tgl_balik']);
											$diff = $date1 - $date2;
											if($diff > 0 )
											{
												echo $diff.' hari';
												$dd = $this->M_Admin->get_tableid_edit('tbl_biaya_denda','stat','Aktif'); 
												echo '<p style="color:red;font-size:18px;">
												'.$this->M_Admin->rp($jml*($dd->harga_denda*$diff)).' 
												</p><small style="color:#333;">* Untuk '.$jml.' Buku</small>';
											}else{
												echo '<p style="color:green;">
												Tidak Ada Denda</p>';
											}
										}
									?>
								</td>
								<td style="text-align:center;">
									<?php if($this->session->userdata('level') == 'Petugas'){ ?>
										<?php if($isi['tgl_kembali'] == '0') {?>
											<a href="<?= base_url('transaksi/kembalipinjam/'.$isi['pinjam_id']);?>" class="btn btn-warning btn-sm" title="pengembalian buku">
												<i class="fa fa-sign-out"></i> Kembalikan</a>
										<?php }else{ ?>
											<a href="javascript:void(0)" class="btn btn-success btn-sm" title="pengembalian buku">
												<i class="fa fa-check"></i> Dikembalikan</a>
										<?php }?>
										<a href="<?= base_url('transaksi/detailpinjam/'.$isi['pinjam_id'].'?pinjam=yes');?>" class="btn btn-primary btn-sm" title="detail pinjam"><i class="fa fa-eye"></i></button></a>
										<a href="<?= base_url('transaksi/prosespinjam?pinjam_id='.$isi['pinjam_id']);?>" 
											onclick="return confirm('Anda yakin Peminjaman Ini akan dihapus ?');" 
											class="btn btn-danger btn-sm" title="hapus pinjam">
											<i class="fa fa-trash"></i></a>
									<?php }else{?>
										<a href="<?= base_url('transaksi/detailpinjam/'.$isi['pinjam_id']);?>" 
											class="btn btn-primary btn-sm" title="detail pinjam">
											<i class="fa fa-eye"></i> Detail Pinjam</a>
									<?php }?>
                                </td>
                            </tr>
                        <?php $no++;}?>
						</tbody>
					</table>
			    </div>
			    </div>
	        </div>
    	</div>
    </div>
</section>
</div>
