from django.urls import path

from . import views

urlpatterns = [
    path('', views.index, name='index'),
    path('<str:equipo>/', views.detalle_equipo, name='detalle equipo'),
    path('juego/<str:juego>/', views.detalle_juego, name='detalle juego'),
    path('genero/<str:genero>/', views.detalle_genero, name='detalle genero'),
]