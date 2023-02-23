from django.shortcuts import render, get_object_or_404
from django.http import HttpResponse, HttpResponseRedirect
from django.utils import timezone
from django.urls import reverse
from .models import *


def index(request):
    mensaje = 'Bienvenido a las incidencias del Metro de Madrid'
    return render(request, 'incidencias/index.html', {'mensaje': mensaje})

def listado(request):
    contexto = {
        'estaciones': Estacion.objects.all()
    }

    return render(request, 'incidencias/listado.html', contexto)

def nueva(request, estacion_id):
    estacion = get_object_or_404(Estacion, pk=estacion_id)

    texto_incidencia = request.POST.get('texto_incidencia', False)

    if texto_incidencia:
        incidencia = Incidencia(texto=texto_incidencia, fecha=timezone.now(), estacion=Estacion.objects.get(pk=estacion_id))
        incidencia.save()

        return HttpResponseRedirect(reverse('incidencias:exito'))
    else:
        contexto = {
            'estacion': estacion,
            'error': 'El campo está vacío'
        }
        return render(request, 'incidencias/nueva.html', contexto)

def exito(request):
    contexto = {
        'estaciones': Estacion.objects.all(),
        'mensaje_exito': 'Su incidencia ha sido dada de alta'
    }

    return render(request, 'incidencias/listado.html', contexto)