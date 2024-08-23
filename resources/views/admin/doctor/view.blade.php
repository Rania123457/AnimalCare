
@extends('layouts.dashbord')
@section('content')
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">

                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin.home')}}">الرئيسية</a>
                            </li>
                            <li class="breadcrumb-item" style="color:#0c8aa0d3"><a href="{{route('admin.home')}}"> الاطباء    </a>
                            </li>
                            <li class="breadcrumb-item active"> عرض الاطباء
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- DOM - jQuery events table -->
            <section id="dom">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header"  style =" background-color:#0c8aa0d3 ; height: 80px " >
                                <img src="/admin/images/ico/img.png" style="width: 70px">

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

                            {{-- @include('admin.includes.alerts.success') --}}
                            {{-- @include('admin.includes.alerts.errors') --}}

                            @if(Session::has('successd'))
                            <div class="alert alert-success text-center" role="alert">
                                {{Session::get('successd')}}
                              </div>
                            @endif

                            @if(Session::has('error'))
                            <div class="alert alert-danger text-center" role="alert">
                                {{Session::get('error')}}
                              </div>
                            @endif

                            <div class="card-content ">
                                <div class="card-body card-dashboard">
                                    <table class="table display nowrap table-striped scroll-horizontal table-bordered"  style ="width: 40px ;">
                                        <thead  style =" background-color:#0c8aa0d3 ; color:beige " >
                                        <tr>
                                            <th> id</th>
                                            <th> اسم الطبيب</th>
                                            <th>التخصص</th>
                                            <th>رقم الهاتف</th>
                                            <th > تعديل /  حذف</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                @foreach( $doctors as $val)
                                                <tr>
                                                    <td>{{$val->id}} </td>
                                                    <td>{{$val->name}} </td>
                                                    <td>{{$val->special}}</td>
                                                    <td>{{$val->phone}} </td>


                                                    <td>
                                                        <div class="btn-group" role="group"
                                                             aria-label="Basic example" >
                                                            <a href="{{route('admin.edit',$val->id)}}"
                                                               class="btn btn-outline-blue btn-min-width box-shadow-3 mr-1 mb-1 " >تعديل</a>
                                                            <!-- </div> -->
                                                            <!-- {{-- <button type="button"
                                                                    value=""

                                                                    onclick=""
                                                                    class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1"
                                                                    data-toggle="modal"
                                                                    data-target="#rotateInUpRight">
                                                                    حذف
                                                            </button> --}} -->

                                                            <!-- <div class="btn-group" role="group"
                                                            aria-label="Basic example"> -->
                                                               <a href="{{route('doctor.delete',$val->id)}}"
                                                                class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1">حذف</a>
                                                        </div>
                                                    </td>
                                                </tr>


                                                @endforeach
                                        </tbody>

                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
@endsection
