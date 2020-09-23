<?php
//variables
$dir = "project1";
$file_to_write = 'instance.tf';
$phpcmd = "<?php
popen('start cmd.exe @cmd /k\"terraform init && echo yes | terraform apply\"','r')
?>";
$php_file_to_write = 'phpcmd.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $ami_id = $_POST["ami_id"];
    $instance_type = $_POST["instance_type"];
    $no_vms = $_POST["no_vms"];
    $sub_id = $_POST["sub_id"];
    $pem_key_name = $_POST["pem_key_name"];
    $name_tag = $_POST["Name_tag"];

    $instance = 'provider "aws" {
        access_key = "your-access-key"
        secret_key = "your-secret-key"
        region = "us-east-1"
      }
      
    #server
    resource "aws_instance" "WebServer" {
    ami = "'.$ami_id.'"
    instance_type = "'.$instance_type.'"
    count         = "'.$no_vms.'"
    subnet_id     = "'.$sub_id.'"
    key_name      = "'.$pem_key_name.'"
    tags = {
        Name = "'.$name_tag.'"
    }
    }

    output "publicip_Web" {
    value       = aws_instance.WebServer.*.public_ip
    description = "The public IP of the web server"
    }';

    //Writer object    
    if( is_dir($dir) === false )
    {
        mkdir($dir);
    }
    #terraform file
    $file = fopen($dir . '/' . $file_to_write,"w");
    fwrite($file, $instance);
    fclose($file);

    #php exec file
    $file = fopen($dir . '/' . $php_file_to_write,"w");
    fwrite($file, $phpcmd);
    fclose($file);

    #Print All values
    
    #echo "<script>alert('Log alert!')</script>";
    echo "AMI ID:  <b>". $ami_id."</b><br/>";
    echo "Instance Type:  <b>". $instance_type."</b><br/>";
    echo "Number of VM's:  <b>". $no_vms."</b><br/>";
    echo "Subnet ID:  <b>". $sub_id."</b><br/>";
    echo "PEM Key Name:  <b>". $pem_key_name . ".pem </b><br/>";
    echo "Name Tag:  <b>". $name_tag."</b><br/>";
?>
    <br/>
    <input type='button' onclick="window.location.href='http://localhost/terraform/project1/phpcmd.php';" value='Launch Instance(s)' />
<?php

} else {
    echo "nnnnnnnnnnn";
}

?>