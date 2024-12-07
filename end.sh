#!/bin/bash

docker stop vulnerable mitigated
docker rm vulnerable mitigated

rm ./vulnerable/{database.db,login.php,logout.php,register.php,templates.php,*.css}
rm ./mitigated/{database.db,login.php,logout.php,register.php,templates.php,*.css}
