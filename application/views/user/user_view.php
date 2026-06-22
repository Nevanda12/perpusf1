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
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      <i class="fa fa-edit" style="color:green"> </i>  Daftar Data User
    </h1>
    <ol class="breadcrumb">
			<li><a href="<?php echo base_url('dashboard');?>"><i class="fa fa-dashboard"></i>&nbsp; Dashboard</a></li>
			<li class="active"><i class="fa fa-file-text"></i>&nbsp; Daftar Data User</li>
    </ol>
  </section>
  <section class="content">
	<?php if(!empty($this->session->flashdata())){ echo $this->session->flashdata('pesan');}?>
	<div class="row">
	    <div class="col-md-12">
	        <div class="box box-primary">
                <div class="box-header with-border">
                    <a href="user/tambah"><button class="btn btn-primary"><i class="fa fa-plus"> </i> Tambah User</button></a>

                </div>
				<!-- /.box-header -->
				<div class="box-body">
				<div class="table-responsive">
                    <br/>
                    <table id="example1" class="table table-bordered table-striped table" width="100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>ID</th>
                                <th>Foto</th>
                                <th>Nama</th>
                                <th>User</th>
                                <th>Jenkel</th>
                                <th>Telepon</th>
                                <th>Level</th>
                                <th>Alamat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $no=1;foreach($user as $isi){?>
                            <tr>
                                <td><?= $no;?></td>
                                <td><?= $isi['anggota_id'];?></td>
                                <td>
                                    <center>
                                        <?php if(!empty($isi['foto'] !== "-")){?>
                                        <img src="<?php echo base_url();?>assets_style/image/<?php echo $isi['foto'];?>" alt="#" 
                                        class="img-responsive" style="height:auto;width:100px;"/>
                                        <?php }else{?>
                                            <!--<img src="" alt="#" class="user-image" style="border:2px solid #fff;"/>-->
                                            <i class="fa fa-user fa-3x" style="color:#333;"></i>
                                        <?php }?>
                                    </center>
                                </td>
                                <td><?= $isi['nama'];?></td>
                                <td><?= $isi['user'];?></td>
                                <td><?= $isi['jenkel'];?></td>
                                <td><?= $isi['telepon'];?></td>
                                <td><?= $isi['level'];?></td>
                                <td><?= $isi['alamat'];?></td>
                                <td style="width:20%;">
                                    <a href="<?= base_url('user/edit/'.$isi['id_login']);?>"><button class="btn btn-success"><i class="fa fa-edit"></i></button></a>
                                    <a href="<?= base_url('user/del/'.$isi['id_login']);?>" onclick="return confirm('Anda yakin user akan dihapus ?');">
									<button class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
									<a href="<?= base_url('user/detail/'.$isi['id_login']);?>" target="_blank"><button class="btn btn-primary">
										<i class="fa fa-print"></i> Cetak Kartu</button></a>
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
