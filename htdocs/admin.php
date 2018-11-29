<?php
include('functions.php');

if (!isLoggedIn()) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>MURILLOX Administrator</title>
        <meta http-equiv="Content-Type" content="text/html" charset="utf-8" />
        <link rel="stylesheet" href="w3.css" />
        <link rel="stylesheet" href="css.css" />
        <script type="text/JavaScript" src="js/sha512.js"></script> 
        <script type="text/JavaScript" src="js/forms.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://use.fontawesome.com/e9d1a76b69.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <style>
        body,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: "Lato", sans-serif;
        }
        
        body,
        html {
            height: 100%;
            color: #7e82a5;
            line-height: 1.8;
            background-color: #c6c6c6
        }
        
        .w3-wide {
            letter-spacing: 10px;
        }
        
        .w3-hover-opacity {
            cursor: pointer;
        }

        .modal-content,
        #caption {
            -webkit-animation-name: zoom;
            -webkit-animation-duration: 0.6s;
            animation-name: zoom;
            animation-duration: 0.6s;
        }
        
        @-webkit-keyframes zoom {
            from {
                -webkit-transform: scale(0)
            }
            to {
                -webkit-transform: scale(1)
            }
        }
        
        @keyframes zoom {
            from {
                transform: scale(0)
            }
            to {
                transform: scale(1)
            }
        }

        .close {
            position: absolute;
            top: 15px;
            right: 35px;
            color: #f1f1f1;
            font-size: 40px;
            font-weight: bold;
            transition: 0.3s;
        }

        .close:hover,
        .close:focus {
            color: #c6c6c6;
            text-decoration: none;
            cursor: pointer;
        }

        @media only screen and (max-width: 700px) {
            .modal-content {
                width: 100%;
            }
        }
        </style>
    </head>
    <body>
          <!-- Navbar (sit on top) -->
    <div class="w3-top">
        <div class="w3-bar" id="myNavbar">
            <a class="w3-bar-item w3-button w3-hover-black w3-hide-medium w3-hide-large w3-opennav w3-left" href="javascript:void(0);" onclick="toggleFunction()" title="Toggle Navigation Menu">
                <i class="fa fa-bars"></i>
            </a>
            <a href="index.php" class="w3-bar-item w3-button"><i class="fa fa-home"></i> HOME</a>
            <a href="#footer" class="w3-bar-item w3-button"> <i class="fa fa-user"></i> Social</a>
            <a href="mailto:support@murillox.com" class="w3-bar-item w3-button w3-hide-small"><i class="fa fa-envelope"></i> Support</a>
            <a href="" class="w3-bar-item w3-button w3-center"> |<i class="fa fa-deviantart"></i>    <i class="fa fa-compass">     </i><b>* MURILLO X SE *  <i class="fa fa-compass"></i>    <i class="fa fa-deviantart"></i>| ask us about cryptocurrency!</b></a>
            <a href="market.php" class="w3-bar-item w3-button"> <i class="fa fa-line-chart"></i>  Watch The Market - Buy   <i class="fa fa-dollar"></i></a>
            <a href="http://finance.yahoo.com" class="w3-bar-item w3-button w3-hide-small w3-right w3-hover-red">
                <i class="fa fa-search"></i>
        </div>

        <!-- Navbar on small screens -->
        <div id="navDemo" class="w3-bar-block w3-dark-grey w3-hide w3-hide-large w3-hide-medium w3-opacity-min">
            <a href="#account" class="w3-bar-item" <img id="ppic" class="hidden"></a>
            <a href="#footer" class="w3-bar-item w3-button"> <i class="fa fa-user"></i> Social</a>
            <a href="mailto:support@murillox.com" class="w3-bar-item w3-button w3-hide-small"><i class="fa fa-envelope"></i> Support</a>
            <a href="market.php" class="w3-bar-item w3-button"> <i class="fa fa-dollar"></i>  Market - Buy   <i class="fa fa-dollar"></i></a>
            <a href="http://finance.yahoo.com" class="w3-bar-item w3-button"><i class="fa fa-search"></i></a>
        </div>
    </div>

   <?php
    echo '<br><br>   note: unatuhorized access detected-probably our adminstrator stealing your stock!<br>';

    $usercid=2;
    $k = 3;
    $sqladmin = 'SELECT stockmarket.t_id, ticker.companyname, ticker.ticker, stockmarket.currentvalue, stockmarket.openingvalue, stockmarket.closingvalue
    FROM ticker, stockmarket WHERE ticker.t_id=stockmarket.t_id GROUP BY stockmarket.t_id;';

    $retval = mysqli_query($db, $sqladmin);
    if(! $retval ) {
        echo "Error: " . $sqladmin . "<br>" . $db->error;
     }
    echo "<br>MurilloX Administrator Page<br>";

    $count = $retval->num_rows;

        //start a table
    echo '<form name="form1" method="post" action="">
    <table width="" border="0" cellspacing="1" cellpadding="0">';

        //start header of table
        echo '<tr>
        <th>&nbsp;</th>
        <th>Company Name</th>
        <th>Ticker</th>
        <th>Current Value</th>
        <th>Opening Value</th>
        <th>Closing Value</th>
        </tr>';

    //loop through all results
    while($r=$retval->fetch_array()){
        //print out table into an array
        echo '<tr>
        <td><input type="hidden" name="t_id[]" value='.$r['t_id'].' readonly></td>
        <td>'.$r['companyname'].'</td>
        <td>'.$r['ticker'].'</td>
        <td><input name="currentvalue[]" type="number" value="'.$r['currentvalue'].'"></td>
        <td><input name="openingvalue[]" type="number" value="'.$r['openingvalue'].'"></td>
        <td><input name="closingvalue[]" type="number" value="'.$r['closingvalue'].'"></td>
        </tr>';
    }

    //submit button
    echo'<tr>
    <td colspan="3" align="center"><input type="submit" name="update" value="UPDATE"></td>
    </tr>
    </table>
    </form>';
    
    // if form has been submitted, process it
    if(isset($_POST['update']))
    {
        for($i = 0; $i < $count; $i++){
        // minus value by 1 since arrays start at 0
            $value =$_POST['t_id'][$i];
            $cvalue=(float)$_POST['currentvalue'][$i];
            $ovalue=(float)$_POST['openingvalue'][$i];
            $clvalue=(float)$_POST['closingvalue'][$i];
            //update table
        $sql1 = "UPDATE stockmarket SET currentvalue={$cvalue}, openingvalue={$ovalue}, closingvalue={$clvalue} WHERE stockmarket.t_id={$value}";
        if (mysqli_query($db, $sql1)) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . mysqli_error($db);
        }
    }
    // redirect user
    $_SESSION['success'] = 'Updated';
    }
    mysqli_free_result($retval);
    mysqli_close($db);

?>

 <div class="w3-content w3-container" id="footer"></div>
 <!-- Footer -->
 <footer class="w3-center w3-black w3-padding-64 w3-opacity w3-hover-opacity-off ">
        <a href="#home " class="w3-button "><i class="fa fa-arrow-up w3-margin-right "></i>To the top</a>
        <div class="w3-xlarge w3-section ">
            <a href="http://www.facebook.com" style="text-decoration:underline"><i class="fa fa-facebook-official w3-hover-text-indigo"></i>
            </a>
            <a href="http://www.instagram.com" style="text-decoration:underline"><i class="fa fa-instagram w3-hover-text-purple"></i>
            </a>
            <a href="http://www.snapchat.com" style="text-decoration:underline"><i class="fa fa-snapchat w3-hover-text-yellow"></i>
            </a>
            <a href="http://www.pintrest.com" style="text-decoration:underline"><i class="fa fa-pinterest-p w3-hover-text-red"></i>
            </a>
            <a href="http://www.twitter.com" style="text-decoration:underline"><i class="fa fa-twitter w3-hover-text-light-blue"></i>
            </a>
            <a href="http://www.linkedin.com" style="text-decoration:underline"><i class="fa fa-linkedin w3-hover-text-indigo"></i>
            </a>
            <a href="https://www.reddit.com/" style="text-decoration:underline"><i class="fa fa-reddit w3-hover-text-indigo"></i>
            </a>
        </div>
    </footer>

    <script>
        // Change style of navbar on scroll
        window.onscroll = function() {
            myFunction()
        };


        function myFunction() {
            var navbar = document.getElementById("myNavbar");
            if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
                navbar.className = "w3-bar" + "w3-card-2" + "w3-animate-top" + "w3-dark-grey";
            } else {
                navbar.className = navbar.className.replace(" w3-card-2 w3-animate-top w3-dark-grey", " ");
            }
        }

        // Used to toggle the menu on small screens when clicking on the menu button
        function toggleFunction() {
            var x = document.getElementById("navDemo");
            if (x.className.indexOf("w3-show") == -1) {
                x.className += "w3-show";
            } else {
                x.className = x.className.replace("w3-show", " ");
            }
        }

    </script>

    </body>
</html>