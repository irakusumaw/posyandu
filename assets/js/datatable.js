$(function(e) {
	//file export datatable
	var table = $('#example').DataTable( {
		lengthChange: false,
		buttons: [ 'csv', 'pdf' ]
	} );
	table.buttons().container()
		.appendTo( '#example_wrapper .col-md-6:eq(0)' );

	//file export datatable
	var table2 = $('#example2').DataTable( {
		lengthChange: false,
		buttons: [ 'csv', 'pdf' ]
	} );
	table2.buttons().container()
		.appendTo( '#example2_wrapper .col-md-6:eq(0)' );

	//file export datatable
	var table3 = $('#example3').DataTable( {
		lengthChange: false,
		buttons: [ 'csv', 'pdf' ]
	} );
	table3.buttons().container()
		.appendTo( '#example3_wrapper .col-md-6:eq(0)' );

	//file export datatable
	var table4 = $('#example4').DataTable( {
		lengthChange: false,
		buttons: [ 'csv', 'pdf' ]
	} );
	table4.buttons().container()
		.appendTo( '#example4_wrapper .col-md-6:eq(0)' );
		
	//sample datatable	
	$('#example-2').DataTable();
	
	//Details display datatable
	$('#example-1').DataTable( {
		responsive: {
			details: {
				display: $.fn.dataTable.Responsive.display.modal( {
					header: function ( row ) {
						var data = row.data();
						return 'Details for '+data[0]+' '+data[1];
					}
				} ),
				renderer: $.fn.dataTable.Responsive.renderer.tableAll( {
					tableClass: 'table'
				} )
			}
		}
	} );

} );