jQuery(document).ready(function($){
    show_sched();

    $('#mydata').dataTable({searching: false, paging: false, info: false});
    $('#mydata').dataTable();

    function show_sched(){
        $.ajax({
            type  : 'ajax',
            url   : './api/view_sched',
            async : true,
            dataType : 'json',
            success : function(data){
                var html = '';
                var i;
                for(i=0; i<data.length; i++){
                    html += '<tr>'+
                            '<td>'+data[i].description+'</td>'+
                            '<td style="text-align:right;">'+
                                '<a href="javascript:void(0);" class="btn btn-info btn-sm item_edit" data-sched_id="'+data[i].id+'" data-date_sched="'+data[i].date+'" data-desc_sched="'+data[i].description+'">Edit</a>'+' '+
                                '<a href="javascript:void(0);" class="btn btn-danger btn-sm item_delete" data-sched_id="'+data[i].id+'">Delete</a>'+
                            '</td>'+
                            '</tr>';
                }
                $('#show_data').html(html);
            }

        });
    }

        $('#add_sched_btn').click(function(){
            var date = $('#add_date').val();
            var description = $('#description').val();

            $.ajax({
                type: 'POST',
                url: 'http://localhost/scheduler/api/add_sched',
                dataType: 'JSON',
                data: {date:date, description:description},
                success: function(data){
                    $('#date').val();
                    $('#description').val();
                    $('#add-modal').modal("hide");
                    show_sched();
                    console.log('New schedule added successfully!');
                }
            });
            return false;
        });

        $('#show_data').on('click','.item_edit',function(){
            var id = $(this).data('sched_id');
            var date = $(this).data('date_sched');
            var description = $(this).data('desc_sched');
            
            $('#update_modal').modal('show');
            $('#edit_id').val(id);
            $('#edit_date').val(date);
            $('#edit_description').val(description);
        }); 

        $('#edit_sched_btn').on('click',function(){
            var id = $('#edit_id').val();
            var date = $('#edit_date').val();
            var description = $('#edit_description').val();
            $.ajax({
                type : 'POST',
                url  : 'http://localhost/scheduler/api/edit_sched',
                dataType : 'JSON',
                data : {id:id, date:date, description:description},
                success: function(data){
                    $('#edit_id').val("");
                    $('#edit_date').val("");
                    $('#edit_description').val("");
                    $('#update_modal').modal('hide');
                    show_sched();
                    console.log('Schedule Updated Successfully!');
                }
            });
            return false;
        });

        $('#show_data').on('click','.item_delete',function(){
            var id = $(this).data('sched_id');
            
            $('#delete_modal').modal('show');
            $('#delete_id').val(id);
        }); 

        $('#delete_sched_btn').on('click', () =>{
            var id = $('#delete_id').val();
            
            $.ajax({
                type : 'POST',
                url  : 'http://localhost/scheduler/api/edit_sched',
                dataType : 'JSON',
                data : {id:id},
                success : function(data){
                    $('#delete_id').val("");
                    $('#delete_modal').modal('hide');
                    show_sched();
                    console.log('Schedule Deleted Successfully!');
                }
            });
            return false;
        });
});

