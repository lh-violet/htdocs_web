<?php
	include("connect.php");
	$bookfirstname=$_POST["firstname"];
	$booklastname=$_POST["lastname"];
	$result=mysqli_query($mysqli,"UPDATE book SET bookname='$booklastname' WHERE id=1");
	$sql = "select * from book where bookname = '$booklastname'";//检测数据表book是否有对应的bookname的sql
	$resultsecond=mysqli_query($mysqli,$sql);
	//var_dump($resultsecond->num_rows);
	if($resultsecond->num_rows > 0){
		echo"<form action='bookprject.php'>";
		echo "<table border=1>";
		echo "<tr><td>用户名</td><td>原书名</td><td>现书名</td><td>书名id</td></tr>";
		while($row = $resultsecond->fetch_assoc())
		{	
			echo "</tr><td>";
       				echo  $row["username"] ;
			echo "</td><td>";
				echo "<input type='text' name='bookfirstname' value='$bookfirstname'>";
			echo "</td><td>";
				echo  $row["bookname"];
			echo "</td><td>";
				echo  "<input type="hidden" name="id" value=id>" ;
			echo "</td><tr>";
		}
		echo "</table>";
		echo "<input type='submit' name='submit' value='提交'>";
		echo "</form>";
	}
	echo $bookfirstname;
	echo $booklastname;
?>	