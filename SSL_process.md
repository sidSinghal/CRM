### SSL certificate installation

###Install ssl 
- this has been done in USERDATA

### Steps to generate CSR and custom key
1. Check if apache2 is running
    sudo service apache2 status
	
2. run the below command to generate a key
    sudo openssl genrsa -out custom.key 4096
	
3. make sure the key has restrictive permissions
    sudo chown root.root custom.key
Then 
    sudo chmod 600 custom.key
	
4. create a CSR from the generated custom key
    sudo openssl req -new -key custom.key -out csr.pem
Enter all the details that the system asks you for generating the SSL including country, city, organization etc.

5. provide the CSR to the CA for generating an SSL with DNS DCV as your validation option.

6. Once the CA provides the SSL(.crt and CA bundle), Create a CNAME record in Route53 with the provided host and target values for the CA to 
validate with the HOST being the Name in the CA record set and Target being the Value.

7. securely copy the .crt and CA-bundle file into the ssl Directory that you created in the instance.

8. make changes in the apache2.conf file with the following entries. Make sure that port 443 is open and is being Listened to. Set the below details as given
with the certificate paths and bundle paths.

##Listen 443

##<VirtualHost _default_:443>

##DocumentRoot "/var/www/html"
##ServerName neu-csye6225-spring2017-team-2_com
##SSLEngine on
##SSLCertificateFile "/ssl/neu-csye6225-spring2017-team-2_com.crt"
##SSLCertificateKeyFile "/ssl/custom.key"
##SSLCACertificateFile "/ssl/neu-csye6225-spring2017-team-2_com.ca-bundle"

##</VirtualHost>

