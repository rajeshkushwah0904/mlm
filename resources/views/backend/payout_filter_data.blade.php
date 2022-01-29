  <?php
$i = 1;
?>
  @foreach($distributors as $key=>$distributor)
  @if($distributor->kyc&&($distributor->kyc->status==4))
  <tr>
      <td>{{$i}}</td>
      <td>{{$distributor->kyc->account_holder_name}}</td>
      <td>{{$distributor->kyc->account_number}}</td>
      <td>{{$distributor->kyc->pancard_no}}</td>
      <?php
$level_incomes = 0;
$level_incomes = \App\Income::where('income_type', 1)->where('sponsor_id', $distributor->id)->sum('business_volume');
$level_repurchases = 0;
$level_repurchases = \App\Income::where('income_type', 2)->where('sponsor_id', $distributor->id)->sum('business_volume');
$total = 0;
$total = $level_incomes + $level_repurchases;
$admin_charge = 0;
$admin_charge = $total * 10 / 100;
$gross_amount = 0;
$gross_amount = $total - $admin_charge;
$tds_charge = 0;
$tds_charge = $gross_amount * 10 / 100;
$net_payable_amount = $gross_amount - $tds_charge;
$i = $i + 1;
?>
      <td>{{$level_incomes}}</td>
      <td>{{$level_repurchases}}</td>
      <td>0</td>
      <td>0</td>
      <td>{{$total}}</td>
      <td>{{$admin_charge}}</td>
      <td>{{$gross_amount}}</td>
      <td>{{$tds_charge}}</td>
      <td>{{$net_payable_amount}}</td>
  </tr>
  @endif
  @endforeach