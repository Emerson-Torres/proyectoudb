<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    <!-- JavaScript -->
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
</head>

<body>
    <section class="container">
        <h1 class="text-center">Formulario para registro de carreras.</h1>
        <form role="form" id="formactualiza" action="{{route('insertarCarrera')}}" method="POST">
            @csrf
            <div class="col-md-12" id="conten">
                <div class="form-group">
                    <label for="nombre">Nombre <i class="bi bi-asterisk"></i></label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="txttitulo" placeholder="Ingresa el nombre"
                            required>

                    </div>
                </div>
                <section class="d-flex flex-row">
                    <div class="form-group  col-md-4">
                        <label for="edad">URL amigable:</label>
                        <div class="input-group">
                            <input type="text" class="form-control" value="http://127.0.0.1:8000/index" name="txturl"
                                placeholder="Ingresa la edad" required>
                        </div>
                    </div>
                    <div class="form-group  col-md-4 ">
                        <label for="edad">Enlace externo:</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="txtedad" placeholder="Ingresa la edad">
                        </div>
                    </div>
                </section>
                <div class="form-group">
                    <label for="edad">Descripcion:</label>
                    <div class="input-group">
                        <textarea class="form-control" name="txtdescripcion" placeholder="Ingresa el telefono"
                            required></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="sexo">Carrera:</label>
                    <div class="input-group">
                        <select name="cmbtipocarrera" class="form-control" required>
                            @foreach($lista as $tipocarrera)
                            <option value="{{$tipocarrera->id}}">{{$tipocarrera->tipocarrera}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="ocupacion">Campus:</label>
                    <div class="input-group">
                        <select name="cmbcampus" class="form-control" required>
                            @foreach($lista2 as $campus)
                            <option value="{{$campus->id}}">{{$campus->nombre_campus}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <br>
                <input type="submit" class="btn btn-success" name="btnfinalizar" id="btnfinalizar" value="Enviar">
            </div>
        </form>

        <table id="tabla_ingresos" class="table table-striped">
            <tr>
                <th>id</th>
                <th>carrera</th>
                <th>descripcion</th>
                <th>URL amigable</th>
                <th>campus</th>
                <th>tipo carrera</th>

                <th colspan="2">Operaciones</th>
            </tr>
            @foreach($carreras as $carrera)
            <tr>
                <td>{{$carrera->id}}</td>
                <td>{{$carrera->titulo_carrera}}</td>
                <td>{{$carrera->descripcion_carrera}}</td>
                <td>{{$carrera->url_amigable}}</td>
                <td>{{$carrera->nombre_campus}}</td>
                <td>{{$carrera->tipocarrera}}</td>

                <td><button onclick="eliminar(`{{ $carrera->id }}`)" class="btn btn-danger">Eliminar</button></td>
                <td><button onclick="modificar(`{{ $carrera->id }}`,
                `{{$carrera->titulo_carrera }}`,
                `{{$carrera->descripcion_carrera }}`,
                `{{$carrera->id_campus }}`,
                `{{$carrera->id_tipocarrera }}`)" data-bs-toggle="modal" data-bs-target="#exampleModal"
                        class="btn btn-info">Modificar</button></td>

            </tr>
            @endforeach
        </table>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form role="form" id="formactualiza" action="{{route('modificarCarrera')}}" method="POST">
                        @csrf
                        <div class="col-md-12" id="conten">
                            <input type="text" name="txtidmod" id="txtid">

                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <div class="input-group">
                                <input type="text" class="form-control" name="txtedad" id="txtedad" value="valor"
                                            placeholder="Ingresa la edad">
                                </div>
                            </div>
                            <section class="d-flex flex-row">
                                <div class="form-group  col-md-4">
                                    <label for="edad">URL amigable:</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" value="http://127.0.0.1:8000/index"
                                            name="txturlmod" placeholder="Ingresa la edad" required>
                                    </div>
                                </div>
                                <div class="form-group  col-md-4 ">
                                    <label for="edad">Enlace externo:</label>
                                    <div class="input-group">
                                    <input type="text" class="form-control" name="txtvalor" id="txtvalor" 
                                            placeholder="Ingresa la edad">
                                    </div>
                                </div>
                            </section>
                            <div class="form-group">
                                <label for="edad">Descripcion:</label>
                                <div class="input-group">
                                    <textarea class="form-control" name="txtdescripcionmod" id="txtdescripcionmod"
                                        placeholder="Ingresa el telefono" required></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="sexo">Carrera:</label>
                                <div class="input-group">
                                    <select name="cmbtipocarreramod" id="cmbtipocarreramod" class="form-control"
                                        required>
                                        @foreach($lista as $tipocarrera)
                                        <option value="{{$tipocarrera->id}}">{{$tipocarrera->tipocarrera}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="ocupacion">Campus:</label>
                                <div class="input-group">
                                    <select name="cmbcampusmod" id="cmbcampusmod" class="form-control" required>
                                        @foreach($lista2 as $campus)
                                        <option value="{{$campus->id}}">{{$campus->nombre_campus}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <br>
                            <input type="submit" class="btn btn-success" name="btnfinalizar" id="btnfinalizar"
                                value="Enviar">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
</body>

<script>
function modificar(id, titulo, descripcion, idcampus, idtipocarrera) {
    document.getElementById("txtid").value = id;
    document.getElementById("txtedad").value = titulo;
    document.getElementById("txtdescripcionmod").value = descripcion;
    document.getElementById("cmbcampusmod").value = idcampus;
    document.getElementById("cmbtipocarreramod").value = idtipocarrera;
}

function eliminar(id) {

    alertify.confirm('Confirm Title', 'Confirm Message', function() {
        var url = '{{ route("eliminarCarrera", ":slug") }}';
        url = url.replace(':slug', id);
        window.location.href = url;
    }, function() {
        alertify.error('Cancel')
    });


}
</script>

</html>