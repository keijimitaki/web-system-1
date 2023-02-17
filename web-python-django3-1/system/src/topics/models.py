from django.db import models

# Create your models here.
class BaseModel(models.Model):
    created_at = models.DateTimeField()
    updated_at = models.DateTimeField()
    deleted_at = models.DateTimeField()
    
    class Meta:
      abstract = True

class Topic(BaseModel):
  name = models.CharField(max_length=100)
  toc = models.TextField()
  memo = models.CharField(max_length=1000)
    
  class Meta:
    db_table = 'topics'