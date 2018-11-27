<html>
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <link rel='stylesheet' href='style.css'>
</head>
<body>
     <div class='header'>
		<p style="float:left;margin-right:50px;margin:0">
		<span  class='sp1' style="">___</span><br>
		<span class='sp1'>___</span><br>
		<span style='font-weight:bold;'>___</span></p><br>
		<span  class='sp2'>EgypTrains - قطارات مصر</span>
     <div>
     <div class='container'>
		<img id='img1' src='2.jpg'  >
		<form action="detail.php" method="post" id='form1'>
	             <?php
 		       require'database.php';
		            $rows=$db->getRows("SELECT * from train group by from_site",array());
		            if(count($rows)>0)
		            {
			       echo "<select name='from_site' style='margin:80px 0 0 400'><option value='' selected disabled hidden>محطة المغادرة...</option>";
			       foreach($rows as $row)
			       {
			           echo"<option>".$row['from_site']."</option>";
			       }
			       echo"</select>";
			    }
		      ?>
                      <br>
		      <?php
		             $rows=$db->getRows("SELECT * from train group by to_site",array());
			     if(count($rows)>0)
			     {
			          echo"<select name='to_site'><option value='' selected disabled hidden>محطة الوصول...</option>";
				  foreach($rows as $row)
				  {
				      echo"<option>".$row['to_site']."</option>";
			          }
				  echo"</select>";
			     }
		       ?>
		       <br>
		       <select name="Class">
		            <option value="all" selected> عرض جميع الدرجات</option>
				    <option value="vip">vip</option>
				    <option value="مكيف">مكيف</option>
				    <option value="نوم">نوم</option>
				    <option value="اكسبريس بعربيات مطورة (ركاب)">اكسبريس بعربيات مطورة (ركاب)</option>
		       </select><br>
		       <input type='submit' value='عرض القطارات' id='butt1' name="submit">

      </form>
     </div>
</body>
</html>
