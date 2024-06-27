#!/bin/sh
set -e

mongosh <<EOF
use $MONGODB_DATABASE_DB

db.createUser({
  user: '$MONGODB_DATABASE_USER',
  pwd: '$MONGODB_DATABASE_PASSWORD',
  roles: [{
    role: 'readWrite',
    db: '$MONGODB_DATABASE_DB'
  },
  {
    role: 'clusterMonitor',
    db: 'admin',
  }]
})
EOF