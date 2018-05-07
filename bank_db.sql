CREATE DATABASE  IF NOT EXISTS `bank`;
USE `bank`;


DROP TABLE IF EXISTS BankBranch;

CREATE TABLE BankBranch (
  branchName varchar(45) NOT NULL,
  branchId int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (branchId)
);

DROP TABLE IF EXISTS Account;

CREATE TABLE Account (
    accountName varchar(45) NOT NULL,
    accountId int(11) NOT NULL AUTO_INCREMENT,
    branchId int(11) NOT NULL,
    PRIMARY KEY (accountId),
    FOREIGN KEY (branchId) REFERENCES BankBranch(branchId)
);

DROP TABLE IF EXISTS Card;

CREATE TABLE Card (
    cardType char(1) NOT NULL,
    cardNum VARCHAR(45) NOT NULL,
    accountId int(11) NOT NULL,
    PRIMARY KEY (cardNum, cardType),
    FOREIGN KEY (accountId) REFERENCES Account(accountId)
)