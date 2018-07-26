 <div class="modal-content">
            <div class="formmain">
                <div class="plusminusbutton"></div>&nbsp;&nbsp;Model Details
            </div>
            <div class="modal-body-view">
                <div class="alert-new-success alert-block" id="{{"message_show".$permissions->id}}" style="display:none;">
                    <button type="button" class="close" data-dismiss="alert">×</button>	
                    <strong id="{{"message".$permissions->id}}"></strong>
                </div>
                <table  width="100%" class="table">
                        <tr>
                            <td width="15%">Select All</td>
                            <td width="30%">Menu</td>
                            <td width="55%">Action</td>
                        </tr>
                    </table>
                    <div   class="formmain" onclick="showHide(this.id)" id="ACC1{{$permissions->id}}">
                        <div class="plusminusbutton" id="plusminusbuttonACC1{{$permissions->id}}">+</div>&nbsp;&nbsp; Master Details
                    </div>
                    <div class="row1"  id="formACC1{{$permissions->id}}" style="display:none;">
                        <div class="row">  
                            <table  align="left" class="table">
                                {{ menuCreate('users','create','edit','view',$permissions->id,$permissions->users)}}
                                {{ menuCreate('changepasswords','create','edit','view',$permissions->id,$permissions->changepasswords)}}
                                {{ menuCreate('permissions','create','edit','view',$permissions->id,$permissions->permissions) }}
                                {{ menuCreate('donations','create','edit','view',$permissions->id,$permissions->donations) }}
                              </table> 
                        </div>
                    </div>
                  
              </div>
        </div>

<script>



    function checkAll(id, cid) {
        //alert(cid)
        $('.' + cid).not(id).prop('checked', id.checked);

        var final_id = cid.replace('checkAll', '');
        //value = value.replace(".", ":");


        if ($('#' + cid).is(":checked"))
        {
            // alert(final_id)
            $("#show" + final_id).show();
        } else {
            // alert(final_id)
            $("#show" + final_id).hide();

        }
    }

    function showMenu(id)
    {

        if ($('#' + id).is(":checked"))
        {
            $("#show" + id).show();
            $("#showview" + id).prop('checked', true);
         } else {
            $("#show" + id).hide();

        }

    }


    $(document).on('click', '#savemenuall', function () {
        var userid = $(this).parent().attr('id');

        if ($('input:checkbox:checked').length == 0)
        {
            alert("Please select at least one checkbox")
        } else
        {
            var formData = new FormData($(this).parents('form')[0]);

            var action = $(this).attr('id');
            $.ajax({
                url: '/permissions/' + action,
                type: 'POST',
                success: function (data, textStatus, xhr) {
                    //alert(data)
                    $("#message_show" + userid).show();
                    $("#message" + userid).html(data);

                },

                data: formData,
                cache: false,
                contentType: false,
                processData: false


            });
        }
    });
</script>
<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

