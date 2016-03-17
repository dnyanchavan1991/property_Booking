<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin | Home</title>

    <!-- Bootstrap Core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/css/bootstrap-table.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="assets/css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="assets/css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="Admin">Property Booking Admin</a>
                <a class="navbar-brand" href="Logout/viewSite">View Site</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                 
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>  <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                  
                        <li>
                            <a href="Logout"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="active">
                        <a href="Admin"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Property <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="AddProperty">Add</a>
                            </li>
                            <li>
                                <a href="DisplayProperty">Display</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Dashboard <small>Statistics Overview</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Dashboard
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
				<div class="row" id="property_list">
                    <div class="col-lg-6">
                        <h3>List</h3>
                        <div class="table-responsive">
							<button id="viewId" class="btn btn-info" >View</button>
							
                            <table data-toggle="table" id="table-style" class="table table-bordered table-hover table-striped"
							data-url="assets/json/Properties.json"   data-show-columns="true" data-show-toggle="true" 
							data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="PropertyId" data-strict-search="true" 
							data-sort-order="desc" data-single-select="true" data-click-to-select="true" data-maintain-selected="true">
                                <thead>
                                    <tr>
                                        <th data-field="state" data-checkbox="true"></th>
									<!--	<th data-field="property_id" >Property ID</th>-->
										<th data-field="property_name" data-sortable="true">Property Name</th>
										<th data-field="owner_name" data-sortable="true">Property Owner Name (contact number)</th>										
										<th data-field="registred_date" data-sortable="true">Registration Date</th>
										<th data-field="state" data-sortable="true">State</th>
										<th data-field="city" data-sortable="true">City</th>
									</tr>
                                </thead>
                            </table>
						</div>
                    </div>
                </div>
             

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="assets/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/bootstrap-table.js"></script>
    <!-- Morris Charts JavaScript -->
    
	<script type="text/javascript">
	$(document).ready(function()
	{
		$("#property_list").hide();
		$.ajax({
			type: "post",
			url:"DisplayProperty/listOnIndexPage",
			success: function(d){
				$("#property_list").show();
				$("#viewId").hide();
			}
		});
		var json;
		var checkedRows = [];
		$('#table-style').bind('check.bs.table click-row.bs.table', function (e, row) {
			$.each(checkedRows, function(index, value) {
				checkedRows.splice(index,1);
			});
			checkedRows.push({id: row.property_id});
			$("#viewId").show();
			//$("#editId").show();
			//$("#deleteId").show();
		});
		$('#table-style').on('uncheck.bs.table', function (e, row) {
			$.each(checkedRows, function(index, value) {
				checkedRows.splice(index,1);
				$("#viewId").hide();
				//$("#editId").hide();
				//$("#deleteId").hide();
			});
		});
		
		$("#viewId").click(function(){

			json = JSON.stringify(checkedRows);
			$.ajax({
				type: "post",
				url:"PropertyIndetail/SessionStorage",
				dataType: "json",
				data:{id: json},
				success: function(d){
					window.location='PropertyIndetail/loadIndetailView';
				}
			});
		});
		 
	});
	</script>
</body>

</html>
