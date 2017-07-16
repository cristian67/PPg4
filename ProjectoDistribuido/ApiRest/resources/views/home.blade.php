<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <title>@yield('title','API')</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/paper/bootstrap.min.css" rel="stylesheet" integrity="sha384-awusxf8AUojygHf2+joICySzB780jVvQaVCAt1clU3QsyAitLGul28Qxb2r1e5g+" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>
<body>
<!-- Rutas disponibles   -->
<div class="row-fluid">
    <div class="container">
        <div class="jumbotron">
            <h1>RESTfulAPI</h1>
            <h4 style="color: orangered">Rutas disponibles</h4>
        </div>
    </div>
</div>
<hr>
<div class="row-fluid">
    <div class="container">
        <h3>Profesores</h3>
        <h5 style="color: orangered">Rutas</h5>
        <ul>
            <li>Mostrar:</li>
            <ul>
                <li>http://localhost:8000/api/profesores</li>
                <p style="color: orangered"> Todos los registros </p>
                <li>http://localhost:8000/api/profesores/{id_profesor} </li>
                <p style="color: orangered"> Por "id"</p>
                <li>http://localhost:8000/api/profesor/{id_profesor}/disponibilidad/{id_disponibilidad}</li>
                <p style="color: orangered"> Disponibilidad de cada profesor </p>
                <div class="alert alert-success " role="alert">
                    <strong>GET</strong>
                </div>
        </ul>
        </ul>
    </div>
</div>
<hr>
<div class="row-fluid">
    <div class="container">
        <h3>Disponibilidad</h3>
        <h5 style="color: orangered">Rutas</h5>
        <ul>
            <li>Mostrar:</li>
            <ul>
                <li>http://localhost:8000/api/disponibilidades</li>
                <p style="color: orangered"> Todos los registros </p>
                <li>http://localhost:8000/api/disponibilidades/{id_disponibilidad}</li>
                <p style="color: orangered"> Por "id"</p>
                <p style="color: orangered"> con metodo:</p>
                <div class="alert alert-success " role="alert">
                    <strong>GET</strong>
                </div>
        </ul>
        <li>Crear:</li>
        <ul>
            <li>http://localhost:8000/api/profesor/{id_profesor}/disponibilidad</li>
            <p style="color: orangered"> con metodo:</p><div class="alert alert-danger" role="alert">
                <strong>POST</strong>
            </div>
        </ul>
        <li>Actualizar:</li>
        <ul>
            <li>http://localhost:8000/api/profesor/{id_disponibilidad}/disponibilidad/{id_disponibilidad}</li>
            <p style="color: orangered"> con metodo:</p>
            <div class="alert alert-warning" role="alert">
                <strong>PATCH</strong>
                (editar por atributo)
            </div>
            <div class="alert alert-warning" role="alert">
                <strong>PUT</strong>
                (es necesario editar todos los atributos)
            </div>
        </ul>
        <li>Eliminar:</li>
        <ul>
            <li>http://localhost:8000/api/profesor/{id_disponibilidad}/disponibilidad/{id_disponibilidad}</li>
            <p style="color: orangered"> con metodo:</p>
            <div class="alert alert-warning" role="alert">
                <strong>Delete</strong>
            </div>
        </ul>
        </ul>
    </div>
</div>
<hr>
<div class="row-fluid">
    <div class="container">
        <h3>Secciones</h3>
        <h5 style="color: orangered">Rutas</h5>
        <ul>
            <li>Mostrar:</li>
            <ul>
                <li>http://localhost:8000/api/secciones</li>
                <p style="color: orangered"> Todos los registros </p>
                <li>http://localhost:8000/api/profesores/{id_profesor}/seccion/{id_seccion}/cursos </li>
                <p style="color: orangered"> Por "id"</p>
                <p style="color: orangered"> con metodo:</p>
                <div class="alert alert-success " role="alert">
                    <strong>GET</strong>
                </div>
                <div class="alert alert-info" role="alert">
                    <strong>Tabla Pivote</strong>
                </div>
        </ul>
    </div>
</div>
<hr>
<div class="row-fluid">
    <div class="container">
        <h3>Curso</h3>
        <h5 style="color: orangered">Rutas</h5>
        <ul>
            <li>Mostrar:</li>
            <ul>
                <li>http://localhost:8000/api/cursos</li>
                <p style="color: orangered"> Todos los registros </p>
                <li>http://localhost:8000/api/cursos/{id_cursos} </li>
                <p style="color: orangered"> Por "id"</p>
                <p style="color: orangered"> con metodo:</p>
                <div class="alert alert-success " role="alert">
                    <strong>GET</strong>
                </div>
        </ul>
        </ul>
    </div>
</div>
<hr>
<div class="row-fluid">
    <div class="container">
        <h3>Horarios</h3>
        <h5 style="color: orangered">Rutas</h5>
        <ul>
            <li>Mostrar:</li>
            <ul>
                <li>http://localhost:8000/api/horarios</li>
                <p style="color: orangered"> Todos los registros </p>
                <li>http://localhost:8000/api/cursos/{id_cursos}/horario/{id_horario}/salas </li>
                <p style="color: orangered"> Por "id"</p>
                <p style="color: orangered"> con metodo:</p>
                <div class="alert alert-success " role="alert">
                    <strong>GET</strong>
                </div>
            </ul>
        <li>Crear:</li>
        <ul>
            <li>http://localhost:8000/api/curso/{id_curso}/sala/{id_sala}/horario </li>
            <p style="color: orangered"> con metodo:</p>
            <div class="alert alert-danger" role="alert">
                <strong>POST</strong>
            </div>
        </ul>
        <li>Actualizar:</li>
        <ul>
            <li>http://localhost:8000/api/cursos/{id_cursos}/horario/{id_horario}/salas/{id_salas}</li>
            <p style="color: orangered"> con metodo:</p>
            <div class="alert alert-warning" role="alert">
                <strong>PATCH</strong>(editar por atributo)
            </div>
            <div class="alert alert-warning" role="alert">
                <strong>PUT</strong>(es necesario editar todos los atributos)
            </div>
        </ul>
        <li>Eliminar:</li>
        <ul>
            <li>http://localhost:8000/api/cursos/{id_cursos}/horario/{id_horario}/salas/{id_salas}</li>
            <p style="color: orangered"> con metodo:</p>
            <div class="alert alert-warning" role="alert">
                <strong>Delete</strong>
            </div>
            <div class="alert alert-info" role="alert">
                <strong>Importante!: Tabla Pivote</strong>
            </div>
        </ul>
        </ul>
    </div>
</div>
<hr>
<div class="row-fluid">
    <div class="container">
        <h3>Salas</h3>
        <h5 style="color: orangered">Rutas</h5>
        <ul>
            <li>Mostrar:</li>
            <ul>
                <li>http://localhost:8000/api/salas</li>
                <p style="color: orangered"> Todos los registros </p>
                <li>http://localhost:8000/api/salas/{id_salas} </li>
                <p style="color: orangered"> Por "id"</p>
                <p style="color: orangered"> con metodo:</p>
                <div class="alert alert-success " role="alert">
                    <strong>GET</strong>
                </div>
        </ul>
        </ul>
    </div>
</div>
<hr>
<!-- Rutas fin  -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>
