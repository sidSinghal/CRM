webId=$(aws ec2 describe-security-groups --group-name web | jq -r '.SecurityGroups[].GroupId')

aws ec2 run-instances --image-id ami-f4cc1de2 --count 1 --instance-type t2.micro --associate-public-ip-address \
--security-group-ids $webId \
--block-device-mappings \
'[{"DeviceName":"/dev/sdb","Ebs":{"VolumeSize":10,"DeleteOnTermination":true,"VolumeType":"standard"}}]' \
--key-name MyKeyPair --user-data file://UserData.sh

echo -e "\n\n\n\n Sleeping for 30 seconds"
sleep 30 
echo -n "." 
clear
echo "Your Public IP Address : "
aws ec2 describe-instances --filters "Name=instance-state-name,Values=running" | jq -r ".Reservations[0].Instances[0].PublicIpAddress"
instanceId=$(aws ec2 describe-instances --filters "Name=instance-state-name,Values=running" | jq -r ".Reservations[0].Instances[0].InstanceId")

echo "Associating an IAM instance profile named CodeDeployEC2ServiceRole"
aws ec2 associate-iam-instance-profile --instance-id $instanceId --iam-instance-profile Name=CodeDeployEC2InstanceProfile

echo "Tagging the instance with KEY and VALUE"
aws ec2 create-tags --resources $instanceId --tags Key=team2,Value=crm

# echo "Command To get the name of the IAM instance profile you created for the IAM role named CodeDeployEC2ServiceRole"
# aws iam list-instance-profiles-for-role --role-name CodeDeployEC2ServiceRole --query "InstanceProfiles[0].InstanceProfileName" --output text


