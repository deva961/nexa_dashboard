$(document).ready(function () {
    $("#datatable").DataTable(),
        // $("#datatable-buttons")
        //     .DataTable({
        //         lengthChange: !1,
        //         buttons: ["copy", "excel", "pdf", "colvis"],
        //     })
        //     .buttons()
        //     .container()
        //     .appendTo("#datatable-buttons_wrapper .col-md-6:eq(0)"),
        // $(".dataTables_length select").addClass("form-select form-select-sm");


        $('#datatable-buttons tfoot th').each( function () {
            var title = $(this).text();
            $(this).html( '<input type="text" class="search-table" placeholder="Search '+title+'" />' );
        } );

        //selected row
        $('#datatable-buttons tbody').on( 'click', 'tr', function () {
            $(this).toggleClass('selected');
        } );

        // DataTable
        $('#datatable-buttons').DataTable({
            initComplete: function () {
                // Apply the search
                this.api().columns().every( function () {
                    var that = this;

                    $( 'input', this.footer() ).on( 'keyup change clear', function () {
                        if ( that.search() !== this.value ) {
                            that
                                .search( this.value )
                                .draw();
                        }
                    } );
                } );
            }
        });
});
