<?php
 session_start();
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap"
        rel="stylesheet">
    <style>
        body {
            background-color: rgb(214, 214, 214);
            font-size: 20px;
        }

        .frm {
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            position: absolute;
            padding: 30px;
            border-radius: 5px;
            background-color: rgb(214, 214, 214);
            box-shadow: 5px 5px 10px #b6a9a9, -5px -5px 10px #ffffff;


        }

        .space {
            margin-top: 22px;
            background-color: rgb(214, 214, 214);
        }

        #select_option,
        input[type="text"],
        input[type="number"],
        .btn {
            padding: 13px 13px;
            border-radius: 5px;
            background-color: rgb(214, 214, 214);
            border: none;
            outline: none;
            box-shadow: 5px 5px 10px #b6a9a9, -5px -5px 10px #ffffff;
            font-size: 17px;


        }

        #select_option {
            margin-top: 35px;
            margin-left: 2px;
            color: white;
            background-color: red;
        }

        input[type="text"],
        input[type="number"] {
            box-shadow: inset 5px 5px 10px #b6a9a9, inset -5px -5px 10px #ffffff;
            font-size: 18px;
            color: red;
        }

        .btn {
            box-shadow: 5px 5px 10px #b6a9a9, -5px -5px 10px #ffffff;
            font-size: 17px;
            padding: 15px 30px;
            margin-left: 2px;
            margin-top: 35px;
        }

        form label {
            color: red;
            font-weight: 400;
            font-family: Poppins;
            font-size: 20px;

        }

        .btn:hover {
            color: white;
            background-color: red;
            transition: all .7s ease;
        }

        /* for making input type only number */
        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
         /* for mozzila */
        input[type=number] {
            -moz-appearance: textfield;
        } 
       
    </style>
</head>


<?php
  
  if(isset($_POST['submit'])&&$_POST['take_input']!="")
  {
   $str1=$_POST['take_input'];
   $_SESSION['input']=$str1;
   $str2=$_POST['select_option'];

   if ($str2 == "celsius") {
        $f = $str1 * (9 / 5) + 32;
        $_SESSION['f']=$f;
        unset($_POST);
        header("Location: ".$_SERVER['PHP_SELF']);
        exit;
  

       
   } 
   else if($str2 == "fahrenheit") {
       $f = (($str1 - 32) / 9) * 5;
    $_SESSION['f']=$f;
    unset($_POST);
    header("Location: ".$_SERVER['PHP_SELF']);
    exit;
       
   }
  }
 
?>



<body>
    <div>
        <form action="" class="frm" autocomplete="off" method="POST">
            <label for="">INPUT</label><br>
            <input type="number" class="space" id="take_input" name="take_input" onclick="myclear()"  <?php if((isset($_SESSION['input']))){echo "value=".$_SESSION['input']; unset($_SESSION['input']);}?>> <br>

            <select class="space" id="select_option" name="select_option">
                <option value="celsius">Celcius</option>
                <option value="fahrenheit">Farenhite</option>
            </select> <br> <br>
            <label for="">OUTPUT</label><br>
            <input type="text" class="space" id="display_ouput" readonly <?php if((isset($_SESSION['f']))){echo "value=".$_SESSION['f']; unset($_SESSION['f']);}?>> <br>
            <button class="space btn" type="submit" name="submit">Convert</button>
        </form>



    </div>

    <script>
     function myclear() {
            document.getElementById("display_ouput").value = "";
            document.getElementById("take_input").value = "";
        }

    </script>

   
</body>


</html>
