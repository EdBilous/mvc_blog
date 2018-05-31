<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 31.05.18
 * Time: 20:26
 */

trait ModelTrait
{
    /**
     *
     * @return array|bool
     */
    public function getArticles()
    {
        if ($this->connect()) {
            $sql = "SELECT articles.*, users.login AS authorLogin
                FROM articles
                INNER JOIN users ON articles.author = users.id
                ORDER BY created_at DESC;
                ";

            return $this->connect()->query($sql)->fetchAll(PDO::FETCH_OBJ);
        }

        return false;
    }

//    public function getCountTab($tab)
//    {
//        if (self::connect()) {
//            $sql = "SELECT COUNT(*) as count
//                    FROM $tab";
//            return self::connect()->query($sql)->fetchColumn();
//        }
//    }

    /**
     * @return bool
     */
    protected function saveImage()
    {
        if (!isset($_FILES)) {
            return false;
        }
        $uploadsDir = __DIR__ . '/../../uploads';

        if (!file_exists($uploadsDir)) {
            mkdir($uploadsDir, 0777, true);
        }
        foreach ($_FILES as $file) {
            if ($file['type'] != 'image/jpeg' && $file['type'] != 'image/png') {
                return false;
            }
            $dateTime = new DateTime();
            $name = (string)$dateTime->getTimestamp();
            $explodeName = explode('.', $file['name']);
            $result = move_uploaded_file($file['tmp_name'], $uploadsDir . '/' . $name . '.' . end($explodeName));
            if ($result) {
                return '/uploads/' . $name . '.' . end($explodeName);
            }
        }
    }
}