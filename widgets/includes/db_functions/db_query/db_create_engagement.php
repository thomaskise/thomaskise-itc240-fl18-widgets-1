drop table if exists engagements;

create table engagements
( EngagementID int unsigned not null auto_increment primary key,
OrganizationName VARCHAR(50),
ContactLastName VARCHAR(50),
ContactFirstName VARCHAR(50),
ContactEmailAddress VARCHAR(50),
TrainingSiteName VARCHAR(50),
TrainingSiteAddress1 VARCHAR(50),
TrainingSiteAdderess2 VARCHAR(50),
TrainingSiteCity VARCHAR(50),
TrainingSiteStateCode CHAR(2),
TrainingZip TINYINT(5),
PreferredTrainingDate DATE,
TrainingFocus TINYTEXT,
ExpectedParticipation TINYINT(4),
CurrentLgbtqUnderstanding TINYTEXT,
AudienceDescription TINYTEXT,
HandicapAccess CHAR(3),
AudioVisualCapabilitiy CHAR(4),
AudioVisualDetails TINYTEXT,
Parking CHAR(3),
ParkingDetails TINYTEXT
)