# Project Details

## Project Design Document

## Status
[![Build Status](https://travis-ci.com/el9sid/neu-csye6225-4.svg?token=idTvFK8AtkxesR4Ko7vt&branch=master)](https://travis-ci.com/el9sid/neu-csye6225-4)

### Application Link: https://neu-csye6225-spring2017-team-2.com/

### Team Members
Sno. | Name | Email
---- | ------------ | -------------
1    | Siddhant Singhal      | singhal.si@husky.neu.edu
2    | Karthik Chandrashekar | chandrashekar.k@husky.neu.edu
3    | Sneha Malshetti       | malshetti.s@husky.neu.edu
4    | Raseswari Das         | das.r@husky.neu.edu
 
### Objective

##### Our Project would cover certain aspects of the CRM functionalities under the Order to Cash Process. We would only be looking into the Sales side of the functionality (Leads, Accounts, Opportunities, Contacts, Sales Users and Administrators). This type of WebApplication is used in every industry to accommodate the sales to billing aspect of the company. We can use examples such as SIEBEL which is a legacy system now and Salesforce which is comparatively a newer platform.

### Functionalities
1. Login
2. Logout
3. Client Management
4. Project Management
5. Sales Users and Administrator Management
6. Products

### Languages
1. Front end development (HTML, CSS and JavaScript)
2. Database (MySQL)
3. Back end development (PHP)

### Tools Being Used
1. IntelliJ
2. MySQL
3. AWS For hosting
4. PHPUnit for unit test cases


### Authentication/Login Test Cases
##### Functionality
1.	Does the login form work successfully?
2.	Does the logout link redirect back to the login screen? 
3.	Forgot password link should navigate to the forgot password page
4.	Click on back button on the browser, does that work as expected?
5.	How are errors handled and displayed?
##### Security
1.	Hashing of password field?
2.	Does the password decipher after being copied?
3.	Copy and paste the password?
4.	Is there any minimum password length?
5.	Is the form giving away security information if the source is viewed/Inspect element?
6.	URL Manipulation?
7.	Multiple windows of the same account/multiple logins of the same account?
8.	Cookies allowed?


### Link to Travis-CI
This is [Travis-CI](https://travis-ci.com/el9sid/neu-csye6225-4 "Travis-Team_2") link.

### Assignment 4:
1.	Count of Sales users and total users are under Home Dashboard
2.	Contacts is under Live on Additional Pages
3.	Created Projects Form Page
4.  Created Users Form Page
5. Create Contact form page

### Assignment 5:
1.	Created Opportunity View Page
3.	Created Products View Page
4.	Created Contact View Page
6.	Created Users View Page
7.	Created Login Page

### Assignment 6 (Shell Scripts Updated):
1. setupDbSecurityGroup.sh
2. setupS3.sh
3. setupWebSecurityGroup.sh 
4. launchEC2Instance.sh
5. launchMysqlRdsInstance.sh
6. createDynamoTable.sh

### Assignment 7:
#### Shell Scripts
1. Created IAM Policies
2. Created Travis user
3. Created IAM Roles
4. Updated launchEC2Instance Script with the required IAM roles and user data
5. Completed Setup of S3 bucket for Code Deploy
6. Created Script to Create Code Deploy Application
7. Created TravisCI and App Spec Config files

### Assignment 8:
#### Application Development
1. Checked validations on all pages
2. Checked that all the pages are redirected correctly
#### Securing Infrastructure
1. Added SSL certificate protection to the web application
2. setup-and-configure-ssl.md file was created
#### Implement Password Reset (Forgotten Password)
1. Checked if the Email ID Entered exists in the database
2. Set up the AWS Simple Email Service
