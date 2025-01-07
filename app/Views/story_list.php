<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Stories</title>
</head>
<body>
    <h1>My Stories</h1>
    <?php if (!empty($stories)): ?>
        <ul>
            <?php foreach ($stories as $story): ?>
                <li>
                    <strong><?= esc($story['title']) ?></strong> - <?= esc($story['status']) ?>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>No stories found.</p>
    <?php endif; ?>
</body>
</html>
