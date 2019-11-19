<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="Idea Brainstorming">
    <meta name="author" content="Rizky Januar Akbar">
    <title>{% block title %}{% endblock %} &bullet; Idy</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ url('assets/css/bootstrap.min.css') }}" rel="stylesheet">

    {% block styles %}{% endblock %}

</head>
<body>
    
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="#">Idy</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <div class="form-inline ml-auto my-2 my-lg-0">
                <a href="{{ url('idea/add')}}" class="btn btn-secondary my-2 my-sm-0">Add new</a>
            </div>
        </div>
    </nav>

    <main role="main" class="container">

    {% block content %}{% endblock %}

    </main>

    <script src="{{ url('assets/js/jquery-3.4.1.js') }}"></script>
    <script src="{{ url('assets/js/bootstrap.bundle.min.js') }}"></script>

    {% block scripts %}{% endblock %}
</body>
</html>


