#!/bin/bash

rsync -Irlazh --omit-dir-times --progress --exclude-from=.gitignore --exclude=.git/ . $1





