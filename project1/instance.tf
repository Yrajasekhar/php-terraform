provider "aws" {
        access_key = "AKIA4QRUYN5IH3Y4V2ED"
        secret_key = "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"
        region = "us-east-1"
      }
      
    #server
    resource "aws_instance" "WebServer" {
    ami = "ami-0b898040803850657"
    instance_type = "t2.micro"
    count         = "2"
    subnet_id     = "subnet-06a74659"
    key_name      = "speedcloud"
    tags = {
        Name = "Rajasekhar Server"
    }
    }

    output "publicip_Web" {
    value       = aws_instance.WebServer.*.public_ip
    description = "The public IP of the web server"
    }