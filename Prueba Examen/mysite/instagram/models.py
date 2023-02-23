from django.db import models

# Create your models here.
class Post(models.Model):
    picture = models.ImageField(upload_to='posts')
    description = models.CharField(max_length=255)
    date = models.DateTimeField('date published')

    def __str__(self):
        return f"({self.date}) {self.description[0:25]}"


class Comment(models.Model):
    # Related_name para poder iterar con post.comments.all en details
    post = models.ForeignKey(Post, related_name='comments', on_delete=models.CASCADE)
    text = models.CharField(max_length=255)
    date = models.DateTimeField('date commented')

    def __str__(self):
        return f"({self.date}) {self.text[0:25]}"
