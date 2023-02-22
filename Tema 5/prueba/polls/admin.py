from django.contrib import admin

from .models import *

class ChoiceInline(admin.TabularInline):
    model = Choice
    extra = 0

class QuestionAdmin(admin.ModelAdmin):
    fieldsets = (
        (None, {'fields': ['question_text']}),
        ('Date info', {'fields': ['pub_date']}),
    )
    inlines = [ChoiceInline]

    list_display = ['question_text', 'pub_date']
    list_filter = ['pub_date']
    list_per_page = 50

admin.site.register(Question, QuestionAdmin)