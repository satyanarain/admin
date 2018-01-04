<section class="content">

      <div class="row">
          <div class="col-md-3">

              <!-- Profile Image -->
              <div class="box box-primary" style="min-width:10%;">
                  <div class="box-body box-profile" style="padding:8px 0 1px 1px;">
                      @include('partials.include')
                      <input type="hidden" id="user_id" value="{{ $shifts->id }}">
                      <h3 class="profile-username text-center cursor-pointer" id="user_name">
                          <span id="user-name-span"></span> 
<!--                          <span id="edit-user-name" class="glyphicon glyphicon-pencil"></span>-->
                      </h3>
                        <p class="text-muted text-center"></p>
                       <table width=90% class="table table-responsive">
                          <tr>
                              <td style="text-align:left;padding-left:10%;padding-top:3%;"><b>Shift</b></td>
                              <td style="text-align:left;padding-left:15%;padding-top:3%; "><span></span>{{ $shifts->shift }}</span></td>
                          </tr>
                          <tr>
                              <td style="text-align:left;padding-left:10%;padding-top:3%;"><b>Abbreviation</b></td>
                              <td style="text-align:left;padding-left:15%;padding-top:3%; "><span></span>{{ $shifts->abbreviation }}</span></td>
                          </tr>
                          <tr>
                              <td style="text-align:left;padding-left:10%;padding-top:3%;"><b>Start Date</b></td>
                              <td style="text-align:left;padding-left:15%;padding-top:3%; "><span></span>{{ $shifts->start_date }}</span></td>
                          </tr>
                          <tr>
                              <td style="text-align:left;padding-left:10%;padding-top:3%;"><b>End Date</b></td>
                              <td style="text-align:left;padding-left:15%;padding-top:3%; "><span></span>{{ $shifts->end_date }}</span></td>
                          </tr>
                          <tr>
                              <td style="text-align:left;padding-left:10%;padding-top:3%;"><b>Order Number</b></td>
                              <td style="text-align:left;padding-left:15%;padding-top:3%; "><span></span>{{ $shifts->order_number }}</span></td>
                          </tr>
                          <tr>
                              <td style="text-align:left;padding-left:10%;padding-top:3%;"><b>System Id</b></td>
                              <td style="text-align:left;padding-left:15%;padding-top:3%; "><span></span>{{ $shifts->system_id }}</span></td>
                          </tr>
                          
                      </table>
                       </ul>
                      </div>
                  <!-- /.box-body -->

              </div>
          <!-- /.box -->

        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
            
            @if($shifts->user_type == 1 || $shifts->user_type == 4 || $shifts->user_type == 9)
              	<li class="active"><a href="#travel_detail" data-toggle="tab">Travel Profile</a></li>
              	<li><a href="#bank_detail" data-toggle="tab">Bank Details</a></li>
            @endif
            {{--@if(Entrust::hasRole('administrator'))
            	<li class="active"><a href="#travel_detail" data-toggle="tab">Travel Profile</a></li>
              	<li><a href="#bank_detail" data-toggle="tab">Bank Details</a></li>
            @endif
            @if(Entrust::hasRole('associate_user'))
              	<!-- <li class="active"><a href="#travel_detail" data-toggle="tab">Travel Profile</a></li> -->
              	<!-- <li><a href="#bank_detail" data-toggle="tab">Bank Details</a></li> -->
            @endif
            @if(Entrust::hasRole('client_user'))
              	<!-- <li class="active"><a href="#travel_detail" data-toggle="tab">Travel Profile</a></li>
              	<li><a href="#bank_detail" data-toggle="tab">Bank Details</a></li> -->
            @endif
            
            @if(Entrust::hasRole('kipg_general_user'))
              	<li class="active"><a href="#travel_detail" data-toggle="tab">Travel Profile</a></li>
              	<li><a href="#bank_detail" data-toggle="tab">Bank Details</a></li>
            @endif--}}
            
            </ul>
            <div class="tab-content">
	        	@if($shifts->user_type == 1 || $shifts->user_type == 4 || $shifts->user_type == 9)
		        	   <div class="active tab-pane" id="travel_detail">
	                  	@include('users.travel')    
	              	</div>
	              	<div class="tab-pane" id="bank_detail">
	                  	@include('users.bank_detail')
	                </div>
            @endif
            {{--@if(Entrust::hasRole('kipg_general_user'))
              	<div class="active tab-pane" id="travel_detail">
                  	@include('users.travel')    
              	</div>
              	<div class="tab-pane" id="bank_detail">
                		@include('users.bank_detail')
              	</div>
            @endif--}}
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>