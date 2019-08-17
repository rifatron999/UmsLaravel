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
          <li><a href="/portal/admin/verification">User Verification</a></li>
          <li class="selected"><a href="/portal/admin/department">Department</a></li>
          <li><a href="/portal/admin/course">Course</a></li>
          <li><a href="/portal/admin/userlist">Valid Users</a></li>
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
        
        
      <div class="form_settings"> 
          <form   method="post">
            <p><h1><span>Department Name</span><input placeholder="The Department name should be unique" class="contact" type="text" name="d_name" value="" ></h1></p>
            <p><input class="submit" type="submit" name="name" value="Submit" /></p>


         <table style="width:100%; border-spacing:2;" border="4">
          <tr><td>ID</td><td>Department Name</td></tr>
          @foreach ($department as $value)
          <tr>
            <td>{{$value->d_id}}</td>
             <td>{{$value->d_name}}</td>
           
            
             
            </tr>

          @endforeach

        </table>
        </div>


        
        
      </div>
      @endsection


       <style type="text/css">
        textarea {
font: 100% arial; 
  width: 1200px;
  height: 60px;
}

      </style>