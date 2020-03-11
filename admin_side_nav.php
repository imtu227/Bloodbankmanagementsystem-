
<?php 
$sql="SELECT * FROM messages WHERE STATUS=1";
$result=$con->query($sql);
$n=$result->num_rows;
if($n!=0)
{
	$mes='<span class="badge pull-right">'.$n.' Unread</span>';
}
else
{
	$mes="";
}
?>
<h3 class="text-primary"><i class="glyphicon glyphicon-dashboard"></i> Dashboard</h3>
<hr>

<ul class="nav nav-stacked">
	<li><a href="admin_inbox.php"> Inbox <?php echo $mes;?></a></li>
	<li><a href="blood_stock.php">Blood Stock</a></li>
	<li><a href="admin_donor.php">Search Donors</a></li>
	<li><a href="admin_adonor.php"> Active Donors</a></li>
	<li><a href="admin_ndonor.php"> Not Active Donors</a></li>
	<li><a href="admin_need_blood.php"> Need Blood</a></li>
	<hr>
	<li><a href="#add" data-toggle="collapse" >Settings</a></li>
	<ul class="nav collapse" id="add">
		<li><a href="admin_country.php"> Add Country</a>
		<li><a href="admin_state.php">Add State</a></li>
		<li><a href="admin_city.php"> Add City</a></li>
		<li><a href="admin_blood.php"> Add Blood</a></li>
		
		</li>
	</ul>
</ul>

<hr>