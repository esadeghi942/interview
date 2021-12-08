@extends('layouts.index')

@section('content')
    <div class="content-wrapper">
        <section class="content">
            @include('user.partials.notifications')
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body table-responsive p-0">
                                    <table class="table table-bordered data-table">
                                        <thead>
                                        @include('user.worktimes.columns')
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

                                                       <form action="{{ route('user.worktimes.destroy'  , ['worktime_id' => $worktime->id]) }}"
                                                             method="post">
                                                           {{ method_field('delete') }}
                                                           {{ csrf_field() }}
                                                           <div class="btn-group btn-group-xs">
                                                               <button type="submit" class="btn btn-danger">حذف </button>
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
                </div>
            </div>
        </section>
    </div>
    <script type="text/javascript">
        $(document).ready(function () {
            $(document).on('click','.delete',function (e) {
                e.preventDefault();
                var confirm=window.confirm('Are You Sure To Delete?');
                if (confirm) {
                    let id = $(this).data('id');
                    $('#msg').html('');
                    let elm = $(this);
                    $.ajax({
                        type: 'get',
                        url: '/worktime/delete/' + id,
                        success: function (data) {
                            if (data == 'error') {
                                $('#msg').append('<div class="alert alert-danger">\n' +
                                    '        <p>حذف ساعت کاری ممکن نیست.</p>\n' +
                                    '    </div>');
                            }
                            else if (data == 'success') {
                                $('#msg').append('<div class="alert alert-success">\n' +
                                    '        <p>ساعت کاری مورد نظر با موفقیت حذف گردید.</p>\n' +
                                    '    </div>');
                                elm.closest('tr').remove();
                            }
                        }
                    });
                }
            });
        });
    </script>
@endsection
