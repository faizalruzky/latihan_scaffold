@extends('layouts.app')

@section('content')
  <div class="container">
  	<h1>Edit Surah</h1>
  	<hr>
  	<ol class="breadcrumb">
  		<li><a href="{{ url('/home') }}">Home</a></li>
  		<li><a href="{{ url('surahs') }}">Surahs</a></li>
  		<li>Edit</li>
  	</ol>
  	@include('flash::message')
    {!! Form::model($surah, ['method' => 'PATCH', 'action' => ['SurahsController@update', $surah->id]]) !!}
      @include('surahs.form', ['submitText' => '<i class="fa fa-check"></i> Update'])
    {!! Form::close() !!}

    <!-- ================================================== -->
  </div>
@stop