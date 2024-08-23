@extends('layouts.dashbord')

@section('content')


<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin.home')}}">الرئيسية </a>
                            </li>
                            <li class="breadcrumb-item" ><a href="{{route('admin.home')}}" style="color:#0c8aa0d3"> الاطباء    </a>
                            </li>
                            <li class="breadcrumb-item active">تعديل بيانات طبيب
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
                            <div class="card">
                                <div class="card-header"  style =" background-color:#0c8aa0d3 ; height: 80px" >
                                    <img src="/admin/images/ico/doc2.jpg" style="width: 55px " >

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
                            <div class="card-content collapse show">
                                <div class="card-body">
                                    <form class="form" action="{{route('admin.update',$doctors ->id)}}" method="POST"
                                          enctype="multipart/form-data">
                                          @csrf
                                        <div class="form-body">



                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> اسم الطبيب البيطري </label>
                                                        <input type="text" value="{{$doctors -> name}}" id="name"
                                                               class="form-control"
                                                               placeholder="ادخل الاسم   "
                                                               name="name" style="	border-block-end: #a0a0a5 ">
                                                        <span class="text-danger"> </span>

                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">  التخصص </label>
                                                        <input type="text" value="{{$doctors -> special}}" id="name"
                                                               class="form-control"
                                                               placeholder="ادخل اسم التخصص  "
                                                               name="special" style="	border-block-end: #a0a0a5 ">
                                                        <span class="text-danger"> </span>
                                                    </div>
                                                </div>





                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> رقم الهاتف </label>
                                                        <input type="tel" value="{{$doctors -> phone}}" id="name"
                                                               class="form-control"
                                                               placeholder="ادخل رقم الهاتف      "
                                                               name="phone" style="	border-block-end: #a0a0a5 ">
                                                        <span class="text-danger"> </span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> كلمة المرور </label>
                                                        <input type="text" value="{{$doctors -> password}}" id="name"
                                                               class="form-control"
                                                               placeholder="كلمة المرور "
                                                               name="password" style="	border-block-end: #a0a0a5 ">
                                                        <span class="text-danger"> </span>
                                                    </div>
                                                </div>





                                                <div class="form-actions">
                                                    <button type="button" style =" background-color:#0c8aa0d3 ; width: 65px ; height:45px ; color:beige ; padding:5px  ; margin:20px"
                                                            onclick="history.back();">
                                                       رجوع
                                                    </button>

                                                    <button type="submit" style =" background-color:#0c8aa0d3 ; width: 65px ; height:45px ; color:beige">
                                                        تعديل
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
