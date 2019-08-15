@extends('page.layout.main')

@section('title')
UMS-portal-tsf
@endsection

@section('menubar')
<ul id="menu">
          <!-- put class="selected" in the li tag for the selected page - to highlight which page you're on -->
          <li><a href="/home">Home</a></li>
          <li><a href="/portal">portal</a></li>
          <li><a href="">🚹{{session('username')}}</a></li>
          <li class="selected"><a href="/portal/faculty/tsf">update TSF</a></li>
          <li><a href="contact.html">page3</a></li>
          <li><a href="/logout">Logout</a></li>
        </ul>
@endsection

@section('site_content')
<div class="sidebar">
        
 <font color="red">
        @foreach($errors->all() as $err)
  ⚠️{{$err}} <br>
@endforeach

<div>
    {{session('msg')}}
  </div>
      </font>





</div>
      <div id="content">
        
        <form  method="post">
          <div class="form_settings">

            <p><textarea placeholder="e.g Sunday #atp3 8-11 #COA1-2 #consulting *"  name="t_sun">{{$tsf[0]->t_sun}}</textarea></p>
            <p><textarea placeholder="e.g Monday #atp3 8-11 #COA1-2 #consulting *" name="t_mon">{{$tsf[0]->t_mon}}</textarea></p>
            <p><textarea placeholder="e.g Tuesday #atp3 8-11 #COA1-2 #consulting " name="t_tue">{{$tsf[0]->t_tue}}</textarea></p>
            <p><textarea placeholder="e.g Wednesday #atp3 8-11 #COA1-2 #consulting " name="t_wed">{{$tsf[0]->t_wed}}</textarea></p>
            
            <p ><span></span><input class="submit" type="submit" name="name" value="Submit" /></p>
          </div>
        </form>
        
        
      </div>
      @endsection