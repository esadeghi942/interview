@extends('layouts.admin')

{{--@section('script')
    <script src="/ckeditor/ckeditor.js"></script>

    <sript>
        CKEDITOR.replace('body' , {

        })
    </sript>
@endsection--}}
@section('content')

    <div class="content-wrapper">


        <section class="content">

            <div class="row">
                <div class="col-md-12">

                    <div class="box box-warning">
                        <div class="box-header with-border">
                            <h3 class="box-title">ایجاد کاربر جدید</h3>
                        </div>
                        <div class="box-body">
                            <form action="{{ route('admin.user.store') }}" method="post">
                                <div class="form-group">

                                    {{ csrf_field() }}

                                    @include('admin.partials.errors')
                                    <label class="ml" for="exampleInputEmail1">نام کاربر</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                           placeholder="نام کاربر" value="{{ old('name') }}">

                                    <label class="ml" for="exampleInputEmail1">ایمیل کاربر</label>
                                    <input type="text" class="form-control" id="email" name="email"
                                           placeholder="ایمیل کاربر" value="{{ old('email') }}">

                                    <label class="ml" for="moshtari_id">تلفن</label>
                                    <input type="text" class="form-control" id="phone" name="phone"
                                           placeholder="تلفن" value="{{ old('phone') }}">

                                    <label class="ml" for="moshtari_id">ساعت کارکرد موردانتظارهفتگی</label>
                                    <input type="text" class="form-control" id="time_weekly_working" name="time_weekly_working"
                                           placeholder="ساعت کارکرد موردانتظارهفتگی" value="{{ old('time_weekly_working') }}">

                                    <label class="ml" for="exampleInputEmail1">رمز عبور کاربر</label>
                                    <input type="password" class="form-control" id="password" name="password"
                                           placeholder="رمز عبور" value="{{ old('password') }}">

                                    <label class="ml" for="exampleInputEmail1">تایید رمز عبور</label>
                                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                                           placeholder="تایید رمز عبور" value="{{ old('password_confirmation') }}">

                                </div>


                                <div class="box-footer clearfix">
                                    <button type="submit" class="btn btn-sm btn-info btn-flat pull-left">ثبت کاربر
                                    </button>

                                </div>
                            </form>
                        </div>
                    </div>

                </div>


        </section>
    </div>

@endsection
