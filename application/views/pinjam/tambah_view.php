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
      <i class="fa fa-plus" style="color:green"> </i>  <?= $title_web;?>
    </h1>
    <ol class="breadcrumb">
			<li><a href="<?php echo base_url('dashboard');?>"><i class="fa fa-dashboard"></i>&nbsp; Dashboard</a></li>
			<li class="active"><i class="fa fa-plus"></i>&nbsp;  <?= $title_web;?></li>
    </ol>
  </section>
  <section class="content">
	<div class="row">
	    <div class="col-md-12">
	        <div class="box box-primary">
                <div class="box-header with-border">
                </div>
			    <!-- /.box-header -->
			    <div class="box-body">
                    <form action="<?php echo base_url('transaksi/prosespinjam');?>" method="POST" enctype="multipart/form-data">
						
						<div class="row">
							<div class="col-sm-5">
								<table class="table table-striped">
									<tr style="background:yellowgreen">
										<td colspan="3">Data Transaksi</td>
									</tr>
									<tr>
										<td>No Peminjaman</td>
										<td>:</td>
										<td>
											<input type="text" name="nopinjam" value="<?= $nop;?>" readonly class="form-control">
										</td>
									</tr>
									<tr>
										<td>Tgl Peminjaman</td>
										<td>:</td>
										<td>
											<input type="date" value="<?= date('Y-m-d');?>" name="tgl" class="form-control">
										</td>
									</tr>
									<tr>
										<td>ID Anggota</td>
										<td>:</td>
										<td>
											<div class="input-group">
												<input type="text" class="form-control" required autocomplete="off" name="anggota_id" id="search-box" placeholder="Contoh ID Anggota : AG001" type="text" value="">
												<span class="input-group-btn">
													<a data-toggle="modal" data-target="#TableAnggota" class="btn btn-primary"><i class="fa fa-search"></i></a>
												</span>
											</div>
										</td>
									</tr>
									<tr>
										<td>Biodata</td>
										<td>:</td>
										<td>
											<div id="result_tunggu"> <p style="color:red">* Belum Ada Hasil</p></div>
											<div id="result"></div>
										</td>
									</tr>
									<tr>
										<td>Lama Peminjaman</td>
										<td>:</td>
										<td>
											<input type="number" required placeholder="Lama Pinjam Contoh : 2 Hari (2)" name="lama" class="form-control">
										</td>
									</tr>
								</table>
							</div>
							<div class="col-sm-7">
								<table class="table table-striped">
									<tr style="background:yellowgreen">
										<td colspan="3">Pinjam Buku</td>
									</tr>
									<tr>
										<td>Kode Buku</td>
										<td>:</td>
										<td>
											<div class="input-group">
												<input type="text" class="form-control" autocomplete="off" name="buku_id" id="buku-search" placeholder="Contoh ID Buku : BK001" type="text" value="">
												<span class="input-group-btn">
													<a data-toggle="modal" data-target="#TableBuku" class="btn btn-primary"><i class="fa fa-search"></i></a>
												</span>
											</div>
										</td>
									</tr>
									<tr>
										<td>Data Buku</td>
										<td>:</td>
										<td>
											<div id="result_tunggu_buku"> <p style="color:red">* Belum Ada Hasil</p></div>
											<div id="result_buku"></div>
										</td>
									</tr>
								</table>
							</div>
						</div>
                        <div class="pull-right">
							<input type="hidden" name="tambah" value="tambah">
                            <button type="submit" class="btn btn-primary btn-md">Submit</button> 
                    </form>
							<a href="<?= base_url('transaksi');?>" class="btn btn-danger btn-md">Kembali</a>
						</div>
		        </div>
	        </div>
	    </div>
    </div>
</section>
</div>
<!--modal import -->
<div class="modal fade" id="TableBuku">
<div class="modal-dialog" style="width:80%;">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span></button>
<h4 class="modal-title">Add Buku</h4>
</div>
<div id="modal_body" class="modal-body fileSelection1">
<table id="example1" class="table table-bordered table-striped">
		<thead>
			<tr>
				<th>No</th>
				<th>ISBN</th>
				<th>Title</th>
				<th>Penerbit</th>
				<th>Tahun Buku</th>
				<th>Stok Buku</th>
				<th>Tanggal Masuk</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
		<?php $no=1;foreach($buku->result_array() as $isi){?>
			<tr>
				<td><?= $no;?></td>
				<td><?= $isi['isbn'];?></td>
				<td><?= $isi['title'];?></td>
				<td><?= $isi['penerbit'];?></td>
				<td><?= $isi['thn_buku'];?></td>
				<td><?= $isi['jml'];?></td>
				<td><?= $isi['tgl_masuk'];?></td>
				<td style="width:17%">
				<button class="btn btn-primary" id="Select_File2" data_id="<?= $isi['buku_id'];?>">
					<i class="fa fa-check"> </i> Pilih
				</button>
				<a href="<?= base_url('data/bukudetail/'.$isi['id_buku']);?>" target="_blank">
					<button class="btn btn-success"><i class="fa fa-sign-in"></i> Detail</button></a>
				</td>
			</tr>
		<?php $no++;}?>
		</tbody>
	</table>
</div>
<div class="modal-footer">
	<button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
</div>
</div>
<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<script>
	$(".fileSelection1 #Select_File2").click(function (e) {
		document.getElementsByName('buku_id')[0].value = $(this).attr("data_id");
		$('#TableBuku').modal('hide');
		$.ajax({
			type: "POST",
			url: "<?php echo base_url('transaksi/buku');?>",
			data:'kode_buku='+$(this).attr("data_id"),
			beforeSend: function(){
				$("#result_buku").html("");
				$("#result_tunggu_buku").html('<p style="color:green"><blink>tunggu sebentar</blink></p>');
			},
			success: function(html){
				$("#result_buku").load("<?= base_url('transaksi/buku_list');?>");
				$("#result_tunggu_buku").html('');
			}
		});
	});
	</script>
	  
	<script>
	// AJAX call for autocomplete 
	$(document).ready(function(){
		$("#buku-search").keyup(function(){
			$.ajax({
				type: "POST",
				url: "<?php echo base_url('transaksi/buku');?>",
				data:'kode_buku='+$(this).val(),
				beforeSend: function(){
					$("#result_tunggu_buku").html('<p style="color:green"><blink>tunggu sebentar</blink></p>');
				},
				success: function(html){
					$("#result_buku").load("<?= base_url('transaksi/buku_list');?>");
					$("#result_tunggu_buku").html('');
				}
			});
		});
	});
	</script>
 <!--modal import -->
 <div class="modal fade" id="TableAnggota">
	<div class="modal-dialog">
	<div class="modal-content">
	<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	<span aria-hidden="true">&times;</span></button>
	<h4 class="modal-title">Add Anggota</h4>
	</div>
	<div id="modal_body" class="modal-body fileSelection1">
	<table id="example3" class="table table-bordered table-striped">
		<thead>
			<tr>
				<th>No</th>
				<th>ID</th>
				<th>Nama</th>
				<th>Jenkel</th>
				<th>Telepon</th>
				<th>Level</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
		<?php $no=1;foreach($user as $isi){
			if($isi['level'] == 'Anggota'){
			?>
			<tr>
				<td><?= $no;?></td>
				<td><?= $isi['anggota_id'];?></td>
				<td><?= $isi['nama'];?></td>
				<td><?= $isi['jenkel'];?></td>
				<td><?= $isi['telepon'];?></td>
				<td><?= $isi['level'];?></td>
				<td style="width:20%;">
					<button class="btn btn-primary" id="Select_File1" data_id="<?= $isi['anggota_id'];?>">
					<i class="fa fa-check"> </i> Pilih
					</button>
				</td>
			</tr>
		<?php $no++;}}?>
		</tbody>
		</table>
	</div>
	<div class="modal-footer">
		<button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
	</div>
	</div>
	<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
	</div>
	<!-- /.modal -->
	<script>
	$(".fileSelection1 #Select_File1").click(function (e) {
		document.getElementsByName('anggota_id')[0].value = $(this).attr("data_id");
		$('#TableAnggota').modal('hide');
		$.ajax({
			type: "POST",
			url: "<?php echo base_url('transaksi/result');?>",
			data:'kode_anggota='+$(this).attr("data_id"),
			beforeSend: function(){
				$("#result").html("");
				$("#result_tunggu").html('<p style="color:green"><blink>tunggu sebentar</blink></p>');
			},
			success: function(html){
				$("#result").html(html);
				$("#result_tunggu").html('');
			}
		});
	});
	</script>
	  
	<script>
	// AJAX call for autocomplete 
	$(document).ready(function(){
		$("#search-box").keyup(function(){
			$.ajax({
				type: "POST",
				url: "<?php echo base_url('transaksi/result');?>",
				data:'kode_anggota='+$(this).val(),
				beforeSend: function(){
					$("#result").html("");
					$("#result_tunggu").html('<p style="color:green"><blink>tunggu sebentar</blink></p>');
				},
				success: function(html){
					$("#result").html(html);
					$("#result_tunggu").html('');
				}
			});
		});
	});
	</script>
