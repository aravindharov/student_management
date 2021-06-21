<?php
$this->load->view('header');
?>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Student Management
            </h1>
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        
        <!-- Main row -->
        <div class="row">
          <div class="col-sm-10">
            <div class="card">
              <div class="card-body">
                <button class="btn btn-info" onclick="addDataModal();" >Add Student</button>
                <table class="table table-striped- table-bordered table-hover table-checkable">
                  <?php
                  if ($students!=false) {
                    ?>
                    <thead>
                      <tr>
                        <td>S.No.</td>
                        <td>Register No.</td>
                        <td>Name</td>
                        <td>Date of Birth</td>
                        <td>Age</td>
                        <td>Gender</td>
                        <td>Address</td>
                        <td>Mobile No.</td>
                        <td>Language</td>
                        <td>Option</td>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                    $i=1;
                    foreach($students as $key=>$val){
                     ?>
                      <tr>
                        <td><?= $i; ?></td>
                        <td><?= $val['regno']; ?></td>
                        <td><?= $val['name']; ?></td>
                        <td><?= $val['dob']; ?></td>
                        <td><?= $val['age']; ?></td>
                        <td><?php if($val['gender']==1){ echo 'Male'; } elseif ($val['gender']==2) { echo 'Female'; } else{ echo 'Transgender'; } ?></td>
                        <td><?= (isset($val['address']))?$val['address']:''; ?></td>
                        <td><?= $val['mobile_no']; ?></td>
                        <td><?php
                        if($val['language']!=false){
                          $i=1;
                          foreach ($val['language'] as $key1 => $value) {
                            if ($i!=1) {
                              echo ', '.$value['title'];
                            }
                            else{
                                echo $value['title'];
                            }
                            $i++;
                          }
                        }
                        ?></td>
                        <td><a href="javascript:void(0);" class="btn btn-warning" onclick="edit_student(<?php echo $val['id'];?>)" ><i class="la la-edit"></i></a> <a href="javascript:void(0);" onclick="delete_student(<?php echo $val['id'];?>)" class="btn btn-danger"><i class="la la-trash"></i></a> </td>
                      </tr>
                      <?php
                      $i++;
                    } ?>
                    </tbody>
                    <?php
                  }
                  ?>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <form id="addData" method="post">
    <div class="modal fade" id="addmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Student</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
          <input type="hidden" name="<?php echo  $this->security->get_csrf_token_name(); ?>" id="csrf_token" value="<?php echo  $this->security->get_csrf_hash(); ?>" />
            <div class="kt-scroll" data-scroll="true" >
              <input type="hidden" class="form-control " id="id" name="id" value="0">
              <div class="form-group">
                <label for="recipient-name" class="form-control-label">Name&nbsp;&nbsp;<sup><span class="fa fa-asterisk"></span></sup></label>
                <input type="text" class="form-control " id="name" name="name">
                <span class="invalid-feedback"></span>
              </div>
              <div class="form-group">
                <label for="message-text" class="form-control-label">Date of Birth&nbsp;&nbsp;<sup><span class="fa fa-asterisk"></span></sup></label>
                <input type="text" class="form-control datePicker" id="dob" name="dob">
                <span class="invalid-feedback"></span>
              </div>
              <div class="form-group">
                <label for="message-text" class="form-control-label">Mobile No.&nbsp;&nbsp;<sup><span class="fa fa-asterisk"></span></sup></label>
                <input type="text" class="form-control " id="mobile_no" name="mobile_no">
                <span class="invalid-feedback"></span>
              </div>
              <div class="form-group">

                <label for="message-text" class="form-control-label">Gender&nbsp;&nbsp;<sup><span class="fa fa-asterisk"></span></sup></label>

                  <div class="kt-radio-inline">

                    <label class="kt-radio">

                    <input type="radio" name="gender" value="1" checked> Male

                    <span></span>

                    </label>

                    <label class="kt-radio">

                    <input type="radio" name="gender" value="2" >Female

                    <span></span>

                    </label>

                    <label class="kt-radio">

                    <input type="radio" name="gender" value="3"> Transgender

                    <span></span>

                    </label>

                  </div>

                 <span class="invalid-feedback"></span>

              </div>
              <div class="form-group">
                <label for="message-text" class="form-control-label">Languages&nbsp;&nbsp;<sup><span class="fa fa-asterisk"></span></sup></label>
                <div>
                  <?php
                  if ($language!=false) {
                    foreach ($language as $lan_key => $lan_val) {
                      echo '<label class="kt-checkbox kt-checkbox--bold kt-checkbox--success"><input name="language[]" type="checkbox" value="'.$lan_val['id'].'">'.$lan_val['title'].'<span></span></label> ';
                    }
                  }
                  ?>
                <span class="invalid-feedback"></span>
                </div>
              </div>
              <div class="form-group">
                <label for="message-text" class="form-control-label">Address&nbsp;&nbsp;</label>
                <textarea class="form-control " id="address" name="address"></textarea>
                <span class="invalid-feedback"></span>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary" id="save">Submit</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          </div>
        </div>
      </div>
    </div>
  </form>
  <?php
$this->load->view('footer');
?>
<script src="<?php echo asset_url ?>plugins/ajax_upload/js/jquery.ui.widget.js"></script>
<script src="<?php echo asset_url ?>plugins/ajax_upload/js/jquery.iframe-transport.js"></script>
<script src="<?php echo asset_url ?>plugins/ajax_upload/js/jquery.fileupload.js"></script>
<script src="<?php echo asset_url ?>plugins/ajax_upload/js/jquery.fileupload-process.js"></script>
<script src="<?php echo asset_url ?>plugins/ajax_upload/js/jquery.fileupload-validate.js"></script>
<script src="<?php echo asset_url ?>js/pages/custom/projects/general.js" type="text/javascript"></script>
<script type="text/javascript">
  
    var initValidation = function () {
    var validator;
    var formEl;
       validator = function () {
        formEl.validate({
          rules:{
            name:{required:true},
            dob:{required:true},
            mobile_no:{required:true},
            gender:{required:true},
            
          },
          messages:{
            name:"Name",
            dob:"Date of Birth",
            mobile_no:"Mobile no",
            gender:"Gender",
            
          },
            //display error alert on form submit  
          invalidHandler: function(event, validator) {     
              var alert = $('#addData');
              alert.removeClass('kt--hide').show();
              KTUtil.scrollTop();
          },

          submitHandler: function (form) {
              //form[0].submit(); // submit the form
          }
        });
      }
    
        $("#addData").on("submit", function(event) {
          event.preventDefault();
          // if (validator.form()) {

            $('#save').addClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', true);

         
            var x = 0;
            var err = '';
            $('#loader').show();

            $.ajax({
              type: "POST",
              url: "<?php echo site_url; ?>home/add_student_process",
              dataType: "json",
               data: $('#addData').serialize(),
              success: function(html) {
                $('input').removeClass('is-invalid');
                $('textarea').removeClass('is-invalid');
                $('select').removeClass('is-invalid');
                $('#error_add').empty();
                if (html.status == 0) {
                  $('input').removeClass('is-invalid');
                  $('textarea').removeClass('is-invalid');
                  $('select').removeClass('is-invalid');
                  $('.invalid-feedback').html('');
                  var s = 0;
                  $.each(html.message, function(k, v) {
                  err += '<p class="kt-font-danger">' + v + '</p>';
                  if (s < 1) {
                  $("#addData [name='" + k + "'] ~span.invalid-feedback").focus();
                  s++;
                  }
                  var k1 = $("#addData [name='" + k + "'] ~span.invalid-feedback");
                  k1.html(v);
                  $("#addData [name='"+k+"']").addClass( "is-invalid" );
                  swal.fire({
                  title: 'Please fill valid data',
                  html: $('<div>').html(err),
                  confirmButtonText: "Ok",
                  confirmButtonClass: "btn btn-success",
                  }); 

                  });
                  $('#error_add').empty();

                  $('#error_add').html('<div id="msg" class="alert alert-danger alert-dismissable"><i class="fa fa-ban"></i>' + err + '</div>');

                }
                else {
                  $('#loader').hide();
                  swal.fire({

                    position: 'center',
                    type: 'success',
                    title: html.message,
                    showConfirmButton: false,
                    timer: 2000

                  }).then(function() {

                    location.reload();

                  });

                }
              },
              complete: function(data) {
                $('#loader').hide();
                $('#save').removeClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', false);
                $("#addData [name='submit']").attr('disabled',false);
              },
              error: function(jqXHR, textStatus, errorThrown) {
                swal.fire({
                  title: "Please try again!",
                  timer: 2000,

                  onOpen: function() {

                    swal.showLoading()

                  }
                });
              }
            });
            return false;
          // }
        });
      
      return {
        // public functions
        init: function() {
          formEl = $('#addData');
            // validator(); 
            
        }
      };
    }();
    jQuery(document).ready(function(){
      initValidation.init();
    });

    $('.datePicker').datepicker({
      // rtl: KTUtil.isRTL(),
      todayHighlight: true,
      orientation: "bottom left",
      format:"dd/mm/yyyy",
      autoclose:true

      // templates: arrows
    });

  

  function edit_student(id) {
    $.ajax({

      type: "POST",
      url: "<?php echo site_url; ?>home/edit_student",
      dataType: "json",
      data:'  id='+id+'&<?php echo  $this->security->get_csrf_token_name(); ?>=<?php echo  $this->security->get_csrf_hash(); ?>',
      success: function(html){
         // alert(html.phaRate);
        $('.form-control').removeClass('is-invalid');
        $('.invalid-feedback').html('');
        if(html.status==0)
        {
          alert('<div id="msg" class="alert alert-danger alert-dismissable"><i class="fa fa-ban"></i> '+html.message+'</div>');
        }
        else
        {
          $('#id').val(html.data['id']);
          $('#name').val(html.data['name']);
          $('#dob').val(html.data['dob']);
          $('#mobile_no').val(html.data['mobile_no']);
          $('input[name=gender][value="'+html.data['gender']+'"]').prop('checked',true);
          $.each(html.data['language'], function(k, v) {
            $('input[type=checkbox][value="'+v['langId']+'"]').prop('checked',true);
          });
          $('#addmodal').modal('show');
        }
      },

      complete: function (data) {
        $('#loader').hide();
      },
      error: function(jqXHR, textStatus, errorThrown) { alert('Please try again'); }
    });
  }
  function delete_student(id) {
    $.ajax({

      type: "POST",
      url: "<?php echo site_url; ?>home/delete_student",
      dataType: "json",
      data:'  id='+id+'&<?php echo  $this->security->get_csrf_token_name(); ?>=<?php echo  $this->security->get_csrf_hash(); ?>',
      success: function(html){
         // alert(html.phaRate);
        $('.form-control').removeClass('is-invalid');
        $('.invalid-feedback').html('');
        if(html.status==0)
        {
          alert('<div id="msg" class="alert alert-danger alert-dismissable"><i class="fa fa-ban"></i> '+html.message+'</div>');
        }
        else
        {
          swal.fire({
            position: 'center',
            type: 'success',
            title: html.message,
            showConfirmButton: false,
            timer: 2000

          }).then(function() {

            location.reload();

          });
        }
      },
      complete: function (data) {
        $('#loader').hide();
      },
      error: function(jqXHR, textStatus, errorThrown) { alert('Please try again'); }
    });
  }
  function addDataModal() {
    $('#id').val('');
    $('#name').val('');
    $('#dob').val('');
    $('#mobile_no').val('');
    $('input[name=gender][value=1]').prop('checked',true);
    $('input[type=checkbox]').prop('checked',false);
    $('#addmodal').modal('show');
  }
</script>