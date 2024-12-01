#!/bin/bash

cp ./common/.htaccess ./vulnerable/
cp ./common/*.php ./vulnerable/
cp ./common/*.css ./vulnerable/
sqlite3 vulnerable/database.db < common/database.sql
php -S localhost:8000 -t "./vulnerable"
