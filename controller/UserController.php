<?php
class UserController
{
    public function addComment($postId, $author, $comment)
    {
        $commentManager = new CommentManager();
        $addComment = $commentManager->postComment($postId, $author, $comment);
        if ($addComment === false)
        {
            throw new Exception('Can\'t add comment.');
        }
        else
        {
            header('Location: index.php?action=post&id=' . $postId);
        }
    }

    public function updateComment()
    {

    }

    public function deleteComment()
    {

    }
}