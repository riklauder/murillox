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
        <title>MURILLOX MarketWatch</title>
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
            color: #656786;
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
    $accid=$_SESSION['user']['acc_id'];
    $accid=number_format($accid);
    $usercid = $_SESSION['user']['c_id'];
    $cid=number_format($usercid);
    $k = 3;
    $sqlaccount = 'SELECT account.balance from users, account WHERE users.acc_id=account.acc_id and users.c_id='.$usercid.';';
    $retval = mysqli_query($db, $sqlaccount);
    if(! $retval ) {
        echo "Error: " . $sqlaccount . "<br>" . $db->error;
    }
    while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)) {
        $bal=number_format($row['balance'],2);
        echo "<br><br>Your MURILLOX Trading account balance is <b>$ $bal </b><br><br>";
    }     
    $sqladmin = 'SELECT stockmarket.t_id, ticker.companyname, ticker.ticker, stockmarket.currentvalue, stockmarket.openingvalue, stockmarket.closingvalue
    FROM ticker, stockmarket WHERE ticker.t_id=stockmarket.t_id GROUP BY stockmarket.t_id;';

    $retval = mysqli_query($db, $sqladmin);
    if(! $retval ) {
        echo "Error: " . $sqladmin . "<br>" . $db->error;
     }
    
    echo "<div class=\"w3-content w3-container \" id=\"support\">
    <h3 class=\"w3-center w3-purple\">MURILLO X Market Watch</h3></div><br>";

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
        $tid=number_format($r['t_id']);
        //print out table into an array
        echo '<tr>
        <td><input type="hidden" name="t_id[]" value='.$r['t_id'].' readonly></td>
        <td>'.$r['companyname'].'</td>
        <td>'.$r['ticker'].'</td>
        <td>$'.$r['currentvalue'].'</td>
        <td>$'.$r['openingvalue'].'</td>
        <td>$'.$r['closingvalue'].' <button class="w3-button w3-green onclick="update'.$tid.'" name="update'.$tid.'" id="'.$tid.'" >BUY</button></td>
        </tr>';
        $tval=number_format($r['currentvalue'], 4);
        if (isset($_POST['update'.$tid.''])){
            buy($tval, $accid, $cid, $tid);
        }
    }
    echo "<hr><br>";
    mysqli_free_result($retval);
    mysqli_close($db);

    function buy($CVal, $accid, $cid, $tid){
        $dbs = mysqli_connect('localhost', 'root', '', 'murillox');

        $sqlu = "SELECT users.c_id, account.balance from users, account WHERE users.acc_id=account.acc_id and users.c_id={$cid};";
        $retu = mysqli_query($dbs, $sqlu);
        if(! $retu ) {
            echo "Error: " . mysqli_error($dbs);
        }
        while($row = mysqli_fetch_array($retu, MYSQLI_ASSOC)) {
            $bal=number_format($row['balance'],2);
        }   
        $CVal=($CVal * 10);

        $sell1="UPDATE account SET balance = balance - {$CVal} WHERE acc_id={$accid};";
        if(mysqli_query($dbs, $sell1)){
            echo " <b>PURCHASED 10 shares for $ {$CVal} ea </b><br>account_id:{$accid} balance updated </b>";
        } else {
            echo "Error: " . mysqli_error($dbs);
        }
    
        
        $sell2="INSERT into portfolio (c_id, t_id, numshares) values ({$cid}, {$tid}, 10);";
        if(mysqli_query($dbs, $sell2)){
            echo " successfully updated portfolio";
        } else {
            echo "Error: " . mysqli_error($dbs);
        }
        refer();
    }

    function refer(){
        ob_end_flush(); 
        flush(); 
        ob_start(); 
    }
?>

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