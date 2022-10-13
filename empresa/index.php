<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Departamentos</title>
</head>
<body>
    <?php
    $desde_codigo = (isset($_GET['desde_codigo'])) ? trim($_GET['desde_codigo']) : null;
    $hasta_codigo = (isset($_GET['hasta_codigo'])) ? trim($_GET['hasta_codigo']) : null;
    $denominacion = (isset($_GET['denominacion'])) ? trim($_GET['denominacion']) : null;
    ?>
    <div>
        <form action="" method="get">
            <fieldset>
                <legend>Criterios de búsqueda</legend>
                <p>
                    <label>
                        Desde código:
                        <input type="text" name="desde_codigo" size="8" value="<?= $desde_codigo ?>">
                    </label>
                </p>
                <p>
                    <label>
                        Hasta código:
                        <input type="text" name="hasta_codigo" size="8" value="<?= $hasta_codigo ?>">
                    </label>
                </p>
                <p>
                    <label>
                        Denominación:
                        <input type="text" name="denominacion" size="8" value="<?= $denominacion ?>">
                    </label>
                </p>
                <button type="submit">Buscar</button>
            </fieldset>
        </form>
    </div>
    <?php
    $where = "";
    $arr = [];
    if ($denominacion != "" && $desde_codigo != "" && $hasta_codigo != "") {
        $where = "WHERE codigo BETWEEN :desde_codigo AND :hasta_codigo AND denominacion = :denominacion";
        $arr = [
            ':desde_codigo' => $desde_codigo,
            ':hasta_codigo' => $hasta_codigo,
            ':denominacion' => $denominacion,
        ];
    } else if ($denominacion == "" && $desde_codigo != "" && $hasta_codigo != "") {
        $where = "WHERE codigo BETWEEN :desde_codigo AND :hasta_codigo";
        $arr = [
            ':desde_codigo' => $desde_codigo,
            ':hasta_codigo' => $hasta_codigo,
        ];
    } else if ($denominacion != "" && $desde_codigo == "" && $hasta_codigo == "") {
        $where = "WHERE denominacion = :denominacion";
        $arr = [
            ':denominacion' => $denominacion,
        ];
    }
    $pdo = new PDO('pgsql:host=localhost;dbname=empresa', 'empresa', 'empresa');
    $pdo->beginTransaction();
    $sent = $pdo->query('LOCK TABLE departamentos IN SHARE MODE');
    $sent = $pdo->prepare("SELECT COUNT(*)
                             FROM departamentos
                            $where");
    $sent->execute($arr);
    $total = $sent->fetchColumn();
    $sent = $pdo->prepare("SELECT *
                             FROM departamentos
                            $where
                         ORDER BY codigo");
    $sent->execute($arr);
    $pdo->commit();
    ?>
    <br>
    <div>
        <table style="margin: auto" border="1">
            <thead>
                <th>Código</th>
                <th>Denominación</th>
            </thead>
            <tbody>
                <?php foreach ($sent as $fila): ?>
                    <tr>
                        <td><?= $fila['codigo'] ?></td>
                        <td><?= $fila['denominacion'] ?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
        <p>Número total de filas: <?= $total ?></p>
    </div>
</body>
</html>
