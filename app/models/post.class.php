<?php

class Post

{

    public function create($DATA, $FILES, $image_class = null)
    {

        $_SESSION['error'] = "";

        $DB = Database::newInstance();

        $arr['title']       = ucwords($DATA['title']);
        $arr['post']        = $DATA['post'];
        $arr['date']        = date("Y-m-d H:i:s");
        $arr['user_url']    = $_SESSION['user_url'];
        $arr['url_address'] = str_to_url($DATA['title']);

        if (!preg_match("/^[a-zA-Z 0-9.,_\-]+$/", trim($arr['title']))) {

            $_SESSION['error'] .= "Please enter a valid title for this post<br>";
        }

        if (empty($arr['post'])) {

            $_SESSION['error'] .= "Please enter a valid content<br>";
        }

        // check if url_address is unique

        $url_address_arr['url_address'] = $arr['url_address'];
        $query = "select url_address from blogs where url_address = :url_address limit 1";
        $check = $DB->read($query, $url_address_arr);

        if ($check) {

            $arr['url_address'] .= "-" . rand(0, 99999);
        }

        $arr['image'] = "";

        $allowed[] = "image/jpeg";
        // $allowed[] = "image/png";
        // $allowed[] = "image/gif";
        // $allowed[] = "application/pdf";

        $size = 10;
        $size = ($size * 1024 * 1024);
        $folder = "uploads/";

        if (!file_exists($folder)) {

            mkdir($folder, 0777, true);
        }

        // check for files

        foreach ($FILES as $key => $img_row) {
            if ($img_row['error'] == 0 && in_array($img_row['type'], $allowed)) {
                if ($img_row['size'] < $size) {
                    $destination = $folder . $image_class->generate_filename(60) . ".jpg";
                    move_uploaded_file($img_row['tmp_name'], $destination);
                    $arr[$key] = $destination;
                    $image_class->resize_image($destination, $destination, 1500, 1500);
                } else {
                    $_SESSION['error'] .= $key . " is bigger than required size<br>";
                }
            }
        }

        if ($arr['image'] == "") {

            $_SESSION['error'] .= "Please add an image<br>";
        }

        if (!isset($_SESSION['error']) || $_SESSION['error'] == "") {

            $query = "insert into blogs (title, post, date, user_url, image, url_address) values (:title, :post, :date, :user_url, :image, :url_address)";
            $check = $DB->write($query, $arr);

            if ($check) {

                return true;
            }
        }
        return false;
    }
}
