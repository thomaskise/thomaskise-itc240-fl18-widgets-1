/* 
	Contacts db table - stores 
	contacts made via contact_us.php in a database table 
	for safe keeping!
	11/22/2010
*/
drop table if exists widgets_fl18_Subscriptions;
create table widgets_fl18_Subscriptions
(SubscriptionID int unsigned not null auto_increment PRIMARY KEY,
SubscriptionName varchar(50),
Subscribed tinyint(1),
ContactID int,
DateStarted datetime,
DateStopped datetime
);	