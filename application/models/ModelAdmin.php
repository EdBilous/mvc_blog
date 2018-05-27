<?php

class ModelAdmin extends Model
{
    /**
     *
     * @return array|bool
     */
    public function getArticles()
    {
        if ($this->connect()) {
            $sql = "SELECT articles.*, users.login AS autorLogin
                FROM articles
                INNER JOIN users ON articles.author = users.id
                ORDER BY created_at DESC;
                ";

            return $this->connect()->query($sql)->fetchAll(PDO::FETCH_OBJ);
        }

        return false;
    }

    public function getAllAuthor()
    {
        if ($this->connect()) {
            $sql = "SELECT *
                    FROM users
                    WHERE role != 'admin'
                    ORDER BY role ASC, name DESC
                    ";
            return $this->connect()->query($sql)->fetchAll(PDO::FETCH_OBJ);
        }
        return false;
    }

    /**
     * возвращает статьи для админки
     * admin_articles.php
     * @return array|bool
     */
    public function getAdminArticles()
    {
        $author = $_SESSION['id'];

        if ($this->connect()) {
            $sql = "SELECT *
                    FROM articles
                    WHERE author = '$author'
                    ORDER BY created_at DESC;
                    ";
            return $this->connect()->query($sql)->fetchAll(PDO::FETCH_OBJ);
        }
        return false;
    }

    /**
     * редактирование статьи
     * edit_articles.php
     * @param string
     */
    public function getArtForEdit($id)
    {
        if ($this->connect()) {
            $sql = "SELECT *
                    FROM articles
                    WHERE id=$id
                    ";
            return $this->connect()->query($sql)->fetch(PDO::FETCH_OBJ);
        }
        return false;
    }

    /**
     * добавление новой статьи
     * add_articles.php
     * @param array
     */
    public function insertArticle($data)
    {

        $date = date('Y-m-d H:i:s');
        $userid = $_SESSION['id'];
        $url = $this->getUrl($data['title']);

        $filePath = null;
        if (isset($_FILES)) {
            $filePath = $this->saveImage();
        }

        if ($this->connect()) {
            $sql = "INSERT INTO articles(title, sub_title, content, image, created_at, author, url)
                    VALUES ( :title,  :sub_title, :content, :image,  :created_at,  :author, :url)";
            $stmt = $this->connect()->prepare($sql);
            $stmt->bindParam(':title', $data['title'], PDO::PARAM_STR);
            $stmt->bindParam(':sub_title', $data['sub_title'], PDO::PARAM_STR);
            $stmt->bindParam(':content', $data['content'], PDO::PARAM_STR);
            $stmt->bindParam(':image', $filePath, PDO::PARAM_STR);
            $stmt->bindParam(':created_at', $date, PDO::PARAM_STR);
            $stmt->bindParam(':author', $userid, PDO::PARAM_STR);
            $stmt->bindParam(':url', $url, PDO::PARAM_STR);

            return $stmt->execute();
        }
    }

    /**
     * редактирование статей
     * edit_articles.php
     * @param array
     */
    public function updateArticle($post)
    {

        $title = $post['title'];
        $subtitle = $post['sub_title'];
        $text = $post['content'];
        $url = $post['url'];
        $id = $this->getArticleByUrl($url)->id;
        $date = date('Y-m-d H:i:s');

        $filePath = null;
        if (isset($_FILES)) {
            $filePath = $this->saveImage();
        }

        if ($filePath != null) {
            $article = $this->getArticleByUrl($url);
            if ($article->image) {
                unlink(__DIR__ . '/../../' . $article->image);
            }
        }


        if ($this->connect()) {
            $sql = "UPDATE articles SET title = :title, sub_title = :sub_title, content = :content, image = :image, created_at = :created_at WHERE id = $id";
            $stmt = $this->connect()->prepare($sql);
            $stmt->bindParam(':title', $title, PDO::PARAM_STR);
            $stmt->bindParam(':sub_title', $subtitle, PDO::PARAM_STR);
            $stmt->bindParam(':content', $text, PDO::PARAM_STR);
            $stmt->bindParam(':image', $filePath, PDO::PARAM_STR);
            $stmt->bindParam(':created_at', $date, PDO::PARAM_STR);
//             $stmt->bindParam(':id', $id, PDO::PARAM_STR);
            return $stmt->execute();
        }
        return false;
    }

    /**
     * удаление статьи
     * admin_articles.php
     * @param string
     */
    public function deleteArticle($url)
    {
        $id = $this->getArticleByUrl($url)->id;

        if ($this->connect()) {
            $sql = "DELETE FROM articles
                    WHERE id=$id;";
            return $this->connect()->prepare($sql)->execute();
        }
        return false;
    }

    /**
     * поиск по запросу.
     * index.php
     * @param string
     */
    public function search($query)
    {
        $query = trim($query);
        $query = htmlspecialchars($query);

        if (!empty($query)) {
            if (strlen($query) < 3) {
                echo '<p>Слишком короткий поисковый запрос.</p>';
                exit;
            } else if (strlen($query) > 128) {
                echo '<p>Слишком длинный поисковый запрос.</p>';
                exit;
            } else {
                $result = $this->getSearchArticle($query);
            }
            return $result;
        }

    }


    /**
     * PRIVATE METOD for Search.
     * @param string
     */

    private function getSearchArticle($query)
    {
        if ($this->connect()) {
            $sql = "SELECT *
                      FROM articles
                      WHERE title LIKE '%$query%'
                      OR sub_title LIKE '%$query%'
                      OR content LIKE '%$query%'";
            return $this->connect()->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        }
        return false;
    }

    /**
     * PRIVATE Url METODS.
     * @param string
     */
    private function getUrl($str)
    {
        $articleUrl = mb_strtolower($str);
        $articleUrl = str_replace(' ', '-', $articleUrl);
        $articleUrl = $this->transliteration($articleUrl);
        $articleIsset = $this->getArticleByUrl($articleUrl);
        if (!$articleIsset) {
            return $articleUrl;
        } else {
            $url = $articleIsset->url;
            $exUrl = explode('-', $url);
            if ($exUrl) {
                $temp = (int)end($exUrl);
                $newUrl = $exUrl[0] . '-' . ++$temp;
            } else {
                $temp = 0;
                $newUrl = $articleUrl . '-' . ++$temp;
            }
            return $this->getUrl($newUrl);
        }
    }

    /**
     *
     *
     * @param string
     */
    public function getArticleByUrl($str)
    {
        if ($this->connect()) {
            $sql = "SELECT *
                  FROM articles
                  WHERE url='$str'
                  ";
            return $this->connect()->query($sql)->fetch(PDO::FETCH_OBJ);
        }
        return false;
    }

    private function transliteration($str)
    {
        $st = strtr($str,
            array(
                'а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd',
                'е' => 'e', 'ё' => 'e', 'ж' => 'zh', 'з' => 'z', 'и' => 'i',
                'к' => 'k', 'л' => 'l', 'м' => 'm', 'н' => 'n', 'о' => 'o',
                'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't', 'у' => 'u',
                'ф' => 'ph', 'х' => 'h', 'ы' => 'y', 'э' => 'e', 'ь' => '',
                'ъ' => '', 'й' => 'y', 'ц' => 'c', 'ч' => 'ch', 'ш' => 'sh',
                'щ' => 'sh', 'ю' => 'yu', 'я' => 'ya', ' ' => '_', '<' => '_',
                '>' => '_', '?' => '_', '"' => '_', '=' => '_', '/' => '_',
                '|' => '_'
            )
        );
        $st2 = strtr($st,
            array(
                'А' => 'a', 'Б' => 'b', 'В' => 'v', 'Г' => 'g', 'Д' => 'd',
                'Е' => 'e', 'Ё' => 'e', 'Ж' => 'zh', 'З' => 'z', 'И' => 'i',
                'К' => 'k', 'Л' => 'l', 'М' => 'm', 'Н' => 'n', 'О' => 'o',
                'П' => 'p', 'Р' => 'r', 'С' => 's', 'Т' => 't', 'У' => 'u',
                'Ф' => 'ph', 'Х' => 'h', 'Ы' => 'y', 'Э' => 'e', 'Ь' => '',
                'Ъ' => '', 'Й' => 'y', 'Ц' => 'c', 'Ч' => 'ch', 'Ш' => 'sh',
                'Щ' => 'sh', 'Ю' => 'yu', 'Я' => 'ya'
            )
        );
        $translit = $st2;
        return $translit;
    }

//    public function updateByUrl($url, $postRequest)
//    {
//        $filePath = null;
//
//        if (isset($_FILES)) {
//            $filePath = $this->saveImage();
//        }
//
//
//        if ($filePath != null) {
//            $article = $this->getContentOneNews($url);
//                       if ($article['image']) {
//                unlink(__DIR__ . '/../../' . $article['image']);
//                          }
//       }
//
//        $title = $postRequest["title"];
//        $content = $postRequest["content"];
//
//        $sql = "UPDATE posts SET title='$title', content='$content', image='$filePath'
//                WHERE url='$url'";
//
//        if (mysqli_query($this->connect(), $sql)) {
//            return true;
//        } else {
//            return mysqli_error($this->connect());
//        }
//        public
//        function delImage($filePath)
//        {
//            if ($filePath != null) {
//                if (file_exists($filePath)) {
//                    return unlink(__DIR__ . '/../../' . $filePath);
//                }
//
//                return false;
//            }
//        }
}