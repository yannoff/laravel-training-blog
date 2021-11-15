<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\CrudController;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends CrudController
{
    protected function getModelName(): string
    {
        return Tag::class;
    }

    public function edit(Tag $tag)
    {
        return view ('back.tag.edit', ['item' => $tag]);
    }
}
