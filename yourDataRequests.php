<?php
//start session for grabbing user id
session_start();
//db connection 
include("../../databaseClass.php");
$databaseClass = new databaseClass();
$conn = $databaseClass->connect();
//put the users id into a varible
$user_id = $_SESSION['user_id'];
//initilize an empty array that franchise names will be pushed into during the loop
$nameCheck = array();
//outer query to get the ids which are in string format
$sql = "select * from apptrackrequestinfo where user_id = $user_id";
$result = $conn->query($sql);
if($result->num_rows > 0)
{
    while($row = $result->fetch_assoc())
    {   //so I can mess with the date format how I like
        $date = new DateTime($row['time_of_request']);
        //database field has ids together in a string(like: 4,5,2 etc..) need these id's seprated for use in next query
        $idsArr = explode(",",$row['the_ids']);
        //take each id and use in in the inner query
        foreach($idsArr as $value)
        {   //id's in franchise table are int so must convert
            $intValue = (int)$value;
            //inner query to get franchise ID names runs with every iteration of foreach loop
            $sqlGetFranchiseName = "select * from franchise where franchise_id = $intValue";
            $nameResult = $conn->query($sqlGetFranchiseName);
            if($nameResult->num_rows > 0)
            {
                while($rowName = $nameResult->fetch_assoc())
                {   //to avoid duplicates, if the name exists output nothing
                    if (in_array($rowName['name'], $nameCheck))
                    {
                        //output nothing
                    }
                    else
                    {   //echo franchise name and date client requested information
                        echo "<b>Franchise:</b> ".$rowName['name']."<br><b>Date Requested:</b> ".$date->format('m-d-Y')."<br><hr>"; 
                    }
                    //push the franchise name each loop so it can check avove  
                    array_push($nameCheck, $rowName['name']);  
                }
            }
        }
        
        
    }
}
else
{
    echo "You have not requested information from any franchises yet...";
}


?>
