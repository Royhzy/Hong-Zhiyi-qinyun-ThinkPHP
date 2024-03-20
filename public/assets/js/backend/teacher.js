define(['jquery', 'bootstrap', 'backend', 'table', 'form'], function ($, undefined, Backend, Table, Form) {

    var Controller = {
        index: function () {
            // 初始化表格参数配置
            Table.api.init({
                extend: {
                    index_url: 'teacher/index' + location.search,
                    add_url: 'teacher/add',
                    edit_url: 'teacher/edit',
                    del_url: 'teacher/del',
                    multi_url: 'teacher/multi',
                    import_url: 'teacher/import',
                    table: 'teacher',
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
                        {field: 'sfz', title: __('Sfz'), operate: 'LIKE'},
                        {field: 'name', title: __('Name'), operate: 'LIKE'},
                        {field: 'instrument', title: __('Instrument'), operate: 'LIKE'},
                        {field: 'img_image', title: __('Img_image'), operate: false, events: Table.api.events.image, formatter: Table.api.formatter.image},
                        {field: 'inimg_images', title: __('Inimg_images'), operate: false, events: Table.api.events.image, formatter: Table.api.formatter.images},
                        {field: 'introduce', title: __('Introduce'), operate: 'LIKE', table: table, class: 'autocontent', formatter: Table.api.formatter.content},
                        {field: 'teachage', title: __('Teachage')},
                        {field: 'area', title: __('Area'), operate: 'LIKE'},
                        {field: 'price', title: __('Price')},
                        {field: 'school', title: __('School'), operate: 'LIKE'},
                        {field: 'educate', title: __('Educate'), operate: 'LIKE'},
                        {field: 'telephone', title: __('Telephone'), operate: 'LIKE'},
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
