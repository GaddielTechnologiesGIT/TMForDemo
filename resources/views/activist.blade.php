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
 <div class="span6">
  <div class="widget widget-nopad">
    <div class="widget-header"> <i class="icon-list-alt"></i>
      <h3> Add Activist </h3>
    </div>
    <!-- /widget-header -->
    <div class="widget-content">


      <table class="table table-striped table-bordered">
<thead>
        <tr>

          <th>

          </th>
          <th>

          </th>

        </tr>
      </thead>
        {!! Form::open(array('url' => '/saveActivists', 'method' => 'post')) !!}
       @foreach ($activistLabel as $activistLabel)

           <tr>
             <td>
      {!! Form::label($activistLabel->COLUMN_DISPLAY, $activistLabel->COLUMN_DISPLAY , array('class' => ' control-label')); !!}
    </td>
    
    <td>
      {!! Form::text($activistLabel->COLUMN_DISPLAY, 'Enter '.$activistLabel->COLUMN_DISPLAY,array('class'=> 'form-control')); !!}
    </td>
    </tr>
      @endforeach
      <td>

      </td>
      <td>
      <button type="submit" class=""button btn btn-success btn-large">
								<i class="fa fa-edit"></i> Add
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
