@include("template/header")

@if(Session::has('message'))
    {{ Session::get('success_message')}}
@else
    {{ Session::get('error_message')}}
@endif
<br>
@if(!empty($data))
    Hey, {{{ $data['name']}}}
    <img src="{{ $data['photo']}}"/>
    <br>
    Your email is {{ $data['email']}}
    <br>
@else
<span>Login if you have a  <a href="login/fb">facebook account</a>?</span>
@endif
    </body>
@include("template/footer")
</html>
