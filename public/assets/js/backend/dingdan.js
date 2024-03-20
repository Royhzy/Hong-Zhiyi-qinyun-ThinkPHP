define(['jquery', 'bootstrap', 'backend', 'table', 'form'], function ($, undefined, Backend, Table, Form) {

    var Controller = {
        index: function () {
            // 初始化表格参数配置
            Table.api.init({
                extend: {
                    index_url: 'dingdan/index' + location.search,
                    add_url: 'dingdan/add',
                    edit_url: 'dingdan/edit',
                    del_url: 'dingdan/del',
                    multi_url: 'dingdan/multi',
                    import_url: 'dingdan/import',
                    table: 'dingdan',
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
                        {field: 'dianpu', title: __('Dianpu'), operate: 'LIKE'},
                        {field: 'inimg_image', title: __('Inimg_image'), operate: false, events: Table.api.events.image, formatter: Table.api.formatter.image},
                        {field: 'num', title: __('Num')},
                        {field: 'price', title: __('Price')},
                        {field: 'title', title: __('Title'), operate: 'LIKE'},
                        {field: 'shouhuo', title: __('Shouhuo'), searchList: {"1":__('Shouhuo 1'),"0":__('Shouhuo 0')}, formatter: Table.api.formatter.normal},
                        {field: 'pingjia', title: __('Pingjia'), searchList: {"1":__('Pingjia 1'),"0":__('Pingjia 0')}, formatter: Table.api.formatter.normal},
                        {field: 'name', title: __('Name'), operate: 'LIKE'},
                        {field: 'phone', title: __('Phone'), operate: 'LIKE'},
                        {field: 'address', title: __('Address'), operate: 'LIKE'},
                        {field: 'xiadantime', title: __('Xiadantime'), operate:'RANGE', addclass:'datetimerange', autocomplete:false, formatter: Table.api.formatter.datetime},
                        {field: 'status', title: __('Status'), searchList: {"1":__('Status 1'),"2":__('Status 2')}, formatter: Table.api.formatter.status},
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
