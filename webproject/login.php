<?php
include("connect.php");
$username = $_POST['username'];//post获得用户名表单值
$passowrd = $_POST['password'];//post获得用户密码单值
//-----------------------------------------------------------------------------
if ($username && $passowrd){//如果用户名和密码都不为空
	//-------------------------------------------------------------------------
	// 检测数据库是否有对应的username和password的sql
	//
	$sql    = "select * from user where username = '$username' and password='$passowrd'";
	$result = mysqli_query($mysqli,$sql);//执行sql
	$rows   = mysqli_num_rows($result);//返回一个数值
	//-------------------------------------------------------------------------
	if($rows){//0 false 1 true
		setcookie("username", $username);
		header("refresh:0;url=book.php?username=".$username);//如果成功跳转至book.php页面
		exit();
	}else{
		?>
		用户名或密码错误
		<script>
			setTimeout(function(){window.location.href='login.html';},1000);
		</script>
		<?php
	}
}else{
?>
	表单填写不完整
	<script>
		//setTimeout(function(){window.location.href='login.html';},1000);
	</script>
	<!--如果错误使用js 1秒后跳转到登录页面重试，让其从新进行输入-->
<?php
}
mysqli_close($mysqli);//关闭数据库
?>