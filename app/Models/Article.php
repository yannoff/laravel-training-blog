<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

/**
 * @property $title
 * @property $contents
 * @property $slug
 */
class Article extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'articles';
    protected $primaryKey = 'id';
    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();
        static::saving([static::class, 'preSave']);
    }

    public static function preSave(Article $model)
    {
        $model->slug = Str::slug($model->title);
        $model->updated_at = new DateTime();
    }

    /**
     * @return BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function toDataRow()
    {
        return [
            'slug' => $this->slug,
            'title' => $this->title,
            'created' => $this->created_at,
            'updated' => $this->updated_at,
            'author' => User::find($this->user_id)?->name,
            'category' => Topic::find($this->topic_id)->label,
        ];
    }
}
