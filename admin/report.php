<?php
session_start();
$username=$_SESSION['uname'];
require('../class/twotier.php');
$ob=new twotier();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Automobile Spare Parts Portal</title>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />

<!--[if IE]>
<style type="text/css" media="screen">
.shell {background-image: none;filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='css/images/shell-bg.png', sizingMethod='scale');}
.box{background-image: none;filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='css/images/dot.png', sizingMethod='scale');}
.transparent-frame .frame{background-image: none;filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='css/images/transparent-frame.png', sizingMethod='image');}
.search .field{padding-bottom:9px}
</style>
<![endif]-->
<script src="js/jquery-1.3.2.min.js" type="text/javascript"></script>
<script src="js/jquery-func.js" type="text/javascript"></script>
<style>
th,td
{
padding:10px;
font-size:12px;
}

th{
width:100px;
padding-left:0px;
}
#msg
{
margin:10px;
margin-bottom:0px;
font-style:italic;
font-size:12px;
color:#FF0000;
padding:10px;
}
</style>
<link href="css/style2.css" rel="stylesheet" type="text/css" />
</head>
<body>
<!-- Shell -->
<div class="shell">
  <!-- Header -->
  <div id="header">
    <!-- Logo -->
    <h1 id="logo"><a href="#"></a></h1>
	
    <!-- End Logo -->
    <!-- Navigation -->
    <div id="nav">
       <ul>
        <li><a  href="admin_profile.php">Home</a></li>
        <li><a  href="view_users.php">Users</a></li>
        <li><a href="view_spareparts.php">Spare Parts</a></li>
        <li><a  href="view_gallery.php">Gallery</a></li>
        <li><a href="complaints.php">Complaints</a></li>
		<li><a class="active"href="report.php">Report</a></li>
      </ul>
	  
    </div>
	
    <!-- End Navigation -->
  </div>
  <!-- End Header -->
  <!-- Content -->
  <div id="content">
    <!-- Sidebar -->
    <div id="sidebar">
      <!-- Search -->
      
      <!-- End Search -->
      <!-- Sign In Links -->
      <div class="links">
        <div class="cl">&nbsp;</div>
        
        <div class="cl">&nbsp;</div>
      </div>
      <!-- End Sign In Links -->
      <!-- Box Latest News -->
	  <div id="signout">
	<a href="logout.php">Sign Out</a>
	</div>
      <div class="box">
        <h2>Welcome <?php echo $username;?> </h2>
       
          <div class="info">
			<?php
	if($username=="admin")
	{
	$name='admin';
	$email='admin';
	$phone='admin';
	$password='admin';
	?>
	<a href="images/no_image.jpg" target="_blank" title="Click on to view full image"><img style=" margin-top:10px; margin-left:30px;"src="images/no_image.jpg" width="100" height="100" alt="" /></a>
	<?php
	}
	else
	{
	$sql="select * from admin where accessname='$username' ";
	
	$res=$ob->query($sql);
	$row=mysqli_fetch_assoc($res);
	if(mysqli_num_rows($res)==1)
	{
	$name=$row['adminname'];
	$email=$row['email'];
	$phone=$row['phone'];
	$password=$row['password'];
	$image=$row['image'];
	if($image=='')
	{
	?>
	<a href="images/no_image.jpg" target="_blank" title="Click on to view full image"><img style=" margin-top:10px; margin-left:30px;"src="images/no_image.jpg" width="100" height="100" alt="" /></a>
	<?php
	}
	else
	{
	?>
	<a href="images/<?php echo $image;?>" target="_blank" title="Click on to view full image"><img style=" margin-top:10px; margin-left:30px;" src="images/<?php echo $image;?>" alt="no image" width="100" height="100"/></a><br />
	<?php
	}
	}
	}
	?>
             <table> 
             <tr>
			 <th>Name</th>
			 <td>:</td>
			 <td><?php echo $name;?></td>
			 </tr>
			 <tr>
			 <th>Email</th>
			 <td>:</td>
			 <td><?php echo $email;?></td>
			 </tr>
			 <tr>
			 <th>Phone</th>
			 <td>:</td>
			 <td><?php echo $phone;?></td>
			 </tr>
			 <tr>
			 <th>Accessname</th>
			 <td>:</td>
			 <td><?php echo $username;?></td>
			 </tr>
			 </table>
            </div>
            <div class="cl">&nbsp;</div>
          <div id="form-login"><a href="admin_update.php">Update your profile</a></div>
      
        <div class="cl">&nbsp;</div>
      </div>
      <!-- End Box Latest News -->
      <!-- Box Latest Reviews -->
      
      <!-- End Box Latest Reviews -->
      <!-- Box Latest Posts -->
      
      <!-- End Box Latest Posts -->
    </div>
    <!-- End Sidebar -->
    <!-- Main -->
    <div id="main">
	<div class="box">
      <!-- Top Image -->
     <?php
	 $sql="select * from users where status<>'removed'";
	 $res=$ob->query($sql);
	 if(mysqli_num_rows($res))
	 {
	 	while($row=mysqli_fetch_assoc($res))
		{
			$id=$row['id'];
			$name=$row['name'];
			$sql1="select * from spareparts where userid='$id'";
			$res1=$ob->query($sql1);
			if(mysqli_num_rows($res1))
			{
	?>
				
				<h2><?php echo ucfirst($name);?></h2>
				<table style="background: #f5f5f5;
	border-collapse: separate;
	box-shadow: inset 0 1px 0 #fff;
	font-size: 12px;
	line-height: 24px;
	margin: 20px auto;
	
	width: 600px;">
				<thead style="background: url(http://jackrugile.com/images/misc/noise-diagonal.png), linear-gradient(#777, #444);
	border-left: 1px solid #555;
	border-right: 1px solid #777;
	border-top: 1px solid #555;
	border-bottom: 1px solid #333;
	box-shadow: inset 0 1px 0 #999;
	color: #fff;
  font-weight: bold;
	padding: 10px 15px;
	position: relative;
	text-shadow: 0 1px 0 #000;	"> 
				<tr>
				<th>Product Name</th>
				<th>Manufacturer Name</th>
				<th>Price</th>
				</tr>
				</thead>
				<tbody style="color:#000000;border-right: 1px solid #fff;
	border-left: 1px solid #e8e8e8;
	border-top: 1px solid #fff;
	border-bottom: 1px solid #e8e8e8;
	padding: 10px 15px;
	position: relative;
	transition: all 300ms; text-align:center">
	<?php
				while($row1=mysqli_fetch_assoc($res1))
				{
					$productname=$row1['productname'];
					$manufacturer=$row1['companyname'];
					$price=$row1['price'];
		?>
					<tr>
					<td style="border-right: 1px solid #fff;
	border-left: 1px solid #e8e8e8;
	border-top: 1px solid #fff;
	border-bottom: 1px solid #e8e8e8;"><?php echo ucfirst($productname);?></td>
					<td style="border-right: 1px solid #fff;
	border-left: 1px solid #e8e8e8;
	border-top: 1px solid #fff;
	border-bottom: 1px solid #e8e8e8;" ><?php echo ucfirst($manufacturer);?></td>
					<td style="border-right: 1px solid #fff;
	border-left: 1px solid #e8e8e8;
	border-top: 1px solid #fff;
	border-bottom: 1px solid #e8e8e8;" ><?php echo $price;?></td>
					</tr>
		<?php
				}
			}
			
	?>
				</table>
	<?php
			
		}
	 }
	 ?>
     
      
		
 
 

        
      <div class="cl">&nbsp;</div>
      <!-- End Top Image -->
      <!-- Box -->
     
      <!-- End Box -->
      <!-- Box -->
      </div>
      <!-- End Box -->
    </div>
    <!-- End Main -->
    <div class="cl">&nbsp;</div>
  </div>
  <!-- End Content -->
  <!-- Footer -->
  
  <div id="footer">
    <p>&copy; Automobile Spareparts Portal. Design by SAVIYO</p>
  </div>
  <!-- End Footer -->
</div>
<!-- End Shell -->
</body>
</html>
