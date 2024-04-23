<?php
const HOST = 'localhost';
const USERNAME = 'root';
const PASSWORD = '';
const DATABASE = 'blog';

function createDBConnection(): mysqli {
    $conn = new mysqli(HOST, USERNAME, PASSWORD, DATABASE);
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected successfully<br>";
    return $conn;
  }
  
function closeDBConnection(mysqli $conn): void {
    $conn->close();
}
  
function getAndPrintPostsFromDB(mysqli $conn, &$posts): void {
    $sql = "SELECT * FROM post WHERE featured = 1";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
            $posts[]= $row;
        }
    } else {
      echo "0 results";
    }
}

function getAndPrintMiniPostsFromDB(mysqli $conn, &$MiniPosts): void{
    $sql = "SELECT * FROM post WHERE featured = 0";
    $result = $conn->query($sql);
    if ($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $MiniPosts[] = $row;
        }
    } else {
        echo "0 results";
    }
}
  
$conn = createDBConnection();
getAndPrintPostsFromDB($conn, $posts);
getAndPrintMiniPostsFromDB($conn, $MiniPosts);
closeDBConnection($conn);
  
// $posts = [
//  [
//    'id' => 1,
//    'title' => 'The Road Ahead',
//    'subtitle' => 'The road ahead might be paved - it might not be.',
//    'img_modifier' => 'background1',
//    'author' => 'Mat Vogels',
//    'author_image' => 'static/images/person1.jpg',
//    'genre' => 'PHOTOGRAPHY',
//    'genre_color' => 'genre_color1',
//    'data' => 1443128400,
//    // другие свойства этого поста
//  ],
//  [
//     // свойства второго поста
//     'id' => 2,
//     'title' => 'From Top Down',
//     'subtitle' => 'Once a year, go someplace you’ve never been before.',
//     'img_modifier' => 'background2',
//     'author' => 'William Wong',
//     'author_image' => 'static/images/person2.jpg',
//     'genre' => 'ADVENTURE',
//     'genre_color' => 'genre_color2',
//     'data' => 1443128400,
//  ]
// ];

// $MiniPosts = [
//  [
//     'id' => 3,
//     'title' => 'Still Standing Tall',
//     'subtitle' => 'Life begins at the end of your comfort zone.',
//     'img_modifier' => 'static/images/air-balloon.jpg',
//     'author' => 'William Wong',
//     'author_image' => 'static/images/person2.jpg',
//     'data' => 1443214800,
//  ],
//  [
//     'id' => 4,
//     'title' => 'Sunny Side Up',
//     'subtitle' => 'No place is ever as bad as they tell you it’s going to be.',
//     'img_modifier' => 'static/images/bridge.jpg',
//     'author' => 'Mat Vogels',
//     'author_image' => 'static/images/person1.jpg',
//     'data' => 1443214800,
//  ],
//  [
//     'id' => 5,
//     'title' => 'Water Falls',
//     'subtitle' => 'We travel not to escape life, but for life not to escape us.',
//     'img_modifier' => 'static/images/lake.jpg',
//     'author' => 'Mat Vogels',
//     'author_image' => 'static/images/person1.jpg',
//     'data' => 1443214800,
//  ],
//  [
//     'id' => 6,
//     'title' => 'Through the Mist',
//     'subtitle' => 'Travel makes you see what a tiny place you occupy in the world.',
//     'img_modifier' => 'static/images/ocean.jpg',
//     'author' => 'William Wong',
//     'author_image' => 'static/images/person2.jpg',
//     'data' => 1443214800,
//  ],
//  [
//     'id' => 7,
//     'title' => 'Awaken Early',
//     'subtitle' => 'Not all those who wander are lost.',
//     'img_modifier' => 'static/images/fogy_bridge.jpg',
//     'author' => 'Mat Vogels',
//     'author_image' => 'static/images/person1.jpg',
//     'data' => 1443214800,
//  ],
//  [
//     'id' => 8,
//     'title' => 'Still Standing Tall',
//     'subtitle' => 'The world is a book, and those who do not travel read only one page.',
//     'img_modifier' => 'static/images/waterfall.jpg',
//     'author' => 'Mat Vogels',
//     'author_image' => 'static/images/person1.jpg',
//     'data' => 1443214800,
//  ],
// ];
?> 
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="static/styles/home5.css">
    <title>Let's do it together</title>
</head>
<body>
    <div class="background">
        <header class="header">
            <nav class="header__menu">
                <img src="static/images/Escape-white.svg" class="header__logo">    
                <ul class="header__menu-list list">
                    <li>HOME</li>
                    <li>CATEGORIES</li>
                    <li>ABOUT</li>
                    <li>CONTACT</li>
                </ul>
            </nav>
        </header>
        <main class="main">
            <div class="main__heading">
                <h1>Let's do it together</h1>
                <p>We travel the world in search of stories. Come along for the ride.</p>
                <button class="main__heading-button button-orange" type="button">View Latest Posts</button>
            </div> 
    </div>
        <nav class="main__menu">
            <ul class="main__menu-sections">
                <li>Nature</li>
                <li>Photography</li>
                <li>Relextion</li>
                <li>Vacation</li>
                <li>Travel</li>
                <li>Adventure</li>
            </ul>
        </nav>
        <div class="main__content">
            <div class="content__top">
                <div class="content__top-tilte">
                    <h2>Featured Posts</h2>
                </div>
                <div class="top-cards">
                    <?php 
                        foreach ($posts as $post) {
                        include 'post_preview.php';
                    }
                    ?>  
                    <!-- <div class="top-cards__first">
                        <p class="genre genre_color1">PHOTOGRAPHY</p>
                        <h3 class="top-cards__title">The Road Ahead</h3>
                        <p class="top-cards__subtitle">The road ahead might be paved - it might not be.</p>
                        <div class="info">
                            <div class="left-info">
                                <img src="images/person1.jpg" class="person">
                                <p class="name">Mat Vogels</p>
                            </div>
                            <div class="right-info">
                                <p class="data">September 25, 2015</p>
                            </div>
                        </div>
                    </div>
                    <div class="top-cards__second">
                        <p class="genre genre_color2">ADVENTURE</p>
                        <h3 class="top-cards__title">From Top Down</h3>
                        <p class="top-cards__subtitle">Once a year, go someplace you’ve never been before.</p>
                        <div class="info">
                            <div class="left-info">
                                <img src="images/person2.jpg" class="person">
                                <p class="name">William Wong</p>
                            </div>
                            <div class="right-info">
                                <p class="data">September 25, 2015</p>
                            </div>
                        </div>
                    </div> --> 
                </div>
            </div>
            <div class="content__center">
                <div class="content__center-title">
                    <h2>Most Recent</h2>
                </div>
                <div class="center-cards">
                    <?php 
                        foreach ($MiniPosts as $post) {
                        include 'post_preview2.php';
                        }
                    ?>
                    <!-- <div class="center-cards__firts">
                        <img src="static/images/air-balloon.jpg" class="image1">
                        <div class="center-cards__discribtion">
                            <h4 class="center-cards__title">Still Standing Tall</h4>
                            <p class="center-cards__subtitle subtitle1">Life begins at the end of your comfort zone.</p>
                        </div>
                        <div class="center-cards__info">
                            <div class="left-info1">
                                <img src="static/images/person2.jpg" class="person">
                                <p class="center-cards__name">William Wong</p>
                            </div>
                            <div class="right-info1">
                                <p class="center-cards__data">9/25/2015</p>
                            </div>
                        </div>
                    </div>
                    <div class="center-cards__second">
                        <img src="static/images/bridge.jpg" class="image1">
                        <div class="center-cards__discribtion">
                            <h4 class="center-cards__title">Sunny Side Up</h4>
                            <p class="center-cards__subtitle">No place is ever as bad as they tell you it’s going to be.</p>
                        </div>
                        <div class="center-cards__info">
                            <div class="left-info1">
                                <img src="static/images/person1.jpg" class="person">
                                <p class="center-cards__name">Mat Vogels</p>
                            </div>
                            <div class="right-info1">
                                <p class="center-cards__data">9/25/2015</p>
                            </div>
                        </div>
                    </div>
                    <div class="center-cards__third">
                        <img src="static/images/lake.jpg" class="image1">
                        <div class="center-cards__discribtion">
                            <h4 class="center-cards__title">Water Falls</h4>
                            <p class="center-cards__subtitle">We travel not to escape life, but for life not to escape us.</p>
                        </div>
                        <div class="center-cards__info">
                            <div class="left-info1">
                                <img src="static/images/person1.jpg" class="person">
                                <p class="center-cards__name">Mat Vogels</p>
                            </div>
                            <div class="right-info1">
                                <p class="center-cards__data">9/25/2015</p>
                            </div>
                        </div>
                    </div>
                    <div class="center-cards__fourth">
                        <img src="static/images/ocean.jpg" class="image1">
                        <div class="center-cards__discribtion">
                            <h4 class="center-cards__title">Through the Mist</h4>
                            <p class="center-cards__subtitle">Travel makes you see what a tiny place you occupy in the world.</p>
                        </div>
                        <div class="center-cards__info">
                            <div class="left-info1">
                                <img src="static/images/person2.jpg" class="person">
                                <p class="center-cards__name">William Wong</p>
                            </div>
                            <div class="right-info1">
                                <p class="center-cards__data">9/25/2015</p>
                            </div>
                        </div>
                    </div>
                    <div class="center-cards__fifth">
                        <img src="static/images/fogy_bridge.jpg" class="image1">
                        <div class="center-cards__discribtion">
                            <h4 class="center-cards__title">Awaken Early</h4>
                            <p class="center-cards__subtitle subtitle5">Not all those who wander are lost.</p>
                        </div>
                        <div class="center-cards__info">
                            <div class="left-info1">
                                <img src="static/images/person1.jpg" class="person">
                                <p class="center-cards__name">Mat Vogels</p>
                            </div>
                            <div class="right-info3">
                                <p class="center-cards__data">9/25/2015</p>
                            </div>
                        </div>
                    </div>
                    <div class="center-cards__sixth">
                        <img src="static/images/waterfall.jpg" class="image1">
                        <div class="center-cards__discribtion">
                            <h4 class="center-cards__title">Still Standing Tall</h4>
                            <p class="center-cards__subtitle">The world is a book, and those who do not travel read only one page.</p>
                        </div>
                        <div class="center-cards__info">
                            <div class="left-info1">
                                <img src="static/images/person1.jpg" class="person">
                                <p class="center-cards__name">Mat Vogels</p>
                            </div>
                            <div class="right-info1">
                                <p class="center-cards__data">9/25/2015</p>
                            </div>
                        </div>
                    </div> -->
                </div>    
            </div>   
        </div>
    </main>
    <footer class="footer">
        <nav class="footer__menu">
            <img src="static/images/Escape-white.svg" class="footer__logo">
            <ul class="footer__menu-list">
                <li>HOME</li>
                <li>CATEGORIES</li>
                <li>ABOUT</li>
                <li>CONTACT</li>
            </ul>
        </nav>
    </footer>
</body>
</html>