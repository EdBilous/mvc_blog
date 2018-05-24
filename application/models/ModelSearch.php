<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 24.05.18
 * Time: 13:14
 */

class ModelSearch extends Model
{
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
            $sql = "SELECT articles.*, users.login AS authorLogin
                      FROM articles INNER JOIN users
                      ON articles.author = users.id
                      WHERE title LIKE '%$query%'
                      OR sub_title LIKE '%$query%'
                      OR content LIKE '%$query%'
                      ;";
            return $this->connect()->query($sql)->fetchAll(PDO::FETCH_OBJ);
        }
        return false;
    }
}