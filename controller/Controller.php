<?php 
    class Controller
    {
        public $model = null;

        public function __construct($model)
        {
            $this->model = $model;
        }

        public function loginPage($controller)
        {
            require("view/templates/header.php");
            require("view/loginpage.php");
            require("view/templates/footer.php");
        }

        public function homePage($controller)   
        {
            $blogposts = $this->model->getAllBlogPosts();

            require("view/templates/header.php");
            require("view/homepage.php");
            require("view/templates/footer.php");
        }

        public function registrationPage($controller)
        {
            require("view/templates/header.php");
            require("view/registrationpage.php");
            require("view/templates/footer.php");
        }

        public function newPostPage($controller)
        {
            require("view/templates/header.php");
            require("view/newpostpage.php");
            require("view/templates/footer.php");
        }

        public function editPostPage($controller, $postid)
        {
            require("view/templates/header.php");
            require("view/editpage.php");
            require("view/templates/footer.php");
        }

        public function login($username, $password)
        {
            if($this->model->login($username, $password))
            {
                header("Location: home.php");

                return true;
            }
            else
            {
                return false;
            }
        }

        public function registration($username, $email, $password)
        {
            
            if($this->model->registration($username, $email, $password))
            {
                header("Location: http://localhost/blog/");

                return true;
            }
            else
            {
                return false;
            }
        }

        public function newPost($content)
        {
            if($this->model->newPost($content))
            {
                header("Location: http://localhost/blog/home.php");
            }
        }

        public function editPost($content, $postid)
        {
            if($this->model->editPost($content, $postid))
            {
                header("Location: http://localhost/blog/home.php");
            }
        }

        public function deletePost($postid)
        {
            if($this->model->deletePost($postid))
            {
                header("Location: http://localhost/blog/home.php");
            }
        }

        public function getUsernameById($id)
        {
            return $this->model->getUserById($id);
        }

        public function getPostById($postid)
        {
            return $this->model->getPostById($postid);
        }
    }

?>