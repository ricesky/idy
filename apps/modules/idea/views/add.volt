{% extends 'layout.volt' %}

{% block title %}Add New Idea{% endblock %}

{% block styles %}

{% endblock %}

{% block content %}

{{ flashSession.output() }}
<br>
<form method="post" action="{{ url('idea/idea/add') }}">

    <div class="form-group">
        <label for="input-title">Title</label>
        <input type="text" name="title" class="form-control" id="input-title" placeholder="" value="{{ title }}">
    </div>
    <div class="form-group">
        <label for="input-description">Description</label>
        <textarea name="description" class="form-control" id="input-description" rows="3">{{ description }}</textarea>
    </div>
    <div class="form-group">
        <label for="input-name">Author name</label>
        <input type="text" name="author_name" class="form-control" id="input-name" placeholder="" value="{{ author_name }}">
    </div>
    <div class="form-group">
        <label for="input-email">Email address</label>
        <input type="email" name="author_email" class="form-control" id="input-email" placeholder="name@example.com" value="{{ author_email }}">
    </div>

    <button type="submit" class="btn btn-lg btn-success btn-block">Save</button>
  
</form>



{% endblock %}

{% block scripts %}

{% endblock %}