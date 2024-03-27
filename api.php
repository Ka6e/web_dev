<?php
$method = $_SERVER['REQUEST_METHOD'];

if ($method == 'POST'){
    $dataAsJson = file_get_contents("php://input");
    $dataAsArray = json_decode($dataAsJson, true);
    saveImage($dataAsArray['image']);
    if (isset($dataAsArray['image'])) {
        saveImage($dataAsArray['image']);    
    } else {
        echo 'Изображение не найдено в данных';
    }    
}

function saveImage(string $imageBase64) {
    $imageBase64Array = explode(';base64,', $imageBase64);
    if (count($imageBase64Array) == 2) {   
    $imgExtention = str_replace('data:image/', '', $imageBase64Array[0]);
    $imageDecoded = base64_decode($imageBase64Array[1]);
        if ($imageDecoded != false) {
            saveFile("image.{$imgExtention}", $imageDecoded);
        } else {
            echo 'ошибка при декодировании изображения';
        }
    
    } else {
        echo 'Некорректный формат данных изображения';
    }
}

function saveFile(string $file, string $data): void {
    $directory = 'static/';
    $filePath = $directory . $file;
    $myFile = fopen($file, 'w');
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
// $uploadDirectory = 'static/';  

// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     // Проверяем, содержит ли запрос JSON-данные
//     $json = file_get_contents('php://input');
//     $data = json_decode($json, true);

//     if ($data === null) {
//         // Возвращаем ошибку, если JSON неверный или пустой
//         http_response_code(400);
//         echo json_encode(['error' => 'Invalid JSON']);
//         exit;
//     }

//     if (!isset($data['image']) || empty($data['image'])) {
//         // Возвращаем ошибку, если в запросе отсутствует изображение
//         http_response_code(400);
//         echo json_encode(['error' => 'No image provided']);
//         exit;
//     }

//     // Преобразуем base64-кодированное изображение в данные файла
//     $imageData = base64_decode($data['image']);

//     // Генерируем уникальное имя файла
//     $filename = uniqid() . '.jpg';
    
//     // Путь к файлу
//     $filePath = $uploadDirectory . $filename;

//     // Сохраняем изображение в файл
//     file_put_contents($filePath, $imageData);

//     // Возвращаем успешный ответ с именем сохраненного файла
//     echo json_encode(['success' => true, 'filename' => $filename]);
// } else {
//     // Возвращаем ошибку, если запрос не был POST
//     http_response_code(405);
//     echo json_encode(['error' => 'Method Not Allowed']);
// }
?>
