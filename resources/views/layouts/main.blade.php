<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
<title>@yield('title')</title>

<!-- General CSS Files -->
<link rel="stylesheet" href="{{asset('modules/bootstrap/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('modules/fontawesome/css/all.min.css')}}">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="{{asset('js/jquery-ui-1.12.1/jquery-ui.css')}}">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<!-- CSS Libraries -->

<!-- Template CSS -->
<link rel="stylesheet" href="{{asset('css/style.css')}}">
<link rel="stylesheet" href="{{asset('css/preload.css')}}">
<link rel="stylesheet" href="{{asset('css/components.css')}}">
<!-- Start GA -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
<script>
window.dataLayer = window.dataLayer || [];
function gtag(){dataLayer.push(arguments);}
gtag('js', new Date());

gtag('config', 'UA-94034622-3');
</script>
<!-- /END GA --></head>

<body id="page-top">
    <div class="preloader">
        <div class="loading">
            <img src="{{url('img/loading.gif')}}" width="80">
            <p class="text-center">Loading...</p>
        </div>
    </div>
<div id="app">
    <div class="main-wrapper main-wrapper-1">
        @include('templates.navbar')
        <!-- sidebar -->
        @if (Auth::user()->role==0)
            @include('templates.sidebar.sidebar-admin')
        @endif
        @if (Auth::user()->role==1)
            @include('templates.sidebar.sidebar-operator-surat')
        @endif
        @if (Auth::user()->role==2)
            @include('templates.sidebar.sidebar-operator-kepegawaian')
        @endif
        @if (Auth::user()->role==3)
            @include('templates.sidebar.sidebar-user-disposisi')
        @endif
        <!-- endsidebar -->

        <!-- Main Content -->
        <div class="main-content">
            @yield('content')
        </div>
        
        @include('templates.footer')
    </div>
</div>

<!-- General JS Scripts -->
<script src="{{asset('modules/jquery.min.js')}}"></script>
<script src="{{asset('modules/popper.min.js')}}"></script>
<script src="{{asset('modules/tooltip.min.js')}}"></script>
<script src="{{asset('modules/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('modules/nicescroll/jquery.nicescroll.min.js')}}"></script>
<script src="{{asset('modules/moment.min.js')}}"></script>
<script src="{{asset('js/stisla.js')}}"></script>
<script src="{{asset('js/preload.js')}}"></script>

<!-- JS Libraies -->

<!-- Page Specific JS File -->

<!-- Template JS File -->
<script>
$(function(){
    $(".datepicker").datepicker({
        dateFormat: "dd-mm-yy",
        changeMonth: true,
        changeYear: true,
        yearRange: "-70:+40"
        
    });
});
</script>
<script src="{{asset('js/scripts.js')}}"></script>
<script src="{{asset('js/custom.js')}}"></script>
<script src="{{asset('js/jquery-ui-1.12.1/jquery-ui.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
{{-- global script untuk search nip/nama pegawai middleware admin --}}
<script>
    $('.search-input-admin').on('keyup',function(){
            
            var _data = $(this).val();
            if (_data.length > 3) {
                
                $.ajax({
                        url: '{{route('data-pegawai.search')}}',
                        data:{
                            data:_data
                        },
                        method : 'GET',
                        beforeSend:function(){
                            $('.search-result-admin').html('mohon tunggu');
                        },
                        success:function(res){
                            $('.search-result-admin').html(res).fadeIn();
                        },
                    });
                    $(document).on('click','a',function(){
                    $('#nip_pegawai').val($(this).text());
                    $('.search-result-admin').fadeOut();
                });    
            } else {
                $('.search-result-admin').fadeOut();
            }
        });
</script>

{{--global script untuk search nip/nama pegawai middleware operator kepegawaian --}}
<script>
    $('.search-input').on('keyup',function(){
            
            var _data = $(this).val();
            if (_data.length > 3) {
                
                $.ajax({
                        url: '{{route('operator-kepegawaian.search')}}',
                        data:{
                            data:_data
                        },
                        method : 'GET',
                        beforeSend:function(){
                            $('.search-result').html('mohon tunggu');
                        },
                        success:function(res){
                            $('.search-result').html(res).fadeIn();
                        },
                    });
                    $(document).on('click','a',function(){
                    $('#nip_pegawai').val($(this).text());
                    $('.search-result').fadeOut();
                });    
            } else {
                $('.search-result').fadeOut();
            }
        });
</script>

@stack('custom-js')
@stack('script-tambahanakhir')

</body>
</html>