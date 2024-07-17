<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/animations.css">  
    <link rel="stylesheet" href="css/main.css">  
    <!-- <link rel="stylesheet" href="css/login.css"> -->
        
    <title>Login</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Palanquin+Dark&display=swap');
        body{
            margin: 7%;
            background: linear-gradient(115deg, #538ad6, #86e7d6);
            color:white;
            font-family: 'Palanquin Dark', sans-serif;
        }
        .container{
            width: 45%;
            background: linear-gradient(115deg, #538ad6, #00735e);
            /* border: 1px solid rgb(235, 235, 235); */
            border:none;
            border-radius: 45px;
            margin: 0;
            padding: 0;
            box-shadow: 0 3px 5px 0 rgba(240, 240, 240, 0.3);
            animation: transitionIn-Y-over 0.5s;

        }
        td{
            text-align: center;
        }
        .header-text{
            color:black;
            font-weight: 600;
            font-size: 30px;
            letter-spacing: 1px;
            margin-bottom: 48px;
            opacity:0;
        }

        td .sub-text{
            color:black;
            font-weight:400;
            font-size: 22px;
        }
        
        .input-text{
            cursor:pointer;
            border: none;
            font-size: 18px;
            line-height: 29px;
            background-color: #fff;
            display: block;
            width: 100%;
            padding: .375rem .75rem;
            font-weight: 300;
            line-height: 1.5;
            color: black;
            background-color:#fff;
            background-clip: padding-box;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            border-radius: 12px;
            transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
        }
        .form-label{
            color: black;
            text-align: left;
            font-size: 19px;
        }
        .label-td{
            text-align: left;
            g-toppaddin: 5px;
        }

        .hover-link1{
            font-weight: bold;
        }


        .hover-link1:hover{
            opacity: 0.8;
            transition: 0.5s;


        }.login-btn{
            /*margin-top: 15px;*/
            margin-bottom: 15px;
            width: 50%;
            padding:20px;
            font-size:18px;
            border-radius:20px;
            background-color:grey;
            border:none;
        }

    </style>
    
    
</head>
<body>
    <?php

    //learn from w3schools.com
    //Unset all the server side variables

    session_start();

    $_SESSION["user"]="";
    $_SESSION["usertype"]="";
    
    // Set the new timezone
    date_default_timezone_set('Asia/Kolkata');
    $date = date('Y-m-d');

    $_SESSION["date"]=$date;
    

    //import database
    include("connection.php");

    



    if($_POST){

        $email=$_POST['useremail'];
        $password=$_POST['userpassword'];
        
        $error='<label for="promter" class="form-label"></label>';

        $result= $database->query("select * from webuser where email='$email'");
        if($result->num_rows==1){
            $utype=$result->fetch_assoc()['usertype'];
            if ($utype=='p'){
                //TODO
                $checker = $database->query("select * from patient where pemail='$email' and ppassword='$password'");
                if ($checker->num_rows==1){


                    //   Patient dashbord
                    $_SESSION['user']=$email;
                    $_SESSION['usertype']='p';
                    
                    header('location: patient/index.php');

                }else{
                    $error='<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">Wrong credentials: Invalid email or password</label>';
                }

            }elseif($utype=='a'){
                //TODO
                $checker = $database->query("select * from admin where aemail='$email' and apassword='$password'");
                if ($checker->num_rows==1){


                    //   Admin dashbord
                    $_SESSION['user']=$email;
                    $_SESSION['usertype']='a';
                    
                    header('location: admin/index.php');

                }else{
                    $error='<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">Wrong credentials: Invalid email or password</label>';
                }


            }elseif($utype=='d'){
                //TODO
                $checker = $database->query("select * from doctor where docemail='$email' and docpassword='$password'");
                if ($checker->num_rows==1){


                    //   doctor dashbord
                    $_SESSION['user']=$email;
                    $_SESSION['usertype']='d';
                    header('location: doctor/index.php');

                }else{
                    $error='<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">Wrong credentials: Invalid email or password</label>';
                }

            }
            
        }else{
            $error='<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">We cant found any acount for this email.</label>';
        }






        
    }else{
        $error='<label for="promter" class="form-label">&nbsp;</label>';
    }

    ?>





    <center>
    <div class="container">
        <table border="0" style="margin: 0;padding: 0;width: 60%;">
            <tr>
                <td>
                    <p class="header-text">Hey There!!</p>
                </td>
            </tr>
        <div class="form-body">
            <tr>
                <form action="" method="POST" >
                <td class="label-td">
                    <label for="useremail" class="form-label">Email: </label>
                </td>
            </tr>
            <tr>
                <td class="label-td">
                    <input type="email" name="useremail" class="input-text" placeholder="Email Address" required>
                </td>
            </tr>
            <tr>
                <td class="label-td">
                    <label for="userpassword" class="form-label">Password: </label>
                </td>
            </tr>
            <tr>
                <td class="label-td">
                    <input type="Password" name="userpassword" class="input-text" placeholder="Password" required>
                </td>
            </tr>


            <tr>
                <td>
                <?php echo $error ?>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" value="Login" class="login-btn btn-primary btn">
                </td>
            </tr>
        </div>
            <tr>
                <td>
                    <br>
                    <label for="" class="sub-text" style="font-weight: 280;">Don't have an account&#63; </label>
                    <a href="signup.php" class="hover-link1 non-style-link">Sign Up</a>
                    <br><br><br>
                </td>
            </tr>
                        
                        
    
                        
                    </form>
        </table>

    </div>
</center>
</body>
</html>