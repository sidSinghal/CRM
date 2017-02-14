# Project Details

## Project Design Document

###Team Members
Sno. | Name | Email
---- | ------------ | -------------
1    | Siddhant Singhal      | singhal.si@husky.neu.edu
2    | Karthik Chandrashekar | chandrashekar.k@husky.neu.edu
3    | Sneha Malshetti       | malshetti.s@husky.neu.edu
4    | Raseswari Das         | das.r@husky.neu.edu

###Objective

#####Our Project would cover certain aspects of the CRM functionalities under the Order to Cash Process. We would only be looking into the Sales side of the functionality (Leads, Accounts, Opportunities, Contacts, Sales Users and Administrators). This type of WebApplication is used in every industry to accommodate the sales to billing aspect of the company. We can use examples such as SIEBEL which is a legacy system now and Salesforce which is comparatively a newer platform.

###Functionalities
1. Login
2. Logout
3. User management
4. Accounts management
5. Contacts Management
6. Leads Management
7. Opportunity Management
8. Sales Users and Administrator Management
9. Products

###Languages
1. Front end development (HTML, CSS and JavaScript)
2. Database (Oracle and MongoDB)
3. Back end development (Java/Python)
4. Data exchange using JSON and AJAX

###Tools Being Used
1. IntelliJ.
2. SQL Management Studio/SQL Server.
3. Mongo DB.
4. STS.
5. AWS For hosting.

###Authentication/Login Test Cases.
#####Functionality
1.	Does the login form work successfully?
2.	Does the logout link redirects back to the login screen? 
3.	Forgot password link should navigate to the forgot password page.
4.	Click on back button on the browser, Does that work as expected?
5.	How are errors handled and displayed?
#####Security
1.	Hashing of password field?
2.	Does the password decipher after being copied?
3.	copy and paste the password?
4.	is there any minimum password length?
5.	is the form giving away security information if the source is viewed/Inspect element?
6.	URL Manipulation?
7.	Multiple windows of the same account/multiple logins of the same account?
8.	Cookies allowed?



###Link to Travis-CI
This is [Travis-CI](https://travis-ci.com/el9sid/neu-csye6225-4 "Travis-Team_2") link.

###Assignment 4:

1.	Count of Sales users and total users are under Home  Dashboard
2.	Contacts is under Live on Additional Pages
3.	Created Opportunity Page
4.	Created Accounts Page
5.	Created Products Page
6.	Created Contact Page
7.	Created Lead Page
8.	Created Users Page

IAM Alias

###https://neu-csye6225-spring2017-team-2.signin.aws.amazon.com/console

###Shell Script


#####Create Instance

aws ec2 run-instances --image-id ami-5ac2cd4d --count 1 --instance-type t2.micro --subnet-id subnet-db46c9e7 --associate-public-ip-address --enable-api-termination

#####Root Volume and Type

aws ec2 run-instances --image-id ami-5ac2cd4d --block-device-mappings '[{"DeviceName":"/dev/sdb","Ebs":{"VolumeSize":10,"DeleteOnTermination":true,"VolumeType":"standard"}}]'
