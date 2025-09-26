$(document).ready(function () {
    $("#datatable").DataTable();

    $("#datatable-buttons")
        .DataTable({
            lengthChange: false,
            buttons: [
                {
                    extend: "copy",
                    text: '<i class="fas fa-copy text-white"></i>', // Copy icon
                    titleAttr: "Copy",
                    className: "btn btn-lg",
                },
                {
                    extend: "excel",
                    text: '<i class="fas fa-file-excel text-white"></i>', // Excel icon
                    titleAttr: "Excel",
                    className: "btn btn-lg",
                },
                {
                    extend: "pdf",
                    text: '<i class="fas fa-file-pdf text-white"></i>', // PDF icon
                    titleAttr: "PDF",
                    className: "btn btn-lg",
                },
                {
                    extend: "colvis",
                    text: '<i class="fas fa-eye text-white"></i>', // Column visibility icon
                    titleAttr: "Column visibility",
                    className: "btn btn-lg",
                },
            ],
        })
        .buttons()
        .container()
        .appendTo("#datatable-buttons_wrapper .col-md-6:eq(0)");

    $(".dataTables_length select").addClass("form-select form-select-sm");
});
