<div>
    <nav class="navbar navbar-expand-sm fixed-top navbar-dark bg-dark shadow">
        <div class="container">
            <a class="nav-link text-warning h4 mr-5" href="{{ url('https://abergan.ru/') }}">abergan.ru</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
        
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item {{ (request()->is('/')) ? 'active' : '' }}">
                  <a class="nav-link" href="{{ url('/') }}">Главная <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item {{ (request()->is('table')) ? 'active' : '' }}">
                  <a class="nav-link" href="{{ url('/table') }}">Список компаний</a>
                </li>
                <li class="nav-item {{ (request()->is('about')) ? 'active' : '' }}">
                  <a class="nav-link" href="{{ url('/about') }}">О проекте</a>
                </li>
              </ul>
            </div>
        </div>
    </nav>
</div>