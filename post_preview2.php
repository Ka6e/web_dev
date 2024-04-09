<a  title='<?= $post['title'] ?>' href="/post.php?id=<?= $post['id'] ?>" style="text-decoration: none;">
   <div class="center-cards__firts">
    <img src="<?= $post['img_modifier']?>"  class="image1">
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
            <img src="<?= $post['author_image'] ?>" class="person">
            <p class="center-cards__name">
                <?= $post['author'] ?>
            </p>
        </div>
        <div class="right-info1">
            <p class="center-cards__data">
               <?= date("m/d/Y", $post['data']) ?>
            </p>
        </div>
      </div>
   </div>
</a>