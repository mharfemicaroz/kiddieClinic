
<!-- =============================================== -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-world"></i>
        </div>
        <div class="header-title">
            <h1><?php echo display('edit_patient'); ?></h1>
            <small><?php echo display('edit_patient'); ?></small>
            <ol class="breadcrumb">
                
                <li class="active"><a href="<?php echo base_url();?>admin/doctor/Dashboard"><?php echo display('deashbord');?></a></li>
            </ol>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
    
    <div class="row">
    <!--  form area -->
        <div class="col-sm-12">

            <?php 
                $msg = $this->session->flashdata('message');
                  if($msg !=''){
                      echo $msg;
                  }
                  if($this->session->flashdata('exception')!=""){
                     echo $this->session->flashdata('exception');
                }
            ?>

            <div  class="panel panel-bd panel-form">
                <div class="panel-heading">
                    <div class="panel-title" >
                        <h4><?php echo display('edit_patient')?> </h4>
                    </div>
                </div>

                <div class="panel-body">
                    <div class="portlet-body form">
                        <?php 
                            $attributes = array('role'=>'form','name'=>'ed_p');
                            echo form_open_multipart('admin/doctor/Patient_controller/edit_save_patient', $attributes);                
                        ?>
                        
                        <div class="form-body">
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label class=" control-label"> <?php echo display('title')?> </label>
                                    <div class="">
                                        <input type="text" name="title" class="form-control" value="<?php echo @$patient_info->title;?>"  placeholder="title" > 
                                    </div>
                                </div>

                                <div class="form-group col-md-4">
                                    <label class="control-label"> <?php echo display('family_name')?> </label>
                                    <div class="">
                                        <input type="text" name="family_name" class="form-control" value="<?php echo @$patient_info->family_name;?>"  placeholder="Family Name" > 
                                    </div>
                                </div>

                                <div class="form-group col-md-4">
                                    <label class="control-label"> <?php echo display('given_name')?> </label>
                                    <div class="">
                                        <input type="text" name="given_name" class="form-control" value="<?php echo @$patient_info->given_name;?>" placeholder="Given Name" > 
                                    </div>
                                </div>
                            </div>

                            <div class="row">

                                <input type="hidden" name="patient_id" class="form-control" value="<?php echo @$patient_info->patient_id; ?>"> 
                              
                                <div class="form-group col-md-4">
                                    <label class=" control-label"> <?php echo display('sex');?></label>
                                    <div class="">
                                        <input type="radio" id="checkbox2_5" name="gender" <?php echo ($patient_info->sex=='Male')?'checked':'' ?> required value="Male">
                                        <label for="checkbox2_5"> <?php echo display('male');?></label>
                                        <input type="radio" id="checkbox2_10" name="gender" required <?php echo ($patient_info->sex=='Female')?'checked':'' ?> value="Female">
                                        <label for="checkbox2_10"> <?php echo display('female');?></label>

                                        <input type="radio" id="checkbox2_0" name="gender" required <?php echo ($patient_info->sex=='other')?'checked':'' ?> value="other">
                                        <label for="checkbox2_0"> <?php echo display('others');?></label>
                                    </div>
                                </div>

                                <div class="form-group col-md-4">
                                    <label class=" control-label"><?php echo display('birth_date'); ?></label>
                                    <div class=" ">
                                       <input type="text" name="birth_date" value="<?php echo @$patient_info->birth_date;?>" class="form-control datepicker1 birth_date"  placeholder="<?php echo display('date_placeholder'); ?>">
                                    </div>
                                    <div class="">
                                       <input type="text" name="old" id="old" class="form-control" placeholder="<?php echo display('age'); ?>">
                                    </div>
                                </div>

                                
                            </div>

                            <div class="row">


                                <div class="form-group col-md-4">
                                    <label class=" control-label"> <?php echo display('phone_number'); ?></label>
                                    <div class="">
                                        <input type="text" name="phone" value="<?php echo @$patient_info->patient_phone;?>" class="form-control" required placeholder="<?php echo display('phone_number'); ?>"> 
                                        <span class="text-danger"><?php echo form_error('phone'); ?></span>
                                    </div>
                                </div>

                                <div class="form-group col-md-4">
                                    <label class=" control-label"> <?php echo display('mobile')?></label>
                                    <div >
                                        <input type="text"  name="mobile_number" value="<?php echo @$patient_info->mobile_number;?>" class="form-control" required placeholder="Mobile Number"> 
                                        
                                    </div>
                                </div>

                              
                           </div> 

                           <div class="row">

                               <div class="form-group col-md-8">
                                <label class="control-label"> <?php echo display('address')?></label>
                                    <div class="">
                                         <textarea name="address" id="editor1"  class="form-control" rows="3"><?php echo @$patient_info->address;?></textarea>
                                    </div>
                                </div>

                                <div class="form-group col-md-4">
                                    <label class=" control-label"> <?php echo display('suburb')?></label>
                                    <div class="">
                                        <input type="text" value="<?php echo @$patient_info->suburb;?>" name="suburb" class="form-control">       
                                    </div>
                                </div>

                           </div>


                        <div class="row">

                            <div class="form-group col-md-4">
                                <label class="" control-label"><?php echo display('post_code')?></label>
                                <div class="">
                                    <input type="text" value="<?php echo @$patient_info->post_code;?>" class="form-control" name="post_code">       
                                </div>
                            </div> 

                           <div class="form-group col-md-4">
                                    <label class="control-label"><?php echo display('blood_group'); ?> </label>
                                    <div class="">
                                        <select class="form-control" name="blood_group">
                                            <option value=''>--Select Blood Group--</option>
                                            <option value='A+'>A+</option>
                                            <option value='A-'>A-</option>
                                            <option value='B+'>B+</option>
                                            <option value='B-'>B-</option>
                                            <option value='O+'>O+</option>
                                            <option value='O-'>O-</option>
                                            <option value='AB+'>AB+</option>
                                            <option value='AB-'>AB-</option>
                                            <option value='Unknown'>Unknown</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group col-md-4">
                                    <label class="" control-label"><?php echo display('picture'); ?></label>
                                    <div class="">
                                        <input type="file" name="picture">       
                                    </div>
                                </div>    

                                
                            </div>    

                                
                            </div>

                            <fieldset>
                                <label> <h2><?php echo display('emergency_contact')?></h2></label>

                                <div class="row">

                                    <div class="form-group col-md-4">
                                        <label class="control-label"> <?php echo display('title')?> </label>
                                        <div class="">
                                            <input type="text" name="emg_title" value="<?php echo @$patient_info->emg_title;?>" class="form-control"  placeholder="Title"> 
                                        </div>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label class="control-label"> <?php echo display('family_name')?> </label>
                                        <div class="">
                                            <input type="text" name="emg_family_name" class="form-control" value="<?php echo @$patient_info->emg_family_name;?>"  placeholder="Family Name" > 
                                        </div>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label class="control-label"> <?php echo display('given_name')?> </label>
                                        <div class="">
                                            <input type="text" name="emg_given_name" class="form-control" value="<?php echo @$patient_info->emg_given_name;?>" placeholder="Given Name" > 
                                        </div>
                                    </div>


                                    <div class="form-group col-md-4">
                                        <label class=" control-label"> <?php echo display('phone_number'); ?></label>
                                        <div class="">
                                            <input type="text"  name="emg_phone" value="<?php echo @$patient_info->emg_phone;?>" class="form-control" required placeholder="Phone Number"> 
                                            
                                        </div>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label class=" control-label"> <?php echo display('mobile')?></label>
                                        <div >
                                            <input type="text"  name="emg_mobile" value="<?php echo @$patient_info->emg_mobile;?>" class="form-control" required placeholder="Mobile Number"> 
                                            
                                        </div>
                                    </div>

                              
                                </div> 
                            </fieldset>

                            <fieldset>
                                <label> <h2>Medical Information</h2></label>

                                <div class="row">

                                    <div class="form-group col-md-6">
                                        <label class="control-label"> Do you have allergies to any medicine or food ?</label>
                                        <div class="">
                                            <input type="text" value="<?php echo @$madical_info->food_allergies;?>" name="food_allergies" class="form-control"  placeholder="Do you have allergies to any medicine or food"> 
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label class="control-label"> Do you have a tendency to bleed or buise easily ?</label>
                                        <div class="">
                                            <input type="text" name="bleed_tendency" class="form-control" value="<?php echo @$madical_info->bleed_tendency;?>"  placeholder="Do you have a tendency to bleed or buise easily ?" > 
                                        </div>
                                    </div>

                                    <p>Please select Illness as following</p>
                                    <div class="form-group col-md-4">
                                        <label class="control-label"> Heart Diseases </label>
                                        <div class="">
                                            <select class="form-control" name="heart_disease">
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="form-group col-md-4">
                                        <label class=" control-label"> HighBlood Pressure</label>
                                        <div class="">
                                            <select class="form-control" name="high_blood">
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label class=" control-label"> Any Accidents</label>
                                        <div >
                                            <select class="form-control" name="accidents">
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label class=" control-label"> Diabetic</label>
                                        <div >
                                            <select class="form-control" name="diabetic">
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-4">

                                        <label class="control-label"> Any Surgeries</label>

                                        <div>
                                             <select class="form-control" name="surgeries">
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select>
                                        </div>

                                    </div>

                                    <div class="form-group col-md-4">
                                        <label class=" control-label"> Others</label>
                                        <div >
                                             <select class="form-control" name="others">
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label class=" control-label col-md-9"> Do you Consider yourself to be in a high risk group for infectious diseases?</label>
                                        <div class="col-md-3">
                                             <input type="text" value="<?php echo @$madical_info->high_risk_diseases;?>" name="high_risk_diseases" class="form-control">
                                        </div>
                                    </div>


                                    <div class="form-group col-md-12">
                                        <label class=" control-label"> Please list any relevant family medical history and social history</label>
                                        <div >
                                            <textarea class="form-control" rows="2"  name="family_history"> <?php echo @$madical_info->family_history;?></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label class=" control-label"> Please list your current medical conditions and medications</label>
                                        <div >
                                            <textarea class="form-control" rows="2" name="current_medication"><?php echo @$madical_info->current_medication;?></textarea>
                                        </div>
                                    </div>
                                </div> 

                            </fieldset>

                            <div class="row" id="male">

                                <div class="form-group ">
                                    <label class=" control-label col-md-9"> Are you under Private Health Insurance Extras covering Acupuncture or chiese Herbal Medicine?</label>
                                    <div class="col-md-3">
                                        <select class="form-control" name="otheres_msrance">
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <label class=" control-label col-md-9"> Are you covered by Worksafe or Comcare?</label>
                                    <div class="col-md-3">
                                        <select class="form-control" name="others_comcare">
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <label class=" control-label col-md-9"> Are you covered by TAC?</label>
                                    <div class="col-md-3">
                                        <select class="form-control" name="others_tac">
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <label class=" control-label col-md-9"> Are you a Pensioner, Student, Low-Income Healtheare Card Holder</label>
                                    <div class="col-md-3">
                                        <select class="form-control" name="others_low_income">
                                            <option value="Pensioner">Pensioner</option>
                                            <option value="Student">Student</option>
                                            <option value="Low-Income">Low-Income </option>
                                        </select>
                                    </div>
                                </div>



                                <div class="form-group ">
                                    <label class=" control-label col-md-9"> How do you know our clinic? Friend, Yellow Page, Google</label>
                                    <div class="col-md-3">
                                        <select class="form-control" name="others_reffer">
                                            <option value="Friend">Friend</option>
                                            <option value="Yellow Page">Yellow Page</option>
                                            <option value="Google">Google</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <label class=" control-label col-md-9"> Do you require a Sbscription on every visit?</label>
                                    <div class="col-md-3">
                                        <select class="form-control" name="subscription">
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                    </div>
                                </div>

                                    
                            </div>


                            <div class="row" id="female">

                                 <div class="form-group ">
                                    <label class=" control-label col-md-9"> Are you pregnant or is there apossibility to being pregnant?</label>
                                    <div class="col-md-3">
                                        <select class="form-control" name="female_pregnent">
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <label class=" control-label col-md-9"> Are you breast feeding now? </label>
                                    <div class="col-md-3">
                                        <select class="form-control" name="female_breast_feeding">
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                    </div>
                                </div>
                                    
                            </div>



                            <div class="form-group row ">
                                <div class="col-offes-3 col-md-4" style="margin-right:15px;">
                                    <button type="reset" class="btn btn-danger"><?php echo display('reset')?></button>
                                    <button type="submit" class="btn btn-success"><?php echo display('submit')?></button>
                                </div>
                            </div>
                        <?php echo form_close();?>
                    </div>
                </div>
            </div>
        </div>
    </div>            
    </section>
</div>




<script type="text/javascript">

    document.forms['ed_p'].elements['blood_group'].value="<?php echo $patient_info->blood_group?>";

    function calculateAge(birthDate) {
        const now = new Date();
        const birth = new Date(birthDate);
        
        // Calculate the time difference in milliseconds
        const diff = now - birth;
        
        // Convert the time difference to years (1 year = 365.25 days)
        const ageInYears = diff / (1000 * 60 * 60 * 24 * 365.25);
        
        return ageInYears.toFixed(2); // Return age in decimal form with 2 decimal places
    }
    
    $(document).ready(function(){
        $("#old").on('keyup change',function(){
               var age = (this.value);
               if(age !==''){
              $.ajax({
                    'url': '<?php echo base_url();?>' + 'admin/Ajax_controller/age_to_birthdate/'+age.trim(),
                    'type': 'GET', 
                    'data': {'age': age },
                    'success': function(data) { 
                        var container = $(".birth_date");
                        if(data==0){
                            container.val("0000-00-00");
                        }else{ 
                            container.val(data); 
                        }
                    }
                });
            }
        });
        $(".birth_date").on('keyup change', function() {
            const birthDate = $(this).val();
            if (birthDate) {
                // Calculate the age and set the value to the 'old' input field
                $("#old").val(calculateAge(birthDate));
            }
        });
    })

    // load patient name
    function load_patient_id(){          
        var patient_id = document.getElementById('patient_id').value;
        if (patient_id!='') {
            
            $.ajax({ 
                'url': '<?php echo base_url();?>' + 'admin/Ajax_controller/get_patinet_id/'+patient_id.trim(),
                'type': 'GET', //the way you want to send data to your URL
                'data': {'patient_id': patient_id },
                'success': function(data) { 
                    var container = $(".p_id");
                    if(data==0){
                        container.html("<div class='alert alert-success'><span class='glyphicon glyphicon-ok'></span><?php echo display('patient_id_msg')?></div>");
                        $('button[type=submit]').prop('disabled', false);
                    }else{ 
                        container.html(data);
                        $('button[type=submit]').prop('disabled', true);
                    }
                }
            });
        };
    }


$(document).ready(function(){

var che = "<?php echo $patient_info->sex;?>";

    if(che===female){
        $("#female").show();
        $("#male").hide();
    } else {
        $("#male").show();
        $("#female").hide();
    }

   $("#checkbox2_5").click(function(){
        $("#male").show();
        $("#female").hide();
    });
    
    $("#checkbox2_10").click(function(){
        $("#female").show();
         $("#male").hide();
    });
    
    $("#checkbox2_0").click(function(){
        $("#male").show();
        $("#female").hide();
    });
    
});



</script>