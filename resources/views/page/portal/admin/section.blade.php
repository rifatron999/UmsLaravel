@extends('page.layout.main')

@section('title')
UMS-Admin-Section
@endsection

@section('menubar')
<ul id="menu">
          <!-- put class="selected" in the li tag for the selected page - to highlight which page you're on -->
          <li><a href="/home">Home</a></li>
          <li><a href="/portal">portal</a></li>
          <li><a href="/portal/profile">🚹{{session('username')}}</a></li>
          <li ><a href="/portal/admin/verification">verification</a></li>
          <li><a href="/portal/admin/userlist">Valid Users</a></li>       
          <li><a href="/portal/admin/course">Course</a></li>
          <li><a href="/portal/admin/viewtsf">Semester TSFs</a></li>
          <li><a href="/portal/admin/department">Department</a></li>
          <li class="selected"><a href="/portal/admin/section">Current Sections</a></li>
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
     <div class="form_settings">

         <table style="width:100%; border-spacing:2;" border="4">
          <tr><td>Course Name</td><td>Department</td><td>Semester</td><td>Section</td></tr>
          @foreach ($section as $value)
          <tr>
            
             <td><h1>{{$value->c_register_name}}</h1></td>
             <td>{{$value->c_register_dept}}</td>
             <td>{{$value->c_register_semester}}</td>
             <td>{{$value->c_register_section}}</td>

             
            </tr>

          @endforeach

        </table>
        </div>
        




      @endsection


       <style type="text/css">
        textarea {
font: 100% arial; 
  width: 1200px;
  height: 60px;
}

      </style>





