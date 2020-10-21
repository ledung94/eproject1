  
<!doctype html>
<html lang="en">


<!-- Mirrored from demos.creative-tim.com/material-dashboard-pro/examples/tables/datatables.net.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 20 Mar 2017 21:34:01 GMT -->
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../../templates/dashboard/assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="../../templates/dashboard/assets/img/favicon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Star Organic</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!-- Bootstrap core CSS     -->
    <link href="../../templates/dashboard/assets/css/bootstrap.min.css" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="../../templates/dashboard/assets/css/material-dashboard.css" rel="stylesheet" />
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="../../templates/dashboard/assets/css/demo.css" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="../../templates/dashboard/assets/css/font-awesome.css" rel="stylesheet" />
    <link href="../../templates/dashboard/assets/css/google-roboto-300-700.css" rel="stylesheet" />
    <link href="../../utilities/AdminStyle.css" rel="stylesheet" />
</head>

<body>
    <div class="wrapper">
        <div class="sidebar" data-active-color="green" data-background-color="white" data-image="" id="sidebar">
            <!--
        Tip 1: You can change the color of active element of the sidebar using: data-active-color="purple | blue | green | orange | red | rose"
        Tip 2: you can also add an image using data-image tag
        Tip 3: you can change the color of the sidebar with data-background-color="white | black"
    -->
            
        </div>
        <div class="main-panel">
            <nav class="navbar navbar-transparent navbar-absolute">
                <div class="container-fluid">
                    <div class="navbar-minimize">
                        <button id="minimizeSidebar" class="btn btn-round btn-white btn-fill btn-just-icon">
                            <i class="material-icons visible-on-sidebar-regular">more_vert</i>
                            <i class="material-icons visible-on-sidebar-mini">view_list</i>
                        </button>
                    </div>
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#"> Orders Manage </a>
                    </div>

                </div>
            </nav>
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-icon" data-background-color="purple">
                                    <i class="material-icons">assignment</i>
                                </div>
                                <div class="card-content">
                                    <h4 class="card-title">Orders Tables</h4>
                                    <div class="toolbar">
                                        <!--        Here you can write extra buttons/actions for the toolbar              -->
                                    </div>
                                    <div class="material-datatables">
                                        <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Items</th>
                                                    <th>Name</th>
                                                    <th>Address</th>
                                                    <th>Phone</th>
                                                    <th>Create Time</th>
                                                    <th>Status</th>
                                                    <th>Payment</th>
                                                    <th>Total Price</th>
                                                    <th class="disabled-sorting ">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- end content-->
                            </div>
                            <!--  end card  -->
                        </div>
                        <!-- end col-md-12 -->
                    </div>
                    <!-- end row -->
                </div>
            </div>
        </div>
    </div>
<!-- MODAL START -->

<!-- MODAL update status -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="card card-signup card-plain">
          <div class="modal-header">
            <div class="card-header card-header-danger text-center">
                <h4 class="card-title">Update Order Status</h4>
            </div>
          </div>
        </div>
        <div class="modal-body">
          <form id="updateForm" method="post" action="" enctype="multipart/form-data">
            <input type="hidden" id="orderUpdatedId" />
            <input type="hidden" id="orderStatus" />
            <p>Do you want update status <span class="h6 text-warning " id="orderUpdatedName"></span>
            </p>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal" id="closeUpdate">Close</button>
              <button type="submit" class="btn btn-warning">Update</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
<!-- MODAL cancel -->
  <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="card card-signup card-plain">
          <div class="modal-header">
            <div class="card-header card-header-danger text-center">
                <h4 class="card-title">Cancel Order</h4>
            </div>
          </div>
        </div>
        <div class="modal-body">
          <form id="cancelForm" method="post" action="" enctype="multipart/form-data">
            <input type="hidden" id="cancelOrderId" />
            <p>Do you wan't delete <span class="h6 text-danger " id="CancelOrder"></span>
            </p>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal" id="closeCancel">Close</button>
              <button type="submit" class="btn btn-danger">Cancel</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
<!-- MODAL items -->
<div class="modal fade" id="itemsModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="card card-signup card-plain">
          <div class="modal-header">
            <div class="card-header card-header-danger text-center">
                <h4 class="card-title">Order Items </h4>
            </div>
          </div>
        </div>
        <div class="modal-body">
            <div class="material-datatables">
                <table id="itemsTables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
      </div>
    </div>
  </div>
<!-- MODAL END -->
</body>
<!--   Core JS Files   -->
<script src="../../templates/dashboard/assets/js/jquery-3.1.1.min.js" type="text/javascript"></script>
<script src="../../templates/dashboard/assets/js/jquery-ui.min.js" type="text/javascript"></script>
<script src="../../templates/dashboard/assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../../templates/dashboard/assets/js/material.min.js" type="text/javascript"></script>
<script src="../../templates/dashboard/assets/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
<!-- Forms Validations Plugin -->
<script src="../../templates/dashboard/assets/js/jquery.validate.min.js"></script>
<!--  Plugin for Date Time Picker and Full Calendar Plugin-->
<script src="../../templates/dashboard/assets/js/moment.min.js"></script>
<!--  Charts Plugin -->
<script src="../../templates/dashboard/assets/js/chartist.min.js"></script>
<!--  Plugin for the Wizard -->
<script src="../../templates/dashboard/assets/js/jquery.bootstrap-wizard.js"></script>
<!--  Notifications Plugin    -->
<script src="../../templates/dashboard/assets/js/bootstrap-notify.js"></script>
<!--   Sharrre Library    -->
<script src="../../templates/dashboard/assets/js/jquery.sharrre.js"></script>
<!-- DateTimePicker Plugin -->
<script src="../../templates/dashboard/assets/js/bootstrap-datetimepicker.js"></script>
<!-- Vector Map plugin -->
<script src="../../templates/dashboard/assets/js/jquery-jvectormap.js"></script>
<!-- Sliders Plugin -->
<script src="../../templates/dashboard/assets/js/nouislider.min.js"></script>
<!--  Google Maps Plugin    -->
<!--<script src="https://maps.googleapis.com/maps/api/js"></script>-->
<!-- Select Plugin -->
<script src="../../templates/dashboard/assets/js/jquery.select-bootstrap.js"></script>
<!--  DataTables.net Plugin    -->
<script src="../../templates/dashboard/assets/js/jquery.datatables.js"></script>
<!-- Sweet Alert 2 plugin -->
<script src="../../templates/dashboard/assets/js/sweetalert2.js"></script>
<!--	Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="../../templates/dashboard/assets/js/jasny-bootstrap.min.js"></script>
<!--  Full Calendar Plugin    -->
<script src="../../templates/dashboard/assets/js/fullcalendar.min.js"></script>
<!-- TagsInput Plugin -->
<script src="../../templates/dashboard/assets/js/jquery.tagsinput.js"></script>
<!-- Material Dashboard javascript methods -->
<script src="../../templates/dashboard/assets/js/material-dashboard.js"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="../../templates/dashboard/assets/js/demo.js"></script>
<!-- Admin Side Bar  -->
<script src="../../utilities/adminSidebar.js"></script>
<script type="text/javascript">
    var datasource = null;
    var selectedRow = -1;
    // ajax fetch data function
    function createTable(data){
        for (var i = 0; i < data.length;i++){
            var disabled = "";
            var status = setStatusLabel(data[i]["OrderStatus"]);
            if(data[i]["OrderStatus"] == "Completed" || data[i]["OrderStatus"] == "Cancel"){
                disabled="disabled";
            }
        $('#datatables tbody').append(`
        <tr>
          <td>${data[i]["OrderID"]}</td>
          <td>
            <a href="#" class="btn btn-simple btn-info btn-icon item" data-toggle="modal" data-target="#itemsModal"><i class="material-icons">list_alt</i></a>
          </td>
          <td>${data[i]["FirstName"]} ${data[i]["LastName"]}</td>
          <td >${data[i]["Address"]}</td>
          <td>${data[i]["Phone"]}</td>
          <td>${data[i]["CreateTime"]}</td>
          <td>${status}</td>
          <td>${data[i]["Payment"]}</td>
          <td>${data[i]["TotalPrice"]}</td>
          <td>
              <a href="#" class="btn btn-simple btn-warning btn-icon edit" data-toggle="modal" data-target="#editModal" ${disabled}><i class="material-icons">skip_next</i></a>
              <a href="#" class="btn btn-simple btn-danger btn-icon remove" data-toggle="modal" data-target="#deleteModal" ${disabled}><i class="material-icons">close</i></a>
          </td>
        </tr>`);
        }
    }
    function get_record(id,action)
    {
        $.ajax(
            {
                url: 'control.php',
                method: 'get',
                async: false,
                data:{
                    "id": id, 
                    "action": action, 
                },
                success: function(data)
                {
                    datasource = JSON.parse(data);
                }
            });
    }
    function nextStatus(status){

        if(status == "Waiting") status = "Shipping";
        else if(status == "Shipping") status = "Completed"
        return status;
    }
    function setStatusLabel(status){
        switch(status){
            case "Waiting":
                status = '<span class="label label-primary">Waiting</span>';
                break;
            case "Shipping":
                status = '<span class="label label-info">Shipping</span>';
                break;
            case "Completed":
                status = '<span class="label label-success">Completed</span>';
                break;
            case "Cancel":
                status = '<span class="label label-danger">Cancel</span>';
                break;
        }
        return status;
    }
    $(document).ready(function() {

        get_record("","getOrderRecord");
        createTable(datasource);

        $('#datatables').DataTable({
            "pagingType": "full_numbers",
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            responsive: true,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search records",
            }
        });
        var table = $('#datatables').DataTable();

// Edit record
        table.on('click', '.edit', function() {
            $tr = $(this).closest('tr');
            var data = table.row($tr).data();
            selectedRow  = table.row($tr).index();
            var tempDiv = document.createElement('div');
            tempDiv.innerHTML=data[6];
            var status = nextStatus(tempDiv.innerText);
            $("#orderUpdatedId").val(data[0]);
            $("#orderUpdatedName").text(data[0]);
            $("#orderStatus").val(status);
        });
        //ajax update status function
        $('#updateForm').on('submit', function(event){
            event.preventDefault();
            var id= $("#orderUpdatedId").val();
            var status = $("#orderStatus").val();
            var formData = new FormData();
            formData.append('id', id);
            formData.append('status', status);
            formData.append('action', 'updateStatus');
            $.ajax({
				url:"control.php",
				method:"POST",
				data:formData,
				success:function(data)
				{
					if(data == 1){
                        get_record($("#orderUpdatedId").val(),"getOrderRecord");
                        NotificationSucces(`Order ${id}' status is changed successfully`);
                        $('#closeUpdate').trigger('click');
                        var newStatus=setStatusLabel(datasource[0]["OrderStatus"])
                        table.cell({row:selectedRow, column:6}).data( newStatus ).draw(false);
                        if(datasource[0]["OrderStatus"] == "Completed"){
                            var newBtn = `<a href="#" class="btn btn-simple btn-warning btn-icon edit" data-toggle="modal" data-target="#editModal" disabled><i class="material-icons">skip_next</i></a>
                                    <a href="#" class="btn btn-simple btn-danger btn-icon remove" data-toggle="modal" data-target="#deleteModal" disabled><i class="material-icons">close</i></a>`
                            table.cell({row:selectedRow, column:9}).data( newBtn ).draw(false);
                        }
                    }
                    else if (data == 0){
                        NotificationError();
                    }
                },
                cache: false,
                contentType: false,
                processData: false
			});
        });

// Cancel a record
        table.on('click', '.remove', function(e) {
            $tr = $(this).closest('tr');
            var data = table.row($tr).data();
            selectedRow  = table.row($tr).index();
            $("#cancelOrderId").val(data[0]);
            $("#CancelOrder").text(data[0]);
        });

        //ajax cancel order function
        $('#cancelForm').on('submit', function(event){
            event.preventDefault();
            var id= $("#cancelOrderId").val();
            var formData = new FormData();
            formData.append('id', id);
            formData.append('status', 'Cancel');
            formData.append('action', 'updateStatus');
            $.ajax({
				url:"control.php",
				method:"POST",
				data:formData,
				success:function(data)
				{
					if(data == 1){
                        get_record($("#orderUpdatedId").val(),"getOrderRecord");
                        NotificationSucces(`Order ${id}'  is canceled successfully`);
                        $('#closeCancel').trigger('click');
                        var newStatus=setStatusLabel(datasource[0]["OrderStatus"])
                        var newBtn = `<a href="#" class="btn btn-simple btn-warning btn-icon edit" data-toggle="modal" data-target="#editModal" disabled><i class="material-icons">skip_next</i></a>
                                    <a href="#" class="btn btn-simple btn-danger btn-icon remove" data-toggle="modal" data-target="#deleteModal" disabled><i class="material-icons">close</i></a>`
                        table.cell({row:selectedRow, column:6}).data( newStatus ).draw(false);
                        table.cell({row:selectedRow, column:9}).data( newBtn ).draw(false);
                    }
                    else {
                        NotificationError();
                    }
                },
                cache: false,
                contentType: false,
                processData: false
			});
        });
// show items in order
        table.on('click', '.item', function(e) {
            $('#itemsTables tbody').empty();
            $tr = $(this).closest('tr');
            var data = table.row($tr).data();
            var id = data[0];
            get_record(id,"getOrderItems");
            for (var i = 0; i < datasource.length;i++){
                $('#itemsTables tbody').append(`
                <tr>
                  <td>${datasource[i]["OrderID"]}</td>
                  <td>${datasource[i]["ProductName"]}</td>
                  <td>${datasource[i]["Price"]}</td>
                  <td>${datasource[i]["Quantity"]}</td>
                </tr>`);
                }
            
        });
        
        $('.card .material-datatables label').addClass('form-group');
    });
</script>


<!-- Mirrored from demos.creative-tim.com/material-dashboard-pro/examples/tables/datatables.net.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 20 Mar 2017 21:34:01 GMT -->
</html>