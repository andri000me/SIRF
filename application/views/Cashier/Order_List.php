<div class="food">
	<h4>Food</h4>
	<hr>
	<table>
		<tr>
			<th>No</th>
			<th>ID_Reservation</th>
			<th>User ID</th>
			<th>No Meja</th>
			<th>Note</th>
			<th>Date</th>
			<th>Total</th>
			<th>Status</th>
			<th>Event</th>
		</tr>
		<tr>
			<?php $i=1 ?>
			<?php foreach($content->result_array() as $key): ?>
			<tr>
				<td>
					<?php echo $i?>
				</td>
				<td>
					<a style="text-decoration: none" data-id="<?php echo $key['ID_Reservation']  ?>" class="ID_RES" title="Look" href="#myModal" title="" data-toggle="modal" data-target="#myModal">
						<?php echo $key['ID_Reservation'] ?>
					</a>
				</td>
				<td>
					<?php echo $key['user_id'] ?>
				</td>
				
				<td>
					<?php echo $key['no_meja'] ?>
				</td>
				<td>
					<?php echo $key['note'] ?>
				</td>
				<td>
					<?php echo $key['date'] ?>
				</td>
				<td>
					<?php echo $key['total'] ?>
				</td>
				<td>
					<?php
						if($key['status']==1)
							echo "Done";
						else
							echo "On Process";
					?>
				</td>
				<td>
					<a style="text-decoration: none" title="Done" href="<?php echo base_url()?>Cashier/Transaction/<?php echo $username ?>/<?php echo $key['ID_Reservation'] ?>" title="">
						<i class="fas fa-pen-square"></i>
					</a>
				</td>
				<?php  $i++?>
			</tr>
			<?php endforeach ?>
		</tr>
	</table>
	<br>

	<!-- Modal -->
	<div class="modal fade" id="myModal" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header" align="center">
					<h6 class="modal-title">Detail Order</h4>
				</div>
				<div class="modal-body">
					<form class="form-horizontal" onSubmit="return validate()" method="post" action="<?php echo base_url() ?>Cashier/action_ubah_order_detail/<?php echo $username?>">
						<div class="form-group">
							<div class="col-sm-5 name" required>
								<p>ID Reservation : 
								<input type="text" name="ID" id="ID" value="" style="width: 200px" readonly="readonly"/>
								</p>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-5 name" required>
								<!-- <input type="text" name="ID" id="ID" value="" style="width: 270px" readonly="readonly"/> -->
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

	$(document).on("click", ".ID_RES", function () {
		var keyid = $(this).data('id');
		$(".modal-body #ID").val( keyid );
	});
</script>
</body>
</html>