@extends('layouts.admin')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            @include('admin.partials.notifications')
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body table-responsive p-0">
                                <table class="table table-bordered data-table">
                                    <thead>
                                    @include('admin.worktimes.columns')
                                    </thead>
                                    <tbody>
                                    @foreach($worktimes as $worktime)
                                        <tr>
                                            <td>{{ Morilog\Jalali\CalendarUtils::strftime('Y/m/d', strtotime($worktime->created_at))}}</td>
                                            <td>{{ $worktime->time_start }}</td>
                                            <td>{{ $worktime->time_finish }}</td>
                                            <td>{{ $worktime->total }}</td>
                                            <td>{{ $worktime->project }}</td>
                                            <td>
                                                <div class="btn-group btn-group-xs">

                                                    <form
                                                        action="{{ route('user.worktimes.destroy'  , ['worktime_id' => $worktime->id]) }}"
                                                        method="post">
                                                        {{ method_field('delete') }}
                                                        {{ csrf_field() }}
                                                        <div class="btn-group btn-group-xs">
                                                            <button type="submit" class="btn btn-danger">حذف</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>

                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    مجموع کارکرد:{{$total}}
                </div>
            </div>
        </section>
    </div>
@endsection
