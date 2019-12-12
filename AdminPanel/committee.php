
<?php
	
	include_once dirname(__FILE__).'/inc/config.php'; 
	 
	$q1 = app_db()->select('select * from committee_members');
	
	?>
	<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Document</title>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	
	<!-- Page level plugin CSS-->
	<link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
	
	<!-- Custom styles for this template-->
	<link href="css/sb-admin.css" rel="stylesheet">
	</head>
	<body id="page-top">
	<script type="text/javascript">
	  
	$(document).ready(function($)
	{ 	 
		function create_html_table (tbl_data)
		{
			//--->create data table > start
			var tbl = '';
			tbl +='<table class="table table-bordered" id="dataTable">'
	        
				//--->create table header > start
				tbl +='<thead>';
					tbl +='<tr>';
					tbl +='<th>Name of Member</th>';
					tbl +='<th>Position</th>';
					tbl +='<th>committee</th>';
					tbl +='<th>Options</th>';
					tbl +='</tr>';
				tbl +='</thead>';
				//--->create table header > end
				
				//--->create table body > start
				tbl +='<tbody>';
	
					//--->create table body rows > start
					$.each(tbl_data, function(index, val) 
					{
						//you can replace with your database row id
						var row_id = val['row_id'];
	
						//loop through ajax row data
						tbl +='<tr row_id="'+row_id+'">';
							tbl +='<td ><div class="row_data" edit_type="click" col_name="fname">'+val['fname']+'</div></td>';
							tbl +='<td ><div class="row_data" edit_type="click" col_name="lname">'+val['lname']+'</div></td>';
							tbl +='<td ><div class="row_data" edit_type="click" col_name="email">'+val['email']+'</div></td>';
	
							//--->edit options > start
							tbl +='<td>';						 
								tbl +='<span class="btn_edit" > <a href="#" class="btn btn-link " row_id="'+row_id+'" > Edit</a> </span>';
								//only show this button if edit button is clicked
								tbl +='<a href="#" class="btn_save btn btn-link"  row_id="'+row_id+'"> Save </a>';
								tbl +='<a href="#" class="btn_cancel btn btn-link" row_id="'+row_id+'"> Cancel </a>';
								tbl +='<a href="#" class="btn_delete btn btn-link1 text-danger" row_id="'+row_id+'"> Delete</a>';
							tbl +='</td>';
							//--->edit options > end						
						tbl +='</tr>';
					});
					//--->create table body rows > end
				tbl +='</tbody>';
				//--->create table body > end
	
			// tbl +='</table>';
			//--->create data table > end
	
			//add new table row
		
	
			//out put table data
			$(document).find('.table-responsive').html(tbl);
	
			$(document).find('.btn_save').hide();
			$(document).find('.btn_cancel').hide(); 	
			$(document).find('.btn_delete').hide(); 
				
		}
	
	
		var ajax_url = "<?php echo APPURL;?>/ajax.php" ;
		var ajax_data = <?php echo json_encode($q1);?>;
	
		//create table on page load
		//create_html_table(ajax_data);
	
		//--->create table via ajax call > start
		$.getJSON(ajax_url,{call_type:'get'},function(data) 
		{
			create_html_table(data);
		});
		//--->create table via ajax call > end
		
	
	
	
		//--->make div editable > start
		$(document).on('click', '.row_data', function(event) 
		{
			event.preventDefault(); 
	
			if($(this).attr('edit_type') == 'button')
			{
				return false; 
			}
	
			//make div editable
			$(this).closest('div').attr('contenteditable', 'true');
			//add bg css
			$(this).addClass('bg-warning').css('padding','5px');
	
			$(this).focus();
	
			$(this).attr('original_entry', $(this).html());
	
		})	
		//--->make div editable > end
	
		//--->save single field data > start
		$(document).on('focusout', '.row_data', function(event) 
		{
			event.preventDefault();
	
			if($(this).attr('edit_type') == 'button')
			{
				return false; 
			}
	
			//get the original entry
			var original_entry = $(this).attr('original_entry');
	
			var row_id = $(this).closest('tr').attr('row_id'); 
			
			var row_div = $(this)				
			.removeClass('bg-warning') //add bg css
			.css('padding','')
	
			var col_name = row_div.attr('col_name'); 
			var col_val = row_div.html(); 
			
			var arr = {};
			//get the col name and value
			arr[col_name] = col_val; 
			//get row id value
			arr['row_id'] = row_id;
	
			if(original_entry != col_val)
			{ 
				//remove the attr so that new entry can take place
				$(this).removeAttr('original_entry');
	
				//ajax api json data			 
				var data_obj = 
				{
					row_id: row_id,
					col_name: col_name,
					col_val:col_val,
					call_type: 'single_entry',				
				};
				
				//call ajax api to update the database record
				$.post(ajax_url, data_obj, function(data) 
				{
					var d1 = JSON.parse(data);
					if(d1.status == "error")
					{
						var msg = ''
						+ '<h3>There was an error while trying to update your entry</h3>'
						+'<pre class="bg-danger">'+JSON.stringify(arr, null, 2) +'</pre>'
						+'';
	
						$('.post_msg').html(msg);
					}
					else if(d1.status == "success")
					{
						var msg = ''
						+ '<h3>Successfully updated your entry</h3>'
						+'<pre class="bg-success">'+JSON.stringify(arr, null, 2) +'</pre>'
						+'';
	
						$('.post_msg').html(msg);
					}
				});
			}
			else
			{
				$('.post_msg').html('');
			}
			
		})	
		//--->save single field data > end
	
		//--->button > edit > start	
		$(document).on('click', '.btn_edit', function(event) 
		{
			event.preventDefault();
			var tbl_row = $(this).closest('tr');
	
			var row_id = tbl_row.attr('row_id');
	
			tbl_row.find('.btn_save').show();
			tbl_row.find('.btn_cancel').show();
			tbl_row.find('.btn_delete').show();
	
			//hide edit button
			tbl_row.find('.btn_edit').hide(); 
	
			//make the whole row editable
			tbl_row.find('.row_data')
			.attr('contenteditable', 'true')
			.attr('edit_type', 'button')
			.addClass('bg-warning')
			.css('padding','3px')
	
			//--->add the original entry > start
			tbl_row.find('.row_data').each(function(index, val) 
			{  
				//this will help in case user decided to click on cancel button
				$(this).attr('original_entry', $(this).html());
			}); 		
			//--->add the original entry > end
	
		});
		//--->button > edit > end
	
	
		//--->button > cancel > start	
		$(document).on('click', '.btn_cancel', function(event) 
		{
			event.preventDefault();
	
			var tbl_row = $(this).closest('tr');
	
			var row_id = tbl_row.attr('row_id');
	
			//hide save and cacel buttons
			tbl_row.find('.btn_save').hide();
			tbl_row.find('.btn_cancel').hide();
			tbl_row.find('.btn_delete').hide();
	
			//show edit button
			tbl_row.find('.btn_edit').show();
	
			//make the whole row editable
			tbl_row.find('.row_data')
			.attr('edit_type', 'click')
			.removeClass('bg-warning')
			.css('padding','') 
	
			tbl_row.find('.row_data').each(function(index, val) 
			{   
				$(this).html( $(this).attr('original_entry') ); 
			});  
		});
		//--->button > cancel > end
	
		
		//--->save whole row entery > start	
		$(document).on('click', '.btn_save', function(event) 
		{
			event.preventDefault();
			var tbl_row = $(this).closest('tr');
	
			var row_id = tbl_row.attr('row_id');
	
			
			//hide save and cacel buttons
			tbl_row.find('.btn_save').hide();
			tbl_row.find('.btn_cancel').hide();
			tbl_row.find('.btn_delete').hide();
	
			//show edit button
			tbl_row.find('.btn_edit').show();
	
	
			//make the whole row editable
			tbl_row.find('.row_data')
			.attr('edit_type', 'click')
			.removeClass('bg-warning')
			.css('padding','') 
	
			//--->get row data > start
			var arr = {}; 
			tbl_row.find('.row_data').each(function(index, val) 
			{   
				var col_name = $(this).attr('col_name');  
				var col_val  =  $(this).html();
				arr[col_name] = col_val;
			});
			//--->get row data > end
	
			//get row id value
			arr['row_id'] = row_id;
	
			//out put to show
			$('.post_msg').html( '<pre class="bg-success">'+JSON.stringify(arr, null, 2) +'</pre>');
	
			//add call type for ajax call
			arr['call_type'] = 'row_entry';
	
			//call ajax api to update the database record
			$.post(ajax_url, arr, function(data) 
			{
				var d1 = JSON.parse(data);
				if(d1.status == "error")
				{
					var msg = ''
					+ '<h3>There was an error while trying to update your entry</h3>'
					+'<pre class="bg-danger">'+JSON.stringify(arr, null, 2) +'</pre>'
					+'';
	
					$('.post_msg').html(msg);
				}
				else if(d1.status == "success")
				{
					var msg = ''
					+ '<h3>Successfully updated your entry</h3>'
					+'<pre class="bg-success">'+JSON.stringify(arr, null, 2) +'</pre>'
					+'';
	
					$('.post_msg').html(msg);
				}			
			});
		});
		//--->save whole row entery > end
	
	
	
		$(document).on('click', '.btn_new_row', function(event) 
		{
			event.preventDefault();
			//create a random id
			var row_id = Math.random().toString(36).substr(2);
	
			//get table rows
			var tbl_row = $(document).find('.table-bordered').find('tr');	 
			var tbl = '';
			tbl +='<tr row_id="'+row_id+'">';
				tbl +='<td ><div class="new_row_data fname bg-warning" contenteditable="true" edit_type="click" col_name="fname"></div></td>';
				tbl +='<td ><div class="new_row_data lname bg-warning" contenteditable="true" edit_type="click" col_name="lname"></div></td>';
				tbl +='<td ><div class="new_row_data email bg-warning" contenteditable="true" edit_type="click" col_name="email"></div></td>';
	
				//--->edit options > start
				tbl +='<td>';			 
					tbl +='  <a href="#" class="btn btn-link btn_new" row_id="'+row_id+'" > Add Entry</a>   | ';
					tbl +='  <a href="#" class="btn btn-link btn_remove_new_entry" row_id="'+row_id+'"> Remove</a> ';
				tbl +='</td>';
				//--->edit options > end	
	
			tbl +='</tr>';
			tbl_row.last().after(tbl);
	
			$(document).find('.table-bordered').find('tr').last().find('.fname').focus();
		});
	
		
		$(document).on('click', '.btn_remove_new_entry', function(event) 
		{
			event.preventDefault();
	
			$(this).closest('tr').remove();
		});
	
		function alert_msg (msg)
		{
			return '<span class="alert_msg text-danger">'+msg+'</span>';
		}
	
		$(document).on('click', '.btn_new', function(event) 
		{
			event.preventDefault();
			
			var ele_this = $(this);
			var ele = ele_this.closest('tr');
			
			//remove all old alerts
			ele.find('.alert_msg').remove();
	
			//get row id
			var row_id = $(this).attr('row_id');
	
			//get field names
			var fname = ele.find('.fname');
			var lname = ele.find('.lname');
			var email = ele.find('.email');
	
	
			if(fname.html() == "")
			{
				fname.focus();
				fname.after(alert_msg('Enter First Name'));
			}
			else if(lname.html() == "")
			{
				lname.focus();
				lname.after(alert_msg('Enter Position'));
			}
			else if(email.html() == "")
			{
				email.focus();
				email.after(alert_msg('Enter Committee'));
			}
			else
			{
				var data_obj=
				{
					call_type:'new_row_entry',
					row_id:row_id,
					fname:fname.html(),
					lname:lname.html(),
					email:email.html(),
				};	
				
				ele_this.html('<p class="bg-warning">Please wait....adding your new row</p>');
	
				$.post(ajax_url, data_obj, function(data) 
				{
					var d1 = JSON.parse(data);
	
					var tbl = '';
					tbl +='<a href="#" class="btn btn-link btn_edit" row_id="'+row_id+'" > Edit</a>';
					tbl +='<a href="#" class="btn btn-link btn_save"  row_id="'+row_id+'" style="display:none;"> Save</a>';
					tbl +='<a href="#" class="btn btn-link btn_cancel" row_id="'+row_id+'" style="display:none;"> Cancel</a>';
					tbl +='<a href="#" class="btn btn-link text-warning btn_delete" row_id="'+row_id+'" style="display:none;" > Delete</a>';
	
					if(d1.status == "error")
					{
						var msg = ''
						+ '<h3>There was an error while trying to add your entry</h3>'
						+'<pre class="bg-danger">'+JSON.stringify(data_obj, null, 2) +'</pre>'
						+'';
	
						$('.post_msg').html(msg);
					}
					else if(d1.status == "success")
					{
						ele_this.closest('td').html(tbl);
						ele.find('.new_row_data').removeClass('bg-warning');
						ele.find('.new_row_data').toggleClass('new_row_data row_data');
					}
				});
			}
		});
	
	
	
		$(document).on('click', '.btn_delete', function(event) 
		{
			event.preventDefault();
	
			var ele_this = $(this);
			var row_id = ele_this.attr('row_id');
			var data_obj=
			{
				call_type:'delete_row_entry',
				row_id:row_id,
			};	
					  
			ele_this.html('<p class="bg-warning">Please wait....deleting your entry</p>')
			$.post(ajax_url, data_obj, function(data) 
			{ 
				var d1 = JSON.parse(data); 
				if(d1.status == "error")
				{
					var msg = ''
					+ '<h3>There was an error while trying to add your entry</h3>'
					+'<pre class="bg-danger">'+JSON.stringify(data_obj, null, 2) +'</pre>'
					+'';
	
					$('.post_msg').html(msg);
				}
				else if(d1.status == "success")
				{
					ele_this.closest('tr').css('background','red').slideUp('slow');				 
				}
			});
		});
	 
		
	});
	</script>
	
	
<nav class="navbar navbar-expand navbar-dark bg-dark static-top">

<a class="navbar-brand mr-1" href="admin.php">Admin Panel</a>

  <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
	<i class="fas fa-bars"></i>
  </button>

  <!-- Navbar Search -->
  <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
	<div class="input-group">
	  <input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
	  <div class="input-group-append">
		<button class="btn btn-primary" type="button">
		  <i class="fas fa-search"></i>
		</button>
	  </div>
	</div>
  </form>

  <!-- Navbar -->
  <ul class="navbar-nav ml-auto ml-md-0">
  
	<li class="nav-item dropdown no-arrow">
	  <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		<i class="fas fa-user-circle fa-fw"></i>
	  </a>
	  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
		<!-- <a class="dropdown-item" href="#">Settings</a>
		<a class="dropdown-item" href="#">Activity Log</a> -->
		<!-- <div class="dropdown-divider"></div> -->
		<a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
	  </div>
	</li>
  </ul>

</nav>

<div id="wrapper">

  <!-- Sidebar -->
  <ul class="sidebar navbar-nav">
	<li class="nav-item">
	  <a class="nav-link" href="admin.php">
		<i class="fas fa-fw fa-tachometer-alt"></i>
		<span>Dashboard</span>
	  </a>
	</li>
	
	<li class="nav-item">
	  <a class="nav-link" href="charts.php">
		<i class="fas fa-fw fa-chart-area"></i>
		<span>Charts</span></a>
	</li>
	<li class="nav-item">
	  <a class="nav-link" href="AntiRagging.php">
		<i class="fas fa-fw fa-table"></i>
		<span>Anti-Ragging Grievance</span></a>
	</li>
	<li class="nav-item">
	  <a class="nav-link" href="scstgrievances.php">
		<i class="fas fa-fw fa-table"></i>
		<span>SC/ST Grievance</span></a>
	</li>
	<li class="nav-item">
	  <a class="nav-link" href="studentgrievance.php">
		<i class="fas fa-fw fa-table"></i>
		<span>Student Grievance</span></a>
	</li>
	<li class="nav-item">
	  <a class="nav-link" href="RTI.php">
		<i class="fas fa-fw fa-table"></i>
		<span>R.T.I Grievance</span></a>
	</li>
	<li class="nav-item">
	  <a class="nav-link" href="womangrievance.php">
		<i class="fas fa-fw fa-table"></i>
		<span>Women Grievance</span></a>
	</li>
	<li class="nav-item">
	  <a class="nav-link" href="committee.php">
		<i class="fas fa-fw fa-table"></i>
		<span>Grievance Committees</span></a>
	</li>
  </ul>
                    <!-- body of table -->
										<div id="content-wrapper">
											<div class="container-fluid">

										<!-- Breadcrumbs-->
													
													<div class="card mb-3">
																<div class="card-header">
																	<i class="fas fa-table"></i>
																		Grievance Committee Members
																	</div>
																	<div class="card-body">
																	
																		<div class="table-responsive">
																		
																	
																		</div>
																		<div class="text-center">
				                                                             <span class="btn btn-primary btn_new_row">Add New Row</span>
			                                                            <div>
																	</div>
											
																</div>
													</div> 
										</div>
										
	
</div>
								  <!-- end of table body -->
<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

   <!-- Logout Modal-->
   <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="../logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>
	<!-- Bootstrap core JavaScript-->
	<script src="vendor/jquery/jquery.min.js"></script>
	  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	
	  <!-- Core plugin JavaScript-->
	  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
	
	  <!-- Page level plugin JavaScript-->
	  <script src="vendor/datatables/jquery.dataTables.js"></script>
	  <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
	
	  <!-- Custom scripts for all pages-->
	  <script src="js/sb-admin.min.js"></script>
	
	  <!-- Demo scripts for this page-->
	  <script src="js/demo/datatables-demo.js"></script>

</body>
</html>
	
	