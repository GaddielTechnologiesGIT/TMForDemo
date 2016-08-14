
@extends('layouts.app')
@section('content')
<style>
table.dataTable thead th {

	border-right:1px solid #ddd;
	}
  table.dataTable tbody td {
			border-right:1px solid #ddd;
  	}
		form {
			margin-bottom: 0px;
		}
		table.dataTable.dataTables_filter  { font-style: bold;}

</style>
<script>

jQuery(document).ready(function($){
  	$('#client').change(function(){
			$.get("{{ url('/getProjects')}}",
				{ option: $(this).val() },
				function(data) {
					var project = $('#project');
					project.empty();

					$.each(data, function(index, element) {

			            project.append("<option value='"+ element.ID +"'>" + element.PROJECTNAME + "</option>");
			        });
				});
			});
	});

	jQuery(document).ready(function($){
		$('#project').change(function(){
			$.get("{{ url('/getCategoryList')}}",
				{ option: $(this).val() },
				function(data) {
					var category = $('#category');
					category.empty();

					$.each(data, function(index, element) {
									category.append("<option value='"+ element.CATEGORY +"'>" + element.CATEGORY + "</option>");
							});
				});

		});
	});

	$(document).ready(function() {
	    var table = $('#example').DataTable( {
				scrollX :"true",
				scrollY :"true",
		"bInfo" : false,

					"lengthChange": false,

			"aaSorting": [],
			fixedColumns: {
			 leftColumns: 3

	 },
	    } );
		});


			$(document).ready(function(){
  $('#saveProjectActivity').click(function(){


		    $.ajax({
		      url: 'addProjectActivity',
		      type: "post",
		      data: {'DATEDUE':$('input[name=DATEDUE]').val(),
		'CLOSEDATE':$('input[name=CLOSEDATE]').val(),
		'CONTACTTILE':$('input[name=CONTACTTILE]').val(),
		'CONTACTFIRSTNAME':$('input[name=CONTACTFIRSTNAME]').val(),
		'CONTACTLASTNAME':$('input[name=CONTACTLASTNAME]').val(),
		'CONTACTEMAILID':$('input[name=CONTACTEMAILID]').val(),
		'MOBILENO':$('input[name=CONTACTMOBILENO]').val(),
		'PHONENO':$('input[name=CONTACTPHONENO]').val(),
		'FAXNO':$('input[name=CONTACTFAXNO]').val(),
		'OPENISSUE':$('input[name=OPENISSUE]').val(),
		'REMARKS':$('input[name=REMARKS]').val(),
		'DOCREF':$('input[name=DOCREF]').val(),
		'ACTIVESTATUS':$('input[name=ACTIVESTATUS]').val(),
		'ID':$('input[name=ID]').val(),
		'_token': $('input[name=_token]').val()
				},
		      success: function(data){
					alert('The Project Actvity is Saved');
		    }
		  });

});
});



$(document).ready(function() {
    var table = $('#activistTable').DataTable( {

	"bInfo" : false,

        jQueryUI:false,
        paging:         false,
        searching:false,
				"lengthChange": false,
				"columns": [
			null,
			null,
			null,
			null,
			null,
			null,
				null,
			{ "orderable": false }
		],
		"aaSorting": [],
    } );

} );


$(document).ready(function() {
    var table = $('#clientTable').DataTable( {
	"bInfo" : false,
        jQueryUI:false,
        paging:         false,
        searching:false,
				scrollX:true
    } );

} );
$(document).ready(function() {
    var table = $('#projectTable').DataTable( {
	"bInfo" : false,
        jQueryUI:false,
        paging:         false,
        searching:false,
				"lengthChange": false,
				"columns": [
			null,
				null,
			{ "orderable": false }
		],
		"aaSorting": [],

    } );

} );
$(document).ready(function() {
    var table = $('#keyValueTable').DataTable( {
			"bInfo" : false,
        jQueryUI:false,
        searching:false,
				"lengthChange": false,
				"columns": [
			null,
				null,
			{ "orderable": false }
		],
		"aaSorting": [],
    } );

} );

$(document).ready(function() {
    var table = $('#activityListTable').DataTable( {
	"bInfo" : false,
        jQueryUI:false,
        paging:         false,
				"lengthChange": false,
        searching:false,
				"columns": [
			null,
			null,
			{ "orderable": false }
		],
		"aaSorting": [],
    } );

} );

</script>

<div class="subnavbar">
<!-- /For Space-->
</div>
<!-- /subnavbar -->
<div class="main">
<div class="main-inner">
<div class="container">
<div class="row">
<div class="span12">
  <div class="widget">
    <div class="widget-header"> <i class="icon-bookmark"></i>
      <h3>Important Shortcuts</h3>
    </div>
    <!-- /widget-header -->
    <div class="widget-content">
      <div class="shortcuts">

    <a href={!! url('/viewClientList') !!} class="shortcut">
      <i class="shortcut-icon icon-list-alt"></i>
        <span class="shortcut-label">Client List</span> </a>
				<a href={!! url('/viewProjectList') !!}  class="shortcut">
				  <i class="shortcut-icon icon-list-alt"></i>
				    <span class="shortcut-label">Projects</span> </a>

<a href={!! url('/viewKeyValueList') !!} class="shortcut">
  <i class="shortcut-icon icon-list-alt"></i>
    <span class="shortcut-label">Key Value List</span> </a>

		<a href={!! url('/viewActivityList') !!} class="shortcut">
        <i class="shortcut-icon icon-list-alt"></i>
          <span class="shortcut-label">Activity List</span> </a>
<a href={!! url('/Activists') !!} class="shortcut">
  <i class="shortcut-icon icon-user"></i>
    <span class="shortcut-label">Activists</span> </a>
		<a href={!! url('/projectSetup') !!} class="shortcut">
		  <i class="shortcut-icon icon-bookmark"></i>
		    <span class="shortcut-label">Project Setup</span> </a>
				<a href={!! url('/Tasks') !!} class="shortcut">
				  <i class="shortcut-icon icon-list-alt"></i>
				    <span class="shortcut-label">Task List</span> </a>
</div>
      <!-- /shortcuts -->
    </div>
    <!-- /widget-content -->
  </div>
</div>


 <div>
  <div class="widget ">
    @if (isset($projects ) && isset($clients) && isset($category) &&isset($activists))
    <div class="widget-header span6 offset3"> <i class="icon-list-alt"></i>
      <h3> Project Tasks </h3>
    </div>
    <!-- /widget-header -->
    <div class="widget-content ">
      {{ Form::open(array('url' => '/createProjectSetup', 'method' => 'post')) }}
<table class="span6 offset3 table ">


      <tr>
        <td>


                {!! Form::label('Client Name', 'Client Name' ,array('style'=>'font-weight:600; text-transform: uppercase;')); !!}
                 <select id="client" name="client">
                   <option>Select Client Name </option>
                   @foreach ($clients as $clients)
<option value={{$clients->ID}}>{{ $clients->CLIENTNAME }}</option>
                   @endforeach

                 </select>
               </td>
               <td>
  {!! Form::label('Project Name', 'Project Name' ,array('style'=>'font-weight:600; text-transform: uppercase;')); !!}
                 <select id="project" name="project">
                   <option>Please choose the Client first</option>
                 </select>
               </td>
             </tr>


<tr>


  <td>
  {!! Form::label('Category ', 'Category' ,array('style'=>'font-weight:600; text-transform: uppercase;')); !!}
                   <select id="category" name="category[]" data-placeholder ="Select Category" multiple="multiple">

                    <option>Please choose the Project</option>

                   </select>
                 </td>
                 <td>
                   {!! Form::label('Assigned To', 'Assigned To' ,array('style'=>'font-weight:600; text-transform: uppercase;')); !!}
                   <select id="activistId" name="activistId">
                     <option>Assign Task To </option>
                     @foreach ($activists as $activists)
  <option value={{$activists->ID}}>{{ $activists->FIRST_NAME.' '. $activists->LAST_NAME }}</option>
                     @endforeach

                   </select>
</td>
</tr>

</table>
 <div class="span6 offset6">
                   <button type="submit" class="button btn btn-success btn-small">
                             <i class="fa fa-edit">Add</i>
                           </button>

                 </div>
             {{ Form::close()}}

    </div>
    @endif
    @if (isset($tableColumns ) )
    <div class="widget-header"> <i class="icon-list-alt"></i>
      <h3> Task List</h3>
    </div>
		<div class="widget-content">
			<h3>@if (isset ($selected)) @foreach ($selected as $selected)
			 {{ $selected->CLIENTNAME  }} - {{ $selected->PROJECTNAME  }}  @endforeach
			@endif </h3>
		</div>
    <!-- /widget-header -->
    <div>

             <table id="example" class="table table-striped table-bordered">
               <thead>

                   @foreach ($tableColumns as $tableColumns)
                   <th>{{$tableColumns->COLUMN_DISPLAY}} </th>
                   @endforeach
									 <th>
									 </th>
               </thead>
               <tbody>
                 @if (isset($projectactivity))

                 @foreach ($projectactivity as $projectactivity)
								 <tr>
                  <td>{{$projectactivity->CATEGORY}}</td>
                  <td>{{$projectactivity->ACTIVITY}}</td>

                  <td>{{ $projectactivity->FIRST_NAME .' '.$projectactivity->LAST_NAME }}</td>
									<input type ="hidden" name='ID' id = 'ID'  value ='{!! $projectactivity->ID !!}',class = 'form-control' style="width:60px">

									<input type="hidden" name="_token" value="{{ csrf_token() }}">

									<td>
									<input type ="text" name='DATEDUE' id = 'datedue'  value ='{!! $projectactivity->DATEDUE!!}',class = 'form-control' style="width:60px">
									</td>

										<td><input type ="text" name='CLOSEDATE' id = 'closedate'  value ='{!! $projectactivity->CLOSEDATE!!}',class = 'form-control input-sm' style="width:60px">
										</td>

											<td>
												{{$projectactivity->CONTACTTITLE}}
											</td>
												<td>{{$projectactivity->CONTACTFIRSTNAME}}
												</td>


															<td>
{{$projectactivity->CONTACTLASTNAME}}
															</td>
																<td>
{{$projectactivity->CONTACTEMAILID}}
																</td>
																	<td>
{{$projectactivity->MOBILENO}}
																	</td>
																		<td>

																	{{$projectactivity->PHONENO}}
																	</td>
																	<td>

																	{{$projectactivity->FAXNO}}
																</td>
																			<td>

																			<input type ="text" value= '{!!$projectactivity->OPENISSUE !!}'  name='OPENISSUE' id = 'openissue'  ,class = 'form-control' style="width:100px">


																		</td>
																				<td>

																				<input type ="text" size =2 name='REMARKS' id = 'remarks'  value ='{!! $projectactivity->REMARKS!!}',class = 'form-control' style="width:100px">
																			</td>
																					<td>

																					<input type ="text" name='DOCREF' id = 'docref'  value ='{!! $projectactivity->DOCREF!!}',class = 'form-control' style="width:60px">
																				</td>
																				<td>
																					<select name="ACTIVESTATUS"  id ="ACTIVESTATUS" class='form-control input-sm' style="width:50px" >


																						</select>
																				</td>

<td>
	<button type="submit" name = "saveProjectActivity" id = "saveProjectActivity" class="button btn btn-success btn-small">
						<i class="shortcut-icon icon-edit"> </i>
					</button>
</td>
                    </tr>
                 @endforeach
                 @endif

								 @if (isset($projectactivityDisplay))

								 @foreach ($projectactivityDisplay as $projectactivityDisplay)
								<tr>
									<td>{{$projectactivityDisplay->CATEGORY}}</td>
									<td>{{$projectactivityDisplay->ACTIVITY}}</td>

									<td>{{ $projectactivityDisplay->FIRST_NAME .' '.$projectactivityDisplay->LAST_NAME }}</td>


								 <td>{{$projectactivityDisplay->DATEDUE}}</td>

									 <td>{{$projectactivityDisplay->CLOSEDATE}}</td>
									  <td>{{$projectactivityDisplay->CONTACTTITLE}}</td>
										 <td>{{$projectactivityDisplay->CONTACTFIRSTNAME}}</td>
										  <td>{{$projectactivityDisplay->CONTACTLASTNAME}}</td>
											 <td>{{$projectactivityDisplay->CONTACTEMAILID}}</td>
											  <td>{{$projectactivityDisplay->MOBILENO}}</td>
												  <td>{{$projectactivityDisplay->PHONENO}}</td>

														  <td>{{$projectactivityDisplay->FAXNO}}</td>
															  <td>{{$projectactivityDisplay->OPENISSUE}}</td>

												  <td>{{$projectactivityDisplay->REMARKS}}</td>
													  <td><a href="" class="link" >{{$projectactivityDisplay->DOCREF}}</a></td>
														<td>{{$projectactivityDisplay->ACTIVESTATUS}}</td>
<td>
</td>


										</tr>
								 @endforeach
								 @endif

               </tbody>
             </table>


             @endif


              @if (isset($activistColumns ) )
             <div class="widget-header span12"> <i class="icon-list-alt"></i>
               <h3> Activist Details</h3>
             </div>
             <!-- /widget-header -->
             <div class="widget-content span12  ">

                      <table id="activistTable" class="table table-striped table-bordered compact">
                        <thead>

                            @foreach ($activistLabel as $activistLabelTable)
                            <th>{{$activistLabelTable->COLUMN_DISPLAY}} </th>
                            @endforeach
                            <th>
                              Status
                          </th>

                          </thead>
                          <tbody style="font-size:10px;">

                          <tr>
	@foreach ($activists as $activists)
                            <td>
                          {{$activists->TITLE  }}
                             </td>
                            <td>
															{{$activists->FIRST_NAME }}
                              </td>
                            <td>
																{{$activists->LAST_NAME }}
															 </td>
                            <td>	{{$activists->EMAILID }} </td>
                            <td>	{{$activists->MOBILE_NUMBER }}</td>
                            <td>{{$activists->PHONE_NUMBER}} </td>
                            <td>

															{{$activists->FAX_NUMBER}} </td>
                            <td>

														{!! Form::open(array('url' => '/editActivist/'.$activists->ID, 'method' => 'post')) !!}
                              <select name="ACTIVE_STATUS"  id ="ACTIVE_STATUS" class='form-control input-sm' style="width:50px";  >
                            <option  @if($activists->ACTIVE_STATUS =='Y') selected @endif value ='Y' >Y</option>
                              <option value ='N' @if($activists->ACTIVE_STATUS =='N') selected @endif >N</option>
                                </select>
                            <button  type="submit" class=" btn btn-success btn-small">
                                      <i class="shortcut-icon icon-edit"></i>

                                    </button>
                                        </td>
                                        {!! Form::close()!!}
                          </tr>
                          @endforeach

                        </tbody>
                      </table>

                      <div style="text-align:right">
                              <a href="#addActivist" role="button" class="button btn btn-success btn-small" data-toggle="modal">                      								<i class="fa fa-save">Add</i>                              		</a>
														</div>

                                  <!-- Modal -->
                                  <div id="addActivist" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                      <h3 id="myModalLabel">Add Activist</h3>
                                    </div>
                                    <div class="modal-body">
                                      <table  class="table table-striped table-bordered">
                                <thead>




                                      @if (isset($activistColumns ) )
                                        {!! Form::open(array('url' => '/saveActivists', 'method' => 'post')) !!}
                                       @foreach ($activistLabel as $activistLabel)

                                           <tr>
                                             <td>
                                      {!! Form::label($activistLabel->COLUMN_DISPLAY, $activistLabel->COLUMN_DISPLAY , array('class' => ' control-label',)); !!}
                                    </td>

                                    <td>
                                      {!! Form::text($activistLabel->COLUMN_DISPLAY, '',array('class'=> 'form-control','placeholder'=>'Enter '.$activistLabel->COLUMN_DISPLAY,'name'=>$activistLabel->COLUMN_NAME)); !!}
                                    </td>
                                    </tr>
                                      @endforeach
                                      <tr>
                                        <td>
                                          ACTIVE STATUS
                                        </td>
                                        <td>
                                          <select name="ACTIVE_STATUS"  id ="ACTIVE_STATUS" class='form-control input-sm' style="width:50px";  >
                                        <option  value ='Y' >Y</option>
                                          <option value ='N' >N</option>
                                            </select>
                                        </td>
                                      </tr>
                                      <td>

                                      </td>


                                </table>
                                    </div>
                                    <div class="modal-footer">
                                      <button class="button btn btn-success btn-small" data-dismiss="modal" aria-hidden="true">Close</button>
                                      <button class="button btn btn-success btn-small">Save </button>
                                    </div>
                                    {!!Form::close() !!}
                                    @endif
                                  </div>
                                  		</td>

                          </tr>


                      </table>
                      @endif

                      @if (isset($activityList) && isset($activityListLabel))
                      <div class="widget-header span12" style ="text-align:center"> <i class="icon-list-alt"></i>
                        <h3> Activity List</h3>
                      </div>
                      <!-- /widget-header -->
                      <div class="widget-content  span8 offset2">
                        <table id ="activityListTable" class="table table-striped table-bordered">
                  <thead>
                    @foreach ($activityListLabel as $activityListLabelDisplay)
                    <th>
                      {{ $activityListLabelDisplay->COLUMN_DISPLAY }}
                    </th>
                    @endforeach
                    <th>
                      Status
                    </th>



                        </thead>
                         @foreach ($activityList as $activityList)


                             <tr>
                               <td>

                        {{$activityList->CATEGORY}}
                      </td>
                      <td>
                          {{$activityList->ACTIVITY}}
                     </td>
<td>
	{!! Form::open(array('url' => '/editActivityList/'.$activityList->ID, 'method' => 'post')) !!}
  <select name="ACTIVESTATUS"  id ="ACTIVESTATUS" class='form-control input-sm' style="width:50px";  >
<option  @if($activityList->ACTIVESTATUS =='Y') selected @endif value ='Y' >Y</option>
  <option value ='N' @if($activityList->ACTIVESTATUS =='N') selected @endif >N</option>
    </select>

                <button type="submit" class="button btn btn-success btn-small" >  <i class="shortcut-icon  icon-edit" ></i> </button>
            </td>
                      </tr>
                      {!! Form::close();!!}
                        @endforeach
                      </table>
<div style="text-align:right">
                                <a href="#addActivityList" role="button" class="button btn btn-success btn-small" data-toggle="modal">

                        								<i class="fa fa-save">Add</i>

                                		</a>

</div>

                      </div>

                      <!-- Modal -->
                      <div id="addActivityList" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                          <h3 id="myModalLabel">Add Activity List</h3>
                        </div>
                        <div class="modal-body">
                          <table class="table table-striped table-bordered">
                    <thead>
                            <tr>

                              <th>

                              </th>
                              <th>

                              </th>

                            </tr>
                          </thead>
                          @if (isset($activityListLabel))
                            {!! Form::open(array('url' => '/saveActivityList', 'method' => 'post')) !!}
                           @foreach ($activityListLabel as $activityListLabel)

                               <tr>
                                 <td>
                          {!! Form::label($activityListLabel->COLUMN_DISPLAY, $activityListLabel->COLUMN_DISPLAY , array('class' => ' control-label')); !!}
                        </td>

                        <td>
                          {!! Form::text($activityListLabel->COLUMN_NAME, '',array('class'=> 'form-control','placeholder'=>'Enter '.$activityListLabel->COLUMN_DISPLAY,'name'=>$activityListLabel->COLUMN_NAME)); !!}
                        </td>
                        </tr>
                          @endforeach
                          <tr>
                            <td>
                              {!! Form::label('ACTIVE STATUS', 'ACTIVE STATUS' , array('class' => ' control-label')); !!}
                            </td>
                                <td>
                              <select  style="width:50px"; name="ACTIVESTATUS" >
                            <option>Y</option>
                              <option  >N</option>
                                </select>
                            </td>
                            <tr>



                    </table>
                        </div>
                        <div class="modal-footer">
                          <button class="button btn btn-success btn-small" data-dismiss="modal" aria-hidden="true">Close</button>
                          <button class="button btn btn-success btn-small">Save </button>
                        </div>
                        {!!Form::close() !!}
                        @endif
                      </div>
                          </td>

                      </tr>


                      </table>
                      @endif
                      @if (isset($listProjects ))
                      <div class="widget-header  span12 " style="text-align:center"> <i class="icon-list-alt"></i>
                        <h3> Project List</h3>
                      </div>
                      <!-- /widget-header -->
                      <div class="widget-content  span6 offset3">
                        <table id="projectTable" class="table table-striped table-bordered">
                  <thead>
                    <th>
                      Client Name
                    </th>
                      @foreach ($projectLabel as $projectLabelTabel)
                      <th>
                        {{ $projectLabelTabel ->COLUMN_DISPLAY}}
                      </th>
                      @endforeach
                      <th>
                        Status
                      </th>



                        </thead>
                        <tbody>
                         @foreach ($listProjects as $listProjects)

                             <tr>
                               <td>
                                 {{$listProjects->CLIENTNAME}}
                      </td>


<td>

{{$listProjects->PROJECTNAME}}
</td>
<td>
 {!! Form::open(array('url' => '/editProjectList/'.$listProjects->ID, 'method' => 'post')) !!}
  <select name="ACTIVESTATUS"  id ="ACTIVESTATUS" class='form-control input-sm' style="width:50px";  >
  <option  @if( $listProjects->ACTIVESTATUS=='Y') selected @endif  >Y</option>
  <option  @if($listProjects->ACTIVESTATUS =='N') selected @endif >N</option>
    </select>

  <button type="submit" class="button btn btn-success btn-small">
          <i class="shortcut-icon icon-edit"></i>

        </button>
            </td>
                      </tr>

                      {!! Form ::close();!!}
                        @endforeach
                        <tbody>
                      </table>
                      <div style="text-align:right">
                          <a href="#addProject" role="button" class="button btn btn-success btn-small" data-toggle="modal">Add                                </a>
                              </td>
                            </div>


                      </div>

                      <!-- Modal -->
                      <div id="addProject" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                          <h3 id="myModalLabel">Add Project</h3>
                        </div>
                        <div class="modal-body">
                          <table class="table table-striped table-bordered">
                    <thead>
                            <tr>

                              <th>

                              </th>
                              <th>

                              </th>

                            </tr>
                          </thead>
                          @if (isset($projectLabel) && isset($clientNames))
                            {!! Form::open(array('url' => '/saveProject', 'method' => 'post')) !!}
                            <tr>
                              <td>
                            {!! Form::label('CLIENT NAME', 'CLIENT NAME', array('class' => ' control-label')); !!}
                          </td>
                          <td>
                            <select id="CLIENTID" name="CLIENTID">
                              <option>Select Client Name </option>
                              @foreach ($clientNames as $clientNames)
           <option value={{$clientNames->ID}}>{{ $clientNames->CLIENTNAME }}</option>
                              @endforeach

                            </select>
                          </td>
                           @foreach ($projectLabel as $projectLabel)

                               <tr>
                                 <td>
                          {!! Form::label($projectLabel->COLUMN_DISPLAY, $projectLabel->COLUMN_DISPLAY , array('class' => ' control-label')); !!}
                        </td>

                        <td>
                          {!! Form::text($projectLabel->COLUMN_DISPLAY, '',array('class'=> 'form-control','placeholder'=>'Enter '.$projectLabel->COLUMN_DISPLAY,'name' =>$projectLabel->COLUMN_NAME)); !!}
                        </td>
                        </tr>
                          @endforeach
                          <td>

                          </td>



                    </table>
                        </div>
                        <div class="modal-footer">
                          <button class="button btn btn-success btn-small" data-dismiss="modal" aria-hidden="true">Close</button>
                          <button class="button btn btn-success btn-small">Save </button>
                        </div>
                        {!!Form::close() !!}
                        @endif
                      </div>
                          </td>

                      </tr>


                      </table>
                      @endif
                      @if (isset($clientsList ))
                      <div class="widget-header span12"> <i class="icon-list-alt"></i>
                        <h3> Client List</h3>
                      </div>
                      <!-- /widget-header -->
                      <div class="widget-content span12 ">
                        <table id ="clientTable" class="table table-striped table-bordered">
                  <thead>

                      <th>
                        Client Name
                      </th>
                      <th>
                      Address
                      </th>
                      <th>
                      EmailID
                      </th>
                      <th>
                        Contact Title
                      </th>
                      <th>
                      Contact First Name
                      </th>
                      <th>
                    Contact Last Name
                      </th>
                      <th>
                        Contact Email
                      </th>
                      <th>
                      Contact Mobile Number
                      </th>
                      <th>
                    Contact Phone Number
                      </th>
                      <th>
                    Contact Fax Number
                      </th>
                      <th>
                    Client Status
                      </th>

<th>
</th>



                        </thead>
                        <tbody>
                         @foreach ($clientsList as $clientsList)

                             <tr>
                               <td>
                        {!! $clientsList->CLIENTNAME !!}
                      </td>
                      <td>
                {!! $clientsList->ADDRESS !!}                      </td>
                <td>
                {!! $clientsList->CLIENTEMAILID !!}                      </td>
                <td>
                {!! $clientsList->CONTACTTITLE !!}                      </td>
                <td>
                {!! $clientsList->CONTACTFIRSTNAME !!}                      </td>
                <td>
                {!! $clientsList->CONTACTLASTNAME !!}                      </td>
                <td>
                {!! $clientsList->CONTACTEMAILID !!}                      </td>
                <td>
                {!! $clientsList->MOBILENO !!}                      </td>
                <td>
                {!! $clientsList->PHONENO !!}                      </td>
                <td>
                {!! $clientsList->FAXNO !!}                      </td>
                <td>
                {!! $clientsList->ACTIVESTATUS !!}                      </td>
                <td>
                  <a href =" {{ url('')  }}" class="button btn btn-success btn-small">
                          <i class="shortcut-icon icon-edit"></i>

                        </a>
                </td>


                      </tr>
                        @endforeach
                      </tbody>
                                        </table>
                                        <div class="span11" style="text-align:right">
                          <a href="#addClient" role="button" class="button btn btn-success btn-small" data-toggle="modal">Add                                </a>

</div>
                      </div>
                      <!-- Modal -->
                      <div id="addClient" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                          <h3 id="myModalLabel">Add Client</h3>
                        </div>
                        <div class="modal-body">
                          <table class="table table-striped table-bordered">

 @if (isset($clientLabel))
                             {!! Form::open(array('url' => '/saveClient', 'method' => 'post')) !!}
                           @foreach ($clientLabel as $clientLabel)

                               <tr>
                                 <td>
                          {!! Form::label($clientLabel->COLUMN_DISPLAY, $clientLabel->COLUMN_DISPLAY , array('class' => ' control-label')); !!}
                        </td>

                        <td>
                          {!! Form::text($clientLabel->COLUMN_DISPLAY, '',array('class'=> 'form-control','placeholder'=>'Enter '.$clientLabel->COLUMN_DISPLAY,'name' =>$clientLabel->COLUMN_NAME)); !!}
                        </td>
                        </tr>
                          @endforeach
                          <td>

                          </td>


                    </table>
                    <div class="modal-footer">
                      <button class="button btn btn-success btn-small" data-dismiss="modal" aria-hidden="true">Close</button>
                      <button class="button btn btn-success btn-small">Save </button>
                    </div>
                    {!!Form::close() !!}
                    @endif
                      @endif


                      @if (isset($keyValueList ))
                      <div class="widget-header   span12" style="text-align:center" > <i class="icon-list-alt"></i>
                        <h3> Key Value List</h3>
                      </div>
                      <!-- /widget-header -->
                      <div class="widget-content   span6 offset3" >
                        <table id="keyValueTable" class="table table-striped table-bordered ">
                  <thead>

                       @foreach ($keyValueLabel as $keyValueLabelTable)
                       <th>
                         {{ $keyValueLabelTable ->COLUMN_DISPLAY}}
                       </th>
                       @endforeach
                       <th>
                        Status
                      </th>



                        </thead>
                        <tbody>
                         @foreach ($keyValueList as $keyValueListTable)


                             <tr>
                               <td>
                                 {{$keyValueListTable->KEYVALUETYPE}}

                      </td>
                      <td>
{{$keyValueListTable->KEYVALUE}}
</td>
<td>
	 {!! Form::open(array('url' => '/editKeyValue/'.$keyValueListTable->ID, 'method' => 'post')) !!}
  <select name="ACTIVESTATUS"  id ="ACTIVESTATUS" class='form-control input-sm' style="width:50px";  >
  <option  @if($keyValueListTable->ACTIVESTATUS =='Y') selected @endif value ='Y' >Y</option>
  <option value ='N' @if($keyValueListTable->ACTIVESTATUS =='N') selected @endif >N</option>
    </select>


  <button class="button btn btn-success btn-small">
          <i class="shortcut-icon icon-edit"></i>

        </button>
            </td>
                      </tr>
                      {!! Form::close()!!}
                        @endforeach
                      </tbody></table>
                        <div style="text-align:right">
                            <a href="#addKeyValue" role="button" class="button btn btn-success btn-small" data-toggle="modal">Add                                </a>


                      </div>
                      <!-- Modal -->
                      <div id="addKeyValue" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                          <h3 id="myModalLabel">Add Key Value </h3>
                        </div>
                        <div class="modal-body">
                          <table class="table table-striped table-bordered">
                    <thead>


                              <th>

                              </th>
                              <th>

                              </th>


                          </thead>
                          @if(isset($keyValueLabel))
                            {!! Form::open(array('url' => '/saveKeyValue', 'method' => 'post')) !!}
                           @foreach ($keyValueLabel as $keyValueLabel)

                               <tr>
                                 <td>
                          {!! Form::label($keyValueLabel->COLUMN_DISPLAY, $keyValueLabel->COLUMN_DISPLAY , array('class' => ' control-label')); !!}
                        </td>

                        <td>
                          {!! Form::text($keyValueLabel->COLUMN_DISPLAY, '',array('class'=> 'form-control','placeholder'=>'Enter '.$keyValueLabel->COLUMN_DISPLAY,'name' => $keyValueLabel->COLUMN_NAME)); !!}
                        </td>
                        </tr>
                          @endforeach
                          <td>

                          </td>


                    </table>

                    <div class="modal-footer">
                      <button class="button btn btn-success btn-small" data-dismiss="modal" aria-hidden="true">Close</button>
                      <button class="button btn btn-success btn-small">Save </button>
                    </div>
                    {!!Form::close() !!}
                    @endif
                      @endif
    <!-- /widget-content -->
  </div>
  <!-- /widget -->
</div>
<!-- /span6 -->
</div>
<!-- /row -->
</div>
<!-- /container -->
</div>
<!-- /main-inner -->
</div>
<!-- /main -->
<script>
var nd = moment().format('ll');
   	var  year = moment().year();
   	var  month = moment().month()+1;
   	var day = moment().date() +10;
	var closeday = moment().date() +10;
    document.getElementById('datedue').value=day+"/"+month+"/"+year;
  var datedue = new Pikaday(
      {
          field: document.getElementById('datedue'),
          firstDay: 1,
          position: 'bottom left',
          //format:'YYYY-MM-DD',
          format : "DD/MM/YYYY",
          //minDate: new Date(),
          maxDate: new Date(month+"/"+day+"/"+year),
          yearRange: [1960,2020],
          onSelect: function() {

          }
      });
		


			document.getElementById('closedate').value=closeday+"/"+month+"/"+year;
		var closedate = new Pikaday(
				{
						field: document.getElementById('closedate'),
						firstDay: 1,
						position: 'bottom left',
						//format:'YYYY-MM-DD',
						format : "DD/MM/YYYY",
						//minDate: new Date(),
						maxDate: new Date(month+"/"+day+"/"+year),
						yearRange: [1960,2020],
						onSelect: function() {

						}
				});

</script>
    @endsection
