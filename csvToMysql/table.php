<table>
    <thead>
        <th>S.no</th>
        <th>Username</th>
        <th>Email</th>

    </thead>
    <tbody>
        <?php $stmt = $pdo->query("SELECT * FROM csv ");
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC); ?>
        <?= empty($rows) ? '<tr ><td colspan="6">No data</td></tr>' : "" ?>
        <?php foreach ($rows as $i => $row) : ?>
            <tr>
                <td><?= $i + 1 ?></td>
                <td><?= $row['username'] ?></td>
                <td><?= $row['email'] ?></td>
            </tr>
        <?php endforeach; ?>

    </tbody>
</table>