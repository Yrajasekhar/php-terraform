<?php
popen('start cmd.exe @cmd /k"terraform init && echo yes | terraform apply"','r')
?>