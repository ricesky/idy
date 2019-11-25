{% extends 'layout.volt' %}

{% block title %}Home{% endblock %}

{% block styles %}

    <!-- code taken from https://mdbootstrap.com/snippets/jquery/jakubowczarek/893358 -->
    <style>
        *{
            margin:0;
            padding:0;
        }
        body{
            font-family:arial,sans-serif;
            font-size:100%;
            margin:3em;
            background:#666;
            color:#fff;
        }
        h2,p{
            font-size:100%;
            font-weight:normal;
            color: black;
        }
        ul,li{
            list-style:none;
        }
        ul{
            overflow:hidden;
            padding:3em;
        }
        ul li .sticky {
            text-decoration:none;
            color:#000;
            background:#f6ff7a;
            display:block;
            height:15em;
            width:15em;
            padding:1em;
            -moz-box-shadow:5px 5px 7px rgba(33,33,33,1);
            /* Safari+Chrome */
            -webkit-box-shadow: 5px 5px 7px rgba(33,33,33,.7);
            /* Opera */
            box-shadow: 5px 5px 7px rgba(33,33,33,.7);
            -moz-transition:-moz-transform .15s linear;
            -o-transition:-o-transform .15s linear;
            -webkit-transition:-webkit-transform .15s linear;
        }
        ul li{
            margin:1em;
            float:left;
        }
        ul li h2{
            font-size:140%;
            font-weight:bold;
            padding-bottom:10px;
        }
        ul li p{
            font-family:"Reenie Beanie",arial,sans-serif;
        }
        ul li:nth-child(even) .sticky {
            -o-transform:rotate(4deg);
            -webkit-transform:rotate(4deg);
            -moz-transform:rotate(4deg);
            position:relative;
            top:5px;
        }
        ul li:nth-child(3n) .sticky {
            -o-transform:rotate(-3deg);
            -webkit-transform:rotate(-3deg);
            -moz-transform:rotate(-3deg);
            position:relative;
            top:-5px;
            background:#f26b6b;
        }
        ul li:nth-child(5n) .sticky {
            -o-transform:rotate(5deg);
            -webkit-transform:rotate(5deg);
            -moz-transform:rotate(5deg);
            position:relative;
            top:-10px;
            background: #6bbcf2;
        }
        ul li .sticky:hover,ul li .sticky:focus{
            -moz-box-shadow:10px 10px 7px rgba(0,0,0,.7);
            -webkit-box-shadow: 10px 10px 7px rgba(0,0,0,.7);
            box-shadow:10px 10px 7px rgba(0,0,0,.7);
            -webkit-transform: scale(1.25);
            -moz-transform: scale(1.25);
            -o-transform: scale(1.25);
            position:relative;
            z-index:5;
        }
    </style>

{% endblock %}

{% block content %}

    <ul>
        {% for idea in ideas %}

        <li>
           <div class="sticky">
                <h2>{{ idea['title'] }}</h2>
                <p>{{ idea['description'] }}</p>
                <div class="author">{{ idea['author_name'] }}</div>
                <div class="email">{{ idea['author_email'] }}</div>
                <div class="rating">Ratings: {{ idea['rating'] }} <a href="{{ url('idea/rate/') }}{{ idea['id'] }}">Rate</a></div>
                <div class="rating">Votes: {{ idea['vote'] }} <a href="{{ url('idea/vote/') }}{{ idea['id'] }}">Vote</a></div>
            </div>
        </li>
            
        {% endfor %}       
    </ul>

{% endblock %}

{% block scripts %}

{% endblock %}