<!DOCTYPE html>
<link rel="stylesheet" href="/app.css">

<title>My Blogs</title>

<body>
    <?php foreach ($posts as $post) : ?>
    <div  class="mainDiv">
        <h1>
            <a href="post/<?= $post->slug ?>">
                <?= $post->title; ?>
            </a>
        </h1>
        <article>
            <?= $post->excerpt; ?>
        </article>
    </div>
    <?php endforeach; ?>    
</body