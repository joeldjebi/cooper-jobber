<!-- Titlebar -->
        <div id="titlebar" class="gradient">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2>{{$title}}</h2>
                        <nav id="breadcrumbs">
                            <ul>
                                <li><a href="{{ route('accueil') }}">Accueil</a></li>
                                @if(isset($title))
                                <li>{{$title}}</li>
                                @endif
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
<!-- Titlebar -->
