<?php
class CommentManager extends Manager
{
    public function __construct()
    {
        $this->db = $this->dbConnect();
    }

    public function getComments($postId)
    {
        $getComments = $this->db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comment WHERE id_post = ? ORDER BY comment_date DESC');
        $getComments->execute(array($postId));
        return $getComments;
    }

    public function postComment($postId, $author, $comment)
    {
        $postComment = $this->db->prepare('INSERT INTO comment(id_post, author, comment, comment_date) VALUES(?, ?, ?, NOW())');
        $addComment = $postComment->execute(array($postId, $author, $comment));
        return $addComment;
    }

    public function deletePostComments()
    {
        $deletePostComments = $this->db->exec('DELETE FROM comment WHERE id_post= ?');
    }

   public function deleteComment()
    {
        $deleteComment = $this->db->exec('DELETE FROM comment WHERE id= ?');
    }

    public function updateComment()
    {
        //$updateComment = $this->db->;
    }
}
