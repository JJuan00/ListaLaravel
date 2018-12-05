<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('style.style')
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <style>
        header, footer { width: 100%; height: 100px; background: #666; font-size: 2em; text-align: center; clear: both; }
        section { position: relative; }
        #izquierda { position: relative; width: 50%; top: 0; left: 0; background: #FFF; float: left; height: 42%; }
        #derecha { position: relative; width: 50%; top: 0; right: 0; background: #FFF; float: right; height: 42%; }
        #salir{
            color: #FFF;
            padding-right: 10%;
            padding-left: 10%;
            font-family: arial;
            font-size: 18px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="navbar navbar-expand-lg navbar-light bg-dark">

        <a href="{{ url('/home') }}" class="navbar-brand" style="color: #FFF;width: 17%;">{{ Auth::user()->name }}</a>
        <a class="navbar-brand" style="color: #FFF;width: 90%; cursor: pointer;"  data-toggle="modal" data-target="#miModal">A&ntilde;adir nota</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="salir" id="salir"> salir </button>
        </form>
    </div>
    @if(session('info_message'))
        <div class="alert alert-danger" align="center" role="alert">
        {{ session('info_message') }}
        </div>
    @endif
    @if(session('info_message2'))
        <div class="alert alert-success" align="center" role="alert">
        {{ session('info_message2') }}
        </div>
    @endif
    @if(session('info_add'))
        <div class="alert alert-success" align="center" role="alert">
        {{ session('info_message2') }}
        </div>
    @endif
    <div class="modal fade" id="miModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel">A&ntilde;adir una anotaci&oacute;n</h4>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ route('/todo') }}">
                            @csrf
                            <input type="text" name="titulo" id="titulo" placeholder="Titulo" autocomplete="off">
                            <input type="date" name="fecha" id="fecha">
                            <textarea style="height: 100px;resize: none;" name="contenido" id="contenido"></textarea>
                            <input type="hidden" name="user" value="{{ Auth::user()->email }}">
                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @php
            $c = 0;
        @endphp
        <section>
        @foreach($notas as $nota)
        <form method="POST" action="{{ route('not_pane') }}">
            @csrf
                <div class="modal fade" id="{{ 'edit'.$c }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="modal-title" id="myModalLabel">Editar anotaci&oacute;n</h4>
                        </div>
                        <div class="modal-body">
                            <!-- <form method="POST" action="../includes/delete.php"> -->
                                <input type="hidden" value="{{ $nota->id }}" name="id_edit">
                                <input type="text" name="titulo_edit" id="titulo_edit" value="{{ $nota->title }}"  placeholder="{{ $nota->title }}" autocomplete="off">
                                <input type="date" name="fecha_edit" id="fecha" value="{{ $nota->fecha }}">
                                <textarea style="height: 100px;resize: none;" name="contenido_edit" id="contenido">{{ $nota->contenido }}</textarea>
                                <button type="submit" class="btn btn-primary" name="edit_nota">Editar</button>
                                <button type="submit" class="btn btn-danger" name="delete_nota">Eliminar</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        @if($nota->id % 2 == 0)
            <div id="izquierda" align="center">
                 <div class="row" style="width: 85%;">
                    <div class="col s12 m5">
                      <div class="card-panel teal" style="width: 100%;height: 100%;">
                        <div>
                             <span class="white-text"><strong>{{ $nota->title }}</strong></span>
                        </div>
                        <hr style="color: #0056b2;" />
                        <br>
                        <span class="white-text">{{ $nota->contenido }}
                        </span>
                        <hr style="color: #0056b2;" />
                        <div>
                            <span class="white-text"><strong>{{ $nota->fecha }}</strong></span>
                        </div>
                        <br>
                        <div>
                            <a class="navbar-brand" style="color: #FFF;cursor: pointer;"  data-toggle="modal" data-target="{{ '#edit'.$c }}">Editar</a>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
        @else
            <div id="derecha" align="center">
                <div class="row" style="width: 85%;">
                    <div class="col s12 m5">
                      <div class="card-panel teal" style="width: 100%;height: 100%;">
                        <div>
                             <span class="white-text"><strong>{{ $nota->title }}</strong></span>
                        </div>
                        <hr style="color: #0056b2;" />
                        <br>
                        <span class="white-text">{{ $nota->contenido }}
                        </span>
                        <hr style="color: #0056b2;" />
                        <div>
                            <span class="white-text"><strong>{{ $nota->fecha }}</strong></span>
                        </div>
                        <div>
                            <a class="navbar-brand" style="color: #FFF;cursor: pointer;"  data-toggle="modal" data-target="{{ '#edit'.$c }}">Editar</a>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
        @endif
        
            @php
                $c ++;
            @endphp
        @endforeach
    </section>

    @include('style.tempjs')
</body>
</html>
