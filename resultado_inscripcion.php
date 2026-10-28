<?php
$campos = [
    'nombre' => 'Nombre', 'apellidos' => 'Apellidos', 'dni' => 'DNI',
    'fecha_nacimiento' => 'Fecha de nacimiento', 'correo' => 'Correo electrónico',
    'telefono' => 'Teléfono', 'ciclo' => 'Ciclo formativo',
    'turno' => 'Turno preferido', 'modalidad' => 'Modalidad'
];

function valorSeguro(string $campo): string
{
    return htmlspecialchars(trim($_POST[$campo] ?? ''), ENT_QUOTES, 'UTF-8');
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos de inscripción</title>
    <style>
        body { font-family: 'Times New Roman', Times, serif; margin: 20px; }
        main { max-width: 500px; margin: auto; }
        .datos { margin-top: 20px; }
        .dato { margin-top: 12px; }
        .etiqueta { display: block; margin-bottom: 6px; }
        .valor { display: block; width: 100%; padding: 6px; box-sizing: border-box; border: 1px solid #767676; background: #f7f7f7; }
        a { display: inline-block; margin-top: 15px; padding: 8px 16px; color: #000; border: 1px solid #767676; text-decoration: none; }
        a:hover { background: #eee; }
    </style>
</head>
<body>
    <main>
        <h1>Inscripción recibida</h1>
        <p>Estos son los datos enviados:</p>
        <div class="datos">
            <?php foreach ($campos as $campo => $etiqueta): ?>
                <div class="dato">
                    <span class="etiqueta"><?= htmlspecialchars($etiqueta, ENT_QUOTES, 'UTF-8') ?>:</span>
                    <span class="valor"><?= valorSeguro($campo) ?></span>
                </div>
            <?php endforeach; ?>
            <div class="dato">
                <span class="etiqueta">Política de privacidad:</span>
                <span class="valor"><?= isset($_POST['privacidad']) ? 'Aceptada' : 'No aceptada' ?></span>
            </div>
        </div>
        <a href="Formulariodeinscripcion.html">Volver al formulario</a>
    </main>
</body>
</html>
