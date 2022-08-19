<!DOCTYPE html>
<html>
  
<head>
    <title>Confirm </title>
</head>
  
<body>
    <center>
        <?php
  
    
        $conn = mysqli_connect("localhost", "root", "", "naman");
          
        // Check connection
        if($conn === false){
            die("ERROR: Could not connect. " 
                . mysqli_connect_error());
        }
          
        // Taking all  values from the form data(input)
        $name =  $_REQUEST['name'];
        $usn = $_REQUEST['usn'];
        $phn =  $_REQUEST['phn'];
        $mail =  $_REQUEST['mail'];
        $date =  $_REQUEST['date'];
        $radio=$_POST["year"];
        $intern=$_POST["state"];
        $covid=$_POST["st"];
        if($radio=="4" && $intern=="isintern")
        {
        $year= 4; 
        $hfees = 75000;
        $permth=6000;
        $month =  $_REQUEST['months'];
        }  
        else if($radio=="1"||$radio=="2"||$radio=="3")
        {
        $year= 1; 
        $hfees = 100000;
        $permth=8300;
        $month =  $_REQUEST['months'];
        } 
        if( $covid=="yes")
        {
         $cfees= 5000;
         }
         else {$cfees= 0;}
         $net= $hfees - ($permth*$month);

        // Performing insert query execution
        // here our table name is college
        $sql = "INSERT INTO studenty_info  VALUES ('$name','$usn','$phn','$mail','$date',$year)";
        $sql .="INSERT INTO refund VALUES('$usn', $hfees, $cfees, $permth, $month, $net)";
          
        if(mysqli_multi_query($conn, $sql)){
            echo "<h1>Thank you for submitting your response!"</h1>"; 
  
            echo nl2br("\n$name\n $usn\n $phn\n $mail\n $date\n $year\n $hfees\n cfees\n $month\n $net");
        } else{
            echo "ERROR: Hush! Sorry $sql. " 
                . mysqli_error($conn);
        }
          
        // Close connection
        mysqli_close($conn);
        ?>
        <br><br>
    </center>
</body>