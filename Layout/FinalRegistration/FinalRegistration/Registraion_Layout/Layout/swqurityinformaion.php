
    
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
 <!--   <link rel="stylesheet" type="text/css" href="styles/try3.css"/> -->
 		<!--  <link rel="stylesheet" type="text/css" href="styles/try.css"/> -->
            <link rel="stylesheet" type="text/css" href="styles/common.css"/>
      <body style="background-image:url(images/Bing/<?php echo $img ?>.jpg)">
       
       <div id="header">Linked Zone</div>
       <div id="header_strip" style="opacity:0.8;"></div>

        <div id="mainContainer">
        
        <span>
        	<div class="title">Security  Information</div>
         

        </span>
        <hr>
        <!--
          <TABLE NAME="TBL_FRM">
                    <tr>
                           <td colspan="2" align="left" style=" margin-left:-5px; font-size:30px;">Educationalsonal Information</td>
                      </tr>
                             
                       
                         <form name="regForm"  onsubmit="return validate ()" action="script_php/insertinfo.php" method="post">
                   
                                     
                       <tr>     
                            <TD>Sequrity Question</TD>
                           
                            <TD>Answer</TD>
                       
                      </tr>
                       <tr>
                            <Td><input type="text"  name="" size="30"  placeholder="Enter Your Sequrity question"  />
                            
                            
                            
                            
                               <select  name="sec_que" placeholder="Enter Youur reletion status" >
                	
                	<option value=" Select Your Question " selected="selected">Select Your Question
                    </option>
                    
                    <option value=" Enter Your Mobile no " >
                    </option>
                    <option value=" Enter your Favourite Actor ">  Enter your Favourite Actor
                    </option>
                    
                      <option value=" Enter your Favourite Actoress "> Enter your Favourite Actoress
                    </option>
                    
                      <option value=" Enter your School Name "> Enter your School Name
                    </option>
                </select>
                            
                            
                            
                            
                            
                            
                            
                            </Td>                                 
                            
                             
                             
    						<Td><input type="text"  name="clg_name" size="30" placeholder="Enter your answer"  /></Td>                                 
                           
               		 </tr>
                     
                     
                     
                     
                     
                                               
                      <tr>     
                            <TD >Password</TD>
                            
                       
                      </tr>
                       <tr>
                            <Td><input type="password"  name="pass" size="30" placeholder="Enter Your Stream"  /></Td>                                 
                            
                             
                             
    						                           
                           
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

        <!--  <div id="btn"> <Span> <a href="Login.php">Start Linking</a> </Span>
         </div> -->
         
         
         
           <form name="regForm"  onsubmit="return validate ()" action="scripts_php/sequrityinfo.php"  method="post">
        
        				  <div class="node">
                          <label>Sequrity Question</label>
                     
                       <select  name="sec_que" placeholder="Enter Youur reletion status" >
                	
                	<option value=" Select Your Question " selected="selected">Select Your Question
                    </option>
                    
                    <option value=" Enter Your Mobile no " > Enter Your Mobile no
                    </option>
                    <option value=" Enter your Favourite Actor ">  Enter your Favourite Actor
                    </option>
                    
                      <option value=" Enter your Favourite Actoress "> Enter your Favourite Actoress
                    </option>
                    
                      <option value=" Enter your School Name "> Enter your School Name
                    </option>
                </select>
                     
                    </div>
                    
                    
                      <div class="node">
                          <label>Answer</label>
							<input type="text"  name="ans" size="30" placeholder="Enter Your Answer"  />
					</div>
       
        
       
        	 <div class="node">
         		
                
                    
                          <label>Phone number</label>
							<input type="text" name="phono_no" placeholder="Enter Your Phonenumber"/>
					</div>
                    
                    
                   
         <div class="node">
                          
					</div>
                     <div class="node">
                          
					</div>
       
       
         
        <div class="nodeDet" >
                         
                         <input type="submit" value="Next"  />
                    </div>
   
         
         
           </div><!--Main Container Ends--> 
         <!--  <div id="Intro_Footer">
               <div id="header_strip"  style="box-shadow:0px -1px 2px black;"></div>
               <div id="footer">&copy; Copyright @Linked Zone</div>
           </div> 
           -->
           
        </body> 
    </html>