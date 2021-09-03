<?php
// @author liming
namespace Modules\Homelayout\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Modules\Homelayout\Http\Controllers\Controller;
use Modules\Homelayout\Http\Requests\Admin\HomeSettingRequest;
use Modules\Homelayout\Entities\BaseModel;
use Modules\Homelayout\Entities\Cube;
use Modules\Homelayout\Entities\GoodsCat;
use Modules\Homelayout\Entities\Module;

class HomeController extends Controller
{
    /**
     * 小程序首页布局设置
     */
    public function setting(HomeSettingRequest $request)
    {
        if($request->isMethod('post')) {
            $request->check();
            $data = $request->post("data") ?? [];
            if(!file_exists(module_path('Homelayout', '/Config/home_layout.php'))){
                return $this->failed('配置文件不存在');
            }else{
                $myfile = fopen(module_path('Homelayout', '/Config/home_layout.php'), "w");
                fwrite($myfile, "<?php");
                fwrite($myfile, "\n");
                fwrite($myfile, "return [");
                fwrite($myfile, "\n");

                foreach ($data as $item){
                    fwrite($myfile, '  [');
                    fwrite($myfile, "\n");
                    fwrite($myfile, '    "key" => "'.$item["key"].'",');
                    fwrite($myfile, "\n");
                    fwrite($myfile, '    "name" => "'.$item["name"].'",');
                    fwrite($myfile, "\n");
                    fwrite($myfile, '    "pic" => "'.$item["pic"].'",');
                    fwrite($myfile, "\n");
                    if(isset($item["cat_id"])){
                        fwrite($myfile, '    "cat_id" => "'.$item["cat_id"].'",');
                        fwrite($myfile, "\n");
                    }
                    if(isset($item["cube_id"])){
                        fwrite($myfile, '    "cube_id" => "'.$item["cube_id"].'",');
                        fwrite($myfile, "\n");
                    }
                    fwrite($myfile, '  ],');
                    fwrite($myfile, "\n");
                }

                fwrite($myfile, "];");
                fwrite($myfile, "\n");

                fclose($myfile);
                return $this->success();
            }
        } else {
            $domain = BaseModel::getDomain();
            $moduleList = Module::orderBy("id")->get();
            if(Schema::hasTable("goods_cat")){
                $catList =  GoodsCat::where("parent_id", 0)->orderBy("id")->get();
            }else{
                $catList = [];
            }
            if(Schema::hasTable("cube")){
                $cubeList = Cube::orderBy("id")->get();
            }else{
                $cubeList = [];
            }
            $showModule = config("homelayouthomelayout");
            return view('homelayoutview::admin.home.setting', compact('moduleList', "catList", "cubeList", 'showModule', 'domain'));
        }
    }
}
