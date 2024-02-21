<!DOCTYPE html>
<html>
<head>
	<title>Receipt</title>
        <link rel="shortcut icon" type="image/png" href="img/tick.png">
	<style>
		body {
			font-family: Arial, sans-serif;
			font-size: 14px;
			line-height: 1.5;
		}
                #logo {
			width: 32px;
			height: 32px;
			margin-right: 5px;
			vertical-align: middle;
		}
		table {
			border-collapse: collapse;
			margin: 10px 0;
			width: 100%;
		}
		th, td {
			padding: 8px;
			text-align: left;
			border-bottom: 1px solid #ddd;
		}
                @media print {
                    #print-button {
                    display: none;
                      }
                   }
                     @media print {
                    #button12{
                    display: none;
                      }
                   }
		th {
			background-color: #f2f2f2;
		}
		h1 {
			margin-top: 0;
		}
	</style>
</head>
<body>
	<h1>Receipt</h1>
	<?php $transaction_id = rand(100000,999999); ?>
	<p>Transaction ID: <?php echo $transaction_id; ?></p>
	<table>
		<thead>
			<tr>
				<th colspan="2">Billing Address</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>Full Name:</td>
				<td><?php echo $_POST['fname']; ?></td>
			</tr>
			<tr>
				<td>Email:</td>
				<td><?php echo $_POST['email']; ?></td>
			</tr>
			<tr>
				<td>Address:</td>
				<td><?php echo $_POST['address']; ?></td>
			</tr>
			<tr>
				<td>City:</td>
				<td><?php echo $_POST['city']; ?></td>
			</tr>
			<tr>
				<td>State:</td>
				<td><?php echo $_POST['state']; ?></td>
			</tr>
			<tr>
				<td>Amount Paid:</td>
				<td><?php echo $_POST['zip'];?></td>
			</tr>
		</tbody>
	</table>
	<table>
		<thead>
			<tr>
		
<button  id="print-button" onclick="window.print()">Print Receipt</button></br></br>
<center> <h2><img id="logo" src="img/tick.png" alt="Logo">Payment Successful </h2></center>
<button id="button12" onclick="goBack()">Back</button>
<script>
function goBack() {
  window.location.href = "http://localhost/GYM-Management-System-using-PHP/gym";
}
</script>
