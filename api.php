<?php
  include 'connection.php';

    $method = $_SERVER['REQUEST_METHOD'];
    if ($method === "POST"){
        $dataAsJson = file_get_contents("php://input");
        $dataAsArray = json_decode($dataAsJson, true);
        saveImage($dataAsArray['image']);
        saveInfoDB($dataAsArray);
    }
    else {
      echo 'Неверный метод обработки';
    }

    function saveFile(string $file, string $data): void {
        $myFile = fopen('static/images/image.jpg', 'w');
        if ($myFile) {
          $result = fwrite($myFile, $data);
          if ($result) {
            echo 'Данные успешно сохранены в файл';
          } else {
            echo 'Произошла ошибка при сохранении данных в файл';
          }
          fclose($myFile);
        } else {
          echo 'Произошла ошибка при открытии файла';
        }
      }

    function saveImage(string $imageBase64): void {
        $imageBase64Array = explode(';base64,', $imageBase64);
        $imgExtention = str_replace('data:image/', '', $imageBase64Array[0]);
        $imageDecoded = base64_decode($imageBase64Array[1]);
        saveFile("image.{$imgExtention}", $imageDecoded);
    }      
    
    function saveInfoDB(array $postData): void {
      $requiredFields = ['title', 'subtitle', 'author', 'author_url', 'image_url', 'featured', 'publish_date'];
      foreach ($requiredFields as $field) {
          if (!isset($postData[$field])) {
              echo "Отсутствует обязательное поле: $field";
              return;
          }
      }

      if(empty($postData['content'])) {
        $postData['content'] = ' ';
      }
      
      $conn = createDBConnection();
      
      $stmt = $conn->prepare("
          INSERT INTO post (title, subtitle, content, author, author_url, image_url, featured, publish_date, genre, genre_color, background)
          VALUES(?,?,?,?,?,?,?,FROM_UNIXTIME(?),?,?,?)
      ");
    
      $stmt->bind_param('ssssssiisss', $postData['title'], $postData['subtitle'], $postData['content'], $postData['author'], $postData['author_url'], $postData['image_url'], $postData['featured'], $postData['publish_date'], $postData['genre'], $postData['genre_color'], $postData['background'] );

      if ($stmt->execute()) {
        echo 'Пост успешно сохранен в базе данных';
      } else {
        echo 'Произошла ошибка при сохранении поста в базе данных: ' . $stmt->error;
      }

      closeDBConnection($conn);
    }
?>