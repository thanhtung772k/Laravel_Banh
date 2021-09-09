@extends('master')
@section('content')
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Contacts</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb font-large">
                <a href="index.html">Home</a> / <span>Contacts</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<div class="container">
    <div id="content" class="space-top-none">
    @if(Session::has('message_sent'))
                    <div>
                        {{Session::get('message_sent')}}
                    </div>
    @else          
        <div class="space50">&nbsp;</div>
        <div class="row">
            <div class="col-sm-8">
                <h2>Liên Hệ</h2>
                <div class="space20">&nbsp;</div>
                <div class="space20">&nbsp;</div>
               
                <form action="{{route('contact.send')}}" method="post" class="contact-form" enctype="multipart/form-data">	
                    @csrf
                    <div class="form-block">
                        <label >Họ Tên*</label>
                        <input name="name" type="text" >
                    </div>
                    <div class="form-block">
                         <label >Email*</label>
                        <input name="email" type="email" >
                    </div>
                    <div class="form-block">
                        <label >Điện Thoại*</label>
                        <input name="phone" type="text" >
                    </div>
                    <div class="form-block">
                        <label >Nội dung*</label>
                        <textarea name="msg" style="width: 86.7%;" ></textarea>
                    </div>
                    <div class="form-block">
                        <button type="submit" class="beta-btn primary">Gửi Tin <i class="fa fa-chevron-right"></i></button>
                    </div>
                </form>
            </div>
          
        </div>
        @endif
    </div> <!-- #content -->
</div> <!-- .container -->

@endsection