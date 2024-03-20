define(['jquery', 'bootstrap', 'backend', 'table', 'form'], function ($, undefined, Backend, Table, Form) {

    var Controller = {
        index: function () {
            // 初始化表格参数配置
            Table.api.init({
                extend: {
                    index_url: 'yueqi/index' + location.search,
                    add_url: 'yueqi/add',
                    edit_url: 'yueqi/edit',
                    del_url: 'yueqi/del',
                    multi_url: 'yueqi/multi',
                    import_url: 'yueqi/import',
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
                        {field: 'id', title: __('Id')},
                        {field: 'dianpu', title: __('Dianpu'), operate: 'LIKE'},
                        {field: 'catogory', title: __('Catogory'), operate: 'LIKE'},
                        {field: 'inimg_image', title: __('Inimg_image'), operate: false, events: Table.api.events.image, formatter: Table.api.formatter.image},
                        {field: 'lunbotu_images', title: __('Lunbotu_images'), operate: false, events: Table.api.events.image, formatter: Table.api.formatter.images},
                        {field: 'xiangqingtu_images', title: __('Xiangqingtu_images'), operate: false, events: Table.api.events.image, formatter: Table.api.formatter.images},
                        {field: 'num', title: __('Num')},
                        {field: 'place', title: __('Place'), operate: 'LIKE'},
                        {field: 'price', title: __('Price')},
                        {field: 'sale', title: __('Sale')},
                        {field: 'title', title: __('Title'), operate: 'LIKE'},
                        {field: 'create_time', title: __('Create_time'), operate:'RANGE', addclass:'datetimerange', autocomplete:false, formatter: Table.api.formatter.datetime},
                        {field: 'update_time', title: __('Update_time'), operate:'RANGE', addclass:'datetimerange', autocomplete:false, formatter: Table.api.formatter.datetime},
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
