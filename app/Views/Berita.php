<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berita Management</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Berita Management</h1>

        <!-- Success/Error Messages -->
        <?php if (session()->getFlashdata('message')): ?>
            <div class="alert alert-success">
                <?= session()->getFlashdata('message') ?>
            </div>
        <?php endif; ?>

        <!-- Add New Berita Form -->
        <div class="card mb-4">
            <div class="card-header">Add / Edit Berita</div>
            <div class="card-body">
                <form action="<?= base_url('berita/create') ?>" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="kategori_id" class="form-label">Kategori ID</label>
                        <input type="number" class="form-control" id="kategori_id" name="kategori_id" required>
                    </div>
                    <div class="mb-3">
                        <label for="news_title" class="form-label">News Title</label>
                        <input type="text" class="form-control" id="news_title" name="news_title" required>
                    </div>
                    <div class="mb-3">
                        <label for="news_description" class="form-label">News Description</label>
                        <textarea class="form-control" id="news_description" name="news_description" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="path" class="form-label">Upload Image</label>
                        <input type="file" class="form-control" id="path" name="path">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>

        <!-- List of Berita -->
        <div class="card">
            <div class="card-header">Berita List</div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>News ID</th>
                            <th>Kategori ID</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Filename</th>
                            <th>Filesize</th>
                            <th>Path</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($beritaList)): ?>
                            <?php foreach ($beritaList as $berita): ?>
                                <tr>
                                    <td><?= $berita['news_id'] ?></td>
                                    <td><?= $berita['kategori_id'] ?></td>
                                    <td><?= $berita['news_title'] ?></td>
                                    <td><?= $berita['news_description'] ?></td>
                                    <td><?= $berita['filename'] ?></td>
                                    <td><?= $berita['filesize'] ?> KB</td>
                                    <td><a href="<?= $berita['path'] ?>" target="_blank">View</a></td>
                                    <td>
                                        <a href="<?= base_url('berita/filter?news_id=' . $berita['news_id']) ?>" class="btn btn-info btn-sm">Edit</a>
                                        <a href="<?= base_url('berita/delete?news_id=' . $berita['news_id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this berita?')">Delete</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="8" class="text-center">No data found</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
