#!/bin/bash

cp -R "./common/style.css" "./mitigated/"
sqlite3 mitigated/database.db < common/database.sql
php -S localhost:8001 -t "./mitigated"
