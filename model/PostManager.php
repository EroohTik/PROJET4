<?php
class PostManager extends Manager
{

    public function __construct()
    {
        $this->db = $this->dbConnect();
    }

    public function getPosts()
    {
        $getPosts = $this->db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM post ORDER BY creation_date DESC LIMIT 0, 5');
        return $getPosts;
    }

    public function getPost($postId)
    {
        $getPost = $this->db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM post WHERE id = ?');
        $getPost->execute(array($postId));
        $post = $getPost->fetch();
        return $post;
    }

    public function addPost()
    {
        $addPost = $this->db->prepare('INSERT INTO post(title, content, creation_date) VALUES(:title, :content, NOW())');
        $addPost->execute(array(
            'title' => $_POST['title'],
            'content' => $_POST['content']));
        return $addPost;
    }

    public function deletePost()
    {
        $deletePost = $this->db->exec('DELETE FROM post WHERE id= ?');
    }

    public function updatePost()
    {
        $updatePost = $this->db->prepare('UPDATE post SET title = :nw_title, content = :nw_content WHERE id = :id_post');
        $updatePost->execute(array(
            'nw_title' => $_POST['title'],
            'nw_content' => $_POST['content'],
            'id_post' => $_POST['idPost']));
    }

    
}