


<div class="row">
    <div class="col-md-12">
        <!-- start form--->
       <div class="row mt-5 justify-content-center" data-aos="fade-up">
          <div class="col-lg-10" style="background:#F0F0F0;">
             	  <form class="form-horizontal" id="insertForm" action="<?php echo base_url(); ?>matrimonial/matrimonial_update" method="POST">
             <input type="hidden" value="<?php echo base_url(); ?>matrimonial/matrimonial_update" id="post_link">
		
		 <input type="hidden" name="id" value="<?php echo $row[0]->id;?>">
                <div class="card-body">
				<div class="row">
                   <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">प्रत्याशी का नाम</label>
                    <input type="text" class="form-control" id="name" value="<?php echo $row[0]->name;?>" name="name">
                   </div>
                   <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">गोत्र</label>
                    <input type="text" class="form-control" id="com" value="<?php echo $row[0]->com;?>" name="com">
                   </div>
				    
                 
                  </div>
                  <div class="row">
                       
                   <div class="form-group col-md-2">
                    <label for="exampleInputEmail1">महिला/पुरुष</label>
                    </div>
				    <div class="form-group col-md-2">
                      <div class="radio">
                      <label><input type="radio" name="gender" value="female" <?php if($row[0]->gender=='female')  { echo "checked";}?>>महिला</label>
                    </div>
                    </div>
				    <div class="form-group col-md-2">
                    <div class="radio">
                      <label><input type="radio" name="gender" value="male" <?php if($row[0]->gender=='male')  { echo "checked";}?> >पुरुष</label>
                    </div>
                   </div>
                   <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">शिक्षा</label>
                    <input type="text" class="form-control" id="education" value="<?php echo $row[0]->education;?>" name="education">
                   </div>
				   
                 
                  </div>
				   
				  
				<div class="row">
				     <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">जन्म दिनांक</label>
                    <input type="date" class="form-control" id="dob" value="<?php echo $row[0]->dob;?>" name="dob">
                    </div>
                   <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">समय</label>
                    <input type="text" class="form-control" id="time" value="<?php echo $row[0]->time;?>" name="time">
                   </div>
				   
                 
                  </div>
                  <div class="row">
                       <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">स्थान</label>
                    <input type="text" class="form-control" id="place" value="<?php echo $row[0]->place;?>" name="place">
                    </div>
                   <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">ऊंचाई</label>
                    <input type="number" class="form-control" id="height" value="<?php echo $row[0]->height;?>" name="height">
                   </div>
				    
                 
                  </div>
                  <div class="row">
                      <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">वजन</label>
                    <input type="number" class="form-control" id="weight" value="<?php echo $row[0]->weight;?>" name="weight">
                    </div>
                   <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">रंग</label>
                    <input type="text" class="form-control" id="color" value="<?php echo $row[0]->color;?>" name="color">
                   </div>
				   
                 
                  </div>
                  <div class="row">
                       <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">प्रत्याशी का कार्य/पद  </label>
                    <input type="text" class="form-control" id="work_data" value="<?php echo $row[0]->work_data;?>" name="work_data">
                    </div>
                   <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">प्रत्याशी का कार्य स्थल का पता</label>
                    <textarea type="text" class="form-control" id="work_place" value="<?php echo $row[0]->work_place;?>" name="work_place"><?php echo $row[0]->work_place;?></textarea>
                   </div>
				   
                  </div>
                  <div class="row">
                       <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">ई-मेल</label>
                    <input type="Email" class="form-control" id="email" value="<?php echo $row[0]->email;?>" name="email">
                    </div>
                  <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">मो.न./व्हाट् अप ऑनलाइन नम्बर</label>
                    <input type="number" class="form-control" id="mobile" value="<?php echo $row[0]->mobile;?>" name="mobile">
                   </div>
                  </div>
                                    <hr/>
                <h4 class="text text-danger">प्रत्याशी के परिवार का विवरण</h4>
                                      <hr/>
                                      <div class="row">
                  <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">पिता का नाम </label>
                    <input type="text" class="form-control" id="father_name" value="<?php echo $row[0]->father_name;?>" name="father_name">
                   </div>
				    <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">कार्यस्थल का फ़ोन न./मो.न.</label>
                    <input type="number" class="form-control" id="workplace_number" value="<?php echo $row[0]->workplace_number;?>" name="workplace_number">
                    </div>
                    </div>
                 <div class="row">
                  <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">पिता का व्यवसाय</label>
                    <input type="text" class="form-control" id="father_occuption" value="<?php echo $row[0]->father_occuption;?>" name="father_occuption">
                   </div>
				    <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">पिता की मासिक आय</label>
                    <input type="number" class="form-control" id="father_income" value="<?php echo $row[0]->father_income;?>" name="father_income">
                    </div>
                  </div>
                   <div class="row">
                  <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">पिता के व्यवसाय का पता </label>
                    <textarea type="text" class="form-control" id="father_occuption_place" value="<?php echo $row[0]->father_occuption_place;?>" name="father_occuption_place"><?php echo $row[0]->father_occuption_place;?></textarea>
                   </div>
				    <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">निवास का पता</label>
                    <textarea type="text" class="form-control" id="living_place" value="<?php echo $row[0]->living_place;?>" name="living_place"><?php echo $row[0]->living_place;?></textarea>
                    </div>
                 
                  </div>
                   <div class="row">
                  <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">जिलाा</label>
                    <input type="text" class="form-control" id="district" value="<?php echo $row[0]->district;?>" name="district">
                   </div>
				    <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">राज्य</label>
                    <input type="text" class="form-control" id="state" value="<?php echo $row[0]->state;?>" name="state">
                    </div>
                  </div>
                  <hr/>
                  <div class="row">
                   <div class="form-group col-md-2">
                  <label for="exampleInputEmail1" class="text text-danger">मकान</label>
                  </div>
                   <div class="form-group col-md-2">
                <div class="radio">
                  <label><input type="radio" name="house" value="own" <?php if($row[0]->house=='own')  { echo "checked";}?>>निजी</label>
                  </div>
                </div>
                <!--<div class="form-group col-md-2">-->
                <!--      <div class="radio">-->
                <!--      <label><input type="radio" name="gender" checked>महिला</label>-->
                <!--    </div>-->
                <!--    </div>-->
                <div class="form-group col-md-2">
                <div class="radio">
                  <label><input type="radio" name="house" value="by_fair" <?php if($row[0]->house=='by_fair')  { echo "checked";}?> >किराये का </label>
                </div>
                  </div>
                  </div>
                  <div class="row">
                   <div class="form-group col-md-4">
                  <label for="exampleInputEmail1" class="text text-danger">प्रत्याक्षी के अतिरिक्त भाई</label>
                  </div>
                   <div class="form-group col-md-2">
                <div class="radio">
                  <label><input type="radio" name="brother" value="married" <?php if($row[0]->brother=='married')  { echo "checked";}?> >विवाहित</label>
                  </div>
                </div>
                <div class="form-group col-md-2">
                <div class="radio">
                  <label><input type="radio" name="brother" class="brother" value="unmarried" <?php if($row[0]->brother=='unmarried')  { echo "checked";}?>>अविवाहिता </label>
                </div>
                  </div>
                  </div>
                  <div class="row">
                   <div class="form-group col-md-4">
                  <label for="exampleInputEmail1" class="text text-danger">प्रत्याक्षी के अतिरिक्त बहन </label>
                  </div>
                   <div class="form-group col-md-2">
                <div class="radio">
                  <label><input type="radio" name="sister" value="married" <?php if($row[0]->sister=='married')  { echo "checked";}?> >विवाहित</label>
                  </div>
                </div>
                <div class="form-group col-md-2">
                <div class="radio">
                  <label><input type="radio" name="sister" class="sister" value="unmarried" <?php if($row[0]->sister=='unmarried')  { echo "checked";}?>>अविवाहित </label>
                </div>
                  </div>
                  </div>
                  <div class="row">
                   <div class="form-group col-md-2">
                  <label for="exampleInputEmail1" class="text text-danger">वाहन</label>
                  </div>
                   <div class="form-group col-md-2">
                <div class="radio">
                  <label><input type="radio" name="vehicle"  value="two_vehicle" <?php if($row[0]->vehicle=='two_vehicle')  { echo "checked";}?>>चार पहिया</label>
                  </div>
                </div>
                <div class="form-group col-md-2">
                <div class="radio">
                  <label><input type="radio" name="vehicle" class="vehicle" value="four_vehicle" <?php if($row[0]->vehicle=='four_vehicle')  { echo "checked";}?>>दो पहिया </label>
                </div>
                  </div>
                  </div>
                  <hr/>
                   <div class="row">
                  <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">मामा का नाम</label>
                    <input type="text" class="form-control" id="uncle_name" value="<?php echo $row[0]->uncle_name;?>" name="uncle_name">
                   </div>
				    <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">पता</label>
                    <textarea type="text" class="form-control" id="address" value="<?php echo $row[0]->address;?>" name="address"><?php echo $row[0]->address;?></textarea>
                    </div>
                 
                  </div>
                   <div class="row">
                  <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">मो.न./फ़ोन एस.टी.डी.सहित</label>
                    <input type="number" class="form-control" id="uncle_mobile_no" value="<?php echo $row[0]->uncle_mobile_no;?>" name="uncle_mobile_no">
                   </div>
				    <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">स्थानीय रिश्तेदार (अगर कोई हो तो)</label>
                    <input type="text" class="form-control" id="relative" value="<?php echo $row[0]->relative;?>" name="relative">
                    </div>
                 
                  </div>
                   <div class="row">
                  <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">किसी एक परिचित का नाम </label>
                    <input type="text" class="form-control" id="known_name" value="<?php echo $row[0]->known_name;?>" name="known_name">
                   </div>
				    <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">पता</label>
                    <textarea type="text" class="form-control" id="known_address" value="<?php echo $row[0]->known_address;?>" name="known_address"><?php echo $row[0]->known_address;?>
                    </textarea>
                    </div>
                 
                  </div>
                   <div class="row">
                  <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">मो.न./फ़ोन एस.टी.डी.सहित</label>
                    <input type="number" class="form-control" id="known_mobile" value="<?php echo $row[0]->known_mobile;?>" name="known_mobile">
                   </div>
                 
                  </div>
                  <hr/>
                  <h4 class="text text-danger">अन्य</h4>
                  <hr/>
                  <div class="row">
                   <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">जीवन साथी से आपकी अपेक्षाए</label>
                    <input type="text" class="form-control" id="expectations" value="<?php echo $row[0]->expectations;?>" name="expectations">
                   </div>
				    <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">उम्र</label>
                    <input type="number" class="form-control" id="age" value="<?php echo $row[0]->age;?>" name="age">
                    </div>
                  </div>
                  <div class="row">
                   <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">शिक्षा</label>
                    <input type="text" class="form-control" id="partner_education" value="<?php echo $row[0]->partner_education;?>" name="partner_education">
                   </div>
				    <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">ऊंचाई</label>
                    <input type="number" class="form-control" id="partner_height" value="<?php echo $row[0]->partner_height;?>" name="partner_height">
                    </div>
                 
                  </div>
				  
				 
				  
				   

				   
				  <div class="row">
				      <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">अन्य जानकारी</label>
                    <textarea type="text" class="form-control" id="other_details" value="<?php echo $row[0]->other_details;?>" name="other_details"><?php echo $row[0]->other_details;?></textarea>
                    </div>
                  
                  <div class="form-group col-md-6 col-xs-5">
                      <?php
                      	$File = $row[0]->profileImage;	  
                      	$load_url = 'uploads/matrimonial/'.$File;
		if(!empty($File) && file_exists($load_url))
		{ 
	       
		   $url = base_url().$load_url;			
		
			
		}
		else
		  {
		$url = base_url().'uploads/no_file.jpg';	
		    }
		    ?>
		    
                    <label for="exampleInputPassword1">Photo</label><br>
                 
                        <div class="fileinput fileinput-new" data-provides="fileinput" style="border:1px solid #dcdcdc;">
								<div class="fileinput-new thumbnail" style="width: 100px; height: 100px;" data-trigger="fileinput">
								
									<img src="<?php echo $url; ?>" alt="...">
								</div>
								<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
								<div>
									<span class="btn btn-white btn-file">
										<span class="fileinput-new">Select image</span>
										<span class="fileinput-exists">Change</span>
										<input type="file" name="profileImage" accept="image/*">
									</span>
									<a href="#" class="btn btn-xs btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
								</div>
				</div>

				</div>
				
				
				
				
				 
				
                  </div>
				  
				  
                 
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </form>
		 </div>

        </div>
        
        
        
        
        
        <!-------end form- ---->
        
    </div>
</div>