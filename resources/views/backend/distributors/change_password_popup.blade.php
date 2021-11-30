 <div class="row">

     <div class="col-md-12">
         {!!Form::open(['route'=>['myaccount.changepassword'],'files'=>true,'class'=>'form-horizontal'])!!}
         {{csrf_field()}}

         <div class="card card-default">
             <div class="card-header">
                 <button type="button" class="close" data-dismiss="modal">&times;</button>
                 <h3 class="card-title">Change Password For {{$distributor->name}}</h3>
             </div>

             <input type="hidden" name="distributor_id" value="{{$distributor->id}}">
             <div class="card-body">
                 <div class="form-group">
                     <label for="exampleInputEmail1">Old Password</label>
                     <input type="password" name="old_password" value="{{old('old_password')}}" class="form-control"
                         id="exampleInputEmail1" placeholder="Old Password" Required>
                 </div>
                 <div class="form-group">
                     <label for="exampleInputEmail1">New Password</label>
                     <input type="password" name="new_password" class="form-control" value="{{old('new_password')}}"
                         id="exampleInputEmail1" placeholder="Enter New Password" Required>
                 </div>
                 <div class="form-group">
                     <label for="exampleInputEmail1">Retype Password</label>
                     <input type="password" name="renew_password" class="form-control" value="{{old('renew_password')}}"
                         id="exampleInputEmail1" placeholder="Enter Retype Password" Required>
                 </div>
                 <div class="row">
                     <center>
                         <div class="col-md-8 col-md-offset-4">
                             <button type="submit" class="btn btn-primary">
                                 Submit
                             </button>
                         </div>
                     </center>
                 </div>
             </div>
         </div>

         {!!Form::close()!!}
     </div>
 </div>