# Design Document

# TEAM 2 (Mavericks)
















CRM (Customer Relationship Manager)
Design Document
By
Siddanth Singhal
Sneha Malshetti
Raseswari Das
Karthik Chandrashekar

 (02/22/2017)


# 1.	INTRODUCTION

1.1 Purpose
This Design Document describes the architecture and specifications for the application that is being built based on the CRM functionality.

1.2 Scope
The goal of this project is to understand and build on the AWS cloud and host applications on the cloud with the needed usability and settings required for best performance of a web application. This project is intended to understand the working and configuration of an application on the cloud.

1.3 Definitions and Acronyms
1. AWS – Amazon Web Services
2. JSP-  Java server Pages
3. HTML – Hyper Text mark-up Language
4. CRM- Customer relationship manager
5. SSH- Secure Shell
6. JDBC – Java Database connectivity
7. json – java script object notation

# Architecture Diagram


# IAM Alias
(https://neu-csye6225-spring2017-team-2.signin.aws.amazon.com/console)

# Database Queries

Query 1:
CREATE TABLE `contact` (
 `contactId` int(10) unsigned NOT NULL AUTO_INCREMENT,
 `ContactFirstName` varchar(45) DEFAULT NULL,
 `ContactLastName` varchar(45) DEFAULT NULL,
 `AccountID` int(11) DEFAULT NULL,
 `Account Name` varchar(45) DEFAULT NULL,
 `EmailID` varchar(100) DEFAULT NULL,
 `Status` varchar(45) DEFAULT NULL,
 PRIMARY KEY (`contactId`),
 UNIQUE KEY `contactId_UNIQUE` (`contactId`)
) ENGINE=InnoDB AUTO_INCREMENT=10012 DEFAULT CHARSET=utf8;

Query 2:
CREATE TABLE `account` (
 `AccountID` int(10) unsigned NOT NULL AUTO_INCREMENT,
 `AccountName` varchar(45) DEFAULT NULL,
 `AccountDescription` varchar(100) DEFAULT NULL,
 PRIMARY KEY (`AccountID`),
 UNIQUE KEY `AccountID_UNIQUE` (`AccountID`)
) ENGINE=InnoDB AUTO_INCREMENT=1011 DEFAULT CHARSET=utf8;

Query 3:
CREATE TABLE `product` (
  `ProductId` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ProductName` varchar(45) NOT NULL,
  `Description` longtext,
  `Cost` int(11) DEFAULT NULL,
  PRIMARY KEY (`ProductId`),
  UNIQUE KEY `ProductId_UNIQUE` (`ProductId`)

Query 4:
CREATE TABLE `opportunities` (
  `OpportinityID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `OpportunityName` varchar(45) DEFAULT NULL,
  `AccountID` int(10) unsigned DEFAULT NULL,
  `LeadID` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`OpportinityID`),
  UNIQUE KEY `OpportinityID_UNIQUE` (`OpportinityID`),
  KEY `leadidfk_idx` (`LeadID`),
  KEY `acctidfk_idx` (`AccountID`),
  CONSTRAINT `acctidfk` FOREIGN KEY (`AccountID`) REFERENCES `account` (`AccountID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `leadidfk` FOREIGN KEY (`LeadID`) REFERENCES `leads` (`LeadID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=10004 DEFAULT CHARSET=utf8;

Query 5:
CREATE TABLE `leads` (
  `LeadID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `LeadFirstName` varchar(45) NOT NULL,
  `LeadLastName` varchar(45) NOT NULL,
  `AccountID` int(10) unsigned DEFAULT NULL,
  `ProductID` int(10) unsigned DEFAULT NULL,
  `Status` varchar(45) DEFAULT NULL,
  `Phonenumber` varchar(20) DEFAULT NULL,
  `Lead_opportunity` varchar(45) NOT NULL,
  PRIMARY KEY (`LeadID`),
  UNIQUE KEY `idLeads_UNIQUE` (`LeadID`),
  KEY `acctidfk_idx` (`AccountID`),
  KEY `prodidfk_idx` (`ProductID`)
) ENGINE=InnoDB AUTO_INCREMENT=10011 DEFAULT CHARSET=utf8;

Tables
Account