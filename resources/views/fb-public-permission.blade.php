@include('layouts.header')

<body class="vertical-layout vertical-menu-modern content-left-sidebar navbar-floating footer-static menu-collapsed"
      data-open="click"
      data-menu="vertical-menu-modern"
      data-col="content-left-sidebar">

@include('layouts.top-header')







<!-- BEGIN: Content-->
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">

            <div class="row">
                <div class="col-md-6 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Facebook Assets</h4>
                        </div>
                        <div class="card-body">

                            <form action="{{ route('access-save') }}" method="get">
                                <!-- Basic Select -->

                                <div class="form-group">
                                    <label for="basicSelect">Please Enter your email</label>
                                    <input type="email" class="form-control" name="ad_account_id">
                                </div>


                                <div class="form-group">
                                    <label for="basicSelect">Choose Ad Account(s)</label>
                                    <select class="form-control" name="ad_account_id">
                                        @foreach($adAccounts as $value)
                                            @if(isset($value['id']))
                                                <option value="{{ $value['id']}}">{{ $value['name']}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="basicSelect">Choose Page(s)</label>
                                    <select class="form-control" name="page_id">
                                        @foreach($pageLists as $page)
                                            @if(isset($page['id']))
                                                <option value="{{ $page['id']}}">{{ $page['name']}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="basicSelect">Choose Pixel(s)</label>
                                    <select class="form-control" name="pix_id">
                                        @foreach($pixelLists as $pixel)
                                            @if(isset($pixel['id']))
                                                <option value="{{ $pixel['id']}}">{{ $pixel['name']}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="basicSelect">Choose Instagram Account(s)</label>
                                    <select class="form-control" name="ins_id">
                                        @foreach($igLists as $ig)
                                            @if(isset($ig['id']))
                                                <option value="{{ $ig['id']}}">{{ $ig['username']}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-success" >Confirm access</button>
                                </div>

                            </form>


                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- END: Content-->



<div class="sidenav-overlay"></div>
<div class="drag-target"></div>

@include('layouts.footer')


</body>
</html>
