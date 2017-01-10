#!/bin/bash

DIR="$( cd "$(dirname ""$( dirname "${BASH_SOURCE[0]}" )"")" && pwd )"

cd $DIR

echo "Setting Git pre-commit hook."

FILE=".git/hooks/pre-commit"

if [ ! -f "$FILE" ]
then
    ln -s $DIR/bin/git/pre-commit .git/hooks/pre-commit
fi

echo "Setup complete."