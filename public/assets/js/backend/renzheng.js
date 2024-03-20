define(['jquery', 'bootstrap', 'backend', 'table', 'form'], function ($, undefined, Backend, Table, Form) {

    var Controller = {
        index: function () {
            // 初始化表格参数配置
            Table.api.init({
                extend: {
                    index_url: 'renzheng/index' + location.search,
                    add_url: 'renzheng/add',
                    edit_url: 'renzheng/edit',
                    del_url: 'renzheng/del',
                    multi_url: 'renzheng/multi',
                    import_url: 'renzheng/import',
                    table: 'renzheng',
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
                        {field: 'name', title: __('Name'), operate: 'LIKE'},
                        {field: 'img_image', title: __('Img_image'), operate: false, events: Table.api.events.image, formatter: Table.api.formatter.image},
                        {field: 'sfz', title: __('Sfz'), operate: 'LIKE'},
                        {field: 'telephone', title: __('Telephone'), operate: 'LIKE'},
                        {field: 'school', title: __('School'), operate: 'LIKE'},
                        {field: 'instrument', title: __('Instrument'), operate: 'LIKE'},
                        {field: 'educate', title: __('Educate'), operate: 'LIKE'},
                        {field: 'sfzimg_image', title: __('Sfzimg_image'), operate: false, events: Table.api.events.image, formatter: Table.api.formatter.image},
                        {field: 'status', title: __('Status'), searchList: {"1":__('Status 1'),"2":__('Status 2'),"3":__('Status 3')}, formatter: Table.api.formatter.status},
                        {field: 'openid', title: __('Openid'), operate: 'LIKE'},
                        {field: 'reason', title: __('Reason'), operate: 'LIKE'},
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
