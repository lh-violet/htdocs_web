<?php
include("connect.php");
require_once('need_login.php');
require_once('isPost.php');
?>
<html>
<!--                                                                        -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>welcome</title>
<!--<link rel="stylesheet" type="text/css" href="hh.css">-->
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<!--                                                                        -->
<body>
<center>
<h1>用户<?php echo $username;?>的书架</h1>
<!--                                                                        -->
<?php
if (isPost()){
	//-------------------------------------------------------------------------
	// var_dump($_POST);
	//
	$n = count($_POST["book"]) - 1;
	//-------------------------------------------------------------------------
	for ($i=0; $i<$n; $i++){
		//---------------------------------------------------------------------
		$id       = $_POST["book"][$i]["id"];
		$bookname = $_POST["book"][$i]["bookname"];
		$sql="update book set bookname='$bookname' where id=$id";
		mysqli_query($mysqli, $sql);
		//---------------------------------------------------------------------
	}
	//-------------------------------------------------------------------------
	if(!empty($_POST["book"][$n]["bookname"])){
		$bookname = $_POST["book"][$n]["bookname"];
		$sql="insert into book set bookname='$bookname', username='$username'";
		mysqli_query($mysqli, $sql);
	}
	//-------------------------------------------------------------------------
}else{
	if(isset($_GET["delete"])){
		if ($_GET["delete"]=="yes"){
			$id = $_GET["id"];
			$sql="delete from book where id='$id'";
			mysqli_query($mysqli, $sql);
		}
	}
}
//-----------------------------------------------------------------------------
// 检测数据库是否有对应的username和password的sql
//
$sql = "select * from book where username = '$username' ";
$resultsecond=mysqli_query($mysqli, $sql);
if($resultsecond->num_rows > 0){ ?>
<!--                                                                        -->
<form action="book.php" method="post">
<table><thead><tr><th>No.</th><th>Book username</th><th>Delete</th></tr></thead><tbody>
	<?php
	$i=0;
	while($row = $resultsecond->fetch_assoc()){
	?>
	<tr>
		<td><input type="hidden" name="book[<?php echo $i;?>][id]"       value="<?php echo $row['id'];      ?>"> <?php echo $i+1;?></td>
		<td><input type="text"   name="book[<?php echo $i;?>][bookname]" value="<?php echo $row["bookname"];?>">                   </td>
		<td><a href="book.php?delete=yes&id=<?php echo $row['id']; ?>"> Delete</a></td>
	</tr>
	<?php
		$i++;
	}
	?>
	<tr>
		<td>New</td>
		<td><input type="text"   name="book[<?php echo $i;?>][bookname]"></td>
	</tr>
</tbody></table>
<input type="hidden" username="username" value="<?php echo $username;?>">
<input type="submit" username="submit"   value="修改"                   >
</form>
<!--                                                                        -->
<?php } else { echo "该用户没有书";}?>
</center>
</body>
<!--                                                                        -->
</html>