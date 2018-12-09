/* 
	Contacts db table - stores 
	contacts made via contact_us.php in a database table 
	for safe keeping!
	11/22/2010
*/
drop table if exists widgets_fl18_Contacts;
create table widgets_fl18_Contacts
( ContactID int unsigned not null auto_increment primary key,
FirstName varchar(50),
LastName varchar(50),
Email varchar(80),
ContactPreference varchar(5),
Message text,
DateAdded datetime
);	