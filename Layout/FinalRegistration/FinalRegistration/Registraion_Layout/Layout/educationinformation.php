
    
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
   <!-- <link rel="stylesheet" type="text/css" href="styles/try.css"/>-->
    <link rel="stylesheet" type="text/css" href="styles/common.css"/>
    
   <!--  <link rel="stylesheet" type="text/css" href="styles/try2.css"/> -->
          <body style="background-image:url(images/Bing/<?php echo $img ?>.jpg)">
       
       <div id="header">Linked Zone</div>
       <div id="header_strip" style="opacity:0.8;"></div>

        <div id="mainContainer">
        <span>
        	<div class="title">Educational Information</div>
          
        </span>
        <hr>
        <!--  <TABLE NAME="TBL_FRM">
                    <tr>
                           <td colspan="2" align="left" style=" margin-left:-5px; font-size:30px;">Educationalsonal Information</td>
                      </tr>
                             
                       
                         <form name="regForm"  onsubmit="return validate ()" action="script_php/insertinfo.php" method="post">
                   
                                     
                       <tr>     
                            <TD>School Name</TD>
                           
                            <TD>College Name</TD>
                       
                      </tr>
                       <tr>
                            <Td><input type="text"  name="school_name" size="30"  placeholder="Enter Your School name"  /></Td>                                 
                            
                             
                             
    						<Td><input type="text"  name="clg_name" size="30" placeholder="Enter Your BCollege name"  /></Td>                                 
                           
               		 </tr>
                     
                     
                     
                     
                     
                                               
                      <tr>     
                            <TD >Stream</TD>
                            <TD >College Year </TD>
                       
                      </tr>
                       <tr>
                            <Td><input type="text"  name="stream" size="30" placeholder="Enter Your Stream"  /></Td>                                 
                            
                             
                             
    						<Td><input type="text"  name="clg_year" id="datepicker" size="30" placeholder="Enter Your College year"  /></Td>                                 
                           
               		 </tr>
                     
                        <div class="node">
                          <label>Password</label>
                       <input type="password" name="pass" tabindex="2"  onchange="valid1Text(this)" onkeypress="valid1Text(this)"/>
                    </div>
                     
                     
                     
                     
                                                 
                      <tr>
                      
                           <td> 
                           <input type="submit"  value="next" align="left"/>
                           
                     
                     
                           </td>
                       </tr>
                             
                      
                         
                       
                       
                       </form>
               </Table>
               
               -->
               
               
               
               
             
                         <form name="regForm"  onsubmit="return validate ()" action="scripts_php/educationinfo.php" method="post">
        
        				  <div class="node">
                          <label>School Name</label>
                      <input type="text"  name="school_name" size="30"  placeholder="Enter Your School name"  />
                    </div>
                    
                    
                     <div class="node">
                          <label>College Name</label>
                     <input type="text"  name="clg_name" size="30" placeholder="Enter Your College name"  />
                   </div>
                    
                    
                      <div class="node">
                          <label>Stream</label>
                     <input type="text"  name="stream" size="30" placeholder="Enter Your Stream"  />
                    </div>
                    
                    
                    
                      <div class="node">
                          <label>College Year</label>
                      <input type="text"  name="clg_year" id="datepicker" size="30" placeholder="Enter Your College year"  />
                    </div>
                    
                    <div class="node">
                   
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
          <!-- <div id="Intro_Footer">
               <div id="header_strip"  style="box-shadow:0px -1px 2px black;"></div>
               <div id="footer">&copy; Copyright @Linked Zone</div>
           </div> 
           -->
        </body> 
    </html>