@extends('admin.public.header')
@section('listcontent')
    <style>
        .mobile-box {
            width: 219px;
            height: 450px;
            background-image: url("/layuimini/images/share-custom/mobile-iphone.png");
            background-size: cover;
            position: relative;
            font-size: 13px;
            float: left;
            margin-right: 30px;
        }

        .mobile-box .mobile-screen {
            position: absolute;
            top: 52px;
            left: 12px;
            right: 13px;
            bottom: 54px;
            border: 1px solid #999;
            background: #f5f7f9;
            overflow-y: hidden;
        }

        .mobile-box .mobile-navbar {
            position: absolute;
            top: 0px;
            left: 0px;
            right: 0px;
            height: 38px;
            line-height: 38px;
            text-align: center;
            background: #fff;
        }

        .mobile-box .mobile-content {
            position: absolute;
            top: 38px;
            left: 0;
            right: 0;
            bottom: 0;
            overflow-y: auto;
        }

        .mobile-box .mobile-content::-webkit-scrollbar {
            width: 2px;
        }

        .mobile-content .mobile-info{
            cursor: move;
            position: relative;
            margin-bottom: 1px;
        }

        .mobile-info .mobile-info-bg{
            max-width: 100%;
        }

        .mobile-info .mobile-info-head{
            position: absolute;
            top: 0;
            width: 100%;
            color: #fff;
            padding: 6px 0;
            text-align: center;
            background: rgba(0, 0, 0, .2);
            opacity: .9;
            z-index: 99;
        }

        .mobile-info .mobile-info-head a{
            position: absolute;
            top: 6px;
            left: 6px;
        }

        .mobile-info .mobile-info-head a img{
            width: 16px;
            height: 16px;
            position: relative;
        }

        .mobile-content .mobile-info:hover .mobile-info-head{
            background: rgba(0, 0, 0, .7);
            opacity: 1;
        }

        .module{
            width: 514px;
            height: 450px;
            position: relative;
            font-size: 13px;
            float: left;
            margin-right: 30px;
            border: 1px solid #eee;
        }

        .module .module-content{
            height: 100%;
            padding: 0 16px;
            background: #fff;
            overflow: auto;
        }
        .module .module-content::-webkit-scrollbar{
            width: 8px;
            height: 8px;
            background: rgba(0, 0, 0, 0.05);
            box-shadow: inset 0 0 1px rgb(0 0 0 / 11%);
            padding: 0;
            border: none;
        }
        .module .module-content::-webkit-scrollbar-thumb{
            background: rgba(0, 0, 0, 0.4);
            padding: 0;
            border: none;
        }

        .module-content .module-content-head{
            border-bottom: 1px solid #eee;
            padding: 16px 0;
        }

        .module-content .module-content-list{
            padding: 16px 0;
            overflow: auto;
        }

        .module-content-info{
            display: inline-block;
            border: 1px solid #eee;
            background: #fff;
            width: 80px;
            height: 80px;
            overflow: hidden;
            float: left;
            margin-right: 16px;
            margin-bottom: 16px;
        }

        .module-content-info:nth-child(5n){
            margin-right: 0;
        }

        .module-content-info:hover{
            border: 1px solid #00a2d4;
        }

        .module-content-info span{
            display: block;
            text-align: center;
            height: 50px;
            line-height: 50px;
        }

        .module-content-info a{
            display: block;
            color: #eebebe;
            text-align: center;
            height: 30px;
            line-height: 30px;
            border-top: 1px dashed #eee;
        }

        .module-content-info a:hover{
            color: #0275d8;
        }

        .operation{
            position: relative;
            font-size: 13px;
            float: left;
        }
    </style>
    <form class="layui-form">
        <div class="layui-form layuimini-form" style="overflow: hidden">
            <fieldset class="layui-elem-field layui-field-title" style="margin-top: 30px;">
                <legend>首页设置</legend>
            </fieldset>
            <div class="mobile-box">
                <div class="mobile-screen">
                    <div class="mobile-navbar">商城首页</div>
                    <div class="mobile-content">

                    </div>
                </div>
            </div>
            <div class="module">
                <div class="module-content">
                    <div class="module-content-head">可选模块</div>
                    <div class="module-content-list">
                        @foreach($moduleList as $moduleInfo)
                            <div class="module-content-info moduleInfo">
                                <span>{{$moduleInfo->name}}</span>
                                <a href="javascript:void(0)">添加</a>
                                <input class="module-content-info-name" type="text" value="{{$moduleInfo->name}}" />
                                <input class="module-content-info-key" type="text" value="{{$moduleInfo->key}}" />
                                <input class="module-content-info-pic" type="text" value="{{$moduleInfo->pic}}" />
                            </div>
                        @endforeach
                    </div>

                    <div class="module-content-head" style="border-top: 1px solid #eee;">可选分类</div>
                    <div class="module-content-list">
                        @foreach($catList as $catInfo)
                            <div class="module-content-info catInfo">
                                <span>{{$catInfo->name}}</span>
                                <a href="javascript:void(0)">添加</a>
                                <input class="module-content-info-name" type="text" value="{{$catInfo->name}}" />
                                <input class="module-content-info-key" type="text" value="single_cat" />
                                <input class="module-content-info-pic" type="text" value="modules/homelayout/img/cat-bg.png" />
                                <input class="module-content-info-cat_id" type="text" value="{{$catInfo->id}}" />
                            </div>
                        @endforeach
                    </div>

                    <div class="module-content-head" style="border-top: 1px solid #eee;">可选魔方</div>
                    <div class="module-content-list">
                        @foreach($cubeList as $cubeInfo)
                            <div class="module-content-info cubeInfo">
                                <span>{{$cubeInfo->name}}</span>
                                <a href="javascript:void(0)">添加</a>
                                <input class="module-content-info-name" type="text" value="{{$cubeInfo->name}}" />
                                <input class="module-content-info-key" type="text" value="cube" />
                                <input class="module-content-info-pic" type="text" value="modules/homelayout/img/cube-bg.png" />
                                <input class="module-content-info-cube_id" type="text" value="{{$cubeInfo->id}}" />
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="operation">
                <button class="layui-btn layui-btn-normal" style="margin-bottom: 10px;" id="saveBtn" lay-submit lay-filter="saveBtn">保存</button>
                <p>提示：</p>
                <p>图片魔方可以添加到小程序端，如果没有请前方[图片魔方]列表页面添加图片魔方；</p>
                <p>首页更新小程序端下拉刷新就可以看到。</p>
            </div>
        </div>
    </form>
@endsection

@section('listscript')
    <script type="text/javascript">
        layui.use(['iconPickerFa', 'form', 'layer', 'upload', 'xmSelect'], function () {
            var iconPickerFa = layui.iconPickerFa,
                form = layui.form,
                layer = layui.layer,
                upload = layui.upload,
                xmSelect = layui.xmSelect,
                $ = layui.$;

            var domain = "<?php echo $domain; ?>";
            var moduleListObj = eval('<?php echo json_encode($showModule);?>');
            setIndexContent();

            // 动态添加模块
            $(document).on("click", ".moduleInfo a", function () {
                let info = {
                    name: $(this).nextAll(".module-content-info-name").val(),
                    key: $(this).nextAll(".module-content-info-key").val(),
                    pic: $(this).nextAll(".module-content-info-pic").val(),
                }
                moduleListObj.push(info);
                setIndexContent();
            })

            // 动态添加单个分类模块
            $(document).on("click", ".catInfo a", function () {
                let info = {
                    name: $(this).nextAll(".module-content-info-name").val(),
                    key: $(this).nextAll(".module-content-info-key").val(),
                    pic: $(this).nextAll(".module-content-info-pic").val(),
                    cat_id: $(this).nextAll(".module-content-info-cat_id").val(),
                }
                moduleListObj.push(info);
                setIndexContent();
            })

            // 动态添加单个魔方模块
            $(document).on("click", ".cubeInfo a", function () {
                let info = {
                    name: $(this).nextAll(".module-content-info-name").val(),
                    key: $(this).nextAll(".module-content-info-key").val(),
                    pic: $(this).nextAll(".module-content-info-pic").val(),
                    cube_id: $(this).nextAll(".module-content-info-cube_id").val(),
                }
                moduleListObj.push(info);
                setIndexContent();
            })

            // 动态删除模块
            $(document).on("click", ".mobile-info .mobile-info-head a", function () {
                let index = $(this).nextAll("input").val();
                moduleListObj.splice(index,1);
                setIndexContent();
            })

            // 动态展示首页布局
            function setIndexContent(){
                let div = "";
                for(let i in moduleListObj){
                    div += '<div class="mobile-info">';
                    div += '<div class="mobile-info-head">';
                    div += '<a href="javascript:void(0)"><img src="' + domain+'/modules/homelayout/img/icon-delete.png" alt="" /></a>';
                    div += '<span>' + moduleListObj[i].name + '</span>';
                    div += '<input type="hidden" value="' + i + '" />';
                    div += '</div>';
                    div += '<img class="mobile-info-bg" src="' + domain+'/' + moduleListObj[i].pic + '" alt="" />';
                    div += '<input type="hidden" name="data[' + i + '][name]" value="' + moduleListObj[i].name + '" />';
                    div += '<input type="hidden" name="data[' + i + '][key]" value="' + moduleListObj[i].key + '" />';
                    div += '<input type="hidden" name="data[' + i + '][pic]" value="' + moduleListObj[i].pic + '" />';
                    if(moduleListObj[i].hasOwnProperty("cat_id")){
                        div += '<input type="hidden" name="data[' + i + '][cat_id]" value="' + moduleListObj[i].cat_id + '" />';
                    }
                    if(moduleListObj[i].hasOwnProperty("cube_id")){
                        div += '<input type="hidden" name="data[' + i + '][cube_id]" value="' + moduleListObj[i].cube_id + '" />';
                    }
                    div += '</div>';
                }
                $(".mobile-content").html(div);
            }

            //监听提交
            form.on('submit(saveBtn)', function(data){
                $("#saveBtn").addClass("layui-btn-disabled");
                $("#saveBtn").attr('disabled', 'disabled');
                var loading = layer.msg('加载中..', {icon: 16,shade: 0.3,time: false});
                $.ajax({
                    url:'/admin/home/setting',
                    type:'post',
                    data:data.field,
                    dataType:'JSON',
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    success:function(res){
                        layer.close(loading);  //返回数据关闭loading
                        if(res.code==0){
                            layer.msg(res.message,{icon: 1});
                            $("#saveBtn").removeClass("layui-btn-disabled");
                            $("#saveBtn").removeAttr('disabled');
                        }else{
                            layer.msg(res.message,{icon: 2},function () {
                                location.reload();
                            });
                        }
                    },
                    error:function (data) {
                        layer.close(loading);  //返回数据关闭loading
                        layer.msg(res.message,{icon: 2},function () {
                            location.reload();
                        });
                        $("#saveBtn").removeClass("layui-btn-disabled");
                        $("#saveBtn").removeAttr('disabled');
                    }
                });
            });
        });
    </script>
@endsection