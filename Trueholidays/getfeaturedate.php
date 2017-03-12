<?php

	echo$chkdate=$_GET['chkdate'];
	if($chkdate=='Yes')
	{
		echo'<div id="featureddate"><div class="form-group">
                 <label class="col-md-3 col-md-offset-1 control-label" for="example-email">Featured Start Date:</label>
                <div class="col-md-6">
                   <input type="text" name="txtfeaturedstartdate" value="<?php date_default_timezone_set("Asia/Kolkata"); echo date("m/d/Y");?>" id="nowdate" class="form-control" required="true" readonly>
                </div>
            </div>
             <div class="form-group">
                 <label class="col-md-3 col-md-offset-1 control-label" for="example-email">Featured Start Date:</label>
                <div class="col-md-6">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="mm/dd/yyyy" id="datepicker-autoclose" name="txtfeaturedenddate" onchange="checkdate(this.value);" required="true">
                        <span class="input-group-addon bg-custom b-0"><i class="mdi mdi-calendar text-white"></i></span>
                    </div><!-- input-group -->
                </div>
            </div>
            </div>';
	}
	else
	{

	}
 ?>