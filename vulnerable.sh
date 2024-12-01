#!/bin/bash

cp -R "./common/style.css" "./vulnerable/"
sqlite3 vulnerable/database.db < common/database.sql
php -S localhost:8000 -t "./vulnerable"
