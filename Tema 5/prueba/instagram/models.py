from django.db import models

class Post(models.Model):
    post_image = models.ImageField(upload_to='post_images')
    post_description = models.CharField(max_length=200)
    post_likes = models.IntegerField(default=0)
    pub_date = models.DateTimeField('Fecha de publicación')

    def __str__(self):
        return self.post_description

class Reply(models.Model):
    post = models.ForeignKey(Post, on_delete=models.CASCADE)
    reply_text = models.CharField(max_length=200)

    def __str__(self):
        return self.reply_text