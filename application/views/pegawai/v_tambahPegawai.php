<?php echo form_open_multipart('TambahPegawai/do_upload');?>
<form class="form-signin" role="form" id="fTambahPegawai" accept-charset="UTF-8" method="post">
	<div class="form-group">
		<label for="nip">NIP</label>
		<input type="text" name="nip" id="nip" class="form-control" placeholder="NIP" autocomplete="off" required style="float:left;">
	</div>
	<div class="form-group">
		<label for="nama">Nama</label>
		<input type="text" name="nama" id="nama" class="form-control" placeholder="Nama" autocomplete="off" required>
	</div>
	<div class="form-group">
		<label for="tmpLahir">Tempat Lahir</label>
		<input type="text" name="tmpLahir" id="tmpLahir" class="form-control" placeholder="Tempat Lahir" autocomplete="off" required>
	</div>
	<div class="form-group">
		<label for="alamat">Alamat</label>
		<textarea name="alamat" id="alamat" class="form-control" placeholder="Alamat" required></textarea>
	</div>
	<div class="form-group">
		<label for="tglLahir">Tanggal Lahir</label>
		<input type="text" name="tglLahir" id="tglLahir" class="form-control" placeholder="Tanggal Lahir" autocomplete="off" required> format tanggal contoh : <?php echo date("o-m-d"); ?>
	</div>
	<div class="form-group">
		<label for="jenisKelamin">Jenis Kelamin</label>
		<select name="jenisKelamin" id="jenisKelamin" class="form-control">
			<option>Jenis Kelamin</option>
			<!-- I -->
			<option value="L">L</option>
			<option value="P">P</option>
		</select>
	</div>
	<div class="form-group">
		<label for="golongan">Golongan</label>
		<!-- <input type="text" name="golongan" id="golongan" class="form-control" placeholder="Golongan" autocomplete="off" required> -->
		<select name="golongan" id="golongan" title="Golongan" class="form-control">
			<option>Golongan</option>
			<!-- I -->
			<option value="I/a">I/a</option>
			<option value="I/b">I/b</option>
			<option value="I/c">I/c</option>
			<option value="I/d">I/d</option>
			<!-- II -->
			<option value="II/a">II/a</option>
			<option value="II/b">II/b</option>
			<option value="II/c">II/c</option>
			<option value="II/d">II/d</option>
			<!-- III -->
			<option value="III/a">III/a</option>
			<option value="III/b">III/b</option>
			<option value="III/c">III/c</option>
			<option value="III/d">III/d</option>
			<!-- IV -->
			<option value="IV/a">IV/a</option>
			<option value="IV/b">IV/b</option>
			<option value="IV/c">IV/c</option>
			<option value="IV/d">IV/d</option>
			<option value="IV/e">IV/e</option>
		</select>
	</div>
	<div class="form-group">
		<label for="eselon">Eselon</label>
		<select name="eselon" id="eselon" title="Eselon" class="form-control">
			<option>Eselon</option>
			<!-- I -->
			<option value="I">I</option>
			<option value="II">II</option>
			<option value="III">III</option>
			<option value="IV">IV</option>
		</select>
	</div>
	<div class="form-group">
		<label for="jabatan">Jabatan</label>
		<input type="text" name="jabatan" id="jabatan" class="form-control" placeholder="Jabatan" autocomplete="off" required>
	</div>
	<div class="form-group">
		<label for="tmpTugas">Tempat Tugas</label>
		<input type="text" name="tmpTugas" id="tmpTugas" class="form-control" placeholder="Tempat Tugas" autocomplete="off" required>
	</div>
	<div class="form-group">
		<label for="agama">Agama</label>
		<select name="agama" id="agama" class="form-control">
			<option>Agama</option>
			<!-- I -->
			<option value="Islam">Islam</option>
			<option value="Kristen Protestan">Kristen Protestan</option>
			<option value="Katolik">Katolik</option>
			<option value="Hindu">Hindu</option>
			<option value="Buddha">Buddha</option>
			<option value="Kong Hu Cu">Kong Hu Cu</option>
		</select>
	</div>
	<div class="form-group">
		<label for="unitKerja">Unit Kerja</label>
		<input type="text" name="unitKerja" id="unitKerja" class="form-control" placeholder="Unit Kerja" autocomplete="off" required>
	</div>
	<div class="form-group">
		<label for="noHp">No HP</label>
		<input type="text" name="noHp" id="noHp" class="form-control" placeholder="No HP" autocomplete="off" required>
	</div>
	<div class="form-group">
		<label for="NPWP">NPWP</label>
		<input type="text" name="NPWP" id="NPWP" class="form-control" placeholder="NPWP" autocomplete="off" required>
	</div>
	<div class="form-group">
		<label for="userfile">Foto</label>
		<input type="file" name="userfile" id="userfile" class="form-control inputfile" accept="image/*" required>
	</div>
	<div class="form-group">
		<input type="submit" name="tambahPegawai" id="tambahPegawai" class="btn btn-lg btn-primary btn-block" value="Tambah">    	
	</div>
</form>

<script type="text/javascript">
	$(document).ready(function()
	{	
		$("#tglLahir").datepicker({
			dateFormat : 'yy-mm-dd'
		});

		$("#nip").on('keyup',function(e)
	    {
	      if(isNaN($("#nip").val()))
	      {
	        swal("Info","Harus Berupa Angka","info");
	        $("#nip").val("");
	        var str = $("#nip").val();
	        //console.log(newStr);
	      	var newStr = str.substring(0, str.length-1);
	      }
	    });

	    $("#noHp").on('keyup',function(e)
	    {
	      if(isNaN($("#noHp").val()))
	      {
	        swal("Info","Harus Berupa Angka","info");
	        $("#noHp").val("");
	        var str = $("#noHp").val();
	        //console.log(newStr);
	      	var newStr = str.substring(0, str.length-1);
	      }
	    });
	    // $("#fTambahPegawai").on('submit',function(e)
	    // {
	    //   e.preventDefault();

	    //   swal({
	    //     title: "Tambah Pegawai ?",
	    //     text: "",
	    //     type: "info",
	    //     showCancelButton: true,
	    //     confirmButtonColor: "#DD6B55",
	    //     confirmButtonText: "Ya,mau tambah",
	    //     cancelButtonText: "Tidak tambah",
	    //     closeOnConfirm: false,
	    //     closeOnCancel: false
	    //   },
	      
	    //   function(isConfirm){
	    //     if (isConfirm) {
	    //       var a = $.ajax(
	    //       {
	    //         url : "",
	    //         type : "POST",
	    //         data : $("#fTambahPegawai").serialize(),//$("#fTambahPegawai").serialize()
	    //         beforeSend : function()
	    //         {
	    //           $("#tambahPegawai").val("SENDING...");
	    //         }
	    //       }).done(function()
	    //       {
	    //         sweetAlert("Success","","success");
	    //         $("#tambahPegawai").val("Tambah");
	    //         $("#fTambahPegawai")[0].reset();
	    //       });

	    //       $.when(a);
	    //     } else {
	    //       swal("Cancelled", "Your imaginary file is safe :)", "error");
	    //     }
	    //   });
	    // });
	});
</script>