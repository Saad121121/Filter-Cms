@extends('layouts.app')
<link rel="stylesheet" href="{{asset('plugins/vendors/dropify/dist/css/dropify.min.css')}}">
@push('after-css')
    <style>

        #rootwizard .nav-pills > li > a.active {
            background: #d3e0fc;
            color: #4886ff;

        }

        #rootwizard .nav-pills > li > a {
            padding: .4rem 1.3rem;
            border-radius: 2rem;
            border: 1px solid transparent;
            display: block;
        }

        #rootwizard .nav.nav-pills {
            margin-bottom: 25px;

        }

        #rootwizard .nav.nav-pills .nav-link {
            padding: 0px;
        }

        .nav-pills > li > a {
            cursor: default;;
            background-color: inherit;
        }

        .nav-pills > li > a:focus, .nav-tabs > li > a:focus, .nav-pills > li > a:hover, .nav-tabs > li > a:hover {
            border: 1px solid transparent !important;
            background-color: inherit !important;
        }

        .help-block {
            display: block;
            margin-top: 5px;
            margin-bottom: 10px;
        }

        .has-error .help-block {
            color: #EF6F6C;
        }

        .select2 {
            width: 100% !important;
        }

        .error-block {
            background-color: #ff9d9d;
            color: red;
        }

        .pager.wizard {
            padding-left: 0;
            margin: 20px 0;
            text-align: center;
            list-style: none;
        }

        .col-lg-2.control-label {
            text-align: right;
            line-height: 35px;
        }

        @media screen and (max-width: 767px) {
            .col-lg-2.control-label {
                text-align: left;
                line-height: 35px;
            }
        }
    </style>
@endpush

@section('content')
<div class="content-header row">
    <div class="content-header-left col-md-12 col-12 mb-2 breadcrumb-new">
        <h3 class="content-header-title mb-0 d-inline-block">Account Settings</h3>
        <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active">Edit Profile</li>
                    <li class="breadcrumb-item active">Account Settings</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<section>
    <div class="row">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Account Settings</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <ul class="nav nav-tabs nav-top-border no-hover-bg nav-justified">
                            <li class="nav-item">
                                <a class="nav-link active" id="profile-tab1" data-toggle="tab" href="#profile1" aria-controls="profile1"
                                    aria-expanded="true">Profile</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="bio-tab1" data-toggle="tab" href="#bio1" aria-controls="bio1"
                                    aria-expanded="false">Bio</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link" id="address-tab1" data-toggle="tab" href="#address1" aria-controls="address1"
                                    aria-expanded="false">Address</a>
                            </li>
                        </ul>
                        <form class="form" action="{{url('admin/account/settings')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="user_profile_dob" id="user_profile_dob" value="@if(!empty($user->profile->dob)){{$user->profile->dob}}@endif">
                            <div class="tab-content px-1 pt-2">
                                <div role="tabpanel" class="tab-pane active" id="profile1" aria-labelledby="active-tab1"aria-expanded="true">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="name">Name</label>
                                                    <input id="name" name="name" type="text"
                                                       placeholder="Name" class="form-control required"
                                                       value="{{$user->name}}"/>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="email">Email</label>
                                                    <input id="email" name="email" placeholder="E-mail" type="email" class="form-control required email" value="{{$user->email}}"/>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <div class="alert alert-info">
                                                        <p class="mb-0">If you don't want to change password... please leave them empty</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="password">Password</label>
                                                    <input id="password" name="password" type="password" placeholder="Password" class="form-control required" value="{!! old('password') !!}"/>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="password_confirmation">Confirm Password</label>
                                                    <input id="password_confirmation" name="password_confirmation" type="password" placeholder="Confirm Password " class="form-control required"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="bio1" role="tabpanel" aria-labelledby="link-tab1" aria-expanded="false">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="pic">Images</label><br>
                                                    <div class="image-privew">
                                                        @if(!empty($user->profile->pic))
                                                            <img src="{{asset('storage/uploads/users/'.$user->profile->pic)}}"
                                                                 alt="profile pic">
                                                        @else
                                                            <img src="http://placehold.it/200x200" alt="profile pic">
                                                        @endif
                                                    </div>
                                                    <div class="upload-photo mt-2">
                                                        <input id="pic" name="pic_file" type="file" class="form-control dropify"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="bio">Bio (brief intro) *</label>
                                                    <textarea name="bio" id="bio" class="form-control resize_vertical" rows="4">@if(!empty($user->profile->bio)){{$user->profile->bio}}@endif</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="address1" role="tabpanel" aria-labelledby="address1-tab1" aria-expanded="false">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="gender">Gender *</label>
                                                    <select class="form-control" title="Select Gender..." name="gender" id="gender">
                                                        <option value="">Select</option>
                                                        <option value="male"
                                                                @if( ( !empty($user->profile->gender) && $user->profile->gender === 'male')) selected="selected" @endif >
                                                            Male
                                                        </option>
                                                        <option value="female"
                                                                @if( ( !empty($user->profile->gender) && $user->profile->gender === 'female')) selected="selected" @endif >
                                                            Female
                                                        </option>
                                                        <option value="other"
                                                                 @if( ( !empty($user->profile->gender) && $user->profile->gender === 'other')) selected="selected" @endif >
                                                            Other
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="countries">Country</label>
                                                    <input id="countries" name="country" type="text" class="form-control" value="@if(!empty($user->profile->country)) {{$user->profile->country}} @endif"/>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="city">City</label>
                                                    <input id="city" name="city" type="text" class="form-control" value="@if(!empty($user->profile->city)) {{$user->profile->city}} @endif"/>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="state">State</label>
                                                    <input id="state" name="state" type="text" class="form-control" value="@if(!empty($user->profile->state)) {{$user->profile->state}} @endif"/>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="address">Address</label>
                                                    <input id="address" name="address" type="text" class="form-control" value="@if(!empty($user->profile->address)){{$user->profile->address}}@endif"/>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="postal">Postal/Zip</label>
                                                    <input id="postal" name="postal" type="text" class="form-control" value="@if(!empty($user->profile->postal)){{$user->profile->postal}}@endif"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row px-1">
                                <div class="col-12">
                                    <div class="form-actions mt-0 pb-0">
                                        <button type="submit" class="btn btn-primary">
                                        <i class="la la-check-square-o"></i> Save
                                        </button>
                                    </div>  
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title" id="basic-layout-colored-form-control">Information</h4>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-content collapse show">
                    <div class="card-body">
                        <div class="card-text">
                            @if ($errors->any())
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li class="alert alert-danger">
                                    {{ $error }}
                                </li>
                                @endforeach
                            </ul>
                            @endif
                            @if(Session::has('message'))
                            <ul>
                                <li class="alert alert-success">
                                    {{ Session::get('message') }}
                                </li>
                            </ul>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('js')
  <script src="{{asset('plugins/vendors/dropify/dist/js/dropify.min.js')}}"></script>
  <script>
      $(function() {
          $('.dropify').dropify();
      });
  </script>
@endpush
