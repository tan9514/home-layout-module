@extends('admin.public.header')
@section('title','模块列表')

@section('listsearch')
    <fieldset class="table-search-fieldset" style="display:none">
        <legend>搜索信息</legend>
        <div style="margin: 10px 10px 10px 10px">
            <form class="layui-form layui-form-pane form-search" action="" id="searchFrom">
                <div class="layui-form-item">
                    <div class="layui-inline">
                        <label class="layui-form-label">模块名称</label>
                        <div class="layui-input-inline">
                            <input type="text" name="name" placeholder="模块名称模糊查询" class="layui-input" />
                        </div>
                    </div>

                    <br>

                    <div class="layui-inline">
                        <button type="submit" class="layui-btn layui-btn-sm layui-btn-normal"  lay-submit lay-filter="data-search-btn"><i class="layui-icon"></i> 搜 索</button>
                    </div>
                </div>
            </form>
        </div>
    </fieldset>
@endsection

@section('listcontent')
    <table class="layui-hide" id="tableList" lay-filter="tableList"></table>
@endsection

@section('listscript')
    <script type="text/javascript">
        layui.use(['form','table','laydate', 'treetable'], function(){
            var table = layui.table, $=layui.jquery, form = layui.form, treetable = layui.treetable, laydate = layui.laydate;
            // 渲染表格
            table.render({
                elem: '#tableList',
                url: '/admin/module/ajaxList',
                parseData: function(res) { //res 即为原始返回的数据
                    return {
                        "code": res.code, //解析接口状态
                        "msg": res.message, //解析提示文本
                        "count": res.data.count, //解析数据长度
                        "data": res.data.list //解析数据列表
                    }
                },
                cellMinWidth: 80,//全局定义常规单元格的最小宽度
                toolbar: '#toolbarColumn',
                defaultToolbar: [
                    'filter',
                    'exports',
                    'print',
                    { //自定义头部工具栏右侧图标。如无需自定义，去除该参数即可
                        title: '搜索',
                        layEvent: 'TABLE_SEARCH',
                        icon: 'layui-icon-search'
                    }
                ],
                title: '打印机列表',
                cols: [[
                    {field: 'id', title: 'ID', width: 80},
                    {field: 'pic', title: '模块图片', align: 'center', width:150, event: 'show_pic',
                        templet: function (info){
                            if(info.show_pic == "") return "";
                            return '<a class="showPicImages" href="javascript:void(0)" data-src="' + info.show_pic + '" title="点击查看"><img style="width:50px;" src="'+info.show_pic+'"></a>'
                        }
                    },
                    {field: 'name', title: '模块名称'},
                    {field: 'key', title: '模块标识'},
                ]],
                id: 'listReload',
                limits: [10, 20, 30, 50, 100,200],
                limit: 10,
                page: true,
                text: {
                    none: '抱歉！暂无数据~' //默认：无数据。注：该属性为 layui 2.2.5 开始新增
                }
            });

            //头工具栏事件
            table.on('toolbar(tableList)', function(obj){
                switch(obj.event){
                    case 'TABLE_SEARCH': // 搜索功能
                        var display = $(".table-search-fieldset").css("display"); //获取标签的display属性
                        if(display == 'none'){
                            $(".table-search-fieldset").show();
                        }else{
                            $(".table-search-fieldset").hide();
                        }
                        break;
                };
            });

            // 监听行工具事件
            table.on('tool(tableList)', function(obj){
                var data = obj.data;
                var id = data.id;
                switch (obj.event){
                    case "show_pic":    // 缩略图展示
                        if(data.show_pic != "") {
                            var img_infor = "<img src='" + data.show_pic + "' />";
                            layer.open({
                                title: false,
                                type: 1,
                                closeBtn: 0,
                                area: ['auto'],
                                skin: 'layui-layer-nobg', //没有背景色
                                shadeClose: true,
                                content: img_infor,
                            });
                        }
                        break;
                }
            });

            // 监听搜索操作
            form.on('submit(data-search-btn)', function (data) {
                //执行搜索重载
                table.reload('listReload', {
                    where: data.field,
                    page: {
                        curr: 1
                    }
                });
                return false;
            });
        });
    </script>
@endsection
