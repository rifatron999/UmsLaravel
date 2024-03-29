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
          <li><a href="/portal/faculty/tsf">update TSF</a></li>
          <li><a href="/portal/preRegistration">pre registration</a></li>
          <li><a href="/logout">Logout</a></li>
        </ul>
@endsection

@section('site_content')
<div class="sidebar">
        
      </div>
    
        <!-- insert the page content here -->
        

        <form method="post">

  <table align="center" border="1">
    <tr><td colspan="6">Yours Cources</td></tr>
    <tr align="center">
      <td>COURSE ID</td>
      <td>COURSE NAME</td>
      <td>SEMESTER</td>
      <td>SECTION</td>
      <td>STUDENTs</td>
      <td>ACTION</td>
    </tr>

    @foreach ($facultyCourseList as $s) 
      <tr>
        <td>{{$s->c_faculty_id}}</td>
        <td>{{$s->c_faculty_name}}</td>
        <td>{{$s->c_faculty_semester}}</td>
        <td>{{$s->c_faculty_section}}</td>
        <td>{{$s->c_faculty_capacity}}</td>
        <td>


         <a href="{{route('faculty.sectionDetails',$s->c_faculty_id )}}">ENTER</a>
         
        </td>
      </tr>
       @endforeach
   
    </table>
   
  </form>
        
        
      
      @endsection