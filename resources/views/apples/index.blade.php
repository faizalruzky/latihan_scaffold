@extends('layout')

@include('apples._common')

@section('header')

    <ol class="breadcrumb">
    	<li><a href="/"><span class="glyphicon glyphicon-home" aria-hidden="true"></span></a></li>

        @if ( Request::input('q') )
            {{-- */$query_params =  Request::input('q')/* --}}
            <li class="active"><a href="{{ route('apples.index') }}">@yield('applesAppTitle')</a></li>
            <li class="active">condition(  

            {{-- */ $loop = 0 /* --}}
            @foreach( $query_params as $key => $value )
                @if ( $loop != 0 ) / @endif {{ $key }} : {{ $value }}
                {{-- */ $loop++ /* --}}
            @endforeach
            )</li>
        @else
            <li class="active">@yield('applesAppTitle')</li>
        @endif

    </ol>

    <div class="page-header clearfix">
        <h1>
            <i class="glyphicon glyphicon-align-justify"></i> @yield('applesAppTitle')
            <a class="btn btn-success pull-right" href="{{ route('apples.create') }}"><i class="glyphicon glyphicon-plus"></i> Create</a>
        </h1>

    </div>

    <div aria-multiselectable="true" role="tablist" id="accordion" class="panel-group">
        <div class="panel panel-default">
            <div id="headingOne" role="tab" class="panel-heading">
                <h4 class="panel-title">
                <a aria-controls="collapseOne" aria-expanded="true" href="#collapseOne" data-parent="#accordion" data-toggle="collapse" role="button">
                    <span aria-hidden="true" class="glyphicon glyphicon-search"></span> Search
                </a>
                </h4>
            </div>
            <div aria-labelledby="headingOne" role="tabpanel" class="panel-collapse collapse" id="collapseOne">
                <div class="panel-body">
                    <form class="Apple_search" id="search" action="{{ route('apples.index') }}" accept-charset="UTF-8" method="get">
                        <input type="hidden" name="q[s]" value="{{ @(Request::input('q')['s']) ?: '' }}" />
                        <div class="form-horizontal">

                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="q_name_gt">NAME</label>
                                <div class=" col-sm-4">
                                    <input class="form-control input-sm" type="search" value="{{ @(Request::input('q')['name_gt']) ?: '' }}" name="q[name_gt]" id="q_name_gt" />
                                </div>
                                <div class=" col-sm-1 text-center"> - </div>
                                <div class=" col-sm-4">
                                    <input class="form-control input-sm" type="search" value="{{ @(Request::input('q')['name_lt']) ?: '' }}" name="q[name_lt]" id="q_name_lt" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="q_name_cont">NAME</label>
                                <div class=" col-sm-9">
                                    <input class="form-control input-sm" type="search" value="{{ @(Request::input('q')['name_cont']) ?: '' }}" name="q[name_cont]" id="q_name_cont" />
                                </div>
                            </div>
                                                    <div class="form-group">
                                <label class="col-sm-2 control-label" for="q_apple_types.name_gt">APPLE_TYPE_NAME</label>
                                <div class=" col-sm-4">
                                    <input class="form-control input-sm" type="search" value="{{ @(Request::input('q')['apple_types.name_gt']) ?: '' }}" name="q[apple_types.name_gt]" id="q_apple_types.name_gt" />
                                </div>
                                <div class=" col-sm-1 text-center"> - </div>
                                <div class=" col-sm-4">
                                    <input class="form-control input-sm" type="search" value="{{ @(Request::input('q')['apple_types.name_lt']) ?: '' }}" name="q[apple_types.name_lt]" id="q_apple_types.name_lt" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="q_apple_types.name_cont">APPLE_TYPE_NAME</label>
                                <div class=" col-sm-9">
                                    <input class="form-control input-sm" type="search" value="{{ @(Request::input('q')['apple_types.name_cont']) ?: '' }}" name="q[apple_types.name_cont]" id="q_apple_types.name_cont" />
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-10 col-sm-offset-2">
                                    <input type="submit" name="commit" value="Search" class="btn btn-default btn-xs" />
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if($apples->count())
                <table class="table table-condensed table-striped">
                    <thead>
                        <tr>
                            <th>@include('CrudDscaffold::getOrderlink', ['column' => 'id', 'title' => 'ID'])</th>
                            <th>@include('CrudDscaffold::getOrderlink', ['column' => 'name', 'title' => 'NAME'])</th>
                        <th>@include('CrudDscaffold::getOrderlink', ['column' => 'apple_types.name', 'title' => 'APPLE_TYPE_NAME'])</th>
                            <th class="text-right">OPTIONS</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($apples as $apple)
                            <tr>
                                <td><a href="{{ route('apples.show', $apple->id) }}">{{$apple->id}}</a></td>
                                <td>{{$apple->name}}</td>
                    <td>{{$apple->appleType->name}}</td>
                                <td class="text-right">
                                    <a class="btn btn-xs btn-primary" href="{{ route('apples.duplicate', $apple->id) }}"><i class="glyphicon glyphicon-duplicate"></i> Duplicate</a>
                                    <a class="btn btn-xs btn-warning" href="{{ route('apples.edit', $apple->id) }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                                    {!! Form::model($apple, array('route' => array('apples.destroy', $apple->id),'method' => 'delete', 'style' => 'display: inline;', 'onsubmit'=> "if(confirm('Delete? Are you sure?')) { return true } else {return false };")) !!}
                                        <button type="submit" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> Delete</button>
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $apples->appends(Request::except('page'))->render() !!}
            @else
                <h3 class="text-center alert alert-info">Empty!</h3>
            @endif

        </div>
    </div>

@endsection