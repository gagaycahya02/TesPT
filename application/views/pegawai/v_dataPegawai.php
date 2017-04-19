<div class="">
	<a href="<?php echo site_url('DataPegawai/excelExport'); ?>" class="btn btn-primary" id="lExcel">Laporan Excel</a><br><br>
</div>

<table class="table table-condensed" id="tMbl">
 	<thead>
 		<tr>
 			<th>NIP</th>
 			<th>Nama</th>
 			<th>Tempat Lahir</th>
 			<th>Alamat</th>
 			<th>Tanggal Lahir</th>
 			<th>Gender</th>
 			<th>Golongan</th>
 			<th>Eselon</th>
 			<th>Jabatan</th>
 			<th>Tempat Tugas</th>
 			<th>Agama</th>
 			<th>Unit Kerja</th>
 			<th>No HP</th>
 			<th>NPWP</th>
 			<th>Foto</th>
 			<th>Action</th>
 		</tr>
 	</thead>
 	<tbody>
<?php 
	foreach($pegawai as $test)
	{
		echo "<tr>";
		echo "<td>".$test->nip."</td>";
		echo "<td>".$test->nama."</td>";
		echo "<td>".$test->tempatLahir."</td>";
		echo "<td>".$test->alamat."</td>";
		echo "<td>".$test->tglLahir."</td>";
		echo "<td>".$test->gender."</td>";
		echo "<td id='gol'>".$test->golongan."</td>";
		echo "<td>".$test->eselon."</td>";
		echo "<td>".$test->jabatan."</td>";
		echo "<td>".$test->tmpTugas."</td>";
		echo "<td>".$test->agama."</td>";
		echo "<td>".$test->unitKerja."</td>";
		echo "<td>".$test->noHP."</td>";
		echo "<td>".$test->NPWP."</td>";
		
		if($test->userPic == "")
		{
			$x = "";
			$w = 0;
			$h = 0;
		}else
		{
			$x = 'uploads/'.$test->userPic;
			$w = "50px";
			$h = "50px";
		}

		echo "<td><img src='".$x."' width='".$w."'' height='".$h."'></td>";
		echo "<td><button id='carUpdate' class='btn'>UPDATE</button> <br>
		<br> <button id='carDelete' class='btn'>DELETE</button></td>";
		echo "</tr>";
	}
?>
	</tbody>
</table>

<div class="row" id="fUpdate">
	<div class="col-md-4">
		<form role="form" accept-charset="UTF-8" id="fUMbl" method="post">
			<div class="form-group" id="nip">
				<label>NIP</label>
				<input type="text" class="form-control" name="NIP" id="NIP" placeholder="NIP" readonly="">
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
				<input type="text" name="tglLahir" id="tglLahir" class="form-control" placeholder="Tanggal Lahir" autocomplete="off" required>
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
				<select name="golongan" id="golongan" title="Golongan" class="form-control">
					<option>Golongan</option>
					<!-- I -->
					<option value="I/a" id="oa">I/a</option>
					<option value="I/b" id="ob">I/b</option>
					<option value="I/c" id="oc">I/c</option>
					<option value="I/d" id="od">I/d</option>
					<!-- II -->
					<option value="II/a" id="twa">II/a</option>
					<option value="II/b" id="twb">II/b</option>
					<option value="II/c" id="twc">II/c</option>
					<option value="II/d" id="twd">II/d</option>
					<!-- III -->
					<option value="III/a" id="tha">III/a</option>
					<option value="III/b" id="thb">III/b</option>
					<option value="III/c" id="thc">III/c</option>
					<option value="III/d" id="thd">III/d</option>
					<!-- IV -->
					<option value="IV/a" id="fa">IV/a</option>
					<option value="IV/b" id="fb">IV/b</option>
					<option value="IV/c" id="fc">IV/c</option>
					<option value="IV/d" id="fd">IV/d</option>
					<option value="IV/e" id="fe">IV/e</option>
				</select>
			</div>

			<div class="form-group">
				<label for="eselon">Eselon</label>
				<select name="eselon" id="eselon" title="Eselon" class="form-control">
					<option>Eselon</option>
					<!-- I -->
					<option value="I" id="ei">I</option>
					<option value="II" id="eii">II</option>
					<option value="III" id="eiii">III</option>
					<option value="IV" id="eiv">IV</option>
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
					<option value="Islam" id="il">Islam</option>
					<option value="Kristen Protestan" id="kp">Kristen Protestan</option>
					<option value="Katolik" id="kt">Katolik</option>
					<option value="Hindu" id="hd">Hindu</option>
					<option value="Buddha" id="bd">Buddha</option>
					<option value="Kong Hu Cu" id="khc">Kong Hu Cu</option>
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
				<input type="submit" name="uPegawai" class="btn btn-lg btn-primary btn-block" id="updateMbl" value="UPDATE">
			</div>
		</form>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function()
	{	
		$("#tMbl").DataTable();
		$("#nip").hide();
		// $("#fUMbl").hide();

		// $("#nip").on('keyup',function(e)
	 //    {
	 //      if(isNaN($("#nip").val()))
	 //      {
	 //        swal("Info","Harus Berupa Angka","info");
	 //        $("#nip").val("");
	 //        var str = $("#nip").val();
	 //        //console.log(newStr);
	 //      	var newStr = str.substring(0, str.length-1);
	 //      }
	 //    });

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
	    
		$("#carUpdate").click(function()
		{
			$("#fUMbl").show();
		});

		var gol = $("#gol").text();
		gol.trim();

		$("#tglLahir").datepicker({
			dateFormat : 'yy-mm-dd'
		});

		$('#tMbl').on('click','#carUpdate',function(x)
	    {
	      var cRow = $(this).closest("tr");
	      var n = cRow.find("td:eq(0)").text();
	      var x = cRow.find("td:eq(1)").text();
	      var y = cRow.find("td:eq(2)").text();
	      var z = cRow.find("td:eq(3)").text();
	      var a = cRow.find("td:eq(4)").text();
	      var b = cRow.find("td:eq(5)").text();
	      var c = cRow.find("td:eq(6)").text();
	      var d = cRow.find("td:eq(7)").text();
	      var e = cRow.find("td:eq(8)").text();
	      var f = cRow.find("td:eq(9)").text();
	      var g = cRow.find("td:eq(10)").text();
	      var h = cRow.find("td:eq(11)").text();
	      var i = cRow.find("td:eq(12)").text();
	      var j = cRow.find("td:eq(13)").text();

	      $("#nip").val(n);
	      $("#nama").val(x);
	      $("#tmpLahir").val(y);
	      $("#alamat").val(z);
	      $("#tglLahir").val(a);
	      $("#jenisKelamin").val(b);
	      $("#golongan").val(c);
	      $("#eselon").val(d);
	      $("#jabatan").val(e);
	      $("#tmpTugas").val(f);
	      $("#agama").val(g);
	      $("#unitKerja").val(h);
	      $("#noHp").val(i);
	      $("#NPWP").val(j);
	    });

	    $('#tMbl').on('click','#carDelete',function(x)
	    {
	      var cRow = $(this).closest("tr");
	      var n = cRow.find("td:eq(0)").text();

	      swal({
		        title: "Yakin dihapus ?",
		        text: "",
		        type: "info",
		        showCancelButton: true,
		        confirmButtonColor: "#DD6B55",
		        confirmButtonText: "Ya",
		        cancelButtonText: "Tidak",
		        closeOnConfirm: false,
		        closeOnCancel: false
		      },
		      function(isConfirm){
		        if (isConfirm) {
		          	$.ajax(
			      	{
			      		type : "POST",
			      		url : "<?php echo site_url('DataPegawai/delPeg'); ?>/" + n
			      	}).done(function()
			      	{
			      		sweetAlert("Success Hapus","","success");
			      		window.location.reload();
			      	});
		        } else {
		          swal("Cancelled", "", "error");
		        }
		      });
	    });

	    $("#fUMbl").on('submit',function(e)
		{
			var n = $("#nip").val();

			e.preventDefault();

			swal({
		        title: "Yakin update ?",
		        text: "",
		        type: "info",
		        showCancelButton: true,
		        confirmButtonColor: "#DD6B55",
		        confirmButtonText: "Ya",
		        cancelButtonText: "Tidak",
		        closeOnConfirm: false,
		        closeOnCancel: false
		      },
		      function(isConfirm){
		        if (isConfirm) {
		          	$.ajax({
					type : 'POST',
					url : "<?php echo site_url('DataPegawai/upPeg'); ?>/" + n,
					data : $("#fUMbl").serialize(),
					beforeSend : function()
					{
						$("#updateMbl").val("SENDING...");
					}
					}).done(function()
					{
						sweetAlert("Success","","success");
						$("#updateMbl").val("Update");
						$("form")[0].reset();
						$("form")[0].reset();
						window.location.reload();
					});
		        } else {
		          swal("Cancelled", "", "error");
		        }
		   	});
		});

	});
</script>