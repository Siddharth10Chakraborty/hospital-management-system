<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/animations.css">  
    <link rel="stylesheet" href="css/main.css">  
    <link rel="stylesheet" href="css/signup.css">
        
    <title>Sign Up</title>
    <style>
        
        body{
            margin: 2%;
            background: linear-gradient(115deg, #538ad6, #86e7d6);
        }
        .container{
            width: 45%;
            background: linear-gradient(115deg, #538ad6, #00735e);
            border:none;
            border-radius: 30px;
            margin: 0;
            padding: 0;
            box-shadow: 0 3px 5px 0 rgba(240, 240, 240, 0.3);
            animation: transitionIn-Y-over 0.5s;

        }
        td{
            text-align: center;

        }
        .header-text{
            font-weight: 600;
            font-size: 30px;
            letter-spacing: -1px;
            margin-bottom: 10px;
        }

        .sub-text{
            font-size: 15px;
            color: white;
        }

        .form-label{
            color: black;
            text-align: left;
            font-size: 14px;
        }
        .label-td{
            text-align: left;
            padding-top: 10px;
        }

        .hover-link1{
            font-weight: bold;
        }


        .hover-link1:hover{
            opacity: 0.8;
            transition: 0.5s;


        }.login-btn{
            margin-top: 15px;
            margin-bottom: 15px;
            width: 100%;
        }
        #table-color tr form{
            color:white;
        }
        #btn1{
            width: 189px;
            height: 34px;
            background-color: orange;
            border: none;
            cursor: pointer;
            border-radius: 10px;
            font-size: 18px;
            font-weight: 500;
        }
        #btn2{
            width: 189px;
            height: 34px;
            background-color: #2077ff;
            border: none;
            cursor: pointer;
            border-radius: 10px;
            font-size: 18px;
            font-weight: 500;
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



if($_POST){

    

    $_SESSION["personal"]=array(
        'fname'=>$_POST['fname'],
        'lname'=>$_POST['lname'],
        'address'=>$_POST['address'],
        'nic'=>$_POST['nic'],
        'dob'=>$_POST['dob']
    );


    print_r($_SESSION["personal"]);
    header("location: create-account.php");




}

?>


    <center>
    <div class="container">
        <table border="0" id="table-color">
            <tr>
                <td colspan="2">
                    <p class="header-text">Welcome To The Family</p>
                    <p class="sub-text">Add Your Personal Details to Continue</p>
                </td>
            </tr>
            <tr>
                <form action="" method="POST" >
                <td class="label-td" colspan="2">
                    <label for="name" class="form-label">Name: </label>
                </td>
            </tr>
            <tr>
                <td class="label-td">
                    <input type="text" name="fname" class="input-text" placeholder="First Name" required>
                </td>
                <td class="label-td">
                    <input type="text" name="lname" class="input-text" placeholder="Last Name" required>
                </td>
            </tr>
            <tr>
                <td class="label-td" colspan="2">
                    <label for="address" class="form-label">Address: </label>
                </td>
            </tr>
            <tr>
                <td class="label-td" colspan="2">
                    <input type="text" name="address" class="input-text" placeholder="Address" required>
                </td>
            </tr>
            <tr>
                <td class="label-td" colspan="2">
                    <label for="nic" class="form-label">NIC: </label>
                </td>
            </tr>
            <tr>
                <td class="label-td" colspan="2">
                    <input type="text" name="nic" class="input-text" placeholder="NIC Number" required>
                </td>
            </tr>
            <tr>
                <td class="label-td" colspan="2">
                    <label for="dob" class="form-label">Date of Birth: </label>
                </td>
            </tr>
            <tr>
                <td class="label-td" colspan="2">
                    <input type="date" name="dob" class="input-text" required>
                </td>
            </tr>
            <tr>
                <td class="label-td" colspan="2">
                </td>
            </tr>

            <tr>
                <td>
                    <input type="reset" value="Reset" id="btn1" >
                </td>
                <td>
                    <input type="submit" value="Next" id="btn2">
                </td>

            </tr>
            <tr>
                <td colspan="2">
                    <br>
                    <label for="" class="sub-text" style="font-weight: 280;">Already have an account&#63; </label>
                    <a href="login.php" class="hover-link1 non-style-link">Login</a>
                    <br><br><br>
                </td>
            </tr>

                    </form>
            </tr>
        </table>

    </div>
</center>
</body>
</html>