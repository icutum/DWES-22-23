from django.contrib import admin
from .models import *
# Register your models here.


# Para añadir estaciones dentro de las líneas
class EstacionInline(admin.StackedInline):
    model = Estacion
    extra = 3

# Campos de Línea
class LineaAdmin(admin.ModelAdmin):
    fieldsets = [
        (None,               {'fields': ['nombre']}),
        ('Varios', {'fields': ['color', 'distancia']}),
    ]
    inlines = [EstacionInline]

class IncidenciaAdmin(admin.ModelAdmin):
    list_display = ('texto', 'fecha')
    list_filter = ['fecha']

admin.site.register(Incidencia)
admin.site.register(Linea, LineaAdmin)