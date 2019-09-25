from django.shortcuts import render
from django.http import HttpResponse
from .models import User
from django.template import loader
from pprint import pprint
# Create your views here.


def index(request):
    template = loader.get_template('users/index.html')
    context = {}
    return HttpResponse(template.render(context, request))


def signup(request):
    template = loader.get_template('users/signup.html')
    context = {}
    return HttpResponse(template.render(context, request))


def signin(request):
    template = loader.get_template('users/index.html')
    context = {}
    return HttpResponse(template.render(context, request))


def details(request, id):
    return HttpResponse("hello number %s" % id)


def add_user(request):
    if request.method == 'POST':
        try:
            user = User()
            user.user_name = request.POST['name']
            user.user_email = request.POST['email']
            user.user_password = request.POST['password']
            user.save()
            return HttpResponse("USER ADDED")
        except:
            return HttpResponse("there was an error")
