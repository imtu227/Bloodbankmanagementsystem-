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
<div class="container"  style='margin-top:70px;'>
	<div class="row">
		<div class="col-sm-3">
			<?php include("admin_side_nav.php");?>
		</div>
		<div class="col-sm-9" >
			<h3 class='text-primary'><i class="fa fa-bank"></i> Add Blood </h3><hr> 
		<center><div id="form">
		<form role="form" action="admin_blood.php" method="post">
		      <table>
			  <div class="form-group">
							<label class="control-label text-primary" for="BLOOD" >Blood Group</label>
						<select id="blood" name="blood-group" required class="form-control">	
							<option value="">Select Blood</option>
							<option value="A+">A+</option>
							<option value="B+">B+</option>
							<option value="O+">O+</option>
							<option value="AB+">AB+</option>
							<option value="A-">A-</option>
							<option value="B-">B-</option>
							<option value="O-">O-</option>
							<option value="AB-">AB-</option>
							</select>
						</div>
						
			<label for="date">Date</label>
			  <input type="date" id="date" name="date">
			<br><br>
			<label for="unit">Unit</label>
			  <input type=Number id="unit" name="unit">
			  
			  <?php 
				if(isset($_POST["blood_submit"]))
				{
					$sql2 = "INSERT INTO add_blood(blood_group, unit_blood, store_date, expire_date) values( '{$_POST["blood-group"]}', '{$_POST["unit"]}', '{$_POST["date"]}', date_add('{$_POST["date"]}', interval 40 day) );";
					$con->query($sql2);
					
				}
				
				?>
				<br><br>
				<div class="form-group">
							<input type="submit" class="btn btn-primary" name='blood_submit' value="Add Blood">
						</div>
			     </table>
				 </form>
</div>
  
  
	 <?php include("admin_footer.php"); ?>
  
	</body>
</html>
