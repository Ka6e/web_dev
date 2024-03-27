<a  title='<?= $post['title'] ?>' href="/post.php?id=<?= $post['id'] ?>" style="text-decoration: none;">
   <div class="top-cards__first <?= $post['img_modifier']?>">
      <p class="genre <?= $post['genre_color'] ?>">
         <?= $post['genre'] ?>
      </p>
      <h3 class="top-cards__title">
         <?=  $post['title'] ?>
      </h3>
      <p class="top-cards__subtitle">
         <?= $post['subtitle'] ?>
      </p>
      <div class="info">
         <div class="left-info">
            <img src="<?= $post['author_image'] ?>" class="person">
            <p class="name">
               <?= $post['author'] ?>
            </p>
         </div>
         <div class="right-info">
            <p class="data">
               <?= $post['data'] ?>
            </p>
         </div>
      </div>
   </div>
</a>