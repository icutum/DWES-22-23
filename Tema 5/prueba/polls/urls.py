from django.urls import path

from . import views

urlpatterns = [
    path('', views.index, name='index'),
    path('holamundo/', views.holamundo, name='holamundo'),
    path('useragent/', views.useragent, name='useragent')
]