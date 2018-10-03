<?php
if (isset($_POST['store']) && function_exists($_POST['store'])) {
    addData();
    
}
function addData()
{
   /**
    * @var string
    * @range(0, 20)
    */
    $x=$_POST['fname'];
    /**
    * @var string
    */
    $y=$_POST['lname'];
     /**
    * @var string
    */
    $z=$_POST['age'];
     /**
      * @var int
      *@range(0,10)
      */
    $a=$_POST['mobno'];
    $conn=new mysqli("localhost","root","bridgeit","php");//($servername, $username, $password, $dbname)
    if ($conn->connect_error) {
       
        die("Connection failed: " . $conn->connect_error);
    } 
    $sql = "INSERT INTO emp (fname,lname,age,mobno) VALUES('$x','$y','$z',$a)";
    echo $sql;
if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}
?>