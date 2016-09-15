@extends('layout')

@include('appleTypes._common')

@section('header')

	<ol class="breadcrumb">
		<li><a href="/"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></a></li>
	    <li><a href="{{ route('appleTypes.index') }}">@yield('appleTypesAppTitle')</a></li>
	    <li class="active">Create</li>
	</ol>

    <div class="page-header">
        <h1><i class="glyphicon glyphicon-plus"></i> @yield('appleTypesAppTitle') / Create </h1>
    </div>
@endsection

@section('content')
    @include('error')

    <div class="row">
        <div class="col-md-12">

            {!! Form::open(array('route' => 'appleTypes.store')) !!}

@include('appleTypes._form')

                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Create</button>
                    <a class="btn btn-link pull-right" href="{{ route('appleTypes.index') }}"><i class="glyphicon glyphicon-backward"></i> Back</a>
                </div>
            {!! Form::close() !!}

        </div>
    </div>
@endsection