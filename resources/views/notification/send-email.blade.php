@extends('layout.admin.index')

@section('title','Send Email')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox-title">
                    <h5>
                      @lang('notification.send_email')
                    </h5>
                    {{--<div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-wrench"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#" class="dropdown-item">Config option 1</a>
                            </li>
                            <li><a href="#" class="dropdown-item">Config option 2</a>
                            </li>
                        </ul>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>--}}
                </div>
                <div class="ibox-content">

                      @if(session('success'))
                        <div class="alert alert-success">
                            {{session('success')}}
                        </div>
                          @endif

                          @if(session('failed'))
                              <div class="alert alert-danger">
                                  {{session('failed')}}
                              </div>
                          @endif
                    <form action="{{route('notification.send.email')}}" method="post">
                        @csrf
                        <div class="form-group row"><label class="col-sm-2 col-form-label">  @lang('notification.users')</label>

                            <div class="col-sm-10">
                                <select class="form-control m-b" name="user" id="user">

                                    @foreach($users as $user)
                                        <option value="{{$user['id']}}">{{$user['name']}}</option>
                                    @endforeach

                                </select>

                            </div>
                        </div>
                        <div class="form-group row"><label class="col-sm-2 col-form-label">  @lang('notification.email_type')</label>

                            <div class="col-sm-10">
                                <select class="form-control m-b" name="email_type" id="email_type">
                                    @foreach($emailTypes as $key=>$value)
                                        <option value="{{$key}}">{{$value}}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>
                        @if($errors->any())
                            <ul>
                                @foreach($errors->all() as $error)
                                   <div class="small mb2">
                                       <li class="text-danger">
                                           {{$error}}
                                       </li>
                                   </div>
                                    @endforeach
                            </ul>
                            @endif
                        <ul>

                        </ul>
                        <div class="form-group row">
                            <div class="col-lg-offset-2 col-lg-10">
                                <button class="btn btn-sm btn-white" type="submit">  @lang('notification.send')</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@stop
