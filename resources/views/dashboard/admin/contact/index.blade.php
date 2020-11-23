@extends('dashboard.layouts.app')

@push('css')
    {!! Html::style('my-tools/adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') !!}
    <style>
        div.dataTables_wrapper div.dataTables_filter{
            text-align:left !important
        }
    </style>
@endpush

@section('braidcrump')
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <h1>
    لوحة تحكم المدير
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{adminurl('contact')}}"><i class="fa fa-dashboard"></i> الرسائل</a></li>
        <li class="active"> كل الرسائل</li>
    </ol>
    </section>
@endsection

@section('content')

<div class="box">

    <div class="box-header">
        <h3>{{$title}}</h3>
    </div>
    <div class="box-body">
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-condensed table-hover" id="data">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>اسم المرسل</th>
                            <th>البريد الالكتروني</th>
                            <th>نوع الرسالة</th>
                            <th>الحالة</th>
                            <th>تاريح الارسال</th>
                            <th>التحكم</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>اسم المرسل</th>
                            <th>البريد الالكتروني</th>
                            <th>نوع الرسالة</th>
                            <th>الحالة</th>
                            <th>تاريح الارسال</th>
                            <th>التحكم</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    </div>
</div>
@endsection

@push('js')

<script>
$(document).ready(function(){
        var lastIdx = null;

    $("#data thead th").each(function() {
        if ($(this).index() !=0 && $(this).index() <= 2) {
            var classname = $(this).index() == 6 ? "date" : "dateslash";
            var title = $(this).html();
            $(this).html(
                '<input type="text" class="' +
                    classname +
                    '" data-value="' +
                    $(this).index() +
                    '" placeholder=" البحث ' +
                    title +
                    '">'
            );
        }
        /*else if ($(this).index() == 4) {
            // use with select
            $(this).html(
                '<select><option value="0">مفعل</option><option value="1">غير مفعل</option></select>'
            );
        }*/
    });

    var table = $("#data").DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ adminUrl('contact/data') }}",
        columns: [
            { data: "id", name: "id" },
            { data: "name", name: "name" },
            { data: "email", name: "email" },
            { data: "type", name: "type" },
            { data: "status", name: "status" },
            { data: "date_created", name: "date_created" },
            { data: "control", name: "" }
        ],
        language: { url: '{{url("costum/datatable_arabic.json")}}' },
        stateSave: false,
        responsive: true,
        order: [[0, "desc"]],
        pagingType: "full_numbers",
        alengthMenu: [
            [5, 10, 25, 50, 100, -1],
            [5, 10, 25, 50, 100, , "all"]
        ],
        iDesplayLength: 10,
        fixedHeader: true,
        oTableTools: {
            aButtons: [
                {
                    sExstends: "csv",
                    sButtonText: "ملف اكسل",
                    sCharSet: "utf16le"
                },
                {
                    sExstends: "copy",
                    sButtonText: "نسخ المعلومات"
                },
                {
                    sExstends: "print",
                    sButtonText: "طباعة",
                    mColumns: "visible"
                }
            ],

            sSwfPath: '{{ url("costum/copy_csv_xls_pdf.swf") }}'
        },

        dom:'<"pull-left text-left" T><"pull-right" i><"clearfix"><"pull-right text-right col-lg-6" f> <"pull-left text-left" l><"clearfix">rt<"pull-right text-right col-lg-6" pi> <"pull-left text-left" l> <"clearfix">',
        initComplete: function() {
            var r = $("#data tfoot tr");
            r.find("th").each(function() {
                $(this).css({ padding: 8 });
            });

            $("#data thead").append(r);
            $("#search_0").css({ "text-align": "center" });
        }

    });

    table
        .columns()
        .eq(0)
        .each(function(colIdx) {
            $("input", table.column(colIdx).header()).on(
                "keyup change",
                function() {
                    table
                        .column(colIdx)
                        .search(this.value)
                        .draw();
                }
            );
        });

    table
        .columns()
        .eq(0)
        .each(function(colIdx) {
            $("select", table.column(colIdx).header()).on(
                "change",
                function() {
                    table
                        .column(colIdx)
                        .search(this.value)
                        .draw();
                }
            );

            $("select", table.column(colIdx).header()).on("click", function(e) {
                e.stopPropagation();
            });
        });

    $('label input[type="search"]').attr("placeholder", "ادخل كلمة البحث");

    $("#data tbody")
        .on("mouseover", "td", function() {
            if(typeof(table.cell(this).index().column) !='undefined'){
                var colIdx = table.cell(this).index().column;

                if (colIdx != lastIdx) {
                    $(table.cells().nodes()).removeClass("highlight");
                    $(table.column(colIdx).nodes()).addClass("highlight");
                }
            }
        })
        .on("mousleave", function() {
            $(table.cells().nodes()).removeClass("highlight");
        });

});
</script>

@endpush

