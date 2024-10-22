<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
</head>

<body>

    <!-- Sección para mostrar el mensaje de bienvenida -->
    <h1>Bienvenido(a)</h1>
    <h1 id="bienvenido"></h1>

    <table id="usuariosTable" class="display" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Trabajador</th>
                <th>Usuario</th>
                <th>Perfil</th>
            </tr>
        </thead>
    </table>

    <button id="volver">volver</button>
    <script>
        $(document).ready(function() {
            // Obtener el nombre del usuario del sessionStorage
            var usuario = sessionStorage.getItem('usuario');
            if (usuario) {
                console.log(usuario)
                $('#bienvenido').text(usuario);
            } else {
                console.log(usuario, 'no')
                window.location.href = '/login';
            }

            $('#usuariosTable').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": {
                    "url": "/usuarios",
                    "type": "GET",
                    "dataSrc": function(json) {
                        return json.map(function(usuario) {
                            return {
                                ID_USUARIO: usuario.ID_USUARIO,
                                TRABAJADOR: usuario.TRABAJADOR,
                                USUARIO_LOGIN: usuario.USUARIO_LOGIN,
                                PERFIL: usuario.perfil.PERFIL // Relación perfil
                            };
                        });
                    }
                },
                "columns": [{
                        "data": "ID_USUARIO"
                    },
                    {
                        "data": "TRABAJADOR"
                    },
                    {
                        "data": "USUARIO_LOGIN"
                    },
                    {
                        "data": "PERFIL"
                    }
                ]
            });

            // Evento para el botón "volver"
            $('#volver').click(function() {
                // Eliminar el usuario de sessionStorage
                sessionStorage.removeItem('usuario');
                // Redireccionar a la página de login
                window.location.href = '/loginUser'; // Cambia esto a la ruta correcta de tu login
            });
        });
    </script>
</body>

</html>