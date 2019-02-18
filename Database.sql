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
  CHECK ('pType' > 0 and  'pType' < 3),
  CHECK ('gender' > 0 and  'gender' < 3),
  PRIMARY KEY ('patientID'),
  PRIMARY KEY ('pFirstName', 'pLastName')
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
  CHECK ('Classification' > 0 and 'Classification' < 5),
  PRIMARY KEY ('recID'),
  PRIMARY KEY ('rFirstName', 'rLastName'),
  FOREIGN KEY ('drID') REFERENCES 'Doctor'('drID') ON DELETE CASCADE
);
