from django.urls import path

from . import views

# Namespace
app_name = 'instagram'

urlpatterns = [
    path('', views.index, name='index'),
    path('<int:post_id>/detail/', views.detail, name='detail'),
]