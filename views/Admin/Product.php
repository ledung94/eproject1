  
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
    <style>
        .form-group{
            margin-top:10px;
        }
    </style>
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
                        <a class="navbar-brand" href="#"> Product Manage </a>
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
                                    <h4 class="card-title">Product Tables</h4>
                                    <div class="toolbar">
                                        <!--        Here you can write extra buttons/actions for the toolbar              -->
                                    </div>
                                    <div class="material-datatables">
                                        <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Name</th>
                                                    <th>image</th>
                                                    <th>Price</th>
                                                    <th>Discount</th>
                                                    <th>Amount</th>
                                                    <th>Type</th>
                                                    <th>Description</th>
                                                    <th class="disabled-sorting text-right">Actions</th>
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

<!-- MODAL edit -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" >
      <div class="modal-dialog " role="document" style="width:60%">
          <div class="modal-content">
            <div class="card card-signup" >
                <form id="editProduct" class="form-horizontal form-edit" action="#" method="post" enctype="multipart/form-data">
                    <div class="card-header card-header-icon" data-background-color="orange">
                        <i class="material-icons">edit</i>
                    </div>
                    <div class="card-content">
                        <h4 class="card-title">Update Product</h4>
                        <div class="row" style="margin-top:5rem;">
                        <div class="col-md-5" style="text-align: center">
                            <div class="fileinput fileinput-new text-center" data-provides="fileinput" id="file-input-new">
                                <div class="fileinput-new thumbnail">
                                    <img src="../../templates/dashboard/assets/img/image_placeholder.jpg" alt="Star Organic" id="productImg" >
                                </div>
                                <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                <div>
                                    <span class="btn btn-rose btn-round btn-file">
                                        <span class="fileinput-new">Select image</span>
                                        <span class="fileinput-exists">Change</span>
                                        <input type="file" id="inputImg" />
                                    </span>
                                    <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                </div>
                            </div>
                            </div>
                            <div class="col-md-7" style="border-left: 1px solid #c9c9c9;">
                                <div class="row">
                                    <label class="col-md-2 label-on-left">Name</label>
                                    <div class="col-md-10">
                                        <div class="form-group label-floating is-empty">
                                            <label class="control-label"></label>
                                            <input class="form-control" id="name" type="text" required="true" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-md-2 label-on-left">Price</label>
                                    <div class="col-md-10">
                                        <div class="form-group label-floating is-empty">
                                            <label class="control-label"></label>
                                            <input class="form-control" id="price" type="number" required="true" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-md-2 label-on-left">Discount</label>
                                    <div class="col-md-10">
                                        <div class="form-group label-floating is-empty">
                                            <label class="control-label"></label>
                                            <input class="form-control" id="discount" type="text" required="true"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-md-2 label-on-left">Amount</label>
                                    <div class="col-md-10">
                                        <div class="form-group label-floating is-empty">
                                            <label class="control-label"></label>
                                            <input class="form-control" id="amount" type="number" required="true" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-md-2 label-on-left">Description</label>
                                    <div class="col-md-10">
                                        <div class="form-group label-floating is-empty">
                                            <label class="control-label"></label>
                                            <textarea class="form-control" id="desc"  rows="2" ></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-md-2 label-on-left">Type</label>
                                    <div class="col-md-10" style="margin-top:1.5rem;">
                                        <div class="radio col-sm-3">
                                            <label>
                                                <input class="form-check-input" type="radio" name="prodType" value="Vegetables" required> Vegetables
                                            </label>
                                        </div>
                                        <div class="radio col-sm-2">
                                            <label>
                                                <input class="form-check-input" type="radio" name="prodType" value="Fruits" required> Fruits
                                            </label>
                                        </div>
                                        <div class="radio col-sm-2">
                                            <label>
                                                <input class="form-check-input" type="radio" name="prodType" value="Dried" required> Dried
                                            </label>
                                        </div>
                                        <div class="radio col-sm-2">
                                            <label>
                                                <input class="form-check-input" type="radio" name="prodType" value="Juice" required> Juice
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <input class="form-control" id="prodUpdatedId" type="hidden"/>
                            </div>
                        </div>
                        <div class="card-footer text-center">
                            <button type="reset" class="btn btn-default btn-fill" data-dismiss="modal" id="closeEdit">Close</button>
                            <button type="submit" class="btn btn-success btn-fill" id="submit">Update</button>
                        </div>
                    </div>
                </form>
            </div>
          </div>
      </div>
    </div>
 

<!-- MODAL delete -->
  <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="card card-signup card-plain">
          <div class="modal-header">
            <div class="card-header card-header-danger text-center">
                <h4 class="card-title">Delete Product</h4>
            </div>
          </div>
        </div>
        <div class="modal-body">
          <form id="deleteForm" method="post" action="" enctype="multipart/form-data">
            <input type="hidden" id="delProdId" />
            <p>Do you wan't delete <span class="h6 text-danger " id="delProdName"></span>
            </p>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal" id="closeDelete">Close</button>
              <button type="submit" class="btn btn-danger">Delete</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

<!-- MODAL image -->
  <div class="modal fade" id="imageModal" tabindex="-1" role="dialog">
    <div class="modal-dialog " role="document">
      <div class="modal-content">
        <div class="card card-signup card-plain">
          <div class="modal-header">
            <div class="card-header card-header-info text-center">
              <h4>Product image gallery</h4>
            </div>
          </div>
        </div>
        <div class="modal-body">
            <img src="" alt="Raised Image" class="img-raised rounded img-fluid" id="gallery" style="width: 100%;">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
        $('#datatables tbody').append(`
        <tr>
          <td>${data[i]["ProductID"]}</td>
          <td>${data[i]["ProductName"]}</td>
          <td >
              <a href="#" class="btn btn-simple btn-info btn-icon img" name="${data[i]['Image']}" data-toggle="modal" data-target="#imageModal"><i class="material-icons">collections</i></a>
          </td>
          <td>${data[i]["Price"]}</td>
          <td>${data[i]["Discount"]}</td>
          <td>${data[i]["Amount"]}</td>
          <td>${data[i]["Category"]}</td>
          <td>${data[i]["Description"]}</td>
          <td>
              <a href="#" class="btn btn-simple btn-warning btn-icon edit" data-toggle="modal" data-target="#editModal"><i class="material-icons">edit</i></a>
              <a href="#" class="btn btn-simple btn-danger btn-icon remove" data-toggle="modal" data-target="#deleteModal"><i class="material-icons">close</i></a>
          </td>
        </tr>`);
        }
    }
    function get_record()
    {
        $.ajax(
            {
                url: 'control.php',
                method: 'get',
                async: false,
                data:{
                    "id": $("#prodUpdatedId").val(), 
                    "action": "getProdRecord", 
                },
                success: function(data)
                {
                    datasource = JSON.parse(data);
                }
            });
    }
    $(document).ready(function() {

        get_record();
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
            $("#prodUpdatedId").val(data[0]);
            $("#name").val(data[1]);
            $("#price").val(data[3]);
            $("#discount").val(data[4]);
            $("#amount").val(data[5]);
            $("#desc").val(data[7]);
            $("#file-input-new").attr('class','fileinput fileinput-new text-center');
            $("#productImg").attr("src",data[2].substr(63, data[2].length).split("png")[0]+"png");
            console.log($("#productImg").attr("src"))
            var radios = document.getElementsByName("prodType");
            for (var i = 0; i < radios.length; i++) {
            if(radios[i].getAttribute("value") == data[6]){
                radios[i].checked=true;
                break;
            }
        }
        });
    //ajax update product function
        $('#editProduct').on('submit', function(event){
            event.preventDefault();
            var id= $("#prodUpdatedId").val();
            var file_data = $('#inputImg').prop('files')[0]; 
            var name = $("#name").val();
            var price = $("#price").val();
            var discount = $("#discount").val();
            var amount = $("#amount").val();
            var desc = $("#desc").val();
            var prodType = $("input[name='prodType']:checked").val();
            var formData = new FormData();
            formData.append('idProd', id);
            formData.append('inputImg', file_data);
            formData.append('name', name);
            formData.append('price', price);
            formData.append('discount', discount);
            formData.append('amount', amount);
            formData.append('desc', desc);
            formData.append('prodType', prodType);
            formData.append('action', 'edit');
            $.ajax({
				url:"control.php",
				method:"POST",
				data:formData,
				success:function(data)
				{
					if(data == 1){
                        get_record();
                        NotificationSucces(`Product ${name} is updated successfully`);
                        var newData = [datasource[0]["ProductID"],datasource[0]["ProductName"],
                                    `<a href="#" class="btn btn-simple btn-info btn-icon img" name="${datasource[0]['Image']}" data-toggle="modal" data-target="#imageModal"><i class="material-icons">collections</i></a>`,
                                    datasource[0]["Price"],
                                    datasource[0]["Discount"],
                                    datasource[0]["Amount"],
                                    datasource[0]["Category"],
                                    datasource[0]["Description"],
                                    `<a href="#" class="btn btn-simple btn-warning btn-icon edit" data-toggle="modal" data-target="#editModal"><i class="material-icons">edit</i></a>
                                    <a href="#" class="btn btn-simple btn-danger btn-icon remove" data-toggle="modal" data-target="#deleteModal"><i class="material-icons">close</i></a>`
                                    ];
                        table.row(selectedRow).data( newData ).draw(false);
                        $('#closeEdit').trigger('click');
                    }
                    else if (data == 0){
                        NotificationError();
                        demo.showSwal('error');
                    }
                },
                cache: false,
                contentType: false,
                processData: false
			});
        });

    // Delete a record
        table.on('click', '.remove', function(e) {
            $tr = $(this).closest('tr');
            var data = table.row($tr).data();
            selectedRow  = table.row($tr).index();
            $("#delProdId").val(data[0]);
            $("#delProdName").text(data[1]);
        });

        //ajax delete product function
        $('#deleteForm').on('submit', function(event){
            event.preventDefault();
            var id= $("#delProdId").val();
            var formData = new FormData();
            formData.append('idProd', id);
            formData.append('action', 'delete');
            $.ajax({
				url:"control.php",
				method:"POST",
				data:formData,
				success:function(data)
				{
					if(data == 1){
                        NotificationSucces(`Product ${name} is deleted successfully`);
                        table.row(selectedRow).remove().draw(false);
                        $("#closeDelete").trigger('click');
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


    //Show image record
        table.on('click', '.img', function() {
            $tr = $(this).closest('tr');
            var data = table.row($tr).data();
            $("#gallery").attr('src',data[2].substr(63, data[2].length).split("png")[0]+"png");
        });

        $('.card .material-datatables label').addClass('form-group');
    });
</script>


<!-- Mirrored from demos.creative-tim.com/material-dashboard-pro/examples/tables/datatables.net.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 20 Mar 2017 21:34:01 GMT -->
</html>