echo "Beginning of script/Removing policies"
aws iam delete-policy --policy-arn arn:aws:iam::604969125055:policy/CodeDeploy-EC2-S3
aws iam delete-policy --policy-arn arn:aws:iam::604969125055:policy/Travis-Upload-To-S3
aws iam delete-policy --policy-arn arn:aws:iam::604969125055:policy/Travis-Code-Deploy
echo "End of script"
