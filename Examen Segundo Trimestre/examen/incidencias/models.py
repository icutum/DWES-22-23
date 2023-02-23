from django.db import models

# Create your models here.
class Linea(models.Model):
    nombre = models.CharField(max_length=50)
    color = models.CharField(max_length=15)
    distancia = models.IntegerField()

    def __str__(self):
        return self.nombre

class Estacion(models.Model):
    nombre = models.CharField(max_length=50)
    linea = models.ForeignKey(Linea, on_delete=models.CASCADE)

    def __str__(self):
        return self.nombre

class Incidencia(models.Model):
    texto = models.CharField(max_length=255)
    fecha = models.DateTimeField('fecha y hora')
    estacion = models.ForeignKey(Estacion, on_delete=models.CASCADE)

    def __str__(self):
        return f"{self.estacion.nombre} ({self.estacion.linea.nombre}) {self.texto}"
