<?php

namespace App\Database\Schema;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;

/**
 * Database utilities class
 */
class Utils
{
    /**
     * Add "created_at" and "updated_at" columns with CURRENT_TIMESTAMP as default to the blueprint
     *
     * @param Blueprint $table
     * @param int       $precision
     */
    static public function addTimestamps(Blueprint $table, int $precision= 0)
    {
        $now = DB::raw('CURRENT_TIMESTAMP');
        $table->timestamp('created_at', $precision)->default($now);
        $table->timestamp('updated_at', $precision)->default($now);
    }
}
