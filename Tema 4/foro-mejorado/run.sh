#!/bin/bash

# Puertos
PUERTO_POR_DEFECTO=8080
PUERTO_MIN=1023
PUERTO_MAX=65536

# Textos de error
EJEMPLO_USO="\nUso: $0 [-p <puerto>]"

# Función para mostrar mensajes de error y terminar la ejecución
error() {
    echo -e "Error:\n$1"
    exit 1
}

# Bucle que itera por cada opción recibida a la llamada del script
while getopts ":p:" opcion; do
    case $opcion in
    # En caso de encontrar opción con argumento:
    p)
        if [[ $OPTARG -gt $PUERTO_MIN && $OPTARG -lt $PUERTO_MAX ]]; then
            puerto=$OPTARG
        else
            error "-$opcion: el puerto debe estar comprendido entre $PUERTO_MIN y $PUERTO_MAX"
        fi
        ;;

    # En cado de encontrar opción pero no argumento:
    :)
        error "-${OPTARG}: requiere un argumento. $EJEMPLO_USO"
        ;;

    # En caso de no encontrar una opción recogida en los parámetros:
    *)
        error "-${OPTARG}: opción no encontrada. $EJEMPLO_USO"
        ;;
    esac
done

# En caso de no haber pasado ninguna opcion a la llamada del script:
if [[ $OPTIND -eq 1 ]]; then
    puerto=$PUERTO_POR_DEFECTO
fi

# Elimina los parámetros procesados por getopts
# de los argumentos posicionales ($1, $2, $n...)
# para que no haya problemas a la hora de querer
# utilizarlos más adelante en el código
shift "$(($OPTIND-1))"

# Ejecución del servidor local
echo "Ejecutando servidor local en el puerto $puerto..."
php -S localhost:$puerto -t public