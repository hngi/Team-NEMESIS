from django.shortcuts import render
from django.http import HttpResponse
from .models import User
from django.template import loader
from pprint import pprint
# Create your views here.


def index(request):
    user_list = User.objects.all()
    template = loader.get_template('users/index.html')
    context = {'user_list': user_list}
    return HttpResponse(template.render(context, request))
    # return HttpResponse("the data is " + user_list)


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
