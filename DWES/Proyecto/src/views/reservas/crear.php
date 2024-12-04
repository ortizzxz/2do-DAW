<h2>Hacer una Reserva</h2>
<?php if (isset($error)): ?>
    <p style="color: red;"><?= $error ?></p>
<?php endif; ?>
<form action="/reservas/crear" method="post">
    <label for="butaca_id">Selecciona una butaca:</label>
    <select name="butaca_id" id="butaca_id" required>
        <?php foreach ($butacas as $butaca): ?>
            <option value="<?= $butaca['id'] ?>">Fila <?= $butaca['fila'] ?>, Número <?= $butaca['numero'] ?></option>
        <?php endforeach; ?>
    </select>
    <button type="submit">Reservar</button>
</form>