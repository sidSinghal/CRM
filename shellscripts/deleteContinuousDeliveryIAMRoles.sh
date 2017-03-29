echo "Beginning of the script"

roleList=('CodeDeployEC2ServiceRole' 'CodeDeployServiceRole')

for roleName in ${roleList[@]}
do
	echo -e "\nDetaching all role policies for role $roleName"
	policyList=$(aws iam list-attached-role-policies --role-name $roleName | jq -r ".AttachedPolicies[].PolicyArn")
	for policy in $policyList
	do
	    aws iam detach-role-policy --role-name $roleName --policy-arn $policy
	done

	echo -e "\nDeleting role $roleName"
	aws iam delete-role --role-name $roleName
done

policyArn='arn:aws:iam::604969125055:policy/AssumeContinuousDeliveryRoles'
policyName='AssumeContinuousDeliveryRoles'

userList=$(aws iam list-entities-for-policy --policy-arn $policyArn | jq -r ".PolicyUsers[].UserName")
for userName in $userList
do
	echo -e "\nDetaching policy $policyName from user $userName"
    aws iam detach-user-policy --user-name $userName --policy-arn $policyArn
done

echo -e "\nDeleting policy $policyName"
aws iam delete-policy --policy-arn $policyArn

echo -e "\nEnding of the script"