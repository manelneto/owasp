#!/bin/bash

cp ./common/.htaccess ./mitigated/
cp ./common/*.php ./mitigated/
cp ./common/*.css ./mitigated/
sqlite3 mitigated/database.db < common/database.sql
php -S localhost:8001 -t "./mitigated"
