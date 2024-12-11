<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('pages', function (Blueprint $table) {
            $table->string('seo_title')->nullable();
            $table->string('seo_author_name')->nullable();
            $table->text('seo_description')->nullable();
            $table->string('seo_meta_tag_robots')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pages', function (Blueprint $table) {
            $table->dropColumn('seo_title');
            $table->dropColumn('seo_author_name');
            $table->dropColumn('seo_description');
            $table->dropColumn('seo_meta_tag_robots');
        });
    }
};
