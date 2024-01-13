@extends('layout.admin-app')

@section('content')
<!-- Start Content-->
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Manage Blogs</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <!--Include alert file-->
        @include('admin.include.alert')

        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Comments on Blogs</h4>

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
						@foreach($blog_comments as $comments)
                            <tr>
                                <td>{{$loop->iteration++}}</td>
                                <td>{{$comments->full_name}}</td>
                                <td>{{$comments->comment}}</td>
                                <td>{{$comments->blog_title}}</td>
								<td>{{ date("d M Y", strtotime($comments->created_at)) }}</td>
                                <td>
								  <span class="badge @if($comments->status == 'active') badge-success @else badge-danger @endif">
                                        {{ $comments->status }}
                                    </span>
                                <td>
                                    <a href="{{route('update-status', ['blog_comments', $comments->id, 'active'])}}" class="btn btn-success btn-sm">Approve</a>
                                    <a href="{{route('update-status', ['blog_comments', $comments->id, 'inactive'])}}" class="btn btn-danger btn-sm">Reject</a>
                                </td>
                            <tr>
						@endforeach

                        </tbody>
                    </table>
                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>
</div> <!-- container -->
@endsection
