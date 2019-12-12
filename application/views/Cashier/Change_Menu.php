<div class="container-fluid">
	<h2><i class="fa fa-cog"> </i> Modify Menu</h2>
	<hr>
	
	<div class="container ubah">
	<?php foreach($content->result() as $key): ?>
		<form class="form-horizontal" onSubmit="return validate()" method="post" action="<?php echo base_url() ?>Cashier/Action_Change_Menu/<?php echo $username ?>/<?php echo $key->ID ?>">
			<div class="form-group">
				<label class="control-label col-sm-4" for="password">ID :</label>
				<div class="col-sm-7">
					<input type="text" maxlength="15" onkeyup="filter(this)" class="form-control" id="pwd" name="ID" required value="<?php echo $key->ID ?>" disabled>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-4" for="password">Kind :</label>
				<div class="col-sm-7">
					<select name ="Kind" id="Kind" style="width:270px" value ="<?php echo $key->Kind ?>">

						<option <?php if($key->Kind == "Paket") echo 'selected' ?> value="Paket">Paket</option>
						<option <?php if($key->Kind == "Makanan") echo 'selected' ?> value="Makanan">Makanan</option>
						<option <?php if($key->Kind == "Sayuran") echo 'selected' ?> value="Sayuran">Sayuran</option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-4">Name :</label>
				<div class="col-sm-7">
					<input style="width:270px" type="text" maxlength="40" onkeyup="fchar(this)" class="form-control" id="pwd" placeholder="Enter Name" name="Name" required value="<?php echo $key->Name ?>">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-4" >Description :</label>
				<div class="col-sm-7">
					<textarea style="width: 270px" name="Description" maxlength="100" onkeyup="faddress(this)" placeholder="Enter Description ..."><?php echo $key->Description ?></textarea>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-4" >Price :</label>
				<div class="col-sm-7">
					<input style="width:270px" type="number" maxlength="15" onkeyup="fnohp(this)"  class="form-control"  placeholder="Enter The Price ..." name="Price" value="<?php echo $key->Price ?>" required>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-4" for="password">Kind :</label>
				<div class="col-sm-7">
					<select name ="Status" id="Status">
						<option <?php if($key->Status == 1) echo 'selected' ?> value="1">Available</option>
						<option <?php if($key->Status == 0) echo 'selected' ?> value="0">Empty</option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-4 col-sm-10">
					<button type="submit" class="btn btn-primary">Submit</button>
				</div>
			</div>
		</form>
	<?php endforeach  ?>
	</div>
</div>

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
</script>
</body>
</html>