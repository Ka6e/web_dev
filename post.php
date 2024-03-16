<?php
$post = [
  'id' => 1,
  'title' => 'The Road Ahead',
  'subtitle' => 'The road ahead might be paved - it might not be.',
  'img' => 'images/northern-lights.jpg',
  
];
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="static/styles/post-styles.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> The Road Ahead </title>
</head>
<body>
    <header class="header">
        <nav class="navigation">
            <img class="header__logo" src="images/Escape-black.svg">
            <ul class="navigation__header-list">
                <li>HOME</li>
                <li>CATEGORIES</li>
                <li>ABOUT</li>
                <li>CONTACT</li>
            </ul>
        </nav>
    </header>
    <main class="main">
        <div class="main__heading heading">
            <h1 class="heading__title"><?= $post['title']?></h1>
            <p class="heading__subtitle"><?= $post['subtitle'] ?></p>
        </div>
        <img class="banner" src="<?= $post['img'] ?>">
        <div class="main__content">
            <p class="main__content-text">Dark spruce forest frowned on either side the frozen waterway. The trees had been<br>
                stripped by a recent wind of their white covering of frost, and they seemed to lean<br>
                towards each other, black and ominous, in the fading light. A vast silence reigned over<br>
                the land. The land itself was a desolation, lifeless, without movement, so lone and cold<br>
                that the spirit of it was not even that of sadness. There was a hint in it of laughter, but of a<br>
                laughter more terrible than any sadness—a laughter that was mirthless as the smile of<br>
                the sphinx, a laughter cold as the frost and partaking of the grimness of infallibility. It was<br>
                the masterful and incommunicable wisdom of eternity laughing at the futility of life and<br>
                the effort of life. It was the Wild, the savage, frozen-hearted Northland Wild.<br>
                <br>
                But there was life, abroad in the land and defiant. Down the frozen waterway toiled a<br>
                string of wolfish dogs. Their bristly fur was rimed with frost. Their breath froze in the air<br>
                as it left their mouths, spouting forth in spumes of vapour that settled upon the hair of<br>
                their bodies and formed into crystals of frost. Leather harness was on the dogs, and<br>
                leather traces attached them to a sled which dragged along behind. The sled was without<br>
                runners. It was made of stout birch-bark, and its full surface rested on the snow. The front<br>
                end of the sled was turned up, like a scroll, in order to force down and under the bore of<br>
                soft snow that surged like a wave before it. On the sled, securely lashed, was a long and<br>
                narrow oblong box. There were other things on the sled—blankets, an axe, and a coffee-<br>
                pot and frying-pan; but prominent, occupying most of the space, was the long and<br>
                narrow oblong box.<br>
                <br>
                In advance of the dogs, on wide snowshoes, toiled a man. At the rear of the sled toiled a<br>
                second man. On the sled, in the box, lay a third man whose toil was over,—a man whom<br>
                the Wild had conquered and beaten down until he would never move nor struggle again.<br>
                It is not the way of the Wild to like movement. Life is an offence to it, for life is<br>
                movement; and the Wild aims always to destroy movement. It freezes the water to<br>
                prevent it running to the sea; it drives the sap out of the trees till they are frozen to their<br>
                mighty hearts; and most ferociously and terribly of all does the Wild harry and crush into<br>
                submission man—man who is the most restless of life, ever in revolt against the dictum<br>
                that all movement must in the end come to the cessation of movement.<br>
                <br>
                But at front and rear, unawed and indomitable, toiled the two men who were not yet<br>
                dead. Their bodies were covered with fur and soft-tanned leather. Eyelashes and cheeks<br>
                and lips were so coated with the crystals from their frozen breath that their faces were<br>
                not discernible. This gave them the seeming of ghostly masques, undertakers in a<br>
                spectral world at the funeral of some ghost. But under it all they were men, penetrating<br>
                the land of desolation and mockery and silence, puny adventurers bent on colossal<br>
                adventure, pitting themselves against the might of a world as remote and alien and<br>
                pulseless as the abysses of space.
            </p>
        </div>
    </main>
    <footer class="footer">
        <nav class="navigation">
            <img class="footer__logo" src="images/Escape-white.svg">
            <ul class="navigation__footer-list">
                <li>HOME</li>
                <li>CATEGORIES</li>
                <li>ABOUT</li>
                <li>CONTACT</li>
            </ul>
        </nav>
    </footer>
</body>

</html>