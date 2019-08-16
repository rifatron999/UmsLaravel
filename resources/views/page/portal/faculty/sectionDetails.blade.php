@extends('page.layout.main')

@section('title')
UMS-portal-SectionDetails
@endsection

@section('menubar')
<ul id="menu">
          <!-- put class="selected" in the li tag for the selected page - to highlight which page you're on -->
          <li><a href="/home">Home</a></li>
          <li><a href="/portal">portal</a></li>
          <li><a href="/portal/profile">🚹{{session('username')}}</a></li>
          <li><a href="/portal/faculty/tsf">update TSF</a></li>
          <li class="selected"><a href="{{route('faculty.sectionDetails',$facultyCourseDetails[0]->c_faculty_id )}}">Section Details</a></li>
          <li><a href="/portal/preRegistration">pre registration</a></li>
          <li><a href="/logout">Logout</a></li>
        </ul>
@endsection

@section('site_content')
<div class="sidebar">
        
      </div>
      
        <!-- insert the page content here -->
        

        

  
   
    
<table align="left" cellspacing="10" > 
  <tr >
    @foreach ($facultyCourseDetails as $s) 
    
       
       <td bgcolor="#1bf798"> COURSE: <mark>{{$s->c_faculty_name}}</mark></td>
       <td bgcolor="#c2c0c0">ID: <mark>{{$s->c_faculty_id}}</mark></td>
       <td bgcolor="#22e0e0">SEMESTER: <mark>{{$s->c_faculty_semester}}</mark></td>
       <td bgcolor="#faa693">SECTION: <mark>{{$s->c_faculty_section}}</mark></td>
       <td bgcolor="#64e885">STUDENTs: <mark>{{$s->c_faculty_capacity}}</mark></td>
       
        
        
       @endforeach
   </tr>
    
  
        
        
     
      @endsection