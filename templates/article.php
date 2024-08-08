<div class="col-lg-4 col-md-6 col-sm-12 mb-4">
    <div class="card article">
        <div class="position-relative">
            <a href="report.php?title=<?php echo urlencode($article['title']); ?>" target="_blank">
                <img src="<?php echo $article['image']; ?>" class="card-img-top rounded" alt="<?php echo $article['title']; ?>">
                <?php if (isset($article['category'])): ?>
                    <span class="category-badge"><?php echo $article['category']; ?></span>
                <?php endif; ?>
                <?php if (isset($article['time'])): ?>
                    <span class="time-badge"><?php echo $article['time']; ?></span>
                <?php endif; ?>
            </a>
        </div>
        <div class="card-body rounded">
            <a href="report.php?title=<?php echo urlencode($article['title']); ?>" target="_blank">
                <h5 class="card-title article-title"><?php echo $article['title']; ?></h5>
            </a>
            <div class="divider"></div> <!-- Línea divisora -->
            <p class="card-text"><?php echo $article['description']; ?></p>
        </div>
    </div>
</div>
