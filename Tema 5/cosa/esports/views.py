from django.shortcuts import render, get_object_or_404
from django.shortcuts import render

from .models import *

# Create your views here.
def index(request):
    equipos = Equipo.objects.all()
    contexto = {
        'titulo': 'eSports',
        'equipos': equipos
    }
    return render(request, 'esports/index.html', contexto)

def detalle_equipo(request, equipo):
    equipo = get_object_or_404(Equipo, nombre=equipo)
    contexto = {
        'equipo': equipo,
    }
    return render(request, 'esports/detalle_equipo.html', contexto)

def detalle_juego(request, juego):
    juego = get_object_or_404(Juegos, nombre=juego)
    contexto = {
        'juego': juego,
    }
    return render(request, 'esports/detalle_juego.html', contexto)

def detalle_genero(request, genero):
    genero = get_object_or_404(Genero, nombre=genero)
    return render(request, 'esports/detalle_genero.html', {'genero': genero})