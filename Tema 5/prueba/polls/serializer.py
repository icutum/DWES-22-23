from rest_framework import routers, serializers, viewsets
from .models import Question

class QuestionSerializer(serializers.HyperlinkedModelSerializer):
    class Meta:
        model = Question
        fields = ['pub_date', 'question_text',]