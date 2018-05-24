<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 24.05.18
 * Time: 18:22
 */

class ModelPost extends Model
{
    /**
     *
     *
     * @param string
     */
    public function getPostByUrl($str)
    {
        if ($this->connect()) {
            $sql = "SELECT articles.*, users.login AS authorLogin
                  FROM articles INNER JOIN users
                  ON articles.author = users.id
                  WHERE url='$str'
                  ";
            return $this->connect()->query($sql)->fetch(PDO::FETCH_OBJ);
        }
        return false;
    }
}