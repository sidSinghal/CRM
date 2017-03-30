echo "Creating a new user"
aws iam create-user --user-name travis

echo "Providing Programmatic access"
aws iam create-access-key --user-name travis

echo "Attaching new policies for the user"
aws iam attach-user-policy --policy-arn arn:aws:iam::604969125055:policy/Travis-Upload-To-S3 --user-name travis
aws iam attach-user-policy --policy-arn arn:aws:iam::604969125055:policy/Travis-Code-Deploy --user-name travis

echo "Attaching policy AssumeContinuousDeliveryRoles for the user travis"
aws iam attach-user-policy --policy-arn arn:aws:iam::604969125055:policy/AssumeContinuousDeliveryRoles --user-name travis

echo "End of script"