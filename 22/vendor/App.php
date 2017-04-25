<?php

class App
{
    public static function isAuth()
    {
        return isset($_SESSION['auth']);
    }

    public static function redirect($uri)
    {
        header('Location: ' . $uri . '.php');
        exit();
    }

    public static function render($templatePath, $variables = [])
    {
        extract($variables);

        $viewsPath = __DIR__ . '/../views/';

        include $viewsPath . 'header.php';
        include $viewsPath . $templatePath . '.php';
        include $viewsPath . 'footer.php';

        return true;
    }

    public static function uploadFile(
        $file,
        $name = '',
        $dir = 'public/upload/img/',
        $allowed_types = ['image/png', 'image/x-png', 'image/jpeg', 'image/webp', 'image/gif']
    ) {

        $blacklist = [".php", ".phtml", ".php3", ".php4"];


        if (empty($name)) {
            $filename = $file['name'];
        } else {
            $filename = $name;
        }


        $ext = substr(
            $filename,
            strrpos($filename, '.'),
            strlen($filename) - 1
        );

        if (in_array($ext, $blacklist)) {
            return ['error' => 'Запрещено загружать исполняемые файлы'];
        }

        $upload_dir = dirname(__DIR__) . DIRECTORY_SEPARATOR . $dir . DIRECTORY_SEPARATOR;
        $max_filesize = 8388608;

        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 777, true);
        }


        if (!is_writable($upload_dir)) {
            return ['error' => 'Невозможно загрузить файл в папку "' . $upload_dir . '". Установите права доступа - 777.'];
        }

        if (!in_array($file['type'], $allowed_types)) {
            return ['error' => 'Данный тип файла не поддерживается.'];
        }

        if (filesize($file['tmp_name']) > $max_filesize) {
            return ['error' => 'файл слишком большой. максимальный размер ' . intval($max_filesize / (1024 * 1024)) . 'мб'];
        }

        if (!move_uploaded_file($file['tmp_name'],
            $upload_dir . $filename)
        ) {
            return ['error' => 'При загрузке возникли ошибки. Попробуйте ещё раз.'];
        }

        return ['filename' => $filename];
    }
}