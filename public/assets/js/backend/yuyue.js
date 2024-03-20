define(['jquery', 'bootstrap', 'backend', 'table', 'form'], function ($, undefined, Backend, Table, Form) {

    var Controller = {
        index: function () {
            // 初始化表格参数配置
            Table.api.init({
                extend: {
                    index_url: 'yuyue/index' + location.search,
                    add_url: 'yuyue/add',
                    edit_url: 'yuyue/edit',
                    del_url: 'yuyue/del',
                    multi_url: 'yuyue/multi',
                    import_url: 'yuyue/import',
                    table: 'yuyue',
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
                        {field: 'teacherid', title: __('Teacherid'), operate: 'LIKE'},
                        {field: 'instrument', title: __('Instrument'), operate: 'LIKE'},
                        {field: 'img_image', title: __('Img_image'), operate: false, events: Table.api.events.image, formatter: Table.api.formatter.image},
                        {field: 'openid', title: __('Openid'), operate: 'LIKE'},
                        {field: 'stuname', title: __('Stuname'), operate: 'LIKE'},
                        {field: 'area', title: __('Area'), operate: 'LIKE'},
                        {field: 'price', title: __('Price')},
                        {field: 'school', title: __('School'), operate: 'LIKE'},
                        {field: 'educate', title: __('Educate'), operate: 'LIKE'},
                        {field: 'shangke', title: __('Shangke'), searchList: {"1":__('Shangke 1'),"0":__('Shangke 0')}, formatter: Table.api.formatter.normal},
                        {field: 'feiyong', title: __('Feiyong'), searchList: {"1":__('Feiyong 1'),"0":__('Feiyong 0')}, formatter: Table.api.formatter.normal},
                        {field: 'shangketime', title: __('Shangketime'), operate:'RANGE', addclass:'datetimerange', autocomplete:false, formatter: Table.api.formatter.datetime},
                        {field: 'feiyongtime', title: __('Feiyongtime'), operate:'RANGE', addclass:'datetimerange', autocomplete:false, formatter: Table.api.formatter.datetime},
                        {field: 'yuyuetime', title: __('Yuyuetime'), operate:'RANGE', addclass:'datetimerange', autocomplete:false, formatter: Table.api.formatter.datetime},
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
