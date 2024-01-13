@extends('layout.admin-app')

@section('content')
<!-- Start Content-->
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">

                <h4 class="page-title">Dashboard</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-md-6 col-xl-3">
            <div class="widget-rounded-circle card-box">
                <div class="row">
                    <div class="col-6">
                        <div class="avatar-lg rounded-circle bg-soft-primary border-primary border">
                            <i class="fe-list font-22 avatar-title text-primary"></i>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="text-right">
                            <h3 class="mt-1"><span data-plugin="counterup">{{ $categories }}</span></h3>
                            <p class="text-muted mb-1 text-truncate">Categories</p>
                        </div>
                    </div>
                </div> <!-- end row-->
            </div> <!-- end widget-rounded-circle-->
        </div> <!-- end col-->

        <div class="col-md-6 col-xl-3">
            <div class="widget-rounded-circle card-box">
                <div class="row">
                    <div class="col-6">
                        <div class="avatar-lg rounded-circle bg-soft-success border-success border">
                            <i class="fe-shopping-cart font-22 avatar-title text-success"></i>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="text-right">
                            <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ $blogs }}</span></h3>
                            <p class="text-muted mb-1 text-truncate">Total Blogs</p>
                        </div>
                    </div>
                </div> <!-- end row-->
            </div> <!-- end widget-rounded-circle-->
        </div> <!-- end col-->

        <div class="col-md-6 col-xl-3">
            <div class="widget-rounded-circle card-box">
                <div class="row">
                    <div class="col-6">
                        <div class="avatar-lg rounded-circle bg-soft-info border-info border">
                            <i class="fe-bar-chart-line- font-22 avatar-title text-info"></i>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="text-right">
                            <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ $comments }}</h3>
                            <p class="text-muted mb-1 text-truncate">Blogs Comments</p>
                        </div>
                    </div>
                </div> <!-- end row-->
            </div> <!-- end widget-rounded-circle-->
        </div> <!-- end col-->

        <div class="col-md-6 col-xl-3">
            <div class="widget-rounded-circle card-box">
                <div class="row">
                    <div class="col-6">
                        <div class="avatar-lg rounded-circle bg-soft-warning border-warning border">
                            <i class="fe-eye font-22 avatar-title text-warning"></i>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="text-right">
                            <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ $today_blogs }}</span></h3>
                            <p class="text-muted mb-1 text-truncate">Today's Blogs</p>
                        </div>
                    </div>
                </div> <!-- end row-->
            </div> <!-- end widget-rounded-circle-->
        </div> <!-- end col-->

        <!--Recent comments-->
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Recent Comments on Blogs</h4>

                    <table class="table dt-responsive nowrap w-100">
                        <thead class="thead-light">
                            <tr>
                                <th>Sr No</th>
                                <th>Comment By</th>
                                <th>Comment</th>
                                <th>Blog Title</th>
                                <th>Created On</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
						@foreach($recent_blogs_comment as $blogs_comment)
                            <tr>
                                <td>{{$loop->iteration++}}</td>
                                <td>{{$blogs_comment->full_name}}</td>
                                <td>{{$blogs_comment->comment}}</td>
                                <td>{{$blogs_comment->blog_title}}</td>
								<td>{{ date("d M Y", strtotime($blogs_comment->created_at)) }}</td>
                                <td>
								  <span class="badge @if($blogs_comment->status == 'active') badge-success @else badge-danger @endif">
                                        {{ $blogs_comment->status }}
                                    </span>
                                <td>
                                    <a href="{{route('update-status', ['blog_comments', $blogs_comment->id, 'active'])}}" class="btn btn-success btn-sm">Approve</a>
                                    <a href="{{route('update-status', ['blog_comments', $blogs_comment->id, 'inactive'])}}" class="btn btn-danger btn-sm">Reject</a>
                                </td>
                            <tr>
						@endforeach

                        </tbody>
                    </table>
                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>
    <!-- end row-->


</div> <!-- container -->
@endsection
