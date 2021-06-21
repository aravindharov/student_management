<?php
$this->load->view('header');
?>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Student List
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
                <table class="table table-striped- table-bordered table-hover table-checkable" id="list">
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
  <?php
$this->load->view('footer');
?>
  
<script src="<?= asset_url ?>plugins/general/tooltip.js/dist/umd/tooltip.min.js" type="text/javascript"></script>


<script type="text/javascript">
  
$(document).ready(function(){
  var i=1;

  $('#list').DataTable({

    'dom': 'Bfrtip',

    'processing': true,

    'serverSide': true,

    "scrollX": true,

    "order": [],

    'ajax': {
      'url':'<?php echo site_url; ?>home/student_list_process',
      'type':'post',
      "data":{  '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>' }
    },

    'columns': [

      {
      
        data: 'start',

        title: 'S.NO',

        sortable: false,

        visible: true,

        render:function runningFormatter(value,row, index,meta) 
        {
          var s = parseInt(meta.row);
          return parseInt(value)+s+1;
        }
      },

       
      { data: 'regno',

        title: 'Register No',

        sortable: true,

        visible: true,

      },
      { data: 'name',

        title: 'Name',

        sortable: true,

        visible: true,

      },
      { data: 'mobile_no',

        title: 'Mobile No.',

        sortable: true,

        visible: true,

      },
      { data: 'languageTitle',

        title: 'Language',

        sortable: true,

        visible: true,

      },
    ],
    
   

   

    

    buttons: [

       {

           extend: 'collection',

           text: '<i class="la la-download"></i><?= $this->lang->line('export')?>',"className": 'btn btn-default btn-icon-sm dropdown-toggle',

           buttons: [

               { "extend": '', "text":'<a href="" class="kt-nav__link"><li class="kt-nav__section kt-nav__section--first"><span class="kt-nav__section-text">CHOOSE AN OPTION</span></li></a>'},

               { "extend": 'csv', "text":'<li class="kt-nav__item"><i class="kt-nav__link-icon la la-file-text-o"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="kt-nav__link-text">CSV</span></li>'},

               { "extend": 'excel', "text":'<li class="kt-nav__item"><i class="kt-nav__link-icon la la-file-excel-o"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="kt-nav__link-text">Excel</span></li>'},

               

           ],

           fade: true

       }

   ]

    


  });
});

</script>
