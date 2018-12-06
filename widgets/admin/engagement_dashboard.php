<?php
/**
 * admin_dashboard.php session protected page of links to administrator tool pages
 *
 * Use this file as a landing page after successfully logging in as an administrator.  
 * Be sure this page is not publicly accessible by referencing admin_only_inc.php
 * 
 * @package nmAdmin
 * @author Bill Newman <williamnewman@gmail.com>
 * @version 2.21 2015/12/07
 * @link http://www.newmanix.com/
 * @license http://www.apache.org/licenses/LICENSE-2.0
 * @see admin_only_inc.php 
 * @todo none
 */

require '../includes/config.php'; #provides configuration, pathing, error handling, db credentials 
$title = 'Engagement Dashboard'; #Fills <title> tag. If left empty will fallback to $config->titleTag in config_inc.php 
//END CONFIG AREA ----------------------------------------------------------
$access = "admin"; #admin or higher level can view this page
include_once INCLUDE_PATH . 'admin_only_inc.php'; #session protected page - level is defined in $access var
get_header(); #header must appear before any HTML is printed by PHP
?>
<h1>Engagement Dashboard</h1>
<table border="1" style="border-collapse:collapse" align="center" width="98%" cellpadding="3" cellspacing="3">
	<tr><th>Page</th><th>Purpose</th></tr>
	<?php if($_SESSION['Privilege']=="developer"){
    //place any developer specific links here
    
	}
	if($_SESSION['Privilege']=="superadmin" || $_SESSION['Privilege']=="developer"){ ?>
		<tr>
			<td width="250" align="center"><a href="<?=ADMIN_PATH?>engagement_add.php">Add Engagements</a></td>
			<td><b>SuperAdmin Only.</b> Add a new Engagement.</td>
		</tr>
	<?php
	}
	?>
		<tr>
			<td width="250" align="center"><a href="<?=ADMIN_PATH?>engagement_edit.php">Update Engagements</a></td>
			<td>Edit Engagement data such as first, last, date, & email here.</td>
	</tr>
	<tr>
			<td width="250" align="center"><a href="<?=ADMIN_PATH?>engagement_delete.php">Delete Engagements</a></td>
			<td>Delete an Engagement here.  SuperAdmins can delete Engagements.</td>
	</tr>
	<tr>
        <td align="center" colspan="2"><b><?=$_SESSION['FirstName']?></b> is currently logged in as <b><?=$_SESSION['Privilege']?></b> <a href="<?=ADMIN_PATH?>admin_logout.php" title="Don't forget to Logout!">Logout</a></td>
	</tr>
	<tr>
        <td align="center" colspan="2"><b><a href="<?=ADMIN_PATH?>admin_dashboard.php">Toggle to the Admin Dashboard</a></b></td>
	</tr>
</table>
<?php
get_footer();
?>
