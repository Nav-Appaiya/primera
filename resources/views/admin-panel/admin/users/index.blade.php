@extends('layouts.admin')

@section('title', 'categories')
@section('breadcrumb', Breadcrumbs::render('dashboard.user'))

@section('content')

    <div class="row">
        <div class="col-lg-10">
            <div class="table-responsive">
            <table class="table table-condensed table-bordered table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>Nr</th>
                        <th>username</th>
                        <th>email</th>
                        <th>role</th>
                        <th>credits</th>
                        <th>joined at</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr class="table-row"data-href="{{URL::route('admin_user_edit', $user->id)}}">
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role }}</td>
                            <td>{{ $user->credits }}</td>
                            <td>{{ $user->created_at }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="col-lg-2 pull-right">
            <ul class="list-group">
                {{--<li class="list-group-item"><a href="{{route('admin_category_create')}}">new</a></li>--}}
            </ul>
        </div>

    </div>

@endsection

@section('javascript')

@endsection