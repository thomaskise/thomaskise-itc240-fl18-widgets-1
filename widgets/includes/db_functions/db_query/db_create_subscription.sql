/* 
	Contacts db table - stores 
	contacts made via contact_us.php in a database table 
	for safe keeping!
	11/22/2010
*/
drop table if exists test_Subscriptions;
create table test_Subscriptions
(SubscriptionID int unsigned not null auto_increment,
SubscriptionName varchar(50),
Subscribed tinyint(1),
ContactID int(10),
DateStarted datetime,
DateStopped datetime,
    PRIMARY KEY (SubscriptionID),
    FOREIGN KEY (ContactID) REFERENCES test_Contacts(ContactID)
);	