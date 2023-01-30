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
        max_length=50
    )

    # @receiver(post_save, sender=Model)
    # def _post_save_receiver(sender, **kwargs):

    # def set_slug(self, slug = None):
    #     if slug is not None:

    #     else:
    #         new_slug = slugify(self.description)


    #     if Post.objects.check(new_slug):
    #         new_slug.join()
    #         return set_slug(self, new_slug)

    def __str__(self):
        return self.description

@receiver(pre_save, sender=Post)
def slug_generator(sender, instance, *args, **kwargs):
    # acortar el slug a los caracteres del max_length
    instance.slug = get_slug(instance)


class Reply(models.Model):
    post = models.ForeignKey(Post, on_delete=models.CASCADE)
    reply_text = models.CharField(max_length=200)

    def __str__(self):
        return self.reply_text