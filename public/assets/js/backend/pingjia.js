define(['jquery', 'bootstrap', 'backend', 'table', 'form'], function ($, undefined, Backend, Table, Form) {

    var Controller = {
        index: function () {
            // 初始化表格参数配置
            Table.api.init({
                extend: {
                    index_url: 'pingjia/index' + location.search,
                    add_url: 'pingjia/add',
                    edit_url: 'pingjia/edit',
                    del_url: 'pingjia/del',
                    multi_url: 'pingjia/multi',
                    import_url: 'pingjia/import',
                    table: 'pingjia',
                }
            });

            var table = $("#table");

            // 初始化表格
            table.bootstrapTable({
                url: $.fn.bootstrapTable.defaults.extend.index_url,
                pk: 'id',
                sortName: 'id',
                fixedColumns: true,
                fixedRightNumber: 1,
                columns: [
                    [
                        {checkbox: true},
                        {field: 'id', title: __('Id')},
                        {field: 'goodsid', title: __('Goodsid')},
                        {field: 'openid', title: __('Openid'), operate: 'LIKE'},
                        {field: 'title', title: __('Title'), operate: 'LIKE'},
                        {field: 'inimg_image', title: __('Inimg_image'), operate: false, events: Table.api.events.image, formatter: Table.api.formatter.image},
                        {field: 'nickName', title: __('Nickname'), operate: 'LIKE'},
                        {field: 'avatarUrl', title: __('Avatarurl'), operate: 'LIKE', formatter: Table.api.formatter.url},
                        {field: 'xing', title: __('Xing'), searchList: {"1":__('Xing 1'),"2":__('Xing 2'),"3":__('Xing 3'),"4":__('Xing 4'),"5":__('Xing 5')}, formatter: Table.api.formatter.normal},
                        {field: 'pingjia_time', title: __('Pingjia_time'), operate:'RANGE', addclass:'datetimerange', autocomplete:false, formatter: Table.api.formatter.datetime},
                        {field: 'neirong', title: __('Neirong'), operate: 'LIKE', table: table, class: 'autocontent', formatter: Table.api.formatter.content},
                        {field: 'dingdanid', title: __('Dingdanid')},
                        {field: 'operate', title: __('Operate'), table: table, events: Table.api.events.operate, formatter: Table.api.formatter.operate}
                    ]
                ]
            });

            // 为表格绑定事件
            Table.api.bindevent(table);
        },
        add: function () {
            Controller.api.bindevent();
        },
        edit: function () {
            Controller.api.bindevent();
        },
        api: {
            bindevent: function () {
                Form.api.bindevent($("form[role=form]"));
            }
        }
    };
    return Controller;
});
