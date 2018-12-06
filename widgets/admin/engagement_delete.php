<?php
/**
 * $admin_delete_engagements.php is a single page web application that allows an admin to 
 * edit some of their personal data
 *
 * This page is an addition to the application started as the nmAdmin package
 * 
 * @package nmAdmin
 * @author Bill Newman <williamnewman@gmail.com>
 * @version 2.21 2015/12/07
 * @link http://www.newmanix.com/  
 * @license http://www.apache.org/licenses/LICENSE-2.0
 * @see admin_add.php 
 * @see admin_reset.php
 * @see admin_only_inc.php
 * @todo Add ability to change privilege level of admin by developer - add ability of SuperAdmin to change priv. level
 */

require '../includes/config.php'; #provides configuration, pathing, error handling, db credentials
$titleTag = 'Delete Engagement'; #Fills <title> tag. If left empty will fallback to $titleTag in config_inc.php
$metaRobots = 'no index, no follow';#never index admin pages  

//END CONFIG AREA ----------------------------------------------------------

$access = "admin"; #admins can edit themselves, developers can edit any - don't change this var or no one can edit their own data
include_once INCLUDE_PATH . 'admin_only_inc.php'; #session protected page - level is defined in $access var

# Read the value of 'action' whether it is passed via $_POST or $_GET with $_REQUEST
if(isset($_REQUEST['act'])){$config->myAction = (trim($_REQUEST['act']));}else{$config->myAction = "";}
switch ($config->myAction) 
{//check for type of process
	case "edit": # 2) show form to verify data
	 	editDisplay($config->nav1);
	 	break;
	case "delete": # 3) execute delete SQL, redirect
		deleteExecute($config->nav1);
		break; 
	default: # 1)Select Engagement
	 	selectEngagement($config->nav1);
}

function selectEngagement($nav1='')
{//Select Engagement
	if($_SESSION["Privilege"] == "admin")
	{#redirect if logged in only as admin
		header('Location:' . ADMIN_PATH . THIS_PAGE . "?act=edit");
        die; 
	}
	
	$loadhead='
	<script type="text/javascript" src="' . INCLUDE_PATH . 'include/util.js"></script>
	<script type="text/javascript">
			function checkForm(thisForm)
			{//check form data for valid info
				if(empty(thisForm.EngagementID,"Please Select an Engagement.")){return false;}
				return true;//if all is passed, submit!
			}
	</script>
	';
	get_header();
	echo '<h1>Delete Engagement Data</h1>';
	if($_SESSION["Privilege"] == "developer" || $_SESSION["Privilege"] == "superadmin")
	{# must be greater than admin level to have  choice of selection
		echo '<p align="center">Select an Engagement, to edit their data:</p>';
	}
	$iConn = @mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME) or die(myerror(__FILE__,__LINE__,mysqli_connect_error()));
	$sql = "select EngagementID,OrganizationName,ContactFirstName,ContactLastName,ContactEmailAddress from " . PREFIX . "engagements";

	$result = mysqli_query($iConn,$sql) or die(myerror(__FILE__,__LINE__,mysqli_error($iConn)));
	if (mysqli_num_rows($result) > 0)//at least one record!
	{//show results
		echo '
		<form action="' . ADMIN_PATH .  THIS_PAGE . '" method="post" onsubmit="return checkForm(this);">
		<table align="center" border="1" style="border-collapse:collapse" cellpadding="3" cellspacing="3">
		<tr><th>EngagementID</th><th>Organization</th><th>Contact</th><th>Email</th></tr>
		';
		while ($row = mysqli_fetch_array($result))
		{//dbOut() function is a 'wrapper' designed to strip slashes, etc. of data leaving db
		     echo '
		     <tr>
		     	<td>
		     		<input type="radio" required name="EngagementID" value="' . (int)$row['EngagementID'] . '">' . 
		     		(int)$row['EngagementID'] . '</td>
		     	<td>' . dbOut($row['OrganizationName']) . '</td>
		     	<td>' . dbOut($row['ContactFirstName']) . ' ' . dbOut($row['ContactLastName']) . '</td>
		     	<td>' . dbOut($row['ContactEmailAddress']) . '</td>
		     </tr>
		     ';
		}
		echo '
			<input type="hidden" name="act" value="edit" />
			<tr>
				<td align="center" colspan="4">
					<input type="submit" value="Choose Engagement!" />
				</td>
			</tr>
		</table>
		</form>
		';	
	}else{//no records
      echo '<p align="center"><h3>Currently No Engagements in Database.</h3></p>';
	}
	 echo '<p align="center"><a href="' . ADMIN_PATH . 'engagement_dashboard.php">Exit To Engagement</a></p>';
	@mysqli_free_result($result);
    @mysqli_close($iConn);
	get_footer();

}

function editDisplay($nav1='')
{
    if(isset($_POST['EngagementID']) && (int)$_POST['EngagementID'] > 0)
		{
		 	$myID = (int)$_POST['EngagementID']; #Convert to integer, will equate to zero if fails
		}else{
            header('Location:' . ADMIN_PATH . THIS_PAGE);
            die;
		}

/*    
	if($_SESSION["Privilege"] == "admin")
	{#use session data if logged in as admin only
		$myID = (int)$_SESSION['AdminID'];
	}else{
		if(isset($_POST['EngagementID']) && (int)$_POST['EngagementID'] > 0)
		{
		 	$myID = (int)$_POST['EngagementID']; #Convert to integer, will equate to zero if fails
		}else{
            header('Location:' . ADMIN_PATH . THIS_PAGE);
            die;
		}
	}
*/
	$iConn = @mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME) or die(myerror(__FILE__,__LINE__,mysqli_connect_error()));
    
	$sql = sprintf("select EngagementID,OrganizationName,ContactFirstName,ContactLastName,ContactEmailAddress from " . PREFIX . "engagements WHERE EngagementID=%d",$myID);
	$result = @mysqli_query($iConn,$sql) or die(myerror(__FILE__,__LINE__,mysqli_error($iConn)));
	if(mysqli_num_rows($result) > 0)//at least one record!
	{//show results
		while ($row = mysqli_fetch_array($result))
		{//dbOut() function is a 'wrapper' designed to strip slashes, etc. of data leaving db
		     $OrganizationName = dbOut($row['OrganizationName']);
		     $ContactFirstName = dbOut($row['ContactFirstName']);
		     $ContactLastName = dbOut($row['ContactLastName']);
		     $ContactEmailAddress = dbOut($row['ContactEmailAddress']);
		}
	}else{//no records
      //put links on page to reset form, exit
      echo '
      <p align="center"><h3>No such engagement.</h3></p>
      <p align="center"><a href="' . ADMIN_PATH . 'admin_dashboard.php">Exit To Admin</a></p>
      ';
	}
	$loadhead = '
	<script type="text/javascript" src="' . INCLUDE_PATH . 'include/util.js"></script>
	<script type="text/javascript">
			function checkForm(thisForm)
			{//check form data for valid info
				if(empty(thisForm.OrganizationName,"Please enter Organization Name.")){return false;}
				if(empty(thisForm.ContactFirstName,"Please enter Contact First Name.")){return false;}
				if(empty(thisForm.ContactLastName,"Please enter Contact Last Name.")){return false;}
				if(!isEmail(thisForm.Email,"Please enter a valid Contact Email Address")){return false;}
				return true;//if all is passed, submit!
			}
	</script>
	';
	get_header();
	echo '
	<h1>Delete Engagement</h1>
	<form action="' . ADMIN_PATH .  THIS_PAGE . '" method="post" onsubmit="return checkForm(this);">
	<table align="center">
		<tr>
			<td align="right">Organization</td>
			<td>
				<input type="text" required name="OrganizationName" value="' . $OrganizationName . '" readonly/>
				<font color="red"></font>
			</td>
		</tr>		
        <tr>
			<td align="right">Contanct First Name</td>
			<td>
				<input type="text" autofocus required name="FirstName" value="' . $ContactFirstName . '" readonly/>
				<font color="red"></font>
			</td>
		</tr>
		<tr>
			<td align="right">Contact Last Name</td>
			<td>
				<input type="text" required name="LastName" value="' . $ContactLastName . '" readonly/>
				<font color="red"></font>
			</td>
		</tr>
		<tr>
			<td align="right">Email</td>
			<td>
				<input type="email" required name="Email" value="' . $ContactEmailAddress . '" readonly/>
				<font color="red"></font>
			</td>
		</tr>
	';
    echo '
       <input type="hidden" name="EngagementID" value="' , $myID . '" />
	   <input type="hidden" name="act" value="delete" />
	   <tr></tr>
       <tr>
			<td align="center" colspan="2">
				<input type="submit" value="Delete Engagement" />
				<em>(<font color="red"><b> This is Permanent!</b></font>)</em>
			</td>
		</tr>
	</table>    
	</form>
	<p align="center"><a href="' . ADMIN_PATH . 'admin_dashboard.php">Exit To Admin</a></p>
	';
	@mysqli_free_result($result);
    @mysqli_close($iConn);
	get_footer();
}

function deleteExecute($nav1='')
{
	$iConn = @mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME) or die(myerror(__FILE__,__LINE__,mysqli_connect_error()));

  	if(isset($_POST['EngagementID']) && (int)$_POST['EngagementID'] > 0)
	{
	 	$EngagementID = (int)$_POST['EngagementID']; #Convert to integer, will equate to zero if fails
	}else{
		feedback("EngagementID not numeric","warning");
		header('Location:' . ADMIN_PATH . THIS_PAGE);
        die;
	}

	#sprintf() function allows us to filter data by type while inserting DB values.  Illegal data is neutralized, ie: numerics become zero
    $sql = sprintf("DELETE FROM " . PREFIX . "engagements WHERE (EngagementID=%d)",$EngagementID);
    
    @mysqli_query($iConn,$sql) or die(myerror(__FILE__,__LINE__,mysqli_error($iConn)));
	
	//feedback success or failure of insert
	if (mysqli_affected_rows($iConn) > 0){
         feedback("Successfully Updated!","notice");
	}else{
	 	feedback("Data NOT Updated! (or not changed from original values)");
	}
	
	get_header();
	echo '
		<h1>Delete Engagement</h1>
		<p align="center"><a href="' . ADMIN_PATH .  THIS_PAGE . '">Delete More</a></p>
		<p align="center"><a href="' . ADMIN_PATH . 'engagement_dashboard.php">Exit To Engagement</a></p>
		';	
	get_footer();
   
}