#!/bin/bash

# Puertos
PUERTO_POR_DEFECTO=8080
PUERTO_MIN=1023
PUERTO_MAX=65536

# Directorio
DIRECTORIO_POR_DEFECTO="public"

# Texto de ejemplo de uso
EJEMPLO_USO="\nUso: $0 [-p <puerto> | -d <directorio>]"

# Función para mostrar mensajes de error y terminar la ejecución
error() {
    echo -e "Error:\n$1"
    exit 1
}

# Función de la opción -p
obtener_puerto() {
    if [[ $OPTARG -gt $PUERTO_MIN && $OPTARG -lt $PUERTO_MAX ]]; then
        puerto=$OPTARG
    else
        error "-$opcion: el puerto debe estar comprendido entre $PUERTO_MIN y $PUERTO_MAX"
    fi
}

# Función de la opción -d
obtener_directorio() {
    for d in */; do
        if [[ $d == "$OPTARG/" ]]; then
            directorio=$d
            return
        fi
    done

    error "-$opcion: el directorio '$OPTARG' no existe"
}

# Bucle que itera por cada opción recibida a la llamada del script
while getopts ":p:d:" opcion; do
    case $opcion in
    # En caso de encontrar opción con argumento:
    p)
        obtener_puerto
        ;;

    d)
        obtener_directorio
        ;;

    # En cado de encontrar opción pero no argumento:
    :)
        error "-${OPTARG}: requiere un argumento. $EJEMPLO_USO"
        ;;

    # En caso de encontrar una opción que no esté recogida en los parámetros:
    *)
        error "-${OPTARG}: opción no encontrada. $EJEMPLO_USO"
        ;;

    esac
done

# Elimina los parámetros procesados por getopts
# de los argumentos posicionales ($1, $2, $n...)
# para que no haya problemas a la hora de querer
# utilizarlos más adelante en el código
shift "$(($OPTIND-1))"

# En caso de que alguna variable no haya sido pasada
# por parámetro, se le asigna el valor por defecto:
puerto="${puerto=$PUERTO_POR_DEFECTO}"
directorio="${directorio=$DIRECTORIO_POR_DEFECTO}"

# Ejecución del servidor local
echo "Ejecutando servidor local en el puerto $puerto y en el directorio $directorio..."
php -S localhost:$puerto -t $directorio