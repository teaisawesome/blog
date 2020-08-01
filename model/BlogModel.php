<?php

class BlogModel
{
    private $con;

    public function __construct($database)
    {
        $this->con = $database;
    }

    public function login($username, $password)
    {
        $sql = $this->con->prepare("SELECT * FROM users WHERE username = ? AND password = ?");

        $sql->bindParam(1, $username);
        $sql->bindParam(2, $password);

        $sql->execute();

        $result = $sql->fetch(PDO::FETCH_ASSOC);

        if($result > 0)
        {
            $_SESSION["logged"] = true;

            $_SESSION["uid"] = $result["id"];

            return true;
        }
        else
        {
            return false;
        }
    }
    public function registration($username, $email, $password)
    {
        try
        {
            $sql = $this->con->prepare("INSERT INTO users(`username`, `email`, `password`) VALUES (?,?,?)");
            
            $sql->bindParam(1, $username);
            $sql->bindParam(2, $email);
            $sql->bindParam(3, $password);

            if($sql->execute())
                return true;
            else
                return false;
                
        }
        catch(PDOException $e)
        {
            return $e->getMessage();
        }
    }

    public function getPostById($postid)
    {
        try
        {
            $sql = $this->con->prepare("SELECT * FROM posts WHERE id = ?");

            $sql->bindParam(1, $postid);
            
            $sql->execute();

            $result = $sql->fetch(PDO::FETCH_ASSOC);

            return $result;
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    public function getAllBlogPosts()
    {
        try
        {
            $sql = $this->con->prepare("SELECT * FROM posts ORDER BY date DESC");

            $sql->execute();

            $result = $sql->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    public function getUserById($id)
    {
        try
        {
            $sql = $this->con->prepare("SELECT * FROM users WHERE id = ?");

            $sql->bindParam(1, $id);

            $sql->execute();

            $result = $sql->fetch(PDO::FETCH_ASSOC);

            return $result['username'];
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    public function newPost($content)
    {
        try
        {
            $sql = $this->con->prepare("INSERT INTO posts(`uid`, `content`) VALUES (?,?)");

            $sql->bindParam(1, $_SESSION['uid']);
            $sql->bindParam(2, $content);

            
            if($sql->execute())
                return true;

        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    public function editPost($content, $postid)
    {
        
        $sql = $this->con->prepare("UPDATE `posts` SET `content`= ?, `date`= CURRENT_TIMESTAMP() WHERE id = ?");

        $sql->bindParam(1, $content);
        $sql->bindParam(2, $postid);

        if($sql->execute())
        {
            return true;
        }
        else
        {
            return false;
        }
    
    }

    public function deletePost($postid)
    {
        $sql = $this->con->prepare("DELETE FROM posts WHERE id = ?");

        $sql->bindParam(1, $postid);

        if($sql->execute())
        {
            return true;
        }
        else
        {
            return false;
        }
    }

}

?>