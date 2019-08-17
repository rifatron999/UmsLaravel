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
          <li><a href="/portal/admin/department">Department</a></li>
          <li class="selected"><a href="/portal/admin/course">Course</a></li>
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
            <p><span>Course Code</span><input placeholder="The Course code should be unique" class="contact" type="text" name="c_code" value="" ></p>
            <p><span>Course Name</span><input placeholder="The Course name should be unique" class="contact" type="text" name="c_name" value="" ></p>
            <p><span>Secton</span><input placeholder="The Section name" class="contact" type="text" name="c_section" value="" ></p>
            <p><span>Semester</span><input placeholder="The Current Semester name" class="contact" type="text" name="c_semester" value="" ></p>
        
            <p ><span></span><input class="submit" type="submit" name="name" value="Submit" ></p>


         <table style="width:100%; border-spacing:2;" border="4">
          <tr><td>Code</td><td>Course Name</td><td>Section</td><td>Semester</td></tr>
          @foreach ($course as $value)
          <tr>
            <td>{{$value->c_code}}</td>
             <td>{{$value->c_name}}</td>
             <td>{{$value->c_section}}</td>
             <td>{{$value->c_semester}}</td>
           
            
             
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