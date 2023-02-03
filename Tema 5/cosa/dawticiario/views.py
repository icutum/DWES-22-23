from django.shortcuts import render, get_object_or_404
from django.views.generic import ListView
from django.views import View
from .models import *

APP_NAME = 'Dawticiario'

# Create your views here.
def index(request):
    noticias = Noticia.objects.all()
    contexto = {
        'titulo': APP_NAME,
        'noticias': noticias
    }
    return render(request, 'dawticiario/index.html', contexto)

def detalle(request, noticia):
    noticia = get_object_or_404(Noticia, id=noticia)
    contexto = {
        'titulo': APP_NAME,
        'noticia': noticia,
        'imagenes': [noticia.img2, noticia.img3, noticia.img4, noticia.img5]
    }
    return render(request, 'dawticiario/detalle.html', contexto)