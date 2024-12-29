<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistik Overview</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4 text-center">Statistik Overview</h1>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Month</th>
                    <th>Category 1</th>
                    <th>Category 2</th>
                    <th>Category 3</th>
                    <th>Category 4</th>
                </tr>
            </thead>
            <tbody>
                <?php for ($i = 0; $i < 12; $i++): ?>
                    <tr>
                        <td><?= date('F', mktime(0, 0, 0, $i + 1, 1)) ?></td>
                        <td><?= $data['1'][$i] ?? 0 ?></td>
                        <td><?= $data['2'][$i] ?? 0 ?></td>
                        <td><?= $data['3'][$i] ?? 0 ?></td>
                        <td><?= $data['4'][$i] ?? 0 ?></td>
                    </tr>
                <?php endfor; ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
