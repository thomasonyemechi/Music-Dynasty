<?php 
session_start(); ob_start();
include("portal/library/connect.inc.php");

if(isset($_GET['ref']))
    {
        $sponsor = $_SESSION['sponsor'] = $_GET['ref'];
        if ($glee->validateUser($sponsor) == FALSE) {
            $report = 'You have entered an invalid sponsor ID. Please Try Again';
            $count = 1;
            $_SESSION['signup'] = 0;
        } else {
            $report = 'Sponsor successfully verified';
            $_SESSION['signup'] = 2;
        }
        header('location: ?'); 
}


$signup = isset($_SESSION['signup'])?$_SESSION['signup']:0;

if(isset($_GET['reset'])){$_SESSION['signup']=0; header("location: ?");}
?>
<!doctype html>
<html lang="en">


<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Register - Glee Global</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no"
    />
    <meta name="description" content="Glee Global Empowerment Registration">

    <!-- Disable tap highlight on IE -->
    <meta name="msapplication-tap-highlight" content="no">

<link href="portal/main.cba69814a806ecc7945a.css" rel="stylesheet"></head>

<body>
      <?php if(isset($report)){echo $glee->Alert(); } ?>
<div class="app-container app-theme-white body-tabs-shadow">
        <div class="app-container">
            <div class="h-100">
                <div class="h-100 no-gutters row">
                    <div class="d-none d-lg-block col-lg-4">
                        <div class="slider-light">
                            <div class="slick-slider">
                                <div>
                                    <div class="position-relative h-100 d-flex justify-content-center align-items-center bg-plum-plate" tabindex="-1">
                                        <div class="slide-img-bg" style="background-image: url('portal/assets/images/originals/city.jpg');"></div>
                                        <div class="slider-content"><h3>Real Empowerment</h3>
                                            <p>A place where you are empowered to achieve your dreams while helping others to achieve theirs.</p></div>
                                    </div>
                                </div>
                                <div>
                                    <div class="position-relative h-100 d-flex justify-content-center align-items-center bg-premium-dark" tabindex="-1">
                                        <div class="slide-img-bg" style="background-image: url('portal/assets/images/originals/citynights.jpg');"></div>
                                        <div class="slider-content"><h3>Consistent with Honesty</h3>
                                            <p>A place where you are empowered to achieve your dreams while helping others to achieve theirs.</p></div>
                                    </div>
                                </div>
                                <div>
                                    <div class="position-relative h-100 d-flex justify-content-center align-items-center bg-sunny-morning" tabindex="-1">
                                        <div class="slide-img-bg" style="background-image: url('portal/assets/images/originals/citydark.jpg');"></div>
                                        <div class="slider-content"><h3>Simple and Detailed</h3>
                                            <p>A place where you are empowered to achieve your dreams while helping others to achieve theirs.</p></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="h-100 d-flex bg-white justify-content-center align-items-center col-md-12 col-lg-8">
                        <div class="mx-auto app-login-box col-sm-12 col-md-10 col-lg-9">
                            <img src="portal/assets/images/gle.jpg" width="100%">
<br><br><br>
                            <h4>
                                <div>Registration</div>
                                <span>It only takes a few minutes to create your account</span></h4>
                            <h6 class="mt-3">Already registered? <a href="login.php" class="text-primary">Login here</a></h6>
                            <div class="divider row"></div>
                            <div>
                               <form class="form-material" method="post">
<?php if($signup==0){ ?>
                                
                                <div class="form-group mb-3">
                                    <input type="text" class="form-control"  placeholder="Sponsor ID" name="sponsor" value="<?php if(isset($_SESSION['sponsor'])){ echo $_SESSION['sponsor']; } ?>" required>
                                </div>
                                <div class="px-2 form-group mb-0">
                                    <button type="submit" class="btn btn-primary text-uppercase" name="VerifySponsor" style="width:100%">Verify Sponsor</button>
                                </div>
                            <?php } elseif($signup==2){  ?>

                                SPONSOR: <b><?php echo $glee->userName2($_SESSION['sponsor']) ?>  (<?php echo $_SESSION['sponsor'] ?>)</b>   
                                <span class="pull-right"><a href="portal/?reset=true"> <!-- Change Sponsor --></a></span>
                                <br><br>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="exampleInputUsername" placeholder="Surname" name="firstname" value="<?php if(isset($_SESSION['firstname'])){ echo $_SESSION['firstname']; } ?>" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="exampleInputUsername" placeholder="Firstname" name="lastname" value="<?php if(isset($_SESSION['firstname'])){ echo $_SESSION['lastname']; } ?>" required>
                                </div>
                                <div class="form-group mb-3">
                                    <select class="form-control" name="gender" >
                                        <option>Select Gender..</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <input type="text" class="form-control" id="exampleInputResetPassword" placeholder="Address" name="state">
                                </div>
                                <div class="form-group mb-3">
                                    <select name="country" class="form-control" required>
<option value="">Select Country...</option>
<option value="Afganistan">Afghanistan</option>
<option value="Albania">Albania</option>
<option value="Algeria">Algeria</option>
<option value="American Samoa">American Samoa</option>
<option value="Andorra">Andorra</option>
<option value="Angola">Angola</option>
<option value="Anguilla">Anguilla</option>
<option value="Antigua &amp; Barbuda">Antigua &amp; Barbuda</option>
<option value="Argentina">Argentina</option>
<option value="Armenia">Armenia</option>
<option value="Aruba">Aruba</option>
<option value="Australia">Australia</option>
<option value="Austria">Austria</option>
<option value="Azerbaijan">Azerbaijan</option>
<option value="Bahamas">Bahamas</option>
<option value="Bahrain">Bahrain</option>
<option value="Bangladesh">Bangladesh</option>
<option value="Barbados">Barbados</option>
<option value="Belarus">Belarus</option>
<option value="Belgium">Belgium</option>
<option value="Belize">Belize</option>
<option value="Benin">Benin</option>
<option value="Bermuda">Bermuda</option>
<option value="Bhutan">Bhutan</option>
<option value="Bolivia">Bolivia</option>
<option value="Bonaire">Bonaire</option>
<option value="Bosnia &amp; Herzegovina">Bosnia &amp; Herzegovina</option>
<option value="Botswana">Botswana</option>
<option value="Brazil">Brazil</option>
<option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
<option value="Brunei">Brunei</option>
<option value="Bulgaria">Bulgaria</option>
<option value="Burkina Faso">Burkina Faso</option>
<option value="Burundi">Burundi</option>
<option value="Cambodia">Cambodia</option>
<option value="Cameroon">Cameroon</option>
<option value="Canada">Canada</option>
<option value="Canary Islands">Canary Islands</option>
<option value="Cape Verde">Cape Verde</option>
<option value="Cayman Islands">Cayman Islands</option>
<option value="Central African Republic">Central African Republic</option>
<option value="Chad">Chad</option>
<option value="Channel Islands">Channel Islands</option>
<option value="Chile">Chile</option>
<option value="China">China</option>
<option value="Christmas Island">Christmas Island</option>
<option value="Cocos Island">Cocos Island</option>
<option value="Colombia">Colombia</option>
<option value="Comoros">Comoros</option>
<option value="Congo">Congo</option>
<option value="Cook Islands">Cook Islands</option>
<option value="Costa Rica">Costa Rica</option>
<option value="Cote DIvoire">Cote D'Ivoire</option>
<option value="Croatia">Croatia</option>
<option value="Cuba">Cuba</option>
<option value="Curaco">Curacao</option>
<option value="Cyprus">Cyprus</option>
<option value="Czech Republic">Czech Republic</option>
<option value="Denmark">Denmark</option>
<option value="Djibouti">Djibouti</option>
<option value="Dominica">Dominica</option>
<option value="Dominican Republic">Dominican Republic</option>
<option value="East Timor">East Timor</option>
<option value="Ecuador">Ecuador</option>
<option value="Egypt">Egypt</option>
<option value="El Salvador">El Salvador</option>
<option value="Equatorial Guinea">Equatorial Guinea</option>
<option value="Eritrea">Eritrea</option>
<option value="Estonia">Estonia</option>
<option value="Ethiopia">Ethiopia</option>
<option value="Falkland Islands">Falkland Islands</option>
<option value="Faroe Islands">Faroe Islands</option>
<option value="Fiji">Fiji</option>
<option value="Finland">Finland</option>
<option value="France">France</option>
<option value="French Guiana">French Guiana</option>
<option value="French Polynesia">French Polynesia</option>
<option value="French Southern Ter">French Southern Ter</option>
<option value="Gabon">Gabon</option>
<option value="Gambia">Gambia</option>
<option value="Georgia">Georgia</option>
<option value="Germany">Germany</option>
<option value="Ghana">Ghana</option>
<option value="Gibraltar">Gibraltar</option>
<option value="Great Britain">Great Britain</option>
<option value="Greece">Greece</option>
<option value="Greenland">Greenland</option>
<option value="Grenada">Grenada</option>
<option value="Guadeloupe">Guadeloupe</option>
<option value="Guam">Guam</option>
<option value="Guatemala">Guatemala</option>
<option value="Guinea">Guinea</option>
<option value="Guyana">Guyana</option>
<option value="Haiti">Haiti</option>
<option value="Hawaii">Hawaii</option>
<option value="Honduras">Honduras</option>
<option value="Hong Kong">Hong Kong</option>
<option value="Hungary">Hungary</option>
<option value="Iceland">Iceland</option>
<option value="India">India</option>
<option value="Indonesia">Indonesia</option>
<option value="Iran">Iran</option>
<option value="Iraq">Iraq</option>
<option value="Ireland">Ireland</option>
<option value="Isle of Man">Isle of Man</option>
<option value="Israel">Israel</option>
<option value="Italy">Italy</option>
<option value="Jamaica">Jamaica</option>
<option value="Japan">Japan</option>
<option value="Jordan">Jordan</option>
<option value="Kazakhstan">Kazakhstan</option>
<option value="Kenya">Kenya</option>
<option value="Kiribati">Kiribati</option>
<option value="Korea North">Korea North</option>
<option value="Korea Sout">Korea South</option>
<option value="Kuwait">Kuwait</option>
<option value="Kyrgyzstan">Kyrgyzstan</option>
<option value="Laos">Laos</option>
<option value="Latvia">Latvia</option>
<option value="Lebanon">Lebanon</option>
<option value="Lesotho">Lesotho</option>
<option value="Liberia">Liberia</option>
<option value="Libya">Libya</option>
<option value="Liechtenstein">Liechtenstein</option>
<option value="Lithuania">Lithuania</option>
<option value="Luxembourg">Luxembourg</option>
<option value="Macau">Macau</option>
<option value="Macedonia">Macedonia</option>
<option value="Madagascar">Madagascar</option>
<option value="Malaysia">Malaysia</option>
<option value="Malawi">Malawi</option>
<option value="Maldives">Maldives</option>
<option value="Mali">Mali</option>
<option value="Malta">Malta</option>
<option value="Marshall Islands">Marshall Islands</option>
<option value="Martinique">Martinique</option>
<option value="Mauritania">Mauritania</option>
<option value="Mauritius">Mauritius</option>
<option value="Mayotte">Mayotte</option>
<option value="Mexico">Mexico</option>
<option value="Midway Islands">Midway Islands</option>
<option value="Moldova">Moldova</option>
<option value="Monaco">Monaco</option>
<option value="Mongolia">Mongolia</option>
<option value="Montserrat">Montserrat</option>
<option value="Morocco">Morocco</option>
<option value="Mozambique">Mozambique</option>
<option value="Myanmar">Myanmar</option>
<option value="Nambia">Nambia</option>
<option value="Nauru">Nauru</option>
<option value="Nepal">Nepal</option>
<option value="Netherland Antilles">Netherland Antilles</option>
<option value="Netherlands">Netherlands (Holland, Europe)</option>
<option value="Nevis">Nevis</option>
<option value="New Caledonia">New Caledonia</option>
<option value="New Zealand">New Zealand</option>
<option value="Nicaragua">Nicaragua</option>
<option value="Niger">Niger</option>
<option value="Nigeria">Nigeria</option>
<option value="Niue">Niue</option>
<option value="Norfolk Island">Norfolk Island</option>
<option value="Norway">Norway</option>
<option value="Oman">Oman</option>
<option value="Pakistan">Pakistan</option>
<option value="Palau Island">Palau Island</option>
<option value="Palestine">Palestine</option>
<option value="Panama">Panama</option>
<option value="Papua New Guinea">Papua New Guinea</option>
<option value="Paraguay">Paraguay</option>
<option value="Peru">Peru</option>
<option value="Phillipines">Philippines</option>
<option value="Pitcairn Island">Pitcairn Island</option>
<option value="Poland">Poland</option>
<option value="Portugal">Portugal</option>
<option value="Puerto Rico">Puerto Rico</option>
<option value="Qatar">Qatar</option>
<option value="Republic of Montenegro">Republic of Montenegro</option>
<option value="Republic of Serbia">Republic of Serbia</option>
<option value="Reunion">Reunion</option>
<option value="Romania">Romania</option>
<option value="Russia">Russia</option>
<option value="Rwanda">Rwanda</option>
<option value="St Barthelemy">St Barthelemy</option>
<option value="St Eustatius">St Eustatius</option>
<option value="St Helena">St Helena</option>
<option value="St Kitts-Nevis">St Kitts-Nevis</option>
<option value="St Lucia">St Lucia</option>
<option value="St Maarten">St Maarten</option>
<option value="St Pierre &amp; Miquelon">St Pierre &amp; Miquelon</option>
<option value="St Vincent &amp; Grenadines">St Vincent &amp; Grenadines</option>
<option value="Saipan">Saipan</option>
<option value="Samoa">Samoa</option>
<option value="Samoa American">Samoa American</option>
<option value="San Marino">San Marino</option>
<option value="Sao Tome &amp; Principe">Sao Tome &amp; Principe</option>
<option value="Saudi Arabia">Saudi Arabia</option>
<option value="Senegal">Senegal</option>
<option value="Serbia">Serbia</option>
<option value="Seychelles">Seychelles</option>
<option value="Sierra Leone">Sierra Leone</option>
<option value="Singapore">Singapore</option>
<option value="Slovakia">Slovakia</option>
<option value="Slovenia">Slovenia</option>
<option value="Solomon Islands">Solomon Islands</option>
<option value="Somalia">Somalia</option>
<option value="South Africa">South Africa</option>
<option value="Spain">Spain</option>
<option value="Sri Lanka">Sri Lanka</option>
<option value="Sudan">Sudan</option>
<option value="Suriname">Suriname</option>
<option value="Swaziland">Swaziland</option>
<option value="Sweden">Sweden</option>
<option value="Switzerland">Switzerland</option>
<option value="Syria">Syria</option>
<option value="Tahiti">Tahiti</option>
<option value="Taiwan">Taiwan</option>
<option value="Tajikistan">Tajikistan</option>
<option value="Tanzania">Tanzania</option>
<option value="Thailand">Thailand</option>
<option value="Togo">Togo</option>
<option value="Tokelau">Tokelau</option>
<option value="Tonga">Tonga</option>
<option value="Trinidad &amp; Tobago">Trinidad &amp; Tobago</option>
<option value="Tunisia">Tunisia</option>
<option value="Turkey">Turkey</option>
<option value="Turkmenistan">Turkmenistan</option>
<option value="Turks &amp; Caicos Is">Turks &amp; Caicos Is</option>
<option value="Tuvalu">Tuvalu</option>
<option value="Uganda">Uganda</option>
<option value="Ukraine">Ukraine</option>
<option value="United Arab Erimates">United Arab Emirates</option>
<option value="United Kingdom">United Kingdom</option>
<option value="United States of America">United States of America</option>
<option value="Uraguay">Uruguay</option>
<option value="Uzbekistan">Uzbekistan</option>
<option value="Vanuatu">Vanuatu</option>
<option value="Vatican City State">Vatican City State</option>
<option value="Venezuela">Venezuela</option>
<option value="Vietnam">Vietnam</option>
<option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
<option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
<option value="Wake Island">Wake Island</option>
<option value="Wallis &amp; Futana Is">Wallis &amp; Futana Is</option>
<option value="Yemen">Yemen</option>
<option value="Zaire">Zaire</option>
<option value="Zambia">Zambia</option>
<option value="Zimbabwe">Zimbabwe</option>

<?php if(isset($_SESSION['firstname'])){ echo '<option selected>'.$_SESSION['country'].'</option>';
; } ?>
</select>


                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="exampleInputUsername" placeholder="Phone Number" name="phone" value="<?php if(isset($_SESSION['firstname'])){ echo $_SESSION['phone']; } ?>" required>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" id="exampleInputEmail" placeholder="Email"  name="email" value="<?php if(isset($_SESSION['firstname'])){ echo $_SESSION['email']; } ?>" required>
                                </div>
                                
                                <div class="form-group">
                                    <input type="text" class="form-control" id="exampleInputUsername" placeholder="Username" name="username" value="<?php if(isset($_SESSION['firstname'])){ echo $_SESSION['username']; } ?>" required>
                                </div>

                                <div class="form-group">
                                    <input type="password" class="form-control" id="exampleInputPassword" placeholder="Password" name="password" required>
                                </div>
                                <div class="form-group mb-3">
                                    <input type="password" class="form-control" id="exampleInputResetPassword" placeholder="Confirm password" name="password2" required>
                                </div>
                                
                                <div class="px-2 form-group mb-0">
                                    <button type="submit" class="btn btn-primary text-uppercase" name="InitialSignup" style="width:100%">Sign up</button>
                                </div>

                                <?php } elseif($signup==3){  ?>
<h5>REGISTRATION PAYMENT</h5>
                                <br>

                                <b>NOTE: </b>Glee Global One-Time-Registration Fee is $6.25 (NGN2,500). Make payment to the following Bank Account or Bitcoin Address and Send payment details to +234 818 491 8290 or support@gleeglobal.com  to get your registration PIN. 
                               <br><b>PAY TO BANK:</b> AAD NETWORKS INTERNATIONAL, STERLING BANK, 0073783933 OR
                               <br><b>BITCOIN ADDRESS: </b> 1P3UuM376RNFsLGi5zwqxtJPsE8afJLMYQ <br>
                               <i> </i><br>


<div class="form-group mb-3">
                                    <input type="text" class="form-control"  placeholder="Registration PIN" name="epin" value="<?php if(isset($_SESSION['pin'])){ echo $_SESSION['pin']; } ?>" required>
                                </div>
                                <div class="px-2 form-group mb-0">
                                    <button type="submit" class="btn btn-primary text-uppercase" name="payWithPin" style="width:100%">Register with PIN</button>
                                </div>


                                <?php } elseif($signup==4){  ?>

                                <br><br>
<center><h3 class="text-success">Signup Successful</h3></center><br>
                                <div class="px-2 form-group mb-0">
                                    <button type="submit" class="btn btn-primary text-uppercase" name="ProceedToLogin" style="width:100%">Proceed to Login</button>
                                </div>
                                <?php } ?>


<br><br><br>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
<script type="text/javascript" src="portal/assets/scripts/main.cba69814a806ecc7945a.js"></script></body>

<!-- Mirrored from demo.dashboardpack.com/architectui-html-pro/pages-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 03 Sep 2019 14:10:25 GMT -->
</html>
