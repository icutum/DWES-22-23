import random, string
from django.utils.text import slugify


RANDOM_STR_SIZE = 5

# abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789
CHAR_LIST = string.ascii_letters + string.digits

def get_random_str(size=RANDOM_STR_SIZE, chars=CHAR_LIST):
    return ''.join(random.choice(chars) for _ in range(size))

def get_slug(instance, slug=None):
    if slug is None:
        slug = slugify(instance.description)

    classname = instance.__class__
    slug_exists = classname.objects.filter(slug=slug).exists()

    if slug_exists:
        random = get_random_str()
        slug = f"{slug}-{random}"

        return get_slug(instance, slug=slug)

    return slug