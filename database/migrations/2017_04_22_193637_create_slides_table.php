<?php
/**
 * Laravel-cms - cms based on laravel
 *
 * @category  Laravel-cms
 * @package   Laravel
 * @author    Qiangzi <35924784@qq.com>
 * @date      2018/06/06 09:08:00
 * @copyright Copyright 2018 CMS
 * @license   https://opensource.org/licenses/MIT
 * @github    https://github.com/35924784/laravel-cms
 ***
 * @version   Release 1.0
 */

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSlidesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slides', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('object_id')->comment('objectId');
            $table->smallInteger("group")->default(0)->comment('分组');
            $table->string("title",100)->comment('标题');
            $table->string("description",255)->default('')->comment('描述');
            $table->string('target',32)->default('_self')->comment("是否新建标签");
            $table->string("link",255)->comment('URL');
            $table->string("image",255)->comment('图片');
            $table->integer("order")->comment('排序');
            $table->enum("status",[0,1,2])->default(1)->comment('状态');
           
            $table->timestamps();
            $table->softDeletes();
    
            $table->index('group','group_index');
            $table->index('order','order_index');
            $table->index('status','status_index');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('slides');
    }
}
