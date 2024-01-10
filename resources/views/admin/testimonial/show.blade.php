@extends('layouts.app')

@section('content')
    <div class="container-fluid bg-white mt-5">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box card">
                <div class="card-body">
                    <h3 class="box-title pull-left">Testimonial {{ $testimonial->id }}</h3>
                    @can('view-'.str_slug('Testimonial'))
                        <a class="btn btn-success pull-right" href="{{ url('/admin/testimonial') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $testimonial->id }}</td>
                            </tr>
                            <tr><th> Name </th><td> {{ $testimonial->name }} </td></tr><tr><th> Verified </th><td> {{ $testimonial->verified }} </td></tr><tr><th> Comments </th><td> {{ $testimonial->comments }} </td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.admin.footer')
</div>
@endsection

