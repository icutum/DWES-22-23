from django.urls import path

from . import views

urlpatterns = [
    path('', views.index, name='index'),
    path('<str:nombre>/', views.detalle_equipo, name='detalle equipo'),
    path('juego/<str:nombre>/', views.detalle_juego, name='detalle juego'),
    path('genero/<str:nombre>/', views.detalle_genero, name='detalle genero'),
]