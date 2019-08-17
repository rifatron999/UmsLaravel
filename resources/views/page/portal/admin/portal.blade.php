@extends('page.layout.main')

@section('title')
UMS-portal
@endsection

@section('menubar')
<ul id="menu">
          <!-- put class="selected" in the li tag for the selected page - to highlight which page you're on -->
          <li><a href="/home">Home</a></li>
          <li class="selected"><a href="/portal">portal</a></li>
          <li><a href="/portal/profile">🚹{{session('username')}}</a></li>
          <li><a href="/portal/admin/verification">User Verification</a></li>
          <li><a href="/portal/admin/department">Department</a></li>
          <li><a href="/portal/admin/course">Course</a></li>
          <li><a href="/portal/admin/userlist">Valid Users</a></li>
          <li><a href="/logout">Logout</a></li>
        </ul>
@endsection

@section('site_content')
<div class="sidebar">
        
      </div>
      <div id="content">
        <!-- insert the page content here -->
        <h1>portal view for admin</h1>
        {{session('type')}} : {{session('username')}}
        
        
      </div>
      @endsection