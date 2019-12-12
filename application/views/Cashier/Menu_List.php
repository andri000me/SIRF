<div class="food">
	<h4>Food</h4>
	<hr>
	<div class="add" style="position: right">
		<a style="text-decoration: none;text-align: right;" href="<?php echo base_url()?>Cashier/Add_Menu/<?php echo $username ?>"> <i class="fa fa-user-plus"></i> Add Menu</a>
	</div>
	<table>
		<tr>
			<th>No</th>
			<th>Kind</th>
			<th>Name</th>
			<th>Description</th>
			<th>Price</th>
			<th>Status</th>
			<th>Action</th>
		</tr>
		<tr>
			<?php $i=1 ?>
			<?php foreach($content->result_array() as $key): ?>
			<tr>
				<td>
					<?php echo $i?>
				</td>
				<td>
					<?php echo $key['Kind'] ?>
				</td>
				<td>
					<?php echo $key['Name'] ?>
				</td>
				
				<td>
					<?php echo $key['Description'] ?>
				</td>
				<td>
					<?php echo $key['Price'] ?>
				</td>
				<td>
					<?php
						if($key['Status']==1)
							echo "Ready";
						else
							echo 'Empty';
					?>
				</td>
				<td>
					<a style="text-decoration: none" title="Modify" href="<?php echo base_url()?>Cashier/Change_Menu/<?php echo $username ?>/<?php echo $key['ID'] ?>" title="">
						<i class="fa fa-edit"></i>
					</a>
					<span> | </span>
					<a style="text-decoration: none" title="Delete" href="<?php echo base_url()?>Cashier/Action_delete_menu/<?php echo $username ?>/<?php echo $key['ID'] ?>" title="">
					<i class="fa fa-trash"></i></a>
				</td>
				<?php  $i++?>
			</tr>
			<?php endforeach ?>
		</tr>
	</table>
	<br>
</div>
<div class="Drink">
	<h4>Drink</h4>
	<hr>
	<table>
		<tr>
			<th>No</th>
			<th>Kind</th>
			<th>Name</th>
			<th>Description</th>
			<th>Price</th>
			<th>Status</th>
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
					<?php echo $key['Kind'] ?>
				</td>
				<td>
					<?php echo $key['Name'] ?>
				</td>
				
				<td>
					<?php echo $key['Description'] ?>
				</td>
				<td>
					<?php echo $key['Price'] ?>
				</td>
				<td>
					<?php
						if($key['Status']==1)
							echo "Ready";
						else
							echo 'Empty';
					?>
				</td>
				<td>
					<a style="text-decoration: none" title="Modify" href="<?php echo base_url()?>Cashier/Change_Menu/<?php echo $username ?>/<?php echo $key['ID'] ?>" title="">
						<i class="fa fa-edit"></i>
					</a>
					<span> | </span>
					<a style="text-decoration: none" title="Delete" href="<?php echo base_url()?>Cashier/Action_delete_menu/<?php echo $username ?>/<?php echo $key['ID'] ?>" title="">
					<i class="fa fa-trash"></i></a>
				</td>
				<?php $i++?>
			</tr>
			<?php endforeach ?>
		</tr>
	</table>
	<br>
</div>
<div class="Vegetable">
	<h4>Vegetable</h4>
	<hr>
	<table>
		<tr>
			<th>No</th>
			<th>Kind</th>
			<th>Name</th>
			<th>Description</th>
			<th>Price</th>
			<th>Status</th>
			<th>Action</th>
		</tr>
		<tr>
			<?php $i=1 ?>
			<?php foreach($content2->result_array() as $key): ?>
			<tr>
				<td>
					<?php echo $i?>
				</td>
				<td>
					<?php echo $key['Kind'] ?>
				</td>
				<td>
					<?php echo $key['Name'] ?>
				</td>
				
				<td>
					<?php echo $key['Description'] ?>
				</td>
				<td>
					<?php echo $key['Price'] ?>
				</td>
				<td>
					<?php
						if($key['Status']==1)
							echo "Ready";
						else
							echo 'Empty';
					?>
				</td>
				<td>
					<a style="text-decoration: none" title="Modify" href="<?php echo base_url()?>Cashier/Change_Menu/<?php echo $username ?>/<?php echo $key['ID'] ?>" title="">
						<i class="fa fa-edit"></i>
					</a>
					<span> | </span>
					<a style="text-decoration: none" title="Delete" href="<?php echo base_url()?>Cashier/Action_delete_menu/<?php echo $username ?>/<?php echo $key['ID'] ?>" title="">
					<i class="fa fa-trash"></i></a>
				</td>
				<?php $i++?>
			</tr>
			<?php endforeach ?>
		</tr>
	</table>
	<br>
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