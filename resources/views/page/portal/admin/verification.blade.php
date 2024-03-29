@extends('page.layout.main')

@section('title')
UMS-Admin-Verification
@endsection

@section('menubar')
<ul id="menu">
          <!-- put class="selected" in the li tag for the selected page - to highlight which page you're on -->
          <li><a href="/home">Home</a></li>
          <li><a href="/portal">portal</a></li>
          <li><a href="/portal/profile">🚹{{session('username')}}</a></li>
          <li class="selected"><a href="/portal/admin/verification">verification</a></li>
          <li><a href="/portal/admin/userlist">Valid Users</a></li>
          <li><a href="/portal/admin/course">Course</a></li>
          <li><a href="/portal/admin/viewtsf">Semester TSFs</a></li>
          <li><a href="/portal/admin/department">Department</a></li>
          <li><a href="/portal/admin/section">Current Sections</a></li>
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
          <tr><td>ID</td><td>Name</td><td>User Type</td><td>Gender</td><td>Phone</td><td>Action</td></tr>
          @foreach ($verification as $value)
          <tr>
            <td>{{$value->ut_id}}</td>
             <td>{{$value->ut_name}}</td>
             <td><h1>{{$value->ut_type}}</h1></td>
             <td>{{$value->ut_gender}}</td>
             <td>{{$value->ut_phone}}</td>
             <td><a href="{{route('admin.verification.delete',$value->ut_id )}}">Delete <a href="{{route('admin.updateAdmin',$value->ut_id )}}">Add</td>
            
             
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





