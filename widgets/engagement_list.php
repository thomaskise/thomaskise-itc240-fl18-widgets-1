<?php include 'includes/config.php';?>
<?php get_header()?>
<?php include 'includes/db_functions/initialize.php';?>
<?php
$sql = "select * from engagements";

//we extract the data here
$result = mysqli_query($iConn,$sql) or die(myerror(__FILE__,__LINE__,mysqli_error($iConn)));
//echo $result;

if(mysqli_num_rows($result) > 0)
{//show records

/*
<div class="container">
  <h2>Basic Panel</h2>
  <div class="panel panel-default">
    <div class="panel-body">A Basic Panel</div>
  </div>
</div>
*/
    echo '<h3 class="post-title">' . 'Select Event for engagement details' . '</h3>';
    
    echo '<div class="container">
            <div class="panel panel-primary">';    
                echo '<p class="panel-body"><b>Event' . ' ' . ' | Date' . ' ' . ' | Organization' . ' ' .  ' | Contact' . ' ' . ' | Traniner' . '</b></p>';
            echo '</div>
        </div>';
    
    while($row = mysqli_fetch_assoc($result))    {
        echo '<div class="container">';
            echo '<div class="panel panel-info">';               
                echo  '<p class="panel-body"><a href="engagement_view.php?id=' . $row['EngagementID'] . '">**' .  $row['EngagementID'] . '**</a>' . ' '  . ' | ' . ' '  .  $row['PreferredTrainingDate'] . ' | ' . ' '  . $row['OrganizationName'] .  ' | '  . ' '  . $row['ContactFirstName'] . ' ' . $row['ContactLastName'] .  ' | '  . ' '  . $row['Trainer'] . '</p>'; 
            echo '</div>';
        echo '</div>';
    }
}else{//inform there are no records
    echo '<h3 class="post-title">There are currently no engagements</h3>';
} 

//release web server resources
@mysqli_free_result($result);

//close connection to mysql
@mysqli_close($iConn);

?>
<?php get_footer()?>