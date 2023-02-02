from django.db import models

from django.dispatch import receiver
from django.db.models.signals import pre_save
from prueba.utils import get_slug

class Post(models.Model):
    image = models.ImageField(upload_to='post_images')
    description = models.CharField(max_length=200)
    likes = models.IntegerField(default=0)
    pub_date = models.DateTimeField('Fecha de publicación')
    slug = models.SlugField(
        null=True,
        blank=True,
        unique=True,
    )

    def __str__(self):
        return self.description

@receiver(pre_save, sender=Post)
def slug_generator(sender, instance, *args, **kwargs):
    instance.slug = get_slug(sender, instance)


class Reply(models.Model):
    post = models.ForeignKey(Post, on_delete=models.CASCADE)
    reply_text = models.CharField(max_length=200)

    def __str__(self):
        return self.reply_text