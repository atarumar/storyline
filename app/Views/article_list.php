<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Article List - StoryLine</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen, Ubuntu, Cantarell, "Open Sans", "Helvetica Neue", sans-serif;
        }

        body {
            background-color: #fff;
        }

        /* Navigation */
        .nav {
            padding: 1rem;
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
        }

        .logo {
            font-weight: bold;
            font-size: 1.5rem;
            text-decoration: none;
            color: #000;
        }

        .nav-right {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .search-box {
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 20px;
            background: #f9f9f9;
            width: 240px;
        }

        .setting-btn {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            text-decoration: none;
            color: #1a8917;
        }

        /* Profile Section */
        .profile {
            max-width: 1000px;
            margin: 0 auto;
            padding: 3rem 1rem;
        }

        .profile-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 2rem;
        }

        .edit-btn {
    color: #1a8917; /* Same green color as settings edit links */
    text-decoration: none; /* Remove underline */
    font-size: 0.9rem; /* Match font size */
    cursor: pointer; /* Pointer cursor */
}

.edit-btn:hover {
    text-decoration: underline; /* Add underline on hover for clarity */
}

.delete-btn {
    color: #ff4040;
    text-decoration: none;
    cursor: pointer;
    font-size: 0.9rem;
}

.delete-btn:hover {
    text-decoration: underline;
    color: #ff0000; /* Add underline on hover for clarity */
}


        .profile-info {
            flex: 1;
        }

        .profile-name {
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }

        .profile-avatar {
            width: 88px;
            height: 88px;
            border-radius: 50%;
            object-fit: cover;
        }

        .write-btn {
            background: #1a8917;
            display: inline-block;
            margin-top: 2rem;
            padding: 0.75rem 1.5rem;
            color: #fff;
            border: none;
            border-radius: 20px;
            font-size: 1.25remrem;
            cursor: pointer;
            text-decoration: none;
            
        }

        /* Tabs */
        .tabs {
            display: flex;
            gap: 2rem;
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
            margin-bottom: 2rem;
        }

        .tab {
            padding: 1rem 0;
            color: #6b6b6b;
            text-decoration: none;
            font-size: 0.9rem;
        }

        .tab.active {
            color: #000;
            border-bottom: 1px solid #000;
        }

        /* Articles */
        .articles {
            display: flex;
            flex-direction: column;
            gap: 2rem;
        }

        .article {
            display: flex;
            gap: 2rem;
            text-decoration: none;
            color: inherit;
        }

        .article-content {
            flex: 1;
        }

        .article-title {
            font-size: 1.5rem;
            margin-bottom: 0.5rem;
            color: #000;
            text-decoration: none;
        }

        .article-preview {
            color: #6b6b6b;
            font-size: 1rem;
            line-height: 1.5;
            margin-bottom: 0.5rem;
        }

        .article-meta {
            color: #6b6b6b;
            font-size: 0.9rem;
        }

        .article-image {
            width: 200px;
            height: 134px;
            object-fit: cover;
        }

        .no-articles {
            text-align: center;
            font-size: 1.2rem;
            color: #6b6b6b;
            margin-top: 2rem;
        }

        /* Footer */
        .footer {
            padding: 2rem;
            text-align: center;
            color: #6b6b6b;
            font-size: 0.9rem;
            border-top: 1px solid rgba(0, 0, 0, 0.1);
            margin-top: 4rem;
        }

        .footer-links {
            display: flex;
            justify-content: center;
            gap: 1rem;
            margin-bottom: 1rem;
        }

        .footer-link {
            color: #6b6b6b;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <nav class="nav">
        <a href="/articles" class="logo">StoryLine</a>
        <div class="nav-right">
            <input type="search" placeholder="Search StoryLine" class="search-box">
            <a href="/settings" class="setting-btn">Setting</a>
           
    </nav>

    <main class="profile">
        <div class="profile-header">
            <div class="profile-info">
                <h1 class="profile-name"> Welcome <?= session()->get('nama_lengkap') ?? 'User' ?>, Let's Start Writing!</h1>
                <a href="<?= base_url('/story/new') ?>" class="write-btn">Write</a>

            </div>
        </div>

        <nav class="tabs">
            <a href="#" class="tab active">Published</a>
            <a href="#" class="tab">Draft</a>
            <a href="#" class="tab">Stats</a>
        </nav>

        <div class="articles">
    <?php if (!empty($articles)): ?>
        <?php foreach ($articles as $article): ?>
            <article class="article">
                <div class="article-content">
                    <h2 class="article-title">
                        <a href="<?= base_url('/articles' . $article['story_id']) ?>">
                            <?= esc($article['title']) ?>
                        </a>
                    </h2>
                    <p class="article-preview"><?= esc(substr($article['content'], 0, 150)) ?>...</p>
                    <div class="article-meta"><?= date('M d, Y', strtotime($article['created_at'])) ?></div>
                </div>
                <img src="<?= esc($article['image_url']) ?>"  class="article-image">
                <a href="<?= base_url('/story/edit/' . $article['story_id']) ?>" class="edit-btn">Edit</a>
                <a href="#" class="delete-btn" onclick="confirmDelete(<?= $article['story_id'] ?>)">Delete</a>

            </article>
        <?php endforeach; ?>
    <?php else: ?>
        <div class="no-articles">No articles available. Be the first to publish one!</div>
    <?php endif; ?>
</div>

    <footer class="footer">
        <div class="footer-links">
            <a href="#" class="footer-link">Help</a>
            <a href="#" class="footer-link">Status</a>
            <a href="#" class="footer-link">About</a>
            <a href="#" class="footer-link">Careers</a>
            <a href="#" class="footer-link">Blog</a>
            <a href="#" class="footer-link">Privacy</a>
            <a href="#" class="footer-link">Terms</a>
            <a href="#" class="footer-link">Text to speech</a>
        </div>
    </footer>
    </main>
    <script>
        function confirmDelete(storyId) {
            if (confirm("Are you sure you want to delete this article?")) {
                window.location.href = `<?= base_url('/story/delete/') ?>${storyId}`;
            }
        }
    </script>
</body>
</html>
