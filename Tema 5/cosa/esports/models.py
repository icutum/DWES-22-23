from django.db import models

# Create your models here.
class Equipo(models.Model):
    nombre = models.CharField(max_length=25)
    descripcion = models.TextField(max_length=200)
    año = models.DateTimeField()
    foto = models.ImageField(upload_to='equipos', null=True)

    def __str__(self):
        return f"{self.nombre} ({self.año})"

class Genero(models.Model):
    nombre = models.CharField(max_length=25)
    descripcion = models.TextField(max_length=200)

    def __str__(self):
        return self.nombre

class Juegos(models.Model):
    nombre = models.CharField(max_length=25)
    genero = models.ForeignKey(Genero, on_delete=models.SET_NULL, null=True)
    descripcion = models.TextField(max_length=200)
    año = models.DateTimeField()
    equipos = models.ManyToManyField(Equipo, related_name='juegos')

    def __str__(self):
        return f"{self.nombre} ({self.genero}) ({self.año})"
