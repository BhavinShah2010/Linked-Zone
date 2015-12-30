
    
 <html> 
 <head> 
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
 <title> Welcome To Linked Zone</title>
  <style>
   body 
   {
	    background-repeat:no-repeat;
		background-attachment:fixed;
		padding:0;
        margin:0 auto;
		background-size:100% 100%;
		background-size:cover;
		background-color: #454545;

	} 
    </style>
    </head>
	<script src="scripts/Jquery.js" type="text/javascript"> </script> 
    <link rel="stylesheet" type="text/css" href="styles/reset.css" />
  <!--  <link rel="stylesheet" type="text/css" href="styles/try.css"/> -->
    <link rel="stylesheet" type="text/css" href="styles/common.css"/>
      <body style="background-image:url(images/Bing/<?php echo $img ?>.jpg)">
       
       <div id="header">Linked Zone</div>
       <div id="header_strip" style="opacity:0.8;"></div>

        <div id="mainContainer">
          
        <span>
        	<div class="title">Personal Information</div>
        </span>
		<hr>
          <!--
          <TABLE NAME="TBL_FRM">
                    <tr>
                           <td colspan="2" align="left" style=" margin-left:-5px; font-size:36px;">Personal Information</td>
                      </tr>
                             
                       
                         <form name="regForm"  onsubmit="return validate ()" action="script_php/insert.php" method="post">
                   
                                     
                      <tr>     
                            
                             <TD >Nationality</TD>
                             <TD >Skill</TD>
                       
                       </tr>
                             
                        <tr>    
                            <Td><input type="text"  name="nationality" size="30" placeholder="Enter Your Nationality"  /></Td>                                 
                     
                     	<Td><input type="text"  name="skill" size="30" placeholder="Enter Your Skills" /></Td>                                 
                      
                      
                     </tr>    
                      
                      
                                      
                      <tr>     
                            <TD >Hobby</TD>
                            <TD >Interest</TD>
                            
                            
                      </tr>
                      
                      <tr>
                            <Td><input type="text" name="hobbie" size="30" placeholder="Enter Your Hobby" /></Td>                                 
                       
                      
                      
                            <Td><input type="text"  name="interest" size="30" placeholder="Enter Your Interest" /></Td>                                 
                      </tr>    
                      
                      
                      
                      
                                      
                      <tr>     
                            <TD >Relationship</TD>
                          
                             <TD >Profile Picture</TD>
                            
                      </tr>
                      
                      <tr>
                            <Td>
                            
                                  
                        <select  name="rel_status" placeholder="Enter Youur reletion status" >
                	
                	<option value=" Select Your Gender " selected="selected">Select Your Gender
                    </option>
                    
                    <option value="Mariied" >Mariied
                    </option>
                    <option value="unmariied"> unmarried
                    </option>
                </select>
                            
                            
                            
                            
                            </Td>              
                            
                             <Td><input type="file"  name="image" 
                            placeholder="Upload Image"  /></Td>     
                            
                                               
                      </tr> 
                      <tr>
                      
                           <td> 
                           <input type="submit"  value="next" align="left"/>
                           
                     
                     
                           </td>
                       </tr>
                             
                      
                         
                       
                       
                       </form>
               </Table>
               </div>
        
        
        -->
         <form name="regForm"  onsubmit="return validate ()" action="scripts_php/personalinfo.php" method="post">
         
         
        
           <div class="node">
                          <label>Nationality</label>
						<input type="text"  name="nationality" size="30" placeholder="Enter Your Nationality"  />
					</div>
                    
                    
                     <div class="node">
                          <label>Skill</label>
						<input type="text"  name="skill" size="30" placeholder="Enter Your Skills" />
					</div>
                    
                    
                     <div class="node">
                          <label>Hobby</label>
						<input type="text" name="hobbie" size="30" placeholder="Enter Your Hobby" />
					</div>
                    
                    
                     <div class="node">
                          <label>Interest</label>
						<input type="text"  name="interest" size="30" placeholder="Enter Your Interest" />
					</div>
                    
                      <div class="node">
                         <label>Relation status</label>
                     
                       <select  name="rel_status" placeholder="Enter Youur reletion status" >
                	
                	<option value=" Select Your relation " selected="selected">Select Your relation
                    </option>
                    
                    <option value="Married" >Married
                    </option>
                    <option value="Unmarried"> unmarried
                    </option>
                    
                        </select>
					</div>
                    
                    
                    
        <div class="node">
                      
		</div>
        
           <div class="nodeDet" >
                         
                         <input type="submit" value="Next" />
                    </div>
        
       </form>
        

        <!--  <div id="btn"> <Span> <a href="Login.php">Start Linking</a> </Span>
         </div> -->
        
           </div><!--Main Container Ends--> 
       <!--    <div id="Intro_Footer">
               <div id="header_strip"  style="box-shadow:0px -1px 2px black;"></div>
               <div id="footer">&copy; Copyright @Linked Zone</div>
           </div> <!-- Intro_Footer Ends-->
        
           
        </body> 
    </html>