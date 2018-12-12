SET FOREIGN_KEY_CHECKS=0;
drop table if exists widgets_fl18_Contacts;
drop table if exists widgets_fl18_Subscriptions;
create table widgets_fl18_Contacts
( ContactID int(10) unsigned not null auto_increment primary key,
FirstName varchar(50),
LastName varchar(50),
Email varchar(80),
ContactPreference varchar(5),
Message text,
DateAdded datetime
);
create table widgets_fl18_Subscriptions
(SubscriptionID int unsigned not null auto_increment,
SubscriptionName varchar(50),
Subscribed tinyint(1),
ContactID int(10) unsigned not null,
DateStarted datetime,
DateStopped datetime,
    PRIMARY KEY (SubscriptionID),
    FOREIGN KEY (ContactID) REFERENCES widgets_fl18_Contacts(ContactID)
       ON DELETE CASCADE
       ON UPDATE CASCADE
);
SET FOREIGN_KEY_CHECKS=1;