from django.db import models

CARPETA_NOTICIAS = 'noticias_imagenes'

# Create your models here.

class Noticia(models.Model):
    titulo = models.CharField(max_length=50)
    descripcion = models.CharField(max_length=1000)
    img1 = models.ImageField(upload_to=CARPETA_NOTICIAS)
    img2 = models.ImageField(upload_to=CARPETA_NOTICIAS, null=True, blank=True)
    img3 = models.ImageField(upload_to=CARPETA_NOTICIAS, null=True, blank=True)
    img4 = models.ImageField(upload_to=CARPETA_NOTICIAS, null=True, blank=True)
    img5 = models.ImageField(upload_to=CARPETA_NOTICIAS, null=True, blank=True)

    def __str__(self):
        return self.titulo