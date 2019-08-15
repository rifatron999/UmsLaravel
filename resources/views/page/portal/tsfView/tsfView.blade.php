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
          <li><a href="/portal/faculty/tsf">update TSF</a></li>
          <li class="selected"><a href="{{route('tsfview.index',session('username') )}}">View Tsf</a></li>
          <li><a href="/logout">Logout</a></li>
        </ul>
@endsection

@section('site_content')

      




        
       
   
        <?php
            $t_sun = preg_split ("/#/", $tsf[0]->t_sun);
            $t_mon = preg_split ("/#/", $tsf[0]->t_mon);
            $t_tue = preg_split ("/#/", $tsf[0]->t_tue);
            $t_wed = preg_split ("/#/", $tsf[0]->t_wed);
       ?>
<table align="center" cellspacing="15" class='pre_split'> 
  
  <tr bgcolor="#c2c0c0"> 
    <td>DAY</td>
    <td colspan="2" ><font color="white"><strong>TSF<sub>of</sub> : </strong></font><mark>
      {{$tsf[0]->t_name}}</mark></td> 
  </tr>
  
  <tr bgcolor="#1bf798">
      <?php
foreach ($t_sun as $value) {
  
  echo "<td class='pre_split'>".$value."</td>";
}
       ?>

       </tr>





       <tr bgcolor="#1bf7f7" >
      <?php
foreach ($t_mon as $value) {
  
  echo "<td class='pre_split'>".$value."</td>";
}
       ?>

       </tr> 


       <tr bgcolor="#faa693">
      <?php
foreach ($t_tue as $value) {
  
  echo "<td class='pre_split'>".$value."</td>";
}
       ?>

       </tr> 


       <tr bgcolor="#f285d9" >
      <?php
foreach ($t_wed as $value) {
  
  echo "<td class='pre_split'>".$value."</td>";
}
       ?>

       </tr>





</table>






            

           



            
           
      
       
        
        
      
      @endsection