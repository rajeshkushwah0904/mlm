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
                     <a class="dropdown-item" href="http: //distributor.{{$domain_name}}/distributors/as_login
?distributor_tracking_id={{$distributor->distributor_tracking_id}}" target="_blank">Login as a Distributor</a>
                 </li>
                 <li>
                     <a class="dropdown-item" onclick="change_password_function({{$distributor->id}});"
                         href="javascript:void(0);">Change
                         Password</a>
                 </li>
                 @if($distributor->status==2)
                 <li>
                     <a class="dropdown-item"
                         href="{{route('backend.distributors.activate',$distributor->id)}}">Unblock</a>
                 </li>
                 @else
                 <li>
                     <a class="dropdown-item" href="{{route('backend.distributors.block',$distributor->id)}}">Block</a>
                 </li>
                 @endif

                 <li>
                     <a class="dropdown-item"
                         href="{{route('backend.genealogy_tree')}}?distributor_id={{$distributor->id}}">Tree</a>
                 </li>
             </ul>
         </div>
     </td>
     <td>
         @if($distributor->status==2)
         Block
         @else
         @if($distributor->package)
         Activate
         @else
         Free
         @endif
         @endif
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
     <td>@if($distributor->kyc)
         @if($distributor->kyc->status==1)
         <button class="btn btn-sm btn-info">Waiting For Approvel</button>
         @elseif($distributor->kyc->status==2)
         <button class="btn btn-sm btn-danger">Reject By Admin</button>
         @elseif($distributor->kyc->status==3)
         <button class="btn btn-sm btn-primary">Resend For Approvel</button>
         @elseif($distributor->kyc->status==4)
         <button class="btn btn-sm btn-success">Approved By Admin</button>
         @endif
         @else
         <button class="btn btn-sm btn-danger">Not Submitted</button>
         @endif
     </td>
     <td>
         @if($distributor->package)
         {{$distributor->package->package_name}}
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