<?php

$segments_var = '';
$segments_var = Request::segments();

$segments_var[0];
$segments_var[1];
$testerere= Config::get('app.locales');
$testerere[0];
App::setLocale($testerere[0]);
Config::get('app.timezone');
$dem_menu= pagePermissionView($result);
$array_menu= explode(',', $dem_menu);
if($segments_var[2]=='edit')
{
  unset($segments_var[1]); 
  
}

?>

<?php 
if($segments_var[0]=='registers')
{ ?>
   @include('layouts.app')
<?php }else {

if(is_numeric(end($segments_var)) && empty($segments_var[2]) && $segments_var[0]=='users' || $segments_var[0]=='registers')
{
  ?>  
    
                   @include('layouts.app')


<?php } else { ?>

                    <?php if($segments_var[1]=='previous')
                    { ?>
                    @include('layouts.app')
                    <?php } else { ?>
                    

                                    <?php if($segments_var[2]=='edit')
                                    { ?>

                                                    <?php if(in_array($segments_var[0],$array_menu) && in_array($segments_var[2],$array_menu))
                                                    { ?>
                                                    @include('layouts.app')
                                                    <?php } else { ?>
                                                    @include('errors.404')
                                                    <?php } ?>
                                    <?php } else { ?>
                                                    <?php if($segments_var!='' && $segments_var[1]!='')
                                                    { ?>
                                                            <?php if(in_array($segments_var[0],$array_menu) && in_array($segments_var[1],$array_menu))
                                                            { ?>
                                                            @include('layouts.app')
                                                            <?php } else { ?>
                                                            @include('errors.404')
                                                            <?php } ?>
                                                    <?php } else { ?>
                                                    @include('layouts.app')
                                                    <?php } ?>
                                    
                                    <?php } ?>
                    <?php } ?>
<?php } ?>
<?php } ?>