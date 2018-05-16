CREATE DATABASE  IF NOT EXISTS `bank`;
USE `bank`;


DROP TABLE IF EXISTS BankBranch;

CREATE TABLE BankBranch (
  branchName varchar(45) NOT NULL,
  bsb int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (bsb)
);

DROP TABLE IF EXISTS Account;

CREATE TABLE Account (
    accountName varchar(45) NOT NULL,
    accountId int(11) NOT NULL AUTO_INCREMENT,
    balance decimal(15, 2),
    bsb int(11) NOT NULL,
    PRIMARY KEY (accountId),
    FOREIGN KEY (bsb) REFERENCES BankBranch(bsb)
);

DROP TABLE IF EXISTS Card;

CREATE TABLE Card (
    cardType char(1) NOT NULL,
    cardNum VARCHAR(45) NOT NULL,
    cvv int(3),
    accountId int(11) NOT NULL,
    PRIMARY KEY (cardNum, cardType),
    FOREIGN KEY (accountId) REFERENCES Account(accountId)
)

INSERT INTO BankBranch VALUES ("Branch One", 111);
INSERT INTO BankBranch VALUES ("Branch Two", 222);

INSERT INTO Account VALUES ("Account One", 1, 100000.00, 111);
INSERT INTO Account VALUES ("Account Two", 2, 20.00, 222);

INSERT INTO Card VALUES ('v', "4000000000097", 123, 1);
INSERT INTO Card VALUES ('v', "4000000000071", 456, 2);