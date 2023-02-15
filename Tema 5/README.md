# Guía breve Django

## Crear un proyecto nuevo
### Inicialización
```sh
$ django-admin startproject <nombre>
```

### Ejecutar el servidor
```sh
$ ./manage.py runserver
```

### Crear una app
```sh
$ ./manage.py startapp <nombre>
```

## Gestión
### Realizar migraciones sin aplicar
```sh
$ ./manage.py migrate
```

### Crear migraciones de modelos
```sh
$ ./manage.py makemigrations
```

### Incluir app en el proyecto (settings.py)
```python
INSTALLED_APPS = [
    '<nombre>.apps.<Nombre>Config',
    'django.contrib.admin',
    'django.contrib.auth',
    'django.contrib.contenttypes',
    'django.contrib.sessions',
    'django.contrib.messages',
    'django.contrib.staticfiles',
]
```

### Crear superusuario
```sh
./manage.py createsuperuser
```
### Integrar modelos en la zona admin (admin.py)
```python
from django.contrib import admin
from .models import *

admin.site.register(<Modelo>)
```