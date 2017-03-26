<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Libro nuevo</title>
<style type="text/css">
    td,tr{
    border: 2px solid silver;
    }
</style>
</head>
<body>

        <fieldset id="formulario">
        <legend>Inserta los datos</legend>
        <form action="http://localhost/Pisos/piso/create" method="POST">
        <table>
        <tr>
            <td>
            <label for="direccion">Dirección</label>
            </td>
            <td>
            <input type="text" name="direccion" id="direccion">
            </td>
        </tr>
        <tr>
            <td>
            <label for="precio">Precio</label>
            </td>
            <td>
            <input type="text" name="precio" id="precio">
            </td>
        </tr>
        <tr>
            <td>
            <label for="descripcion">Descripción</label>
            </td>
            <td>
            <input type="textarea" name="descripcion" id="descripcion">
            </td>
        </tr>
        <tr>
            <td>
            <label for="ciudad">Ciudad</label>
            </td>
            <td>
            <input type="text" name="ciudad" id="ciudad">
            </td>
        </tr>

        <tr>
            <td colspan="2">
            <input type="submit" name="Enviar" id="Enviar" value="Enviar">
            </td>
        </tr>
        </form>
        <tr>
            <td colspan="2" style="text-align: right;"><a target="" href="http://localhost/Pisos/piso/index">Volver a inicio</a></td>
        </tr>
        </table>
        </fieldset>

</body>
</html>