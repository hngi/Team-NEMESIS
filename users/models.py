from django.db import models

# Create your models here.

class User(models.Model):
    user_name = models.CharField(max_length=50)
    user_email = models.EmailField(max_length=254)
    user_password = models.CharField(max_length=200)

    def __str__(self):
        return self.user_name
