@extends('layouts.admin')

@section('content')

    <div class="content-wrapper">
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">کاربران</h3>
                            <a href="{{ route('admin.user.create') }}" class="btn btn-sm btn-info btn-flat pull-left">ایجاد
                                کاربر جدید</a>
                        </div>
                        برای مشاهده جزییات ساعت کاری روی لینک نام کاربر کلیلک کنید.
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table class="table table-bordered">
                                <tr>
                                    <th>نام</th>
                                    <th>ایمیل</th>
                                    <th>تلفن</th>
                                    <th> کارکرد هفتگی موردانتظار(ساعت)</th>
                                    <th> کل کارکرد هفته جاری</th>
                                    <th> باقی مانده کارکرد هفته جاری</th>
                                    <th> حذف کاربر</th>
                                </tr>
                                @foreach($users as $user)
                                    <tr>
                                        <td>
                                            <a href="{{route('admin.user.timework',['user_id' => $user->id]) }}"> {{ $user->name}}</a>
                                        </td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->phone }}</td>
                                        <td>{{ $user->time_weekly_working }}</td>
                                        <td>{{ $user->total_weekly_time }}</td>
                                        <td>{{ $user->rest_weekly_time }}</td>
                                        <td>
                                            <div class="btn-group btn-group-xs">
                                                <form
                                                    action="{{ route('admin.user.destroy'  , ['user_id' => $user->id]) }}"
                                                    method="post">
                                                    {{ method_field('delete') }}
                                                    {{ csrf_field() }}
                                                    <div class="btn-group btn-group-xs">
                                                        <button type="submit" class="btn btn-danger">حذف کاربر</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                        <!-- /.box-body -->
                        {{--<div class="box-footer clearfix">
                            <a href="{{ route('role.index') }}" class="btn btn-sm btn-success btn-flat pull-left">نقش ها</a>
                            <a href="{{ route('permission.index') }}" class="btn btn-sm btn-warning btn-flat pull-left">دسترسی ها</a>
                            {!! $users->render() !!}
                        </div>--}}
                    </div>

                </div>

            </div>
        </section>
    </div>

@endsection


