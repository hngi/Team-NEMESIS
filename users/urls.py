from django.urls import path
from . import views
from .views import IndexView, SigninView, SignupView, SuccessView

urlpatterns = [
    path('', IndexView.as_view(), name='index'),
    path('signup/', SignupView.as_view(), name="signup"),
    path('signin/', SigninView.as_view(), name="signin"),
    path('success/', SuccessView.as_view(), name="success"),
]
