@extends('page.layout.main')

@section('title')
UMS-portal-Pre Registration
@endsection

@section('menubar')
<ul id="menu">
          <!-- put class="selected" in the li tag for the selected page - to highlight which page you're on -->
          <li><a href="/home">Home</a></li>
          <li><a href="/portal">portal</a></li>
          <li><a href="/portal/profile">🚹{{session('username')}}</a></li>
          <li><a href="/portal/faculty/tsf">update TSF</a></li>
          <li class="selected"><a href="/portal/preRegistration">pre registration</a></li>
          <li><a href="/logout">Logout</a></li>
        </ul>
@endsection

@section('site_content')
<div class="sidebar">
        
 <font color="red">
        

<div>
    {{session('msg')}}
  </div>
      </font>


      </div>
      
        <!-- insert the page content here -->
        <h1>Pre Registration Faculty <mark>{{session('dept')}}</mark> Department</h1>
       
<!-- table starts -->

<form method="post">

  <table border="1">
    <tr><td colspan="4">Offered Cources</td></tr>
    <tr align="center">
      <td>COURSE NAME</td>
      <td>SEMESTER</td>
      <td>SECTION</td>
      <td>ACTION</td>
    </tr>

    @foreach ($facReg as $s) 
      <tr>
        <td>{{$s->c_register_name}}</td>
        <td>{{$s->c_register_semester}}</td>
        <td>{{$s->c_register_section}}</td>
        <td>


         <a href="{{route('preReg.updateFaculty',$s->c_register_id )}}">Select</a>
         
        </td>
      </tr>
       @endforeach
   
    </table>
   
  </form>

  




<!-- table ends -->



        
        
     
      @endsection