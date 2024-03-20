define(['jquery', 'bootstrap', 'backend', 'table', 'form'], function ($, undefined, Backend, Table, Form) {

    var Controller = {
        index: function () {
            // 初始化表格参数配置
            Table.api.init({
                extend: {
                    index_url: 'yueqi/yueqi/index' + location.search,
                    add_url: 'yueqi/yueqi/add',
                    edit_url: 'yueqi/yueqi/edit',
                    del_url: 'yueqi/yueqi/del',
                    multi_url: 'yueqi/yueqi/multi',
                    import_url: 'yueqi/yueqi/import',
                    table: 'yueqi',
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
                        {field: 'id', title: __('Id'), operate: 'LIKE'},
                        {field: 'dianpu', title: __('Dianpu'), operate: 'LIKE'},
                        {field: 'catogory', title: __('Catogory'), operate: 'LIKE'},
                        {field: 'inimg', title: __('Inimg'), operate: 'LIKE'},
                        {field: 'lunbotu', title: __('Lunbotu'), operate: 'LIKE', table: table, class: 'autocontent', formatter: Table.api.formatter.content},
                        {field: 'xiangqingtu', title: __('Xiangqingtu'), operate: 'LIKE', table: table, class: 'autocontent', formatter: Table.api.formatter.content},
                        {field: 'num', title: __('Num')},
                        {field: 'place', title: __('Place'), operate: 'LIKE'},
                        {field: 'price', title: __('Price')},
                        {field: 'sale', title: __('Sale')},
                        {field: 'title', title: __('Title'), operate: 'LIKE'},
                        {field: 'create_time', title: __('Create_time'), operate:'RANGE', addclass:'datetimerange', autocomplete:false, formatter: Table.api.formatter.datetime},
                        {field: 'update_time', title: __('Update_time'), operate:'RANGE', addclass:'datetimerange', autocomplete:false, formatter: Table.api.formatter.datetime},
                        {field: 'status', title: __('Status'), searchList: {"1":__('Status 1')}, formatter: Table.api.formatter.status},
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
