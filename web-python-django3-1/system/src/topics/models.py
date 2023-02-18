from django.db import models

# Create your models here.
class BaseModel(models.Model):
    created_at = models.DateTimeField()
    updated_at = models.DateTimeField(null=True)
    deleted_at = models.DateTimeField(null=True)
    
    class Meta:
      abstract = True

class Topic(BaseModel):
  name = models.CharField(max_length=100)
  toc = models.TextField(null=True, blank=True)
  memo = models.CharField(max_length=1000,null=True, blank=True)
    
  class Meta:
    db_table = 'topics'