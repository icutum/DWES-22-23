from django.urls import path
from . import views


app_name = 'incidencias'

urlpatterns = [
    path('', views.index, name='index'),
    path('listado/', views.listado, name='listado'),
    path('<int:estacion_id>/nueva/', views.nueva, name='nueva'),
    path('exito/', views.exito, name='exito'),
]