
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
                            <li class="breadcrumb-item" ><a href="{{route('admin.home')}}" style="color:#0c8aa0d3"> الاطباء    </a>
                            </li>
                            <li class="breadcrumb-item active">  عرض منشورات الاطباء
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
                            <div class="card-header" style =" background-color:#0c8aa0d3 ; height: 80px">
                                <img src="/admin/images/ico/doc3.jpg" style="width: 57px " >
                                <a class="heading-elements-toggle"><i
                                        class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        {{-- <li><a data-action="collapse"><i class="ft-minus"></i></a></li> --}}
                                        <li><a data-action="reload" style ="width: 20px ; height:20px ;color:beige"><i class="ft-rotate-cw"></i></a></li>
                                        {{-- <li><a data-action="expand"><i class="ft-maximize"></i></a></li> --}}
                                        <li><a data-action="close" style ="width: 20px ; height:20px ;color:beige"><i class="ft-x"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- @if(Session::has('successd'))
                            <div class="alert alert-success text-center" role="alert">
                                {{Session::get('successd')}}
                              </div>
                            @endif

                            @if(Session::has('error'))
                            <div class="alert alert-danger text-center" role="alert">
                                {{Session::get('error')}}
                              </div>
                            @endif
                             -->
                            <div class="card-content collapse show">
                                <div class="card-body card-dashboard">
                                    <table class="table display nowrap table-striped scroll-horizontal table-bordered"  style ="width: 40px ">
                                        <thead  style =" background-color:#0c8aa0d3 ; color:beige ">
                                        <tr>
                                            <th> id</th>
                                            <th> id_دكتور </th>
                                            <th>عنوان المنشور</th>
                                            <th> المنشور</th>
                                            {{-- <th> الصور</th>
                                            <th>التسجيل الصوتي</th> --}}
                                            <th> حذف المنشور</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                @foreach($doctorPost as $val)
                                                <tr>
                                                    <td>{{$val->id}} </td>
                                                    <td>{{$val->doctor_id}} </td>
                                                    <td>{{$val->title}} </td>
                                                    <td>{{$val->content}} </td>
                                                    <!-- this save images ooook -->
                                                {{-- <td><img width="50" height="60" src="{{asset('/images/posts/'.$val->image)}}"></td>
                                                <td><video  src="{{asset('/images/records/'.$val->record)}}"></td> --}}
                                                <td>
                                                    <div class="btn-group" role="group"
                                                             aria-label="Basic example" >
                                                    <a href="{{route('Post.delete',$val->id)}}"
                                                        class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1">حذف</a>
                                                     </div>
                                                <td>

                                                   <!-- v this code show video on database okkkkkkkkk-->
                                                    <!-- <td>

                         <video width="130" height="80" controls autoplay>
    {{-- <source src="{{asset('images/news/'.$val->image)}}" type="video/mp4">
    <source src="{{asset('images/news/'.$val->image)}}" type="video/ogg"> --}}
    Your browser does not support the video tag!
                                                    </video> </td> -->
                                                </tr>
                                                @endforeach
                                        </tbody>

                                    </table>
                                    <div class="justify-content-center d-flex" >
                                    </div>
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
