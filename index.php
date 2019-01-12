<?php
require('public/js/vendor/autoload.php');

try {
    if (isset($_GET['action']))
    {
        switch ($_GET['action'])
        {
            case 'listPosts':
                $posts = new FrontController;
                $posts->listPosts();
            break;
            
            case 'post':
                if (isset($_GET['id']) && $_GET['id'] > 0)
                {
                    $post = new FrontController;
                    $post->post();
                }
                else
                {
                    throw new Exception('No post ID sent.');
                }
            break;

            case 'addComment':
                if (isset($_GET['id']) && $_GET['id'] > 0)
                {
                    if (!empty($_POST['author']) && !empty($_POST['comment']))
                    {
                        $addComment = new UserController;
                        $addComment->addComment($_GET['id'], $_POST['author'], $_POST['comment']);
                    }
                    else
                    {
                        throw new Exception('Fill all champs please.');
                    }
                }
                else
                {
                    throw new Exception('No post ID sent.');
                }
            break;
        }
    }
    else
    {
        $posts = new FrontController;
        $posts->listPosts();
    }
}
catch(Exception $e)
{
    echo 'Error : ' . $e->getMessage();
}