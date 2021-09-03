<?php
namespace Modules\Homelayout\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

/**
 * @author liming
 * @date 2021-08-19
 */
class ModuleSeeder extends Seeder
{
    public function run()
    {
        if (Schema::hasTable('module')){
            $info = DB::table('module')->where('id', '>', 0)->first();
            if(!$info){
                $arr = $this->defaultInfo();
                if(!empty($arr) && is_array($arr)) {
                    $created_at = $updated_at = date("Y-m-d H:i:s");
                    foreach ($arr as $name => $item) {
                        DB::table('module')->insert([
                            'name' => $item['name'],
                            'key' => $item['key'],
                            'pic' => $item['pic'],
                            'created_at' => $created_at,
                            'updated_at' => $updated_at,
                        ]);
                    }
                }
            }
        }
    }

    /**
     * 新增模块信息
     */
    private function defaultInfo()
    {
        return [
            ["name" => "轮播图", "key" => "banner", "pic" => "modules/homelayout/img/banner-bg.png"],
            ["name" => "搜索框", "key" => "search", "pic" => "modules/homelayout/img/search-bg.png"],
            ["name" => "导航图标", "key" => "nav", "pic" => "modules/homelayout/img/nav-bg.png"],
            ["name" => "专题", "key" => "topic", "pic" => "modules/homelayout/img/topic-bg.png"],
            ["name" => "领券中心", "key" => "coupon", "pic" => "modules/homelayout/img/coupon-bg.png"],
            ["name" => "所有分类", "key" => "cat", "pic" => "modules/homelayout/img/cat-bg.png"],
            ["name" => "整点秒杀", "key" => "miaosha", "pic" => "modules/homelayout/img/miaosha-bg.png"],
            ["name" => "拼团", "key" => "pintuan", "pic" => "modules/homelayout/img/pintuan-bg.png"],
            ["name" => "公告", "key" => "notice", "pic" => "modules/homelayout/img/notice-bg.png"],
            ["name" => "预约", "key" => "yuyue", "pic" => "modules/homelayout/img/yuyue-bg.png"],
            ["name" => "好店推荐", "key" => "mch", "pic" => "modules/homelayout/img/mch-bg.png"],
        ];
    }
}