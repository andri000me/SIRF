<h4>Order</h4>
<hr>
<div class="container ubah" >
	<form class="form-horizontal" onSubmit="return validate()" method="post" action="<?php echo base_url() ?>Cashier/action_add_order/<?php echo $username?>/<?php echo $ID_Reservation?>">
		<div class="form-group">
			<label class="control-label col-sm-4" for="" required="">Jenis Makanan :</label>
			<div class="col-sm-7 name" required>
				<select name ="nama_paket" id="nama_paket">
					<?php foreach($content->result_array() as $key): ?>
					<option value="<?php echo $key['Name'] ?>" ><?php echo $key['Name'] ?></option>
					<?php endforeach ?>
				</select>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-4" >Jumlah :</label>
			<div class="col-sm-7">
				<input type="number" maxlength="15" onkeyup="fnohp(this)"  class="form-control"  placeholder="Jumlah" name="Jumlah" style="width:270px" required>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-4 col-sm-10">
				<button class="btn btn-primary btn-tambah">Add</button>
			</div>
		</div>
	</form>
	<hr>
	<br>
	
	<!-- Modal -->
	<div class="modal fade" id="myModal" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header" align="center">
					<h6 class="modal-title">Ubah Pesanan</h4>
				</div>
				<div class="modal-body">
					<form class="form-horizontal" onSubmit="return validate()" method="post" action="<?php echo base_url() ?>Cashier/action_ubah_order_detail/<?php echo $username?>/<?php echo $ID_Reservation?>">
						<div class="form-group">
							<div class="col-sm-5 name" required>
								<input type="text" name="ID" id="ID" value="" style="width: 270px" readonly="readonly"/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-5" for="" required="">Jenis Makanan :</label>
							<div class="col-sm-5 name" required>
								<select name ="nama_paket_baru" id="nama_paket_baru">
									<?php foreach($content->result_array() as $key): ?>
									<option value="<?php echo $key['Name'] ?>" ><?php echo $key['Name'] ?></option>
									<?php endforeach ?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-4" >Jumlah : </label>
							<div class="col-sm-5">
								<input type="number" maxlength="15" onkeyup="fnohp(this)"  class="form-control"  placeholder="Jumlah" name="Jumlah_Baru" style="width: 270px" required>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-4 col-sm-10">
								<button class="btn btn-primary btn-tambah">Change</button>
							</div>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
			
		</div>
	</div>

	<form class="form-horizontal" onSubmit="return validate()" method="post" action="<?php echo base_url() ?>Cashier/add_order/<?php echo $username?>/<?php echo $ID_Reservation?>">
		<h4>List Order :
		<?php echo $ID_Reservation?>
		</h4>
		
		<table>
			<tr>
				<th>No</th>
				<th>Name</th>
				<th>Jumlah</th>
				<th>Action</th>
			</tr>
			<tr>
				<?php $i=1 ?>
				<?php foreach($content1->result_array() as $key): ?>
				<tr>
					<td>
						<?php echo $i?>
					</td>
					<td>
						<?php echo $key['Name'] ?>
					</td>
					<td>
						<?php echo $key['quantity'] ?>
					</td>
					<td>
						<a style="text-decoration: none" data-id="<?php echo $key['id'] ?>"  class="change" title="Modify" href="#myModal" title="" data-toggle="modal" data-target="#myModal">
							<i class="fa fa-edit"></i>
						</a>
						<span> | </span>
						<a style="text-decoration: none"  title="Delete" href="<?php echo base_url()?>Cashier/action_delete_pesanan/<?php echo $key['id'] ?>/<?php echo $ID_Reservation?>/<?php echo $username?>" title="">
						<i class="fa fa-trash"></i></a>
					</td>
					<?php  $i++?>
				</tr>
				<?php endforeach ?>
			</tr>
		</table>
		<br>
		<div class="form-group">
			<label class="control-label col-sm-4" >No Meja :</label>
			<div class="col-sm-7">
				<input type="number" maxlength="15" onkeyup="fnohp(this)"  class="form-control"  placeholder="Nomor Meja" name="no_meja" style="width:150px" required>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-4" >Note :</label>
			<div class="col-sm-7">
				<input type="text" onkeyup="fnohp(this)"  class="form-control"  placeholder="Add something note.." name="note" style="width:300px" required>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-4 col-sm-10">
				<button class="btn btn-primary btn-tambah" type="submit">Order</button>
			</div>
		</div>
	</form>
</div>
<br>
</div>
</div>
<!-- jQuery CDN - Slim version (=without AJAX) -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<!-- Popper.JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
<script type="text/javascript">
	$(document).ready(function () {
		$('#sidebarCollapse').on('click', function () {
			$('#sidebar').toggleClass('active');
			});
		});
	$(document).on("click", ".change", function () {
		var keyid = $(this).data('id');
		$(".modal-body #ID").val( keyid );
	});
</script>
<!-- Script Vendor -->
<script src="<?=base_url('assets/vendor/js/Util.js')?>" type="text/javascript" charset="utf-8" async defer></script>
</body>
</html>