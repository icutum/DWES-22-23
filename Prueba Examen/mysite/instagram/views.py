from django.utils import timezone
from django.http import HttpResponse, HttpResponseRedirect
from django.shortcuts import get_object_or_404, render
from django.urls import reverse

from .models import Post, Comment

# Create your views here.
def index(request):
    posts = Post.objects.all()
    return render(request, 'instagram/index.html', {'posts': posts})

def detail(request, post_id):
    post = get_object_or_404(Post, pk=post_id)

    text = request.POST.get('comment', False)
    if text:
        comment = Comment(post=Post.objects.get(pk=post_id),text=text,date=timezone.now())
        comment.save()

        # Redirige para limpiar el POST
        return HttpResponseRedirect(reverse('instagram:detail', args=(post.id,)))

    return render(request, 'instagram/detail.html', {'post': post})