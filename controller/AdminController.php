<?php
class AdminController
{
	public function addPost()
    {

	}

	public function updatePost()
    {

    }

    public function deletePost()
    {
        $postManager = new PostManager();
        $commentManager = new CommentManager();
        $post = $postManager->getPost($_GET['id']);
        $comments = $commentManager->getComments($_GET['id']);
        $deletePost = $postManager->deletePost($_GET['id']);
        $deleteComment = $commentManager->deletePostComments($_GET['id']);
    }	
}


