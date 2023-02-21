<?php
    session_start();
	$username=$_SESSION["user"];
	$password=$_SESSION["pass"];
	//echo $_SESSION["user"];
	//echo $_SESSION["pass"];
	if($_SESSION["user"]==true)
	{
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Student's Result Management System</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link href="style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/arial.js"></script>
<script type="text/javascript" src="js/cuf_run.js"></script>


<script src="jquery.min.js"></script>
<script type="text/javascript">

$(document).ready(function(){
    $('#roll_no').on('change',function(){
        var roll_no = $(this).val();
        if(roll_no){
            $.ajax({
                type:'POST',
                url:'ajaxFilenew.php',
                data:'roll_no='+roll_no,
                success:function(html)
				{
                    $('#enroll_no').html(html);
					 
                }
            }); 
        }else
		{
            $('#enroll_no').html('<option value="">Select Roll No. first</option>');
			  
        }
    });
	
});



$(document).ready(function(){
    $('#enroll_no').on('change',function(){
        var enroll_no = $(this).val();
        if(enroll_no){
            $.ajax({
                type:'POST',
                url:'ajaxFilenew.php',
                data:'enroll_no='+enroll_no,
                success:function(html)
				{
                    $('#exam_seat_no').html(html);
					 
                }
            }); 
        }else
		{
            $('#exam_seat_no').html('<option value="">Select Enroll No. first</option>');
			  
        }
    });
	
});


$(document).ready(function(){
    $('#exam_seat_no').on('change',function(){
        var exam_seat_no = $(this).val();
        if(exam_seat_no){
            $.ajax({
                type:'POST',
                url:'ajaxFilenew.php',
                data:'exam_seat_no='+exam_seat_no,
                success:function(html)
				{
                    $('#stud_name').html(html);
					 
                }
            }); 
        }else
		{
            $('#stud_name').html('<option value="">Select Exam Seat No. first</option>');
			  
        }
    });
	
});

</script>
</head>
<body>
<!-- START PAGE SOURCE -->
<div class="main">
  <div class="header_block">
    <div class="header_resize">
      
	  <div class="search">
	          Phone No. 9896454541, 8569674124
        <div class="clr"></div>
      </div>
      <div class="menu_nav">
        <ul>
          <li class="active"><b><a href="index.php">Home</a></b></li>
          <li><b><a href="courses.php">Courses</a></b></li>
		  <li><b><a href="staff.php">Staff</a></b></li>
          <li><b><a href="about.html">About Us</a></b></li>
          <li><b><a href="contact.html">Contact Us</a></b></li>
         <li><b><a href="logout.php">Logout</a></b></li>
        </ul>
      </div>
      <div class="clr"></div>
    </div>
  </div>
  <div class="clr"></div>
  <div class="header">
    <div class="logo">
      <h1><a href="#">Student's <span>Result</span><small>Management System</small></a></h1>
    </div>
    <div class="clr"></div>
  </div>
  <div class="content">
  
 

<?php
include('config.php');
		
$d3_id=0; 
$academic_yr=$_POST['academic_yr'];
$staff_name=$_POST['staff_name'];
$c_id=$_POST['c_id'];
$class_id=$_POST['class_id'];
$subject_id=$_POST['subject_id'];    
$subject_code=$_POST['subject_code'];
$semister=$_POST['semister'];
$username=$_POST['username'];
$password=$_POST['password'];
?>

<?php echo $username;

 echo $subject_id;
 
 ?>
<form name="frm" method="post" action="insert_d3.php">
<center>
 <h2 align="center">Add D3 Details</h2><br />
 
<table width="100%" border="1" bgcolor="#FFFFFF">



   <?php     


$query="SELECT * from stud_reg where c_id=$c_id and cr_code=$class_id order by stud_name";

$run_query1 = mysqli_query($conn, $query);  

while($row=mysqli_fetch_array($run_query1))
{                                                
    $stud_id=$row['stud_id'];
    $roll_no=$row['roll_no'];
	$stud_name=$row['stud_name'];
	$c_id=$row['c_id'];
	$class_id=$row['cr_code'];
}
	
?>
<input type="hidden" name="academic_yr" value="<?php echo $academic_yr?>" />
<input type="hidden" name="staff_name" value="<?php echo $staff_name?>" />
<input type="hidden" name="c_id" value="<?php echo $c_id?>" />
<input type="hidden" name="class_id" value="<?php echo $class_id?>" />
<input type="hidden" name="subject_id" value="<?php echo $subject_id?>" />
<input type="hidden" name="subject_code" value="<?php echo $subject_code?>" />
<input type="hidden" name="semister" value="<?php echo $semister?>" />
<input type="hidden" name="username" value="<?php echo $username?>" />
<input type="hidden" name="password" value="<?php echo $password?>" />


<tr>
	<td width="52%" >
	<b style="color:#990000">Select Roll No</b>	</td>
   <td width="48%">
   <select name="roll_no" id="roll_no">
        <option value="">Select Roll No</option>
   <?php
	$query2 = "SELECT roll_no FROM stud_reg  ORDER BY roll_no ASC";
    $run_query2 = mysqli_query($conn, $query2);
	$count2 = mysqli_num_rows($run_query2);
		 if($count2 > 0){
            while($row2 = mysqli_fetch_array($run_query2)){
				$roll_no=$row2['roll_no'];
				 echo "<option value='$roll_no'>$roll_no</option>";
            }
        }
		else
		{
            echo '<option value="">Record not available</option>';
        }
        ?>
    </select></td>
    </tr>	

	<tr>
	<td >
	<b style="color:#990000">Select Enrollment No.</b>
	</td>
	<td>
	
	<select name="enroll_no" id="enroll_no">
        <option value="">Select Enrollment No.</option>
    </select>
	</td>
	</tr>
	
	<tr>
	<td >
	<b style="color:#990000">Select Exam Seat No.</b>
	</td>
	<td>
	
	<select name="exam_seat_no" id="exam_seat_no">
        <option value="">Select Exam Seat No.</option>
    </select>
	</td>
	</tr>
	
	<tr>
	<td >
	<b style="color:#990000">Select Student Name</b>
	</td>
	<td>
	
	<select name="stud_name" id="stud_name">
        <option value="">Select Student Name</option>
    </select>
	</td>
	</tr>


     <tr>
	<td >
	<b style="color:#990000">Experiment /Assignment /Sheet /Activity /No. (Marks out of 10 per experiment)</b>
	</td>
	<td>
	<table>
	<tr>  
	<td>1. <input type="text" name="m1" value="" size="3" /></td>
	<td>2. <input type="text" name="m2" value="" size="3" /></td>
	<td>3. <input type="text" name="m3" value="" size="3" /></td>
	<td>4. <input type="text" name="m4" value="" size="3" /></td>
	<td>5. <input type="text" name="m5" value="" size="3" /></td>
	<td>6. <input type="text" name="m6" value="" size="3" /></td>
	<td>7. <input type="text" name="m7" value="" size="3" /></td>
	<td>8. <input type="text" name="m8" value="" size="3" /></td> 
	</tr>
	<tr> 
	<td>9. <input type="text" name="m9" value="" size="3" /></td>
	<td>10. <input type="text" name="m10" value="" size="3" /></td>
	<td>11. <input type="text" name="m11" value="" size="3" /></td>
	<td>12. <input type="text" name="m12" value="" size="3" /></td>
	<td>13. <input type="text" name="m13" value="" size="3" /></td>
	<td>14. <input type="text" name="m14" value="" size="3" /></td>
	<td>15. <input type="text" name="m15" value="" size="3" /></td>
	<td>16. <input type="text" name="m16" value="" size="3" /></td> 
	</tr>
	<tr>  
	<td>17. <input type="text" name="m17" value="" size="3" /></td>
	<td>18. <input type="text" name="m18" value="" size="3" /></td>
	<td>19. <input type="text" name="m19" value="" size="3" /></td>
	<td>20. <input type="text" name="m20" value="" size="3" /></td>
	<td>21. <input type="text" name="m21" value="" size="3" /></td>
	<td>22. <input type="text" name="m22" value="" size="3" /></td>
	<td>23. <input type="text" name="m23" value="" size="3" /></td>
	<td>24. <input type="text" name="m24" value="" size="3" /></td>  
	</tr>
	<tr>  
	<td>25. <input type="text" name="m25" value="" size="3" /></td>
	<td>26. <input type="text" name="m26" value="" size="3" /></td>
	<td>27. <input type="text" name="m27" value="" size="3" /></td>
	<td>28. <input type="text" name="m28" value="" size="3" /></td>
	<td>29. <input type="text" name="m29" value="" size="3" /></td>
	<td>30. <input type="text" name="m30" value="" size="3" /></td>
	<td>31. <input type="text" name="m31" value="" size="3" /></td>
	<td>32. <input type="text" name="m32" value="" size="3" /></td> 
	</tr>
	
	
	</table>
	
	
	
	
	
	
	</td>
	</tr>
   
    
</table>
<br />
	<input type="submit" value="Submit" />
	</center>
	</form>
  
 <p>&nbsp;</p><p>&nbsp;</p>
    <div class="clr"></div>
  </div>
  <div class="fbg">
    All the rights are reserved to the college....Email us at: sadgjg@gmail.com
  
    <div class="clr"></div>
  </div>
</div>
<div class="footer">
  <div class="footer_resize">
    
    <div class="clr"></div>
  </div>
</div>
<!-- END PAGE SOURCE -->
<div align=center></div></body>
</html>
<?php
}
else
{
header('Location: index.php');
}
?>