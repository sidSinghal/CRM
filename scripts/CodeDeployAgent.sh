sudo apt-get update
sudo apt-get install python-pip
sudo apt-get install ruby
sudo apt-get install wget
cd /home/ubuntu
wget https://bucket-name.s3.amazonaws.com/latest/install
chmod +x ./install
sudo ./install auto
sudo service codedeploy-agent status