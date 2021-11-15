<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\CrudController;
use App\Models\Topic;
use Illuminate\Http\Request;

class TopicController extends CrudController
{
    protected function getModelName(): string
    {
        return Topic::class;
    }

    public function edit(Topic $topic)
    {
        return view ('back.topic.edit', ['item' => $topic]);
    }
}
