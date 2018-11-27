
<!DOCTYPE html>
<head>
<meta charset='utf-8'  >
<link rel='stylesheet' href='style.css'>
</head>
<body>
<div class='header'>
    <p style='float:left;margin-right:50px;margin:0'>
       <span  class='sp1' style="">___</span><br>
       <span class='sp1'>___</span><br>
       <span style='font-weight:bold;'>___</span>
    </p><br>
       <span  class='sp2'>EgypTrains - قطارات مصر</span>
    </div>
<?php
if (isset($_POST))
{
  error_reporting(E_ALL ^ E_DEPRECATED);
  error_reporting(E_ALL ^ E_WARNING);
  error_reporting( error_reporting() & ~E_NOTICE );
  $from=$_POST['from_site'];
  $to =$_POST['to_site'];
  $Classes =$_POST['Class'];
if(!(strlen($from)==0 || strlen($to)==0 || $from === $to))
{
        require 'database.php';
	if ($Classes == "all")
	   $rows=$db->getRows("SELECT  * FROM train where from_site =? and to_site=? ",array($from,$to));
	else
	    $rows=$db->getRows("SELECT  * FROM train where from_site =? and to_site =? and classk =? ",array($from,$to,$Classes));
	if(count($rows)>0)
	{
	    echo"<br> <div class='container2'><span class='head'>   من  ".$from." الى ".$to."  يوجد  ".count($rows)."  قطار
	    </span><br><br>";
	    echo"<table>
	    <thead><tr><td>القطار#</td><td>قيام </td><td>وصول </td><td>المدة</td><td>السرعة</td><td>الدراجة</td><td>يقف فى</td>
	    </tr></thead>
	    <tbody><tr><td colspan=7><span style='color:red;' >ملاحظة :</span> يمكنك معرفة محطات الوقوف التى ستمر عليها فى القطار  عن طريق لمس الصورة بجوار الرقم</td></tr>";
	    Foreach($rows as $row)
	    {
	      echo "<tr><td>".$row['id']."</td>
	      <td>".$row['start_time']."</td>
	      <td>".$row['finsh_time'] ."</td>
	      <td>".$row['time1']."</td>
	      <td>".$row['speed'] ."</td>
	      <td>".$row['classk']."</td>
	      <td>".$row['number121']."<img  src='ima.jpg' width=20px height=20px title='".$row['name']."' >
	      </td></tr>";
	    }
	     echo"</tbody></table></div>";
	}else
        {echo "<div class='container2' style='font-size:25px;color:red;'>اسف و لكن لا يوجد قطار متجه الى هذه المحطة بهذه الدرجة نظرا لبعض الظروف الخارجة عن ارادتنا</div>";}
}else
   echo "<div class='container2'><span id='error'>الرجاء العودة الى الصفحة الرئيسية و ملئ الطلب بشكل صحيح</span></div>";
}
?>
<br><br> <a href='index.php' id='home'>الصفحة الرئيسية</a>
</body>
</html>
