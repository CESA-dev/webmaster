#I/bin/bash

find . -type d -print0 | xargs -0 chmod 0755 # For directories
find . -type f -not -name "*.pl" -not -name "*.cgi" -not -name "*.sh" -print0 | xargs -0 chmod 0644 # For files
find . -type f -name "*.cgi" -print0 -o -name "*.pl" -print0 -o -name "*.sh" -print0 | xargs -0 chmod 0755 # For CGI/Scripts
