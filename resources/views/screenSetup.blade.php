@extends('layouts.app')

@section('content')
<div class="subnavbar">
<!-- /For Space-->
</div>
<!-- /subnavbar -->
<div class="main">
<div class="main-inner">
<div class="container">
  @if(session('message'))
  		   <div class='alert alert-success fade in'><a href='#' class='close' data-dismiss='alert'>&times;</a>{{ session('message') }}</div>
  		   @endif
<!-- /span6 -->
 <div class="span12">
  <div class="widget widget-nopad">
    <div class="widget-header"> <i class="icon-list-alt"></i>
      <h3> Screen Setup</h3>
    </div>
    <!-- /widget-header -->
    <div class="widget-content">


      <table class="table table-striped table-bordered">
<thead>
        <tr>

          <th>
            Existing Column Name
          </th>
          <th>
              New Column Name
          </th>

        </tr>
      </thead>
        {!! Form::open(array('url' => 'screenSetUp/$tableColumns->ID', 'method' => 'post')) !!}
       @foreach ($tableColumns as $tableColumns)

           <tr>
             <td>
      {!! Form::label('Existing Column Name', $tableColumns->COLUMN_DISPLAY , array('class' => ' control-label')); !!}
    </td>
    <td>
      {!! Form::text('column_display', 'Enter New Column Name',array('class'=> 'form-control')); !!}
    </td>
    </tr>
      @endforeach
      <td>

      </td>
      <td>
      <button type="submit" class=""button btn btn-success btn-large">
								<i class="fa fa-edit"></i> Update
							</button>
            </td>
      {!!Form::close() !!}

</table>
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
    @endsection
