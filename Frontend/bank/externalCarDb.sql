CREATE DATABASE  IF NOT EXISTS `FakeRMS`;
USE `FakeRMS`;


DROP TABLE IF EXISTS CarList;

CREATE TABLE CarList
(
    rego varchar(45) NOT NULL,
    make varchar(45),
    model varchar(45),
    manufacturer varchar(45),
    petrol varchar(45),
    transmission varchar(45),
    year varchar(45),
    doors varchar(45),
    enginecc varchar(45),
    kms varchar(45),
    body varchar(45),
    PRIMARY KEY (rego)
);

DROP TABLE IF EXISTS LicenceList;

CREATE TABLE LicenceList
(
    licenceNum varchar(45) NOT NULL,
    firstName varchar(45),
    lastName varchar(45),
    DOB DATE, 
    gender char(1)
);

