<?php

class ArticleManager extends Model
{
    public function getArticle()
    {
        $this->getBdd();
        // retourne le nom de la table et l'objet
        return $this->getAll('articles', 'Article');

    }
}