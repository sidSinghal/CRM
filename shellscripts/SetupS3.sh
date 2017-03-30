bucketName="code-deploy2.neu-csye6225-spring2017-team-2.com"
bucketlist=$(aws s3api list-buckets | jq -r '.Buckets[].Name')
for var in $bucketlist
do
  if test "$var" = $bucketName
  then
    echo "Name Already Exists in your Account, Please Delete that instance before creating this Bucket again."
    echo -e "\n\n\t----------------------\n\tScript will exit now!!\n\t----------------------\n"
    exit
  fi
done
output=$(aws s3api create-bucket --bucket $bucketName --region us-east-1 2>/dev/null)
if [ $? -ne 0 ]
then
  echo "The name has been chosen by another user, Please choose another name."
  echo -e "\n\n\t----------------------\n\tScript will exit now!!\n\t----------------------\n"
  exit
fi

aws s3api put-bucket-versioning --versioning-configuration Status=Enabled --bucket $bucketName
aws s3api put-bucket-tagging --bucket $bucketName --tagging file://tags.json
aws s3api put-bucket-acl --bucket $bucketName --grant-read uri=http://acs.amazonaws.com/groups/global/AllUsers
aws s3api put-bucket-policy --bucket $bucketName --policy file://S3MyBucketPolicy.json

echo -e "\n\nBucket succesfully created! \n\n\t--------------\n\tEND OF SCRIPT!\n\t--------------\n"
