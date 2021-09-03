<?php
// @author liming
namespace Modules\Homelayout\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Modules\Homelayout\Http\Controllers\Controller;
use Modules\Homelayout\Entities\Module;

class ModuleController extends Controller
{
    /**
     * 分页列表
     */
    public function list()
    {
        return view('homelayoutview::admin.module.list');
    }

    /**
     * ajax获取列表数据
     */
    public function ajaxList(Request $request)
    {
        $pagesize = $request->input('limit'); // 每页条数
        $page = $request->input('page',1);//当前页
        $where = [];

        $name = $request->input('name');
        if($name != "") $where[] = ["name", "like", "%{$name}%"];

        //获取总条数
        $count = Module::where($where)->count();

        //求偏移量
        $offset = ($page-1)*$pagesize;
        $list = Module::where($where)
            ->offset($offset)
            ->limit($pagesize)
            ->orderBy("id")
            ->get();
        foreach ($list as &$item){
            $item["show_pic"] = $item->setPicUrl($item->pic);
        }
        return $this->success(compact('list', 'count'));
    }
}
