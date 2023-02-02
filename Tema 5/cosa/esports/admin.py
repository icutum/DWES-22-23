from django.contrib import admin

from .models import Equipo, Genero, Juegos

# Register your models here.
admin.site.register(Equipo)
admin.site.register(Genero)
admin.site.register(Juegos)