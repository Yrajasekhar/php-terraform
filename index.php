<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terraform</title>
    <style>
        .textbox{
            height: 25px;
            border-style: solid;
            border-width: 1px;
            border-color: #000;
            border-radius: 50px;
        }
    </style>
</head>
<body>
    <form action="/terraform/writer.php" method="post">
    
    <br/>
    <lable>AMI_ID </lable> <br/>
    <input type="text" class="textbox" placeholder="AMI_ID" name="ami_id" id="">
    <br/><br/>
    <lable>Instance Type </lable> <br/>
    <input type="text" class="textbox" placeholder="Instance Type" name="instance_type" id="">
    <br/><br/>
    <lable>Number of VM's </lable> <br/>
    <input type="text" class="textbox" placeholder="Number of VM's" name="no_vms" id="">
    <br/><br/>
    <lable>Subnet ID </lable> <br/>
    <input type="text" class="textbox" placeholder="Subnet ID" name="sub_id" id="">
    <br/><br/>
    <lable>PEM Key Name </lable> <br/>
    <input type="text" class="textbox" placeholder="PEM Key Name" name="pem_key_name" id="">
    <br/><br/>
    <lable>Name Tag </lable> <br/>
    <input type="text" class="textbox" placeholder="Name Tag" name="Name_tag" id="">

    <!-- <textarea name="comment" rows="5" cols="40"></textarea> -->
        <br/><br/>
    <input type="submit" value="Submit"/>
    </form>
    
</body>
</html>