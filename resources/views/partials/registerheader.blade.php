<section class="content">

    <div class="row">
        <div class="col-md-3">

            <!-- Profile Image -->
            <div class="box box-primary" style="min-width:10%;">
                <div class="box-body box-profile" style="padding:8px 0 1px 1px;">
                    <div>

                        <input type="hidden" id="user_id" value="{{ $value->id }}">
                        <table width=90% class="table table-responsive">
                            <tr>
                                <td>Name</td>
                                <td class="table_normal">{{ $value->name }}</td>
                            </tr>
                            <tr>
                                <td>Phone</td>
                                <td class="table_normal">+{{ $value->country_code }}-{{ $value->phone }}</td>
                            </tr>
                            <tr>
                            <tr>
                                <td>Email</td>
                                <td class="table_normal">{{ $value->email }}</td>
                            </tr>
                            </tr>
                        </table>


                        </ul>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

            </div>
        </div>
        <!-- /.col -->
        <div class="col-md-9">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">

                    <li class="active"><a href="#travel_detail" data-toggle="tab">User Details</a></li>

                </ul>
                <div class="tab-content" >
                    <table width=90% class="table table-responsive" style="border-top:none;">
                        <tr>
                            <td>Country</td>
                            <td class="table_normal">

                                {{ displayView($value->country) }}

                            </td>
                        </tr>
                        <tr>
                        <tr>
                            <td>State</td>
                            <td class="table_normal">{{ displayView($value->state) }}</td>
                        </tr>
                        <tr>
                            <td>City</td>
                            <td class="table_normal">{{ displayView($value->city) }}</td>
                        </tr>
                        <tr>
<!--                         <tr>
                            <td>Country Code</td>
                            <td class="table_normal">{{ displayView($value->country) }}</td>
                        </tr>-->
                        <tr>
                        <tr>
                            <td>IP Address</td>
                            <td class="table_normal">{{$value->ip_address }}</td>
                        </tr>

                        <tr>
                            <td><b>Created At</b></td>
                            <td class="table_normal">{{ dateViewWithTime($value->created_at) }}</td>
                        </tr>

                    </table>
                </div>
                <!-- /.tab-content -->
            </div>
            <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

</section>