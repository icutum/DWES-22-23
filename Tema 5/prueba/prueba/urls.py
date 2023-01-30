from django.contrib import admin
from django.urls import include, path

urlpatterns = [
    path('polls/', include('polls.urls')),
    path('instagram/', include('instagram.urls')),
    path('admin/', admin.site.urls),
]