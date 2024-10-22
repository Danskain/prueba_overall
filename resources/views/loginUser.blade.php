<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }

        .form-container {
            text-align: left;
            padding: 40px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #ffffff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        #mensaje {
            margin-top: 10px;
            color: red;
        }

        label {
            margin-top: 15px;
            display: block;
        }

        select {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        input {
            width: 93%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        button {
            margin-top: 20px;
            padding: 10px;
            cursor: pointer;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 3px;
        }

        button:hover {
            background-color: #0056b3;
            /* Color del botón al pasar el mouse */
        }
    </style>
</head>

<body>
    <div class="form-container">
        <h1>Iniciar sesión</h1>
        <h3>Use una cuenta local para iniciar sesión</h3>

        <label for="perfil">Perfil</label>
        <select id="perfil">
            <option value="">Seleccione un perfil</option>
            <!-- Opciones llenadas con AJAX -->
        </select>

        <label for="usuario">Usuario</label>
        <select id="usuario">
            <option value="">Seleccione un usuario</option>
            <!-- Opciones llenadas con AJAX -->
        </select>

        <label for="clave">Contraseña</label>
        <input type="password" id="clave">

        <button id="loginBtn">Iniciar Sesión</button>

        <div id="mensaje"></div>
    </div>

    <script>
        $(document).ready(function() {
            // CSRF token para AJAX
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // Cargar perfiles
            $.get('/perfiles', function(data) {
                data.forEach(function(perfil) {
                    $('#perfil').append(`<option value="${perfil.ID_PERFIL}">${perfil.PERFIL}</option>`);
                });
            });

            // Cargar usuarios por perfil
            $('#perfil').change(function() {
                var perfilId = $(this).val();
                $('#usuario').empty().append('<option value="">Seleccione un usuario</option>');

                if (perfilId) {
                    $.get('/usuarios-por-perfil', {
                        perfilId: perfilId
                    }, function(data) {
                        data.forEach(function(usuario) {
                            $('#usuario').append(`<option value="${usuario.USUARIO_LOGIN}">${usuario.TRABAJADOR}</option>`);
                        });
                    });
                }
            });

            // Manejar el login
            $('#loginBtn').click(function() {
                var usuarioLogin = $('#usuario').val();
                var usuarioClave = $('#clave').val();

                $.post('/login', {
                    usuarioLogin: usuarioLogin,
                    usuarioClave: usuarioClave
                }, function(response) {
                    if (response.status === 'success') {
                        sessionStorage.setItem('usuario', response.usuario.TRABAJADOR);
                        window.location.href = '/dashboard'; // Redirecciona a la pantalla de bienvenida
                    } else {
                        $('#mensaje').text(response.message);
                    }
                });
            });
        });
    </script>
</body>

</html>