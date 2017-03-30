#!/bin/bash


securityGroups=$(aws ec2 describe-security-groups | jq -r '.SecurityGroups[].GroupName' )
echo $securityGroups
for var in $securityGroups
do
  if test "$var" = "web"
  then
    echo "\n\nSecurity Group \"Web\" already exists\n\n"
    aws ec2 delete-security-group --group-name web
  fi
done
vpcId=$(aws ec2 describe-vpcs| jq -r '.Vpcs[0].VpcId')
GroupId=$(aws ec2 create-security-group --group-name web --description default --vpc-id $vpcId | jq -r '.GroupId')
aws ec2 authorize-security-group-ingress --group-id $GroupId --protocol tcp --port 80 --cidr 0.0.0.0/0 --source-group $GroupId
aws ec2 authorize-security-group-ingress --group-id $GroupId --protocol tcp --port 443 --cidr 0.0.0.0/0 --source-group $GroupId

