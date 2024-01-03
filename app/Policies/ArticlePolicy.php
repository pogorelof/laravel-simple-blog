<?php

namespace App\Policies;

use App\Models\Article;
use App\Models\User;

class ArticlePolicy
{
    public function update(User $user, Article $article)
    {
        return $user->id === $article->user->id;
    }

    public function delete(User $user, Article $article)
    {
        return $this->update($user, $article);
    }
}
