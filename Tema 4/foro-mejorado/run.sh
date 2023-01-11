#!/bin/bash

if [[ -z $1 ]]; then
    PORT=8080
else
    PORT=$1
fi

echo "Ejecutando servidor local en el puerto $PORT..."
php -S localhost:$PORT -t public