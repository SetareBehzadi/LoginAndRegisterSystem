@extends('layout.admin.index')

@section('title','Send Sms')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox-title">
                    <h5>
                      @lang('notification.send_sms')
                    </h5>
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
                    <form action="{{route('notification.send.sms')}}" method="post">
                        @csrf
                        <div class="form-group row"><label class="col-sm-2 col-form-label">  @lang('notification.users')</label>

                            <div class="col-sm-10">
                                <select class="form-control m-b" name="user" id="user">

                                    @foreach($users as $user)
                                        <option {{old('user') == $user['id']?'selected':false}} value="{{$user['id']}}">{{$user['name']}}</option>
                                    @endforeach

                                </select>

                            </div>
                        </div>
                        <div class="form-group row"><label class="col-sm-2 col-form-label">  @lang('notification.sms-text')</label>

                            <div class="col-sm-10">
                                <textarea rows="3" class="form-control" name="text" id="text">{{old('text')}}</textarea>

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
