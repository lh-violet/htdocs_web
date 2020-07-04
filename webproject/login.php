<?php
include("connect.php");
    $name = $_POST['name'];//post获得用户名表单值
    $passowrd = $_POST['password'];//post获得用户密码单值
    	
    if ($name && $passowrd){//如果用户名和密码都不为空
               $sql = "select * from user where username = '$name' and password='$passowrd'";//检测数据库是否有对应的username和password的sql
	// $sql = "select * from user";//检测数据库是否有对应的username和password的sql
	//echo $sql."<br>";
             $result = mysqli_query($mysqli,$sql);//执行sql
	//var_dump($result);
	//if($result){echo "ok";}
             $rows=mysqli_num_rows($result);//返回一个数值
	//echo $rows."<br>";
             if($rows){//0 false 1 true
                   header("refresh:0;url=book.php?name=".$name);//如果成功跳转至book.php页面
                   exit;	
	//$rowssecond=mysqli_num_rows($result);//返回一个数值
             }else{
                echo "用户名或密码错误";
                echo "
                    <script>
                           setTimeout(function(){window.location.href='login.html';},1000);
                    </script>

                ";//如果错误使用js 1秒后跳转到登录页面重试，让其从新进行输入
             }
    }else{//如果用户名或密码有空
                echo "表单填写不完整";
                echo "
                      <script>
                            setTimeout(function(){window.location.href='login.html';},1000);
                      </script>";
                        //如果错误使用js 1秒后跳转到登录页面重试，让其从新进行输入
    }

    mysqli_close($mysqli);//关闭数据库
?>