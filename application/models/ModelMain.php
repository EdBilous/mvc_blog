<?php

class ModelMain extends Model
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
}