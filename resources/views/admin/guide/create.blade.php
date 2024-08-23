@extends('layouts.dashbord')

@section('content')

<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin.home')}}" style="color:#049e8f">الرئيسية </a>
                            </li>
                            <li class="breadcrumb-item" ><a href="{{route('admin.home')}}" style="color:#049e8f"> المرشدين  </a>
                            </li>
                            <li class="breadcrumb-item active">اضافة مرشد
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- Basic form layout section start -->
            <section id="basic-form-layouts">
                <div class="row match-height">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header"  style =" background-color:#049e8f; height: 80px" >
                                <img src="/admin/images/ico/gu1.jpg" style="width: 60px  ">

                                <a class="heading-elements-toggle"  ><i
                                        class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements" >
                                    <ul class="list-inline mb-0 " >
                                        {{-- <li><a data-action="collapse"><i class="ft-minus"></i></a></li> --}}
                                        <li><a data-action="reload" style ="width: 20px ; height:20px ;color:beige"  ><i class="ft-rotate-cw" ></i></a></li>
                                        {{-- <li><a data-action="expand"><i class="ft-maximize"></i></a></li> --}}
                                        <li><a data-action="close"  style ="width: 40px ; height:40px ;color:beige"><i class="ft-x"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            </div>
                            {{-- @include('admin.includes.alerts.success')
                            @include('admin.includes.alerts.errors') --}}
                        @if (Session::has('success'))
                        <div class="alert alert-success text-center" role="alert">
                             {{Session::get('success')}}
                            </div>
                            @endif
                            <br>
                            <div class="card-content collapse show">
                                <div class="card-body">
                                    <form class="form" action="{{route('admin.guide.store')}}" method="POST" enctype="multipart/form-data">
                                          @csrf
                                        <div class="form-body">
                                            {{-- <h4 class="form-section"><i class="ft-home"></i>  بيانات المرشد </h4> --}}


                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> اسم المرشد</label>
                                                        <input type="text"   value="" id="name "
                                                               class="form-control"
                                                               placeholder="ادخل الاسم"
                                                               name="name" style="	border-block-end: #a0a0a5 ">

                                                               @error('name')
                                                               <small class="form-text text-danger"> {{$message}} </small>
                                                               @enderror

                                                        {{-- <span class="text-danger"> </span> --}}
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">  التخصص </label>
                                                        <input type="text" value="" id="name"
                                                               class="form-control"
                                                               placeholder="ادخل التخصص"
                                                               name="special" style="	border-block-end: #a0a0a5 ">

                                                               @error('special')
                                                               <small class="form-text text-danger">{{$message}}</small>
                                                               @enderror

                                                        {{-- <span class="text-danger"> </span> --}}
                                                    </div>
                                                </div>
                                            </div>




                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> رقم الهاتف </label>
                                                        <input type="tel" value="" id="name"
                                                               class="form-control"
                                                               placeholder="أدخل الرقم    "
                                                               name="phone" style="	border-block-end: #a0a0a5 ">

                                                               @error('phone')
                                                               <small class="form-text text-danger">{{$message}}</small>
                                                               @enderror
                                                        {{-- <span class="text-danger"> </span> --}}
                                                    </div>

                                              </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">  كلمة المرور </label>
                                                        <input type="text" value="" id="name"
                                                               class="form-control"
                                                               placeholder="ادخل كلمة المرور"
                                                               name="password" style="	border-block-end: #a0a0a5 ">
                                                               @error('password')
                                                               <small class="form-text text-danger">{{$message}}</small>
                                                               @enderror
                                                    </div>
                                                </div>

                                        <div class="form-actions">
                                            <button type="button" style =" background-color:#049e8f ; width: 65px ; height:45px ; color:beige ; padding:5px  ; margin:20px"
                                                    onclick="history.back();">
                                               رجوع
                                            </button>

                                            <button type="submit" style =" background-color:#049e8f ; width: 65px ; height:45px ; color:beige">
                                                حفظ
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- // Basic form layout section end -->
        </div>
    </div>
</div>


@endsection
