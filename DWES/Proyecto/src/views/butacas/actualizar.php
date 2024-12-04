<h1>Actualizar Butaca</h1>
<form action="/butacas/actualizar/<?= $butaca['id'] ?>" method="post">
    <p>Fila: <?= $butaca['fila'] ?></p>
    <p>Número: <?= $butaca['numero'] ?></p>
    
    <label for="estado">Estado:</label>
    <select id="estado" name="estado">
        <option value="libre" <?= $butaca['estado'] == 'libre' ? 'selected' : '' ?>>Libre</option>
        <option value="ocupada" <?= $butaca['estado'] == 'ocupada' ? 'selected' : '' ?>>Ocupada</option>
    </select>
    
    <button type="submit">Actualizar Estado</button>
</form>