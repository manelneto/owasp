#!/bin/bash

cp ./common/*.php ./vulnerable/
cp ./common/*.css ./vulnerable/
sqlite3 vulnerable/database.db < common/database.sql

cp ./common/*.php ./mitigated/
cp ./common/*.css ./mitigated/
sqlite3 mitigated/database.db < common/database.sql

docker-compose up --build -d
