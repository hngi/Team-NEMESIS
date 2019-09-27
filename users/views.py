from django.shortcuts import render
from django.http import HttpResponse
from .models import User
from django.template import loader
from django.views.generic import TemplateView, ListView, CreateView
from pprint import pprint
from .models import User

# Create your views here.


class IndexView(TemplateView):
    template_name = 'users/index.html'


class SigninView(TemplateView):
    template_name = 'users/index.html'


class SignupView(CreateView):
    template_name = 'users/signup.html'
    model = User
    fields = ['user_name', 'user_email', 'user_password']


class SuccessView(TemplateView):
    template_name = 'users/success.html'

# def login(request):
#     users = User.objects.all()
#     pprint(users)
#     # for user in users:
#     #     if user.user_email == email:
#     return HttpResponse("this is the login page ")


# def add_user(request):
#     if request.method == 'POST':
#         try:
#             user = User()
#             user.user_name = request.POST['name']
#             user.user_email = request.POST['email']
#             user.user_password = request.POST['password']
#             user.save()
#             template = loader.get_template('users/signup.html')
#             context = {"msg": "account successfully created"}
#             return HttpResponse(template.render(context, request))

#         except:
#             template = loader.get_template('users/signup.html')
#             context = {"msg": "there was an error signing up"}
#             return HttpResponse(template.render(context, request))
