#!/usr/bin/env bash

# read the environment file
envfile=.env
[ $# -ge 1 -a "$1" = "testing" ] && {
    envfile=.env.testing
}
. $envfile

[ $# -eq 2 ] && {
    DB_HOST=$2
}

PGUSER=postgres
PGPASS=

[ "$APP_ENV" != "testing" ] && {
    read -p 'DB Admin User: ' dbuser
    [ "$dbuser" != "" ] && {
        PGUSER=$dbuser
        read -sp 'Password: ' dbpass
        PGPASS=$dbpass
        echo ""
    }
}

export PGPASSWORD=$PGPASS

# does the database role already exists
exists=$( psql -h $DB_HOST -p $DB_PORT -U "$PGUSER" -tAc "select count(*) from pg_user where usename = '$DB_USERNAME'" )
[ $exists -eq 0 ] && {
    psql -h $DB_HOST -p $DB_PORT -U "$PGUSER" -qc "create role \"$DB_USERNAME\" with createdb login password '$DB_PASSWORD'"
}

# create the database if it does not exists
exists=$( psql -h $DB_HOST -p $DB_PORT -U "$PGUSER" -tAc "select count(*) from pg_database where datname = '$DB_DATABASE'" )
[ $exists -eq 0 ] && {
    psql -h $DB_HOST -p $DB_PORT -U "$PGUSER" -qc "create database \"$DB_DATABASE\""
    psql -h $DB_HOST -p $DB_PORT -U "$PGUSER" -qc "alter database \"$DB_DATABASE\" owner to \"$DB_USERNAME\""
}

export PGPASSWORD=
