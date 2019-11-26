{% extends 'layout.volt' %}

{% block title %}Rate Idea{% endblock %}

{% block styles %}

{% endblock %}

{% block content %}

{{ flashSession.output() }}
<div class="row">
    <div class="col text-right">
        <a href="{{ url('idea') }}" class="btn btn-danger">Back</a>
    </div>
</div>
<br>
<form>
    <div class="form-group">
        <label class="text-muted">Title</label>
        <p class="text-dark">{{ title }}</p>
    </div>
    <div class="form-group">
        <label class="text-muted">Description</label>
        <p class="text-dark">{{ description }}</p>
    </div>
    <div class="form-group">
        <label class="text-muted">Author name</label>
        <p class="text-dark">{{ author_name }}</p>
    </div>
    <div class="form-group">
        <label class="text-muted">Author email</label>
        <p class="text-dark">{{ author_email }}</p>
    </div>
</form>

<form method="post" action="{{ url('idea/rating/save') }}">

    <input type="hidden" name="id" value="{{ id }}">
    
    <div class="form-group">
        <label for="input-rating">Rating</label>
        <input type="text" name="rating" class="form-control" id="input-rating" placeholder="">
    </div>

    <div class="form-group">
        <label for="input-email">Your email</label>
        <input type="email" name="email" class="form-control" id="input-email" placeholder="">
    </div>

    <button type="submit" class="btn btn-lg btn-success btn-block">Save</button>
  
</form>

{% endblock %}

{% block scripts %}

{% endblock %}