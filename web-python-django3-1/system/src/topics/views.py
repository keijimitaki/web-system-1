from django.shortcuts import render
from django.views.generic.base import (
  View,TemplateView
)
from datetime import datetime
#from django.http import HttpResponse
from django.shortcuts import redirect

from .models import Topic


# Create your views here.

class IndexView(TemplateView):

  template_name = 'index.html'

  def get_context_data(self, **kwargs):
    context = super().get_context_data(**kwargs)
    print(kwargs)

    topics = Topic.objects.all().order_by('id').reverse()

    context['time'] = datetime.now()
    context['Topics'] = topics

    return context
  
  def post(self, request, *args, **kwargs):

    context = super().get_context_data(**kwargs)
    
    print("post  ☆彡")
    print(self.request.POST)
    print(kwargs)
    topic = Topic.objects.get(id=kwargs['id'])
    topic.updated_at = datetime.now()
    topic.name = self.request.POST['name-selected']
    print(topic.name)
    print(topic.updated_at)
    topic.save()

    return redirect('topics:index')
 