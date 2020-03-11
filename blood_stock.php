<?php
session_start();
include("config.php");
include("admin_function.php");
 if(!isset($_SESSION['usertype']))
 {
	 header("location:admin.php");
 }
?>
<!DOCTYPE html>
<html lang="en">
	<head>
			<?php include("admin_head.php");?>
	
	</head>
	<body>

<?php include("admin_topnav.php"); ?>
<div class="container" style='margin-top:70px'>
	<div class="row">
		<div class="col-sm-3">
			<?php include("admin_side_nav.php");?>
		</div>
		<div class="col-sm-9" >
			<h3 class="text-primary"> Blood Stock lists </h3><hr>    

			<label class="control-label text-primary" >Blood Stock list</label>
			<table style="width:100%" class="table table-dark">
			  <tr>
			    <th>Blood Group</th>
			    <th>Total Unit</th>
			  </tr>
			  
			<?php
			$query = "select blood_group, sum(unit_blood) from add_blood group by blood_group;";
			$rows = $con->query($query);

			while ($row = $rows->fetch_row()) {
				echo "<tr>";
					echo "<td>" .$row[0]. "</td>";
					echo "<td>" .$row[1]. "</td>";
				echo "</tr>";		
			}
			?>
			</table>
			<br>

			<label class="control-label text-primary" >Blood Expire List</label>
			<table style="width:100%" class="table table-dark">
			  <tr>
			    <th>Blood Group</th>
			    <th>Units</th>
			    <th>Store Date</th>
			    <th>Expire Date</th>
			    <th>Status</th>
				<th>Remove Blood</th>
			  </tr>

			<?php
			$query2 = "select blood_group, unit_blood, store_date, expire_date,
					case
    					when curdate() > expire_date  then 'EXPIRED'
						else 'NOT EXPIRED' 
					end as status
					from add_blood;";

			$rows2 = $con->query($query2);
			while ($row2 = $rows2->fetch_row()) {
				echo "<tr>";
					echo  "<td>".$row2[0]."</td>";
					echo  "<td>".$row2[1]."</td>";
					echo  "<td>".$row2[2]."</td>";
					echo "<td>".$row2[3]."</td>";
					echo  "<td>".$row2[4]."</td>";
					echo  "<td>"."<input type='submit' name='submit' value='Delete'>"."</td>";
					
					}
				echo "<tr>";
			?>
			<?php
					if(isset($_POST["submit"]))
					$sql = "DELETE * from add_blood";
					
?>
			<div>
		</div>
		
		
	</div>
		
		
		</div>
	</div>
</div>
  
  
	 
  

	</body>
	<?php include("admin_footer.php"); ?>
</html>