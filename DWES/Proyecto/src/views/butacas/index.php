<h1>Listado de Butacas</h1>
<table>
    <tr>
        <th>Fila</th>
        <th>Número</th>
        <th>Estado</th>
        <th>Acciones</th>
    </tr>
    <?php foreach ($butacas as $butaca): ?>
    <tr>
        <td><?= $butaca['fila'] ?></td>
        <td><?= $butaca['numero'] ?></td>
        <td><?= $butaca['estado'] ?></td>
        <td>
            <a href="/butacas/actualizar/<?= $butaca['id'] ?>">Actualizar</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
<a href="/butacas/crear">Crear nueva butaca</a>