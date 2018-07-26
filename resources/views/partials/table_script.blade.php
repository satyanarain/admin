<script>
  function statusUpdate(id,controller)
{
 $.ajax({
    type:'get',
    url:'/'+controller+'/statusupdate/'+id,
   success:function(data)
    {
   
    if(data==1)
    {
    $("#"+id).removeClass('btn-danger');   
    $("#"+id).addClass('btn-success');  
    $("#ai"+id).html('<i class="fa fa-check-circle"></i> Active');    
    }else{
    $("#"+id).removeClass('btn-success');   
    $("#"+id).addClass('btn-danger');    
    $("#ai"+id).html('<i class="fa fa-times-circle"></i> Inactive');    
    }
    
    }
});
}  
       
    
    
    
    
$(document).ready(function() {

    var table= $('#example1').DataTable( {
          "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
          
       "paging": false,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "order": [[0,'desc']],
      "info": true,
      "autoWidth": true,
    "colVis": [{
            exclude: [ 0 ]
        }],
  dom: 'Bfrtip',
//    lengthMenu: [
//            [ 10, 25, 50, -1 ],
//            [ '10 rows', '25 rows', '50 rows', 'Show all' ]
//        ],
        buttons: [
           // 'pageLength',
            {
                extend: 'excelHtml5',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'pdfHtml5',
                exportOptions: {
                     columns: ':visible'
                }
            },
                  {
            extend: 'colvis',
            columns: ':gt(0)'
        }

        ]
    } );

    
} );

</script>