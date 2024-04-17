<a  title='<?= $post['title'] ?>' href="/post.php?id=<?= $post['post_id'] ?>" style="text-decoration: none;">
   <div class="center-cards__firts">
    <img src="<?= $post['image_url']?>"  class="image1">
   <div class="center-cards__discribtion">
        <h3 class="center-cards__title">
            <?=  $post['title'] ?>
        </h3>
        <p class="center-cards__subtitle">
            <?= $post['subtitle'] ?>
        </p>
    </div>
    <div class="center-cards__info">
        <div class="left-info1">
            <img src="<?= $post['author_url'] ?>" class="person">
            <p class="center-cards__name">
                <?= $post['author'] ?>
            </p>
        </div>
        <div class="right-info1">
            <p class="center-cards__data">
                <?= isset($post['publish_date']) ? DateTime::createFromFormat('Y-m-d H:i:s', $post['publish_date'])->format("m/d/Y"): '' ?>
            </p>
        </div>
      </div>
   </div>
</a>