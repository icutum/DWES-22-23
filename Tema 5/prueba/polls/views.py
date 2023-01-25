from django.shortcuts import render

# Create your views here.
from django.http import HttpResponse


def index(request):
    return HttpResponse("Hello, world. You're at the polls index.")

def holamundo(request):
    return HttpResponse("<p>Hola <b>Mario</b></p>")

def useragent(request):
    return HttpResponse(f"<p>Tu navegador es {request.META['HTTP_USER_AGENT']}</p>")