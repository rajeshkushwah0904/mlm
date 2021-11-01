 @foreach($distributors as $key=>$distributor)
 <tr>
     <td>{{$key+1}}</td>
     <td>
         <div class="btn-group">
             <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                 <i class="fa fa-list"></i>
             </button>
             <ul class="dropdown-menu">
                 <li>
                     <a class="dropdown-item" href="http://distributor.mlmproject.testing/distributors/as_login
?distributor_tracking_id={{$distributor->distributor_tracking_id}}" target="_blank">Login as a Distributor</a>
                 </li>

             </ul>
         </div>
     </td>
     <td>{{$distributor->joining_date}}</td>
     <td>{{$distributor->activate_date}}</td>
     <td>{{$distributor->distributor_tracking_id}}</td>
     <td>{{$distributor->name}}</td>
     <td>{{$distributor->mobile}}</td>
     <td></td>
     @if($distributor->my_sponsor)
     <td>{{$distributor->my_sponsor->distributor_tracking_id}}</td>
     <td>{{$distributor->my_sponsor->name}}</td>
     <td>{{$distributor->my_sponsor->mobile}}</td>
     @else
     <td></td>
     <td></td>
     <td></td>
     @endif
     <td></td>
     <td>
         @if($distributor->package)
         {{$distributor->package->package_name}}
         @else
         Free
         @endif
     </td>
     <td>
         @if($distributor->package)
         Activate
         @else
         Free
         @endif
     </td>
     <td>
         @if($distributor->package)
         {{$distributor->package->amount}}
         @else
         Free
         @endif
     </td>

 </tr>
 @endforeach