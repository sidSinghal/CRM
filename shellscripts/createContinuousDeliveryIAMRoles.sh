echo "Beginning of script/Creating IAM Roles"

echo "Creating Role CodeDeployEC2ServiceRole"
aws iam create-role --role-name CodeDeployEC2ServiceRole --assume-role-policy-document file://MyRole.json

echo "Attaching policy CodeDeploy-EC2-S3 to CodeDeployEC2ServiceRole"
aws iam attach-role-policy --role-name CodeDeployEC2ServiceRole --policy-arn arn:aws:iam::604969125055:policy/CodeDeploy-EC2-S3
aws iam attach-role-policy --role-name CodeDeployEC2ServiceRole --policy-arn arn:aws:iam::aws:policy/service-role/AWSCodeDeployRole

echo "Creating Role CodeDeployServiceRole"
aws iam create-role --role-name CodeDeployServiceRole --assume-role-policy-document file://MyRole.json

echo "Attaching policy AWSCodeDeployRole to CodeDeployServiceRole"
aws iam attach-role-policy --role-name CodeDeployServiceRole --policy-arn arn:aws:iam::aws:policy/service-role/AWSCodeDeployRole


echo "Creating required policy AssumeContinuousDeliveryRoles"
aws iam create-policy --policy-name AssumeContinuousDeliveryRoles --policy-document file://AssumeRoles.json

echo "Creating an IAM instance profile named CodeDeployEC2InstanceProfile"
# aws iam remove-role-from-instance-profile --instance-profile-name CodeDeployEC2InstanceProfile --role-name CodeDeployEC2ServiceRole
aws iam create-instance-profile --instance-profile-name CodeDeployEC2InstanceProfile
aws iam add-role-to-instance-profile --instance-profile-name CodeDeployEC2InstanceProfile --role-name CodeDeployEC2ServiceRole

echo "End of Script"

