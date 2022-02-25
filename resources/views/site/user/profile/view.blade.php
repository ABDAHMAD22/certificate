@extends('layouts.site')

@section('css')
@endsection

@section('content')
    <div class="page-container custom-profile mx-auto">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center profile-main-info">
                <div class="profile-img">
                    {{--                    <img src="{{ asset('site/img/profile-img.jpg') }}" alt="image">--}}
                    <img src="{{ $user->image_path }}" alt="image">
                </div>
                <h3>{{$user->name}}</h3>
                <p>
                    {{$user->country->name??''}}
                    {{$user->country?'-':''}}
                    {{$user->city->name??''}}
                    {{$user->city?'-':''}}
                    {{$user->region}}</p>
                <ul class="list-unstyled p-0 social-media d-flex align-items-center justify-content-center align-items-center">
                    @if($user->social_links)
                        @foreach($user->social_links as $key=>$item)
                            @if($item)
                                <li class="mx-2">
                                    <a target="_blank"
                                       href="{{\App\Classes\Helpers::check_url($item)}}">
                                        <img width="24" src="{{ asset('site/img/'.$key.'.svg') }}" alt="image">
                                    </a>
                                </li>
                            @endif
                        @endforeach
                    @endif
                </ul>
                <a href="{{route('user.profile')}}" class="btn btn-primary hover-black btn-block">
                    <span>تعديل الملف الشخصي</span>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="profile-card d-flex align-items-center">
                    <p>رقم العضوية</p>
                    <p>{{$user->id}}</p>
                </div>
                <div class="profile-card d-flex align-items-center">
                    <p>الإسم بالانجليزية</p>
                    <p>{{$user->name_en}}</p>
                </div>
                <div class="profile-card d-flex align-items-center">
                    <p>البريد الإلكتروني</p>
                    <p>{{$user->email}}</p>
                </div>
                <div class="profile-card d-flex align-items-center">
                    <p>رقم الجوال</p>
                    <p>{{$user->mobile}}</p>
                </div>
                <div class="profile-card d-flex align-items-center">
                    <p>اسم مدير المركز</p>
                    <p>{{$user->manager_name}}</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="profile-card d-flex align-items-center">
                    <p>رخصة التدريب</p>
                    @if($user->training_licence)
                        <a target="_blank" href="{{ Storage::url($user->training_licence) }}"
                           style="display: block;width: 60px;">
                            <img class="small-img" src="{{ Storage::url($user->training_licence) }}" alt="image">
                        </a>
                    @endif
                </div>
            </div>
            <div class="col-md-6">
                <div class="profile-card d-flex align-items-center">
                    <p>السجل التجاري</p>
                    @if($user->commercial_register)
                        <a target="_blank" href="{{ Storage::url($user->commercial_register) }}"
                           style="display: block;width: 60px;">
                            <img class="small-img" src="{{ Storage::url($user->commercial_register) }}" alt="image">
                        </a>
                    @endif
                </div>
            </div>
            <div class="col-12">
                <div class="profile-card d-flex align-items-center">
                    <p>اسم الشخص المسؤول</p>
                    <p>{{$user->account_manager}}</p>
                </div>
                <div class="profile-card d-flex align-items-center">
                    <p>رقم هاتف المسؤول</p>
                    <p>{{$user->account_manager_mobile}}</p>
                </div>
                <div class="profile-card d-flex align-items-center">
                    <p>البريد الإلكتروني للمسؤول</p>
                    <p>{{$user->account_manager_email}}</p>
                </div>
            </div>
        </div>
    </div><!--page container-->
@endsection

@section('js')
@endsection
