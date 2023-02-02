from django.shortcuts import render, get_object_or_404
from django.shortcuts import render

from .models import *

# Create your views here.
def index(request):
    return render(request, 'esports/index.html', {})

def detalle_equipo(request, nombre):
    equipo = get_object_or_404(Equipo, nombre=nombre)
    return render(request, 'esports/detalle_equipo.html', {nombre: nombre})

def detalle_juego(request, nombre):
    juego = get_object_or_404(Juegos, nombre=nombre)
    return render(request, 'esports/detalle_equipo.html', {nombre: nombre})

def detalle_genero(request, nombre):
    genero = get_object_or_404(Genero, nombre=nombre)
    return render(request, 'esports/detalle_equipo.html', {nombre: nombre})