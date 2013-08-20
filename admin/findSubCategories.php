<?php
include('../include/connect.php');
$catid=intval($_GET['maincategory']);



$query="SELECT categoryid,maincategoryid,categoryname FROM categories WHERE maincategoryid='$catid'";
$result=mysql_query($query);

$result=mysql_query($query);?>
<select name="city">
<option>Select City</option>
<?php while($row=mysql_fetch_array($result)) { ?>
   <option value> <?php echo $row['categoryname']?></option>
<?php } ?>
</select>



