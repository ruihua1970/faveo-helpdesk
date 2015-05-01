@extends('themes.default1.layouts.blank')

@section('Emails')
class="active"
@stop

@section('emails-bar')
active
@stop

@section('template')
class="active"
@stop

@section('HeadInclude')
@stop
<!-- header -->
@section('PageHeader')

@stop
<!-- /header -->
<!-- breadcrumbs -->
@section('breadcrumbs')
<ol class="breadcrumb">

</ol>
@stop
<!-- /breadcrumbs -->
<!-- content -->
@section('content')
	<div class="row">
<div class="col-md-12">
<div class="box box-primary">
<div class="box-header">
	<h2 class="box-title">{{Lang::get('lang.templates')}}</h2><a href="{{route('template.create')}}" class="btn btn-primary pull-right">{{Lang::get('lang.create_template')}}</a></div>

<div class="box-body table-responsive no-padding">

<!-- check whether success or not -->

@if(Session::has('success'))
    <div class="alert alert-success alert-dismissable">
        <i class="fa  fa-check-circle"></i>
        <b>Success!</b>
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        {{Session::get('success')}}
    </div>
    @endif
    <!-- failure message -->
    @if(Session::has('fails'))
    <div class="alert alert-danger alert-dismissable">
        <i class="fa fa-ban"></i>
        <b>Alert!</b> Failed.
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        {{Session::get('fails')}}
    </div>
    @endif

				<table class="table table-hover" style="overflow:hidden;">
	<tr>
		<th width="100px">{{Lang::get('lang.name')}}</th>
		<th width="100px">{{Lang::get('lang.status')}}</th>
		<th width="100px">{{Lang::get('lang.in_use')}}</th>
		<th width="100px">{{Lang::get('lang.created')}}</th>
		<th width="100px">{{Lang::get('lang.last_updated')}}</th>
		<th width="100px">{{Lang::get('lang.action')}}</th>
	</tr>
	<!-- Foreach @var templates as @var template -->
		@foreach($templates as $template)
	<tr>

		<!-- Template Name with Link to Edit page along Id -->
		<td><a href="{{route('template.edit',$template->id)}}">{!! $template->name !!}</a></td>
		<!-- template Status : if status==1 active -->
		<td>
			@if($template->status=='1')
				<p style="color:green">Active</p>
			@else
				<p style="color:red">Disable</p>
			@endif
		</td>
		<!-- To show Whether a template in use or not:: TODO -->
		<td></td>
		<!-- Date Added -->
		<td>{!! $template->created_at !!}</td>
		<!-- Last Updated -->
		<td> {!! $template->updated_at !!} </td>
		<!-- Deleting Fields -->
		<td>
			{!! Form::open(['route'=>['template.destroy', $template->id],'method'=>'DELETE']) !!}

			<div class="form-group">
			<!-- To pop up a confirm Message -->
				{!! Form::button('<i class="fa fa-star"></i> Delete',
            		['type' => 'submit',
            		'class'=> 'actions-line icon-trash',
            		'onclick'=>'return confirm("Are you sure?")'])
            	!!}

			</div>

			{!! Form::close() !!}
		</td>
		@endforeach
	</tr>

	<!-- Set a link to Create Page -->




</table>

@stop
</div><!-- /.box -->
@section('FooterInclude')

@stop
@stop
<!-- /content -->