<div id="leftSiderBar">
            <div id="userSign">
            <p><?php echo isset($err)?$err:'';?></p>
        	<div class="registerForm">
            	 <form action="<?php echo $this->webroot?>/users/signup" method="post"  id="frm-signup-page" >
                <h6>Gender</h6>
                 <p class="gender">
                     <input type="radio" name="data[User][gender]" id="su_gender_1" value="Male"><label>Male</label>
                     <input type="radio" name="data[User][gender]"  id="su_gender_2" value="Female"><label>Female</label>
                     <input type="radio" name="data[User][gender]" id="su_gender_3" value="Other"><label>Other</label>
                 </p>
                  
                  <h6>Username <span>*</span></h6>
                  <input id="txt-signup-username" type="text" name="data[User][username]" class="inputField" />

                  <h6>Password <span>*</span></h6>
                  <input id="txt-signup-password" type="password" name="data[User][password]" class="inputField" />

                  <h6>Confirm Password <span>*</span></h6>
                  <input id="txt-signup-c-password" type="password" name="data[User][retypepassword]" class="inputField" />

                  <h6>Email <span>*</span></h6>
                  <input id="txt-signup-email" type="text" name="data[User][email]" class="inputField" />

                  <h6>DOB</h6>
                  <!--<input type="text" name="data[User][dob]" id="datepicker" class="inputField" /> -->
                  <p class="birthday">
                                <select name="data[User][bday]" class="birthday01" id="su_month">
                                    <option value="">--Select--</option>
                                    <option value="01">January</option>
                                    <option value="02">February</option>
                                    <option value="03">March</option>
                                    <option value="04">April</option>
                                    <option value="05">May</option>
                                    <option value="06">June</option>
                                    <option value="07">July</option>
                                    <option value="08">August</option>
                                    <option value="09">September</option>
                                    <option value="10">October</option>
                                    <option value="11">November</option>
                                    <option value="12">December</option>
                                </select>
                                <select name="data[User][bmonth]" class="birthday02" id="su_day">
                                    <option value="">--Select--</option>
                                    <option value="01">01</option>
                                    <option value="02">02</option>
                                    <option value="03">03</option>
                                    <option value="04">04</option>
                                    <option value="05">05</option>
                                    <option value="06">06</option>
                                    <option value="07">07</option>
                                    <option value="08">08</option>
                                    <option value="09">09</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                    <option value="13">13</option>
                                    <option value="14">14</option>
                                    <option value="15">15</option>
                                    <option value="16">16</option>
                                    <option value="17">17</option>
                                    <option value="18">18</option>
                                    <option value="19">19</option>
                                    <option value="20">20</option>
                                    <option value="21">21</option>
                                    <option value="22">22</option>
                                    <option value="23">23</option>
                                    <option value="24">24</option>
                                    <option value="25">25</option>
                                    <option value="26">26</option>
                                    <option value="27">27</option>
                                    <option value="28">28</option>
                                    <option value="29">29</option>
                                    <option value="30">30</option>
                                    <option value="31">31</option>
                                </select>
                                <select name="data[User][byear]" class="birthday03" id="su_year">
                                    <option value="">--Select--</option>
                                    <option value="1970">1970</option>
                                    <option value="1971">1971</option>
                                    <option value="1972">1972</option>
                                    <option value="1973">1973</option>
                                    <option value="1974">1974</option>
                                    <option value="1975">1975</option>
                                    <option value="1976">1976</option>
                                    <option value="1977">1977</option>
                                    <option value="1978">1978</option>
                                    <option value="1979">1979</option>
                                    <option value="1980">1980</option>
                                    <option value="1981">1981</option>
                                    <option value="1982">1982</option>
                                    <option value="1983">1983</option>
                                    <option value="1984">1984</option>
                                    <option value="1985">1985</option>
                                    <option value="1986">1986</option>
                                    <option value="1987">1987</option>
                                    <option value="1988">1988</option>
                                    <option value="1989">1989</option>
                                    <option value="1990">1990</option>
                                    <option value="1991">1991</option>
                                    <option value="1992">1992</option>
                                    <option value="1993">1993</option>
                                    <option value="1994">1994</option>
                                    <option value="1995">1995</option>
                                    <option value="1996">1996</option>
                                    <option value="1997">1997</option>
                                    <option value="1998">1998</option>
                                    <option value="1999">1999</option>
                                    <option value="2000">2000</option>
                                    <option value="2001">2001</option>
                                    <option value="2002">2002</option>
                                    <option value="2003">2003</option>
                                    <option value="2004">2004</option>
                                    <option value="2005">2005</option>
                                    <option value="2006">2006</option>
                                    <option value="2007">2007</option>
                                    <option value="2008">2008</option>
                                    <option value="2009">2009</option>
                                    <option value="2010">2010</option>
                                </select>
                   </p>
                    <p></p>
                    <p>By creating an account you agree to Terms of Uses</p>
                    <p class="signUpPara" id="signup">
                        <input id="btn-signup" class="btnsubmit" value="Sign Up" type="button">
                        <img height="15px" weight="15px" src="<?php echo $this->webroot;?>img/ajax-loader-big-circle.gif" id="img-loader" style="display: none;">
                    </p>
                    <div id="signup_error_page"></div>
               </form>
            </div><!--registerForm-->
            <div class="registerInfo">
            	<form action="<?php echo $this->webroot?>/users/signin" method="post" id="frm-signin-page" >
                    <h6>Username</h6>
                    <div class="logintext">
                      <input id="username-signin" type="text" name="data[User][username]" class="inputField" />  
                    </div>
                    
                    <h6>Password</h6>
                    <div class="logintext"> 
                        <input id="pass-signin" type="password" name="data[User][password]" class="inputField" /> 
                    </div>
                   
                    <p id="signin">
                        <input id="btn-signin" class="btnsubmit" value="Log In" type="button">
                        <img height="15px" weight="15px" src="<?php echo $this->webroot;?>img/ajax-loader-big-circle.gif" id="img-loader" style="display: none;">
                    </p>
                    <div id="login_error_page"></div>
                </form>
                <p>&nbsp;</p>
                
            </div><!--registerInfo-->
            <div class="clr"></div>
        </div><!--userSign-->    
        </div><!--leftSiderBar-->