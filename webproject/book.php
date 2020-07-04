<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>welcome</title>
<link rel="stylesheet" type="text/css" href="hh.css"> 
</head>
<body>
	<div>
		欢迎光临
	</div>
<?php
include("connect.php");
require_once('isPost.php');
	$name=$_GET["name"];
	$sqll = "select * from book where username = '$name' ";//检测数据库是否有对应的username和password的sql
	$resultsecond=mysqli_query($mysqli,$sqll);
	if($resultsecond->num_rows > 0){ ?>
	<form action="book.php">
	<table><tr><td>用户名</td><td>书名</td></tr>
		<?php
		$i=0;
		while($row = $resultsecond->fetch_assoc()){
		?>
		<tr>
			<td><input type="hidden" name="book[<?php echo $i;?>][id]"       value="<?php echo $row['id'];      ?>"> <?php echo $row["id"];?></td>
			<td><input type="text"   name="book[<?php echo $i;?>][username]" value="<?php echo $row["username"];?>">                         </td>
			<td><input type="text"   name="book[<?php echo $i;?>][bookname]" value="<?php echo $row["bookname"];?>">                         </td>
		</tr>
		<?php
			$i++;
		}
		?>
	</table>
	<input type="submit" name="submit" value="提交">
	</form>
	<?php } else { echo "该用户没有书";}?>
</body>
</html>