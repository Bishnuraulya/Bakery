<style type="text/css">
	.selected{
		background-color:green; color: #90EE90;
	}
</style>
<?php
	include("navbar.php");
			// error_reporting(0);
?>
<h3 class="mb-3 text-center"><strong>Appointment details</strong></h3>
<div id = "color_div" class="m-2 text-center" bgcolor=#90EE90> Approved</div>
<?php
$con=mysqli_connect("localhost","root","","summer");
if(!$con)
	{
	die("not connected.".mysqli_connect_error());
	}
$sql="SELECT *  FROM appointment ORDER BY A_id DESC";
			$result=mysqli_query($con,$sql) or die(mysqli_error($con));
			
				if(mysqli_num_rows($result)>0)
				{
					echo"<form><table id='table' class='table'><tr><th colspan=3>Name</th><th colspan=3>Email</th><th colspan=3>Phone</th><th>Address</th>
					<th colspan=3>date</th><th colspan=3>Appointment</th><th colspan=3>time</th></tr>";
					while($row=mysqli_fetch_assoc($result))
					{
			// bgcolor=#90EE90>
						echo"<tr ><td colspan=3>".$row['name']."</td><td colspan=3 id='email".$row['A_id']."'>".$row['email']."</td><td colspan=3>".$row['phone']."</td>
						<td colspan=3>".$row['Address']."</td><td colspan=1>".$row['dates']."</td><td colspan=3>".$row['appointment']."</td>
						<td colspan=3>".$row['times']."</td>";
							echo '<td><input type="button" name="submit1" value="approve" onclick="approve('.$row['A_id'].')" class="btn btn-success btn-block" </td>
								<td><input type="button" name="submit2" value="disapprove" onclick="disapprove('.$row['A_id'].')" class="btn btn-danger btn-block" </td>
								';
}
echo"</table></form>";
}
else{
echo"nothing to display";
}

	// include("email.php");
include("footer.html");
?>

<script type="text/javascript" src="../js/compress.js"></script>
<script>
	$("#color_div").hide();
	function approve(id){
		email = $("#email"+id).text();
		value = 1;
		if(confirm("Do you want to approve,"+email+" ??")){
			$.ajax('email.php', {
				type : "post",
				dataType : "text",
				data : {email : email, value : value},
				success: function(data,status,xrh){
					if (status == "success") {
						$("#color_div").show();
						$("#color_div").css("background-color", "#90EE90");
					}
				}
			});
		}
	}

	function disapprove(id){
		email = $("#email"+id).text();
		value = 0;

		if(confirm("Do you want to disapprove,"+email+" ??")){
			$.ajax('email.php', {
				type : "post",
				dataType : "text",
				data : {email : email, value : value},
				success: function(data,status,xrh){
					if (status == "success") {
						$("#color_div").text("Disapprove");
						$("#color_div").show();

						$("#color_div").css("background-color", "#F78181");
					}
				}
			});
		}
	}
</script>