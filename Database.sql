
/* Patrick O'Leary
   Create all the tables for the database
*/

CREATE TABLE IF NOT EXISTS 'Patients'(
  'patientID' int NOT NULL AUTO_INCREMENT,
  'pFirstName' text NOT NULL,
  'pLastName' text NOT NULL,
  'pType' ENUM('Parent', 'Child'),
  'age' int NOT NULL,
  'gender' ENUM('Male','Female'),
  'drID' int NOT NULL AUTO_INCREMENT,
  CHECK ('pType' > 0 and  'pType' < 3),
  CHECK ('gender' > 0 and  'gender' < 3),
  PRIMARY KEY ('patientID'),
  PRIMARY KEY ('pFirstName', 'pLastName')
  FOREIGN KEY ('drID') REFERENCES 'Doctor'('drID') ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS 'Doctor' (
	'drID' int NOT NULL AUTO_INCREMENT,
	'drFirstName' text NOT NULL,
  'drLastName' text NOT NULL,
  'gender' ENUM('Male','Female'),
	'patientID' int NOT NULL,
  CHECK ('gender' > 0 and  'gender' < 3),
	PRIMARY KEY ('drID'),
  PRIMARY KEY ('drFirstName', 'drLastName'),
  FOREIGN KEY ('patientID') REFERENCES 'Patients'('patientID') ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS 'Receptionist' (
  'recID' int NOT NULL AUTO_INCREMENT,
  'rFirstName' text NOT NULL,
  'rLastName' text NOT NULL,
  'gender' ENUM('Male','Female'),
  'drID' int NOT NULL,
  CHECK ('gender' > 0 and 'gender' < 3),
  PRIMARY KEY ('recID'),
  PRIMARY KEY ('rFirstName', 'rLastName'),
  FOREIGN KEY ('drID') REFERENCES 'Doctor'('drID') ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS 'Appointment' (
  'apptID' int NOT NULL AUTO_INCREMENT,
  'apptDateTime' datetime NOT NULL,
  'drID' int NOT NULL,
  'patientID' int NOT NULL,
  PRIMARY KEY ('apptID'),
  FOREIGN KEY ('drID') REFERENCES 'Doctor'('drID') ON DELETE CASCADE,
  FOREIGN KEY ('patientID') REFERENCES 'Patients'('patientID') ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS 'WorksFor' (
  'recID' int NOT NULL,
  'drID' int NOT NULL,
  PRIMARY KEY ('recID', 'drID'),
  FOREIGN KEY ('recID') REFERENCES 'Receptionist'('recID') ON DELETE CASCADE,
  FOREIGN KEY ('drID') REFERENCES 'Doctor'('drID') ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS 'Has' (
  'patientID' int NOT NULL,
  'drID' int NOT NULL,
  PRIMARY KEY ('patientID', 'drID'),
  FOREIGN KEY ('patientID') REFERENCES 'Patients'('patientID') ON DELETE CASCADE,
  FOREIGN KEY ('drID') REFERENCES 'Doctor'('drID') ON DELETE CASCADE
);

#Populate Patients data
INSERT INTO 'Patients' ('patientID', 'pFirstName', 'pLastName', 'pType', 'age', 'gender', 'drID') VALUES
(1, 'John','Smith', 1, 35, 1, 1);
INSERT INTO 'Patients' ('patientID', 'pFirstName', 'pLastName', 'pType', 'age', 'gender', 'drID') VALUES
(2, 'James','Smith', 2, 7, 1, 3);
INSERT INTO 'Patients' ('patientID', 'pFirstName', 'pLastName', 'pType', 'age', 'gender', 'drID') VALUES
(3, 'Jane','Smith', 1, 33, 2, 2);

#Populate Doctor data
INSERT INTO 'Doctor' ('drID', 'drFirstName', 'drLastName', 'gender', 'patientID') VALUES
(1, 'Jerry','Martin', 1, 1);
INSERT INTO 'Doctor' ('drID', 'drFirstName', 'drLastName', 'gender', 'patientID') VALUES
(2, 'Alice','Turner', 1, 3);
INSERT INTO 'Doctor' ('drID', 'drFirstName', 'drLastName', 'gender', 'patientID') VALUES
(3, 'Felix','Jones', 1, 2);


#Populate Receptionist data
INSERT INTO 'Receptionist' ('recID', 'rFirstName', 'rLastName', 'gender', 'drID') VALUES
(1, 'Maureen','McDonald', 2, 1);
INSERT INTO 'Receptionist' ('recID', 'rFirstName', 'rLastName', 'gender', 'drID') VALUES
(2, 'Stephanie','Tate', 2, 2);
INSERT INTO 'Receptionist' ('recID', 'rFirstName', 'rLastName', 'gender', 'drID') VALUES
(3, 'Tanner','James', 1, 3);

#Populate Appointment data
INSERT INTO 'Appointment' ('apptID', 'apptDateTime', 'drID', 'patientID') VALUES
(1, '2019-02-23 05:00:00',1, 1);

#Populate WorksFor data
INSERT INTO 'WorksFor' ('recID', 'drID') VALUES
(1, 1);
INSERT INTO 'WorksFor' ('recID', 'drID') VALUES
(2, 2);
INSERT INTO 'WorksFor' ('recID', 'drID') VALUES
(3, 3);

#Populate Has data
INSERT INTO 'Has' ('patientID', 'drID') VALUES
(1, 1);
INSERT INTO 'Has' ('patientID', 'drID') VALUES
(2, 3);
INSERT INTO 'Has' ('patientID', 'drID') VALUES
(2, 3);



