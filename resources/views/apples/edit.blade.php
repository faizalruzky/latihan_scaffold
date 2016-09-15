@extends('layout')

@include('apples._common')

@section('header')

	<ol class="breadcrumb">
	    <li><a href="/"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></a></li>
	    <li><a href="{{ route('apples.index') }}">@yield('applesAppTitle')</a></li>
	    <li><a href="{{ route('apples.show', $apple->id) }}">{{ $apple->name }}</a></li>
	    <li class="active">Edit</li>
	</ol>

    <div class="page-header">
        <h1><i class="glyphicon glyphicon-edit"></i> @yield('applesAppTitle') / Edit #{{$apple->id}}</h1>
    </div>
@endsection

@section('content')
    @include('error')

    <div class="row">
        <div class="col-md-12">

            {!! Form::model($apple, array('route' => array('apples.update', $apple->id),'method' => 'put')) !!}

@include('apples._form')

                <div class="well well-sm">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a class="btn btn-link pull-right" href="{{ route('apples.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>
                </div>
            {!! Form::close() !!}

        </div>
    </div>
@endsection