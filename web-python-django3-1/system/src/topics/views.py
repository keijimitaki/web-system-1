from django.shortcuts import render
from django.views.generic.base import (
  View,TemplateView
)
from datetime import datetime


# Create your views here.

class IndexView(TemplateView):

  template_name = 'index.html'

  def get_context_data(self, **kwargs):
    context = super().get_context_data(**kwargs)
    print(kwargs)
    #context['name'] = kwargs.get('name')
    context['time'] = datetime.now()
    return context