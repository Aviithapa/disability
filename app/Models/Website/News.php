<?php


namespace App\Models\Website;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class News extends Model
{
    use SoftDeletes;
    protected $table = 'news';
    protected $fillable = ['title', 'content', 'excerpt', 'image', 'type', 'slug', 'created_by', 'deleted_at'];

    public function getImage()
    {
        if (isset($this->image)) {
            return uploadedAsset('news_pic', $this->image);
        } else {
            return imageNotFound();
        }
    }
}
