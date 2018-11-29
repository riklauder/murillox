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
        <title>MURILLOX Portfolio</title>
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
    <!-- logged in user information -->
    <!-- home -->
   <div class="w3-margin" id="home">
   <form action='' method='POST'>
   <?php
    echo '<br> note: unatuhorized access detected ...probably our adminstrator stealing..err updating your stock!';
    $accid=$_SESSION['user']['acc_id'];
    $accid=number_format($accid);
    $usercid = $_SESSION['user']['c_id'];
    $cid=number_format($usercid);
    $pid=null;
    $k = 3;
    $sqlaccount = 'SELECT account.balance from users, account WHERE users.acc_id=account.acc_id and users.c_id='.$usercid.';';
    $retval = mysqli_query($db, $sqlaccount);
    if(! $retval ) {
        echo "Error: " . $sqlaccount . "<br>" . $db->error;
    }
    while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)) {
        $bal=number_format($row['balance'],2);
        echo "<br>Your MURILLOX Trading account balance is <b>$ $bal </b><br><br>";
    }     
    $sqluserport = 'SELECT users.firstname, users.lastname, ticker.companyname, ticker.ticker, portfolio.p_id, portfolio.t_id, portfolio.numshares AS NumberOfShare,
    stockmarket.currentvalue, stockmarket.openingvalue, stockmarket.closingvalue,
    (portfolio.numshares * stockmarket.currentvalue) AS CurrentValue FROM users, portfolio, ticker, stockmarket
    WHERE users.c_id=portfolio.c_id AND stockmarket.t_id=portfolio.t_id AND portfolio.t_id=ticker.t_id 
    AND users.c_id='.$usercid.' GROUP BY portfolio.t_id, portfolio.p_id ORDER BY portfolio.p_id DESC;';

    $retval = mysqli_query($db, $sqluserport);
    if(! $retval ) {
        echo "Error: " . $sqluserport . "<br>" . $db->error;
     }

    $customer = "blank";
    while ($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)){
        $first = $row['firstname'];
        $last = $row['lastname'];
        $customer = "$first $last";
    }
    echo "<br><div class=\"w3-content w3-container \" id=\"support\">
    <h3 class=\"w3-center w3-blue\">Portfolio of : <b>$customer</b></h3>
        </div><hr> ";

    mysqli_free_result($retval);
    $retval = mysqli_query($db, $sqluserport);
    if(! $retval ) {
        echo "Error: " . $sqluserport . "<br>" . $db->error;
    }

    $totalport=0.00;
    while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)) {
        $pid=number_format($row['p_id']);
        $value=number_format($row['CurrentValue'],2);
        $curr=number_format($row['currentvalue'],2);
        $price=array($row['currentvalue'], $row['openingvalue'], $row['closingvalue']);
        echo "<i class=\"fa fa-money\"></i>Company:<b> {$row['companyname']} </b>".
           "# of Shares :<b> {$row['NumberOfShare']} </b> trading @ <b>$$curr </b>"."Total Value ".
            "$<b>$value</b> "."<i class=\"fa fa-money\"></i><br>";
        $totalport += $row['CurrentValue'];
        $n=sizeof($price);
        $max = number_format(maxProfit($price, $n, $k), 2);
        $tid = number_format($row['t_id']);
        $ticker=$row['ticker'];
        echo "<i class=\"fa fa-money\"></i><b> {$ticker}  </b>Maximum Profit Calculated at: <b>$ $max </b>
        <button class=\"w3-button w3-purple\" onclick=\"update{$tid}\" 
            name=\"update{$tid}\" id=\"{$tid}\">SELL</button><hr>" ;
        $cvalue=number_format($row['CurrentValue'], 4);      
        if (isset($_POST['update'.$tid.''])){
            sell($cvalue, $accid, $cid, $pid, $tid);
        }
    }     
    echo "<br>Portfolio Fetched successfully\n<br>";
    echo "In Total your portfolio is worth <b>$$totalport</b><br>.........not bad but our administrator's is bigger<br><br>"; 

        
    function sell($CVal, $accid, $cid, $pid, $tid){
        $dbs = mysqli_connect('localhost', 'root', '', 'murillox');

        $sqlu = "SELECT users.c_id, account.balance from users, account WHERE users.acc_id=account.acc_id and users.c_id={$cid};";
        $retu = mysqli_query($dbs, $sqlu);
        if(! $retu ) {
            echo "Error: " . mysqli_error($dbs);
        }
        while($row = mysqli_fetch_array($retu, MYSQLI_ASSOC)) {
            $bal=number_format($row['balance'],2);
        }   

        $sell1="UPDATE account SET balance = balance + {$CVal} WHERE acc_id={$accid};";
        if(mysqli_query($dbs, $sell1)){
            echo " SOLD for $ {$CVal} account_id:{$accid}";
        } else {
            echo "Error: " . mysqli_error($dbs);
        }
    
        
        $sell2="UPDATE portfolio SET c_id=1 WHERE t_id={$tid} and c_id={$cid};";
        if(mysqli_query($dbs, $sell2)){
            echo " success updated portfolio_id {$pid}";
        } else {
            echo "Error: " . mysqli_error($dbs);
        }
    }

     function maxProfit($price, $n, $k) 
    { 
        
        // table to store results  
        // of subproblems profit[t][i] 
        // stores maximum profit using 
        // atmost t transactions up to 
        // day i (including day i) 
        $profit[$k + 1][$n + 1]=0; 
    
        // For day 0, you can't  
        // earn money irrespective 
        // of how many times you trade 
        for ($i = 0; $i <= $k; $i++) 
            $profit[$i][0] = 0; 
    
        // profit is 0 if we don't 
        // do any transation 
        // (i.e. k =0) 
        for ($j = 0; $j <= $n; $j++) 
            $profit[0][$j] = 0; 
    
        // fill the table in 
        // bottom-up fashion 
        $prevDiff = NULL; 
        for ($i = 1; $i <= $k; $i++) { 
            for ($j = 1; $j < $n; $j++) { 
                $prevDiff = max($prevDiff, $profit[$i - 1][$j - 1] -  
                                                $price[$j - 1]); 
                $profit[$i][$j] = max($profit[$i][$j - 1], 
                                $price[$j] + $prevDiff); 
            } 
        } 
        return $profit[$k][$n - 1]; 
    } 

    function refer(){
        ob_end_flush(); 
        flush(); 
        ob_start(); 
    }


?>
</div>
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
    <script>
     var count = 1;
     function plus(position){
      count++;
      var countEl = document.getElementById(position + "_count");
      countEl.value = count;
     }
     function minus(position){
      if (count > 1) {
       count--;
       var countEl = document.getElementById(position + "_count");
       countEl.value = count;
      }  
     }
    </script>
   

    </body>
</html>