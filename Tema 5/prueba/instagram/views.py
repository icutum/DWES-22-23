from django.shortcuts import render, get_object_or_404

from .models import Post


def index(request):
    posts = Post.objects.order_by('-pub_date')[:10]
    context = {
        'posts': posts
    }
    return render(request, 'instagram/index.html', context)

def post(request, post_id):
    post = get_object_or_404(Post, pk=post_id)
    return render(request, 'instagram/post.html', {'post': post})