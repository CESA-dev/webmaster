
#!/bin/bash

rsync -Irlazh -e "ssh -i "$2 --omit-dir-times --progress --exclude-from=.gitignore --exclude=.git/ . $1


