# Generated by Django 4.1.5 on 2023-02-02 18:40

from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('esports', '0001_initial'),
    ]

    operations = [
        migrations.AddField(
            model_name='equipo',
            name='foto',
            field=models.ImageField(null=True, upload_to='equipos'),
        ),
        migrations.AlterField(
            model_name='juegos',
            name='equipos',
            field=models.ManyToManyField(related_name='juegos', to='esports.equipo'),
        ),
    ]
