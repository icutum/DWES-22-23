from django.urls import path
# from dawticiario.views import DetalleListView

from . import views

urlpatterns = [
    path('', views.index, name='index'),
    path('<int:noticia>/', views.detalle, name='detalle'),
]