@extends('page.layout.main')

@section('title')
UMS-portal-tsf
@endsection

@section('menubar')
<ul id="menu">
          <!-- put class="selected" in the li tag for the selected page - to highlight which page you're on -->
          <li><a href="/home">Home</a></li>
          <li><a href="/portal">portal</a></li>
          <li><a href="/portal/profile">🚹{{session('username')}}</a></li>
          <li class="selected"><a href="/portal/faculty/tsf">update TSF</a></li>
          <li><a href="{{route('tsfview.index',session('username') )}}">View Tsf</a></li>
          <li><a href="/portal/preRegistration">pre registration</a></li>
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
        
        
       
          <form   method="post">
            <p><textarea placeholder="e.g Sunday #atp3 8-11 #COA1-2 #consulting *"  name="t_sun">{{$tsf[0]->t_sun}}</textarea></p>
            <p><textarea placeholder="e.g Monday #atp3 8-11 #COA1-2 #consulting *" name="t_mon">{{$tsf[0]->t_mon}}</textarea></p>
            <p><textarea placeholder="e.g Tuesday #atp3 8-11 #COA1-2 #consulting " name="t_tue">{{$tsf[0]->t_tue}}</textarea></p>
            <p><textarea placeholder="e.g Wednesday #atp3 8-11 #COA1-2 #consulting " name="t_wed">{{$tsf[0]->t_wed}}</textarea></p>
<div class="form_settings">
            <p ><span></span><input class="submit" type="submit" name="name" value="Update" /></p>
          </form>



            
           
      
        </div>
        
        
      </div>
      @endsection


       <style type="text/css">
        textarea {
          display: block;
    margin-left: auto;
    margin-right: auto;
font: 100% arial; 
  width: 1200px;
  height: 60px;
}

      </style>