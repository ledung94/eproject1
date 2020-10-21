
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
    <link href="../../utilities/AdminStyle.css" rel="stylesheet" />
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="../../templates/dashboard/assets/css/demo.css" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="../../templates/dashboard/assets/css/font-awesome.css" rel="stylesheet" />
    <link href="../../templates/dashboard/assets/css/google-roboto-300-700.css" rel="stylesheet" />
    <style>
        .form-group.label-floating{
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
                        <a class="navbar-brand" href="#"> Create New Product </a>
                    </div>

                </div>
            </nav>
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <form id="createProduct"  action="#" method="post" enctype="multipart/form-data">
                                    <div class="card-header card-header-icon" data-background-color="purple">
                                        <i class="material-icons">playlist_add</i>
                                    </div>
                                    <div class="card-content">
                                        <h4 class="card-title">Create New Product</h4>
                                        <p style="display:none; color:#f44336;margin-left: 45%;" id="title-error">Please fill all fields have *</p>
                                        <div style="margin-left:10%; width:80%">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Product Name<small>*</small></label>
                                                <input class="form-control" id="name" type="text"  />
                                            </div>
                                            <div class="form-group label-floating">
                                                <label class="control-label">Price<small>*</small></label>
                                                <input class="form-control" id="price" type="number"  />
                                            </div>
                                            <div class="form-group label-floating">
                                                <label class="control-label">Discount<small>*</small></label>
                                                <input class="form-control" id="discount" type="text" />
                                            </div>
                                            <div class="form-group label-floating">
                                                <label class="control-label">Amount<small>*</small></label>
                                                <input class="form-control" id="amount" type="number" />
                                            </div>
                                            <div class="form-group label-floating">
                                                <label class="control-label">Description</label>
                                                <textarea class="form-control" id="desc"  rows="2"></textarea>
                                            </div>
                                            <div class="form-group">
                                            <div class="row">
                                            <div class="col-sm-6 col-sm-offset-1">
                                                <legend id="prodImg-title">Product Image *</legend>
                                                <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                                    <div class="fileinput-new thumbnail">
                                                        <img src="../../templates/dashboard/assets/img/image_placeholder.jpg" alt="...">
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
                                            <div class="col-sm-5 checkbox-radios ">
                                                <legend id="radio-title">Product Type *</legend>
                                                <div class="radio">
                                                    <label>
                                                        <input class="form-check-input" type="radio" name="prodType" value="Vegetables" > Vegetables
                                                    </label>
                                                </div>
                                                <div class="radio">
                                                    <label>
                                                        <input class="form-check-input" type="radio" name="prodType" value="Fruits" > Fruits
                                                    </label>
                                                </div>
                                                <div class="radio">
                                                    <label>
                                                        <input class="form-check-input" type="radio" name="prodType" value="Dried" > Dried
                                                    </label>
                                                </div>
                                                <div class="radio">
                                                    <label>
                                                        <input class="form-check-input" type="radio" name="prodType" value="Juice" > Juice
                                                    </label>
                                                </div>
                                            </div>
                                            </div>
                                            </div>
                                        <div class="card-footer text-center">
                                            <button type="reset" class="btn btn-default btn-fill" id="reset">Reset</button>
                                            <button type="submit" class="btn btn-success btn-fill" id="submit">Create</button>
                                        </div>
                                        </div>
                                       
                                    </div>
                                </form>

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


    $(document).ready(function() {

        $('#createProduct').on('submit', function(event){
            event.preventDefault();
            var file_data = $('#inputImg').prop('files')[0]; 
            var name = $("#name").val();
            var price = $("#price").val();
            var discount = $("#discount").val();
            var amount = $("#amount").val();
            var desc = $("#desc").val();
            var prodType = $("input[name='prodType']:checked").val();
            if(name == ""){
                $("#name").parent('div').addClass('has-error');
                $("#title-error").show();
            }
            else if (price == ""){
                $("#price").parent('div').addClass('has-error');
                $("#title-error").show();
            }
            else if (amount == ""){
                $("#title-error").show();
                $("#amount").parent('div').addClass('has-error');
            }
            else if (prodType == null){
                $("#radio-title").css('color','#f44336');
                $("#title-error").show();
            }
            else if (file_data == null){
                $("#prodImg-title").css('color','#f44336');
                $("#title-error").show();
            }
            else{
                $("#title-error").hide();
                var formData = new FormData();
                formData.append('inputImg', file_data);
                formData.append('name', name);
                formData.append('price', price);
                formData.append('discount', discount);
                formData.append('amount', amount);
                formData.append('desc', desc);
                formData.append('prodType', prodType);
                formData.append('action', 'create');
                $.ajax({
			    	url:"control.php",
			    	method:"POST",
			    	data:formData,
			    	success:function(data)
			    	{
			    		if(data == 1){
                            NotificationSucces(`Product ${name} is created successfully`);
                            $("#reset").click();
                        }
                        else {
                            NotificationError();
                        }
                    },
                    cache: false,
                    contentType: false,
                    processData: false
			    });
            }
            
        });

    });
</script>


<!-- Mirrored from demos.creative-tim.com/material-dashboard-pro/examples/tables/datatables.net.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 20 Mar 2017 21:34:01 GMT -->
</html>