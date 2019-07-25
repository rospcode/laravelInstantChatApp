@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-7 col-md-offset-3">
          <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>


<div class="container">
    <div class="row">
        <div class="col-md-5">
            <div class="panel panel-primary">
                <div class="panel-heading" id="accordion">
                    <span class="glyphicon glyphicon-comment"></span> {{ $user->name}}
                    <div class="btn-group pull-right">
                        <a type="button" class="btn btn-default btn-xs" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                            <span class="glyphicon glyphicon-chevron-down"></span>
                        </a>
                    </div>
                </div>
            <div class="panel-collapse collapse" id="collapseOne">
                <div class="panel-body" id="panel">
                    <ul class="chat" id="chat">

                    </ul>
                </div>
                <div class="panel-footer">
                    <div class="input-group">
                        <input id="btn-input" type="text" class="form-control input-sm" placeholder="Type your message here..." />
                        <span class="input-group-btn">
                            <button class="btn btn-warning btn-sm" id="btn-chat">
                                Send</button>
                        </span>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
  </div>
        </div>
    </div>
</div>
@endsection
@section('notifications')
  @if (session('msg'))

<script type="text/javascript">

$(document).ready(function() {
    setTimeout(function() {
        toastr.options = {
            closeButton: true,
            progressBar: true,
            showMethod: 'slideDown',
            timeOut: 4000
        };
        toastr.success('Successfully', "{{ session('msg') }}");

    }, 1300);
  });

    </script>
@endif
    @endsection
@section('script')


 <script type="text/javascript">

 $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});



 $(function(){
   $("#btn-chat").click(function(){
   let message = $("#btn-input").val();
   var id = {{ $user->id }};
   var idd = {{auth()->user()->id}};

   if(message != ""){

     document.getElementById("btn-input").value =  "";
     $.ajax({
  type: "POST",
  url: "{{ route('sendmessage') }}",
  data: { message: message, id: id},
  success: function(response){

  },error: function(data){
  console.log(data);
   }
   });
   }
   });

 });


 var pusher = new Pusher('19ea9d89182fa1adb1f0', {
   cluster: 'us2',
   forceTLS: true
 });
 var channel = pusher.subscribe('my-channel');
 channel.bind('my-event', function(data) {
    var strip = data.date.date.split(".");

    if({{auth()->user()->id}} == data.user){
      $("#chat").append("<li class='left clearfix'><span class='chat-img pull-left'><img src='http://placehold.it/50/55C1E7/fff&text=U' alt='User Avatar' class='img-circle' />  </span><div class='chat-body clearfix'><div class='header'><strong class='primary-font'>{{ $user->name }}</strong> <small class='pull-right text-muted'><span class='glyphicon glyphicon-time'></span>"+humanized_time_span(strip[0])+"</small></div><p>"+data.message+"</p></div></li>");
    }else if({{auth()->user()->id}} == data.from){
        $("#chat").append("<li class='right clearfix'><span class='chat-img pull-right'><img src='http://placehold.it/50/FA6F57/fff&text=ME' alt='User Avatar' class='img-circle' /></span><div class='chat-body clearfix'><div class='header'><small class=' text-muted'><span class='glyphicon glyphicon-time'></span>"+humanized_time_span(strip[0])+"</small><strong class='pull-right primary-font'>Me</strong></div><p>"+data.message+"</p></div></li>");
    }

    var element = document.getElementById("panel");
    element.scrollTop = element.scrollHeight;
 });
 </script>
@endsection
