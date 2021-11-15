<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Topic extends Model implements DataTable
{
    use HasFactory;
    use SoftDeletes;

    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    public function toDataRow()
    {
        return [
            'label' => $this->label,
            'slug' => $this->slug,
            'created' => $this->created_at,
        ];
    }
}
