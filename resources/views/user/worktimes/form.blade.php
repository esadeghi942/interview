<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">ثبت ساعت کاری</h3>
                </div>
                <form method="post">
                    @csrf
                    <div class="card-body">
                        @include('user.partials.errors')
                        <div class="row">
                           {{-- <div class="form-group col-lg-4">
                                <label for="input" class="control-label">تاریخ</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">
                                        <i class="fa fa-calendar"></i>
                                      </span>
                                    </div>
                                    <input id="date" name="date"
                                           value="{{old('date',isset($worktimeItem) ? $worktimeItem->date: '')}}"
                                           class="normal-example form-control initial-value-type-example" required/>
                                </div>
                            </div>--}}
                            <div class="form-group col-lg-4">
                                <label for="input" class="control-label">ساعت شروع کار</label>
                                <input id="start" type="text" name="time_start"
                                       value="{{old('time_start',isset($worktimeItem) ? $worktimeItem->time_start: '')}}"
                                       class="form-control bs-timepicker" required/>
                            </div>
                            <div class="form-group col-lg-4">
                                <label for="input" class="control-label">ساعت پایان کار</label>
                                <input id="finish" type="text" name="time_finish"
                                       value="{{old('time_finish',isset($worktimeItem) ? $worktimeItem->time_finish: '')}}"
                                       class="form-control bs-timepicker" required/>

                        </div>
                        <div class="form-group">
                            <label for="input" class="control-label">کارهای انجام شده</label>
                            <textarea class="form-control" required name="project" rows="3">{{old('project',isset($worktimeItem) ? $worktimeItem->project: '')}}</textarea>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info">ثبت</button>
                    </div>
                    <!-- /.card-footer -->
                </form>
            </div>
        </div>
    </section>
</div>
<script>
    $(function () {
        $('.bs-timepicker').timepicker();
    });
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-36251023-1']);
    _gaq.push(['_setDomainName', 'jqueryscript.net']);
    _gaq.push(['_trackPageview']);

    (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();
    try {
        fetch(new Request("https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js", { method: 'HEAD', mode: 'no-cors' })).then(function(response) {
            return true;
        }).catch(function(e) {
            var carbonScript = document.createElement("script");
            carbonScript.src = "//cdn.carbonads.com/carbon.js?serve=CK7DKKQU&placement=wwwjqueryscriptnet";
            carbonScript.id = "_carbonads_js";
            document.getElementById("carbon-block").appendChild(carbonScript);
        });
    } catch (error) {
        console.log(error);
    }
</script>
