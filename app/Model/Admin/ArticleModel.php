<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class ArticleModel extends Model
{
    protected $table = 'article';
    protected $primaryKey = 'art_id';
    public $timestamps = true;
}
