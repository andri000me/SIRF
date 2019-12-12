<!DOCTYPE html>
<html>
	<head>
		<title>Transaction</title>
	</head>
	<body>
		<center>
		<h2>DATA TRANSACTION </h2>
		<hr>
		</center>
		<p>Date : <?php echo $Date ?> </p>
		<p>ID Reservation : <?php echo $ID_Reservation ?> </p>
		<p>Cashier : <?php echo $username ?></p>
		<table>
			<tr>
				<th>No</th>
				<th>Name</th>
				<th>Price</th>
				<th>Quantity</th>
				<th>Total</th>
			</tr>
			<?php $i=0 ?>
			<?php foreach($detail->result_array() as $key): ?>
			<tr>
				<td>
					<?php echo ($i+1) ?>
				</td>
				
				<td>
					<?php echo $key['Name'] ?>
				</td>
				<td>
					<?php echo $Harga[$i]; ?>
				</td>
				<td>
					<?php echo $key['quantity']; ?>
				</td>
				<td>
					<?php echo $Total_row[$i]; ?>
				</td>
				<?php  $i++?>
			</tr>
			<?php endforeach?>
		</table>
		<br><br>
		<p>Total Keseluruhan = <?php echo $total ?></p>
		<script>
			window.print();
		</script>
	</body>
</html>