<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complete Responsive Grocery Website Design Tutorial</title>

    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Muli&display=swap');
* {
    margin: 0;
    box-sizing: border-box;
    --webkit-font-smoothing: antialiased;
}

.modal__wrapper{
    position: fixed;
    left:0;
    top:0;
    background: rgba(0, 0, 0, 0.6);
    height: 100%;
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    pointer-events: none;
    transition: all .3s ease-in-out;
}

.modal__container {
    background: #fff;
    width: 560px;
    max-width: 90%;
    padding: 20px;
    border-radius: 4px;
    position: relative;
    transform: translateY(-100%);
    transition: all .3s ease-in-out;
}
.btn__purple {
    background:  #6B46C1;
    padding: 10px 40px;
    color: #fff;
    border-radius: 4px;
    font-size: 18px;
    cursor: pointer;
}

h2 {
    margin-bottom: 10px;
}
p {
    line-height: 1.6;
    margin-bottom: 20px;
}
.action {
    display: flex;
    align-items: center;
    justify-content: flex-end;
}

.modal__container button.close {
    position: absolute;
    right: 10px;
    top: 10px;
    font-size: 32px;
    background: none;
    border: none;
    outline: none;
    cursor: pointer;
}
.modal__container button.close:hover {
    color: #6B46C1;
}
.active {
    opacity: 1;
    pointer-events: auto;
}
.modal__wrapper.active .modal__container{
    transform: translateY(0px);
}
    </style>
<style>
    a{
        text-decoration:none;
    }
</style>
</head>
<body>
    


<header class="header">

    <a href="#home" class="logo" style="text-decoration:none;"> <i class="fa-solid fa-building-columns"></i> CareerVision.com </a>

    <nav class="navbar" >
        <a href="#home" style="text-decoration:none;">Home</a>
        <a href="#features" style="text-decoration:none;">Services</a>
        <a href="#products" style="text-decoration:none;">Counsellors</a>
        <a href="#review" style="text-decoration:none;">Review</button>
                
    </nav>
    
    <div class="icons">
        <div class="fas fa-bars" id="menu-btn"></div>
        <div class="fas fa-search" id="search-btn"></div>
        <?php
            if(isset($_SESSION["username"])){
                if($_SESSION["rol"] == 0){
        ?>
        <a href="dashboard.php"><div class="fa-solid fa-server" id="dashboard-btn"></div></a>
        <?php
            }
        else{?>
        <a href="admindash.php"><div class="fa-solid fa-server" id="dashboard-btn"></div></a>
        <?php
            }}?>
        <div class="fas fa-user" id="login-btn"></div>
        
        <div class="fas fa-solid fa-user-plus" id="cart-btn"></div>
    </div>
    
    <form action="" class="search-form">
        <input type="search" id="search-box" placeholder="search here...">
        <label for="search-box" class="fas fa-search"></label>
    </form>
        <form method="post" action="log.php" class="login-form">
            <h3>login now</h3>
            <input type="text" placeholder="your email" name="email" class="box">
            <input type="password" name="pass" placeholder="your password" class="box">
            <p>forget your password <a href="#">click here</a></p>
            
            <input type="submit" name="submit" value="login now" class="btn" style="font-size: 1.5rem;
            background: var(--orange);
            color: white;
            padding: 6px;
            border-radius: 9px;">        
        </form>
        
        
            <form method="post" action="server.php" class="login-form shopping-cart" >
            <h3 class="c-font-24 c-font-sbold">Create An Account</h3><br><br>
                <input type="email" id="email" name="email" placeholder="Email" class="form-control input-md c-square sign-up" style="font-size: 1.5rem !important;  text-transform: lowercase;"><br>
                <input type="text" id="fname" name="fname" placeholder="Full Name" class="form-control input-md c-square sign-up" style="font-size: 1.5rem !important;  text-transform: lowercase;"><br>
                <input type="text" id="pass" name="pass" placeholder="Password" class="form-control input-md c-square sign-up" style="font-size: 1.5rem !important;  text-transform: lowercase;"><br>
                <select id="higest_edu" name="higest_edu" class="form-control c-square c-theme sign-up" style="font-size: 1.5rem !important;  text-transform: lowercase;">
                <option value="volvo">---Highest Education Level---</option>
                <option value="6th - 9th Class">6th to 9th Class</option>
                <option value="10th Class">10th Class</option>
                <option value="11th Class">11th Class</option>
                <option value="12th Class">12th Class</option>
                <option value="Graduate Degree / Diploma">Graduate Degree / Diploma</option>
                <option value="Postgraduate Degree">Postgraduate Degree</option>
                <option value="Working Professional">Working Professional</option>

                </select><br><br>
                <select id="City" name="City" class="form-control c-square c-theme sign-up" style="font-size: 1.5rem !important;  text-transform: lowercase;">
                <option value="volvo">---Select your City---</option>
                <option value="4">Adilabad</option>
                <option value="515">Agra</option>
                <option value="125">Ahmedabad</option>
                <option value="313">Ahmednagar</option>
                <option value="364">Aizawl</option>
                <option value="431">Ajmer</option>
                <option value="314">Akola</option>
                <option value="249">Alappuzha</option>
                <option value="517">Aligarh</option>
                <option value="263">Alirajpur</option>
                <option value="516">Allahabad</option>
                <option value="502">Almora</option>
                <option value="432">Alwar</option>
                <option value="150">Ambala</option>
                <option value="518">Ambedkar Nagar</option>
                <option value="315">Amrawati</option>
                <option value="126">Amreli District</option>
                <option value="414">Amritsar</option>
                <option value="127">Anand</option>
                <option value="5">Anantapur</option>
                <option value="183">Anantnag</option>
                <option value="380">Angul</option>
                <option value="27">Anjaw</option>
                <option value="264">Anuppur</option>
                <option value="59">Araria</option>
                <option value="468">Ariyalur</option>
                <option value="265">Ashok Nagar</option>
                <option value="519">Auraiya</option>
                <option value="316">Aurangabad</option>
                <option value="60">Aurangabad</option>
                <option value="520">Azamgarh</option>
                <option value="522">Badaun</option>
                <option value="184">Badgam</option>
                <option value="222">Bagalkot</option>
                <option value="503">Bageshwar</option>
                <option value="523">Bagpat</option>
                <option value="524">Bahraich</option>
                <option value="266">Balaghat</option>
                <option value="385">Baleswar</option>
                <option value="526">Ballia</option>
                <option value="528">Balrampur</option>
                <option value="128">Banaskantha</option>
                <option value="527">Banda</option>
                <option value="185">Bandipore</option>
                <option value="224">Bangalore Rural District</option>
                <option value="225">Bangalore Urban District</option>
                <option value="61">Banka</option>
                <option value="587">Bankura</option>
                <option value="435">Banswara</option>
                <option value="521">Barabanki</option>
                <option value="186">Baramula</option>
                <option value="437">Baran</option>
                <option value="588">Bardhaman</option>
                <option value="529">Bareilly</option>
                <option value="384">Bargarh</option>
                <option value="434">Barmer</option>
                <option value="37">Barpeta</option>
                <option value="267">Barwani</option>
                <option value="96">Bastar</option>
                <option value="530">Basti</option>
                <option value="415">Bathinda</option>
                <option value="318">Beed</option>
                <option value="62">Begusarai</option>
                <option value="220">Belgaum</option>
                <option value="223">Bellary</option>
                <option value="268">Betul</option>
                <option value="382">Bhadrak</option>
                <option value="63">Bhagalpur</option>
                <option value="317">Bhandara</option>
                <option value="436">Bharatpur</option>
                <option value="129">Bharuch</option>
                <option value="130">Bhavnagar</option>
                <option value="439">Bhilwara</option>
                <option value="269">Bhind</option>
                <option value="151">Bhiwani</option>
                <option value="64">Bhojpur</option>
                <option value="270">Bhopal</option>
                <option value="219">Bidar</option>
                <option value="221">Bijapur</option>
                <option value="525">Bijnor</option>
                <option value="433">Bikaner</option>
                <option value="171">Bilaspur</option>
                <option value="97">Bilaspur</option>
                <option value="586">Birbhum</option>
                <option value="348">Bishnupur</option>
                <option value="199">Bokaro</option>
                <option value="383">Bolangir</option>
                <option value="38">Bongaigaon</option>
                <option value="381">Boudh</option>
                <option value="531">Bulandshahr</option>
                <option value="319">Buldhana</option>
                <option value="438">Bundi</option>
                <option value="271">Burhanpur</option>
                <option value="65">Buxar</option>
                <option value="39">Cachar</option>
                <option value="114">Central Delhi</option>
                <option value="226">Chamarajnagar</option>
                <option value="172">Chamba</option>
                <option value="504">Chamoli</option>
                <option value="505">Champawat</option>
                <option value="365">Champhai</option>
                <option value="532">Chandauli</option>
                <option value="350">Chandel</option>
                <option value="605">Chandigarh</option>
                <option value="320">Chandrapur</option>
                <option value="28">Changlang</option>
                <option value="200">Chatra</option>
                <option value="469">Chennai</option>
                <option value="272">Chhatarpur</option>
                <option value="273">Chhindwara</option>
                <option value="247">Chikballapur</option>
                <option value="227">Chikmagalur</option>
                <option value="228">Chitradurga</option>
                <option value="533">Chitrakoot</option>
                <option value="6">Chittoor</option>
                <option value="441">Chittorgarh</option>
                <option value="349">Churachandpur</option>
                <option value="440">Churu</option>
                <option value="470">Coimbatore</option>
                <option value="594">Cooch Behar</option>
                <option value="471">Cuddalore</option>
                <option value="386">Cuttack</option>
                <option value="131">Dahod</option>
                <option value="590">Dakshin Dinajpur</option>
                <option value="231">Dakshina Kannada</option>
                <option value="113">Daman</option>
                <option value="274">Damoh</option>
                <option value="98">Dantewada</option>
                <option value="66">Darbhanga</option>
                <option value="589">Darjeeling</option>
                <option value="40">Darrang</option>
                <option value="275">Datia</option>
                <option value="442">Dausa</option>
                <option value="229">Davanagere</option>
                <option value="387">Debagarh</option>
                <option value="506">Dehradun</option>
                <option value="604">Delhi</option>
                <option value="201">Deoghar</option>
                <option value="534">Deoria</option>
                <option value="276">Dewas</option>
                <option value="498">Dhalai</option>
                <option value="99">Dhamtari</option>
                <option value="202">Dhanbad</option>
                <option value="277">Dhar</option>
                <option value="472">Dharmapuri</option>
                <option value="230">Dharwad</option>
                <option value="41">Dhemaji</option>
                <option value="388">Dhenkanal</option>
                <option value="443">Dholpur</option>
                <option value="42">Dhubri</option>
                <option value="321">Dhule</option>
                <option value="34">Dibang Valley</option>
                <option value="43">Dibrugarh</option>
                <option value="372">Dimapur</option>
                <option value="473">Dindigul</option>
                <option value="278">Dindori</option>
                <option value="112">Diu</option>
                <option value="187">Doda</option>
                <option value="203">Dumka</option>
                <option value="444">Dungapur</option>
                <option value="100">Durg</option>
                <option value="115">East Delhi</option>
                <option value="357">East Garo Hills</option>
                <option value="7">East Godavari</option>
                <option value="29">East Kameng</option>
                <option value="358">East Khasi Hills</option>
                <option value="464">East Sikkim</option>
                <option value="250">Ernakulam</option>
                <option value="474">Erode</option>
                <option value="535">Etah</option>
                <option value="537">Etawah</option>
                <option value="541">Faizabad</option>
                <option value="152">Faridabad</option>
                <option value="417">Faridkot</option>
                <option value="539">Farrukhabad</option>
                <option value="153">Fatehabad</option>
                <option value="418">Fatehgarh Sahib</option>
                <option value="540">Fatehpur</option>
                <option value="538">Firozabad</option>
                <option value="416">Firozpur</option>
                <option value="232">Gadag</option>
                <option value="322">Gadchiroli</option>
                <option value="390">Gajapati</option>
                <option value="133">Gandhinagar</option>
                <option value="445">Ganganagar</option>
                <option value="389">Ganjam</option>
                <option value="205">Garhwa</option>
                <option value="542">Gautam Buddha Nagar</option>
                <option value="68">Gaya</option>
                <option value="546">Ghaziabad</option>
                <option value="544">Ghazipur</option>
                <option value="206">Giridih</option>
                <option value="44">Goalpara</option>
                <option value="207">Godda</option>
                <option value="45">Golaghat</option>
                <option value="543">Gonda</option>
                <option value="323">Gondiya</option>
                <option value="69">Gopalganj</option>
                <option value="545">Gorkakhpur</option>
                <option value="233">Gulbarga</option>
                <option value="208">Gumla</option>
                <option value="279">Guna</option>
                <option value="8">Guntur</option>
                <option value="419">Gurdaspur</option>
                <option value="154">Gurgaon</option>
                <option value="280">Gwalior</option>
                <option value="46">Hailakandi</option>
                <option value="173">Hamirpur</option>
                <option value="547">Hamirpur</option>
                <option value="446">Hanumangarh</option>
                <option value="281">Harda</option>
                <option value="548">Hardoi</option>
                <option value="507">Haridwar</option>
                <option value="234">Hassan</option>
                <option value="235">Haveri District</option>
                <option value="209">Hazaribagh</option>
                <option value="324">Hingoli</option>
                <option value="155">Hissar</option>
                <option value="591">Hooghly</option>
                <option value="282">Hoshangabad</option>
                <option value="420">Hoshiarpur</option>
                <option value="592">Howrah</option>
                <option value="9">Hyderabad</option>
                <option value="251">Idukki</option>
                <option value="351">Imphal East</option>
                <option value="356">Imphal West</option>
                <option value="283">Indore</option>
                <option value="284">Jabalpur</option>
                <option value="393">Jagatsinghpur</option>
                <option value="359">Jaintia Hills</option>
                <option value="450">Jaipur</option>
                <option value="451">Jaisalmer</option>
                <option value="392">Jajapur</option>
                <option value="421">Jalandhar</option>
                <option value="551">Jalaun</option>
                <option value="325">Jalgaon</option>
                <option value="326">Jalna</option>
                <option value="448">Jalore</option>
                <option value="593">Jalpaiguri</option>
                <option value="188">Jammu</option>
                <option value="134">Jamnagar</option>
                <option value="70">Jamui</option>
                <option value="102">Janjgir-Champa</option>
                <option value="101">Jashpur</option>
                <option value="553">Jaunpur District</option>
                <option value="71">Jehanabad</option>
                <option value="285">Jhabua</option>
                <option value="156">Jhajjar</option>
                <option value="452">Jhalawar</option>
                <option value="550">Jhansi</option>
                <option value="391">Jharsuguda</option>
                <option value="157">Jind</option>
                <option value="449">Jodhpur</option>
                <option value="47">Jorhat</option>
                <option value="447">Juhnjhunun</option>
                <option value="135">Junagadh</option>
                <option value="552">Jyotiba Phule Nagar</option>
                <option value="10">Kadapa</option>
                <option value="74">Kaimur</option>
                <option value="159">Kaithal</option>
                <option value="396">Kalahandi</option>
                <option value="475">Kanchipuram</option>
                <option value="397">Kandhamal</option>
                <option value="174">Kangra</option>
                <option value="105">Kanker</option>
                <option value="555">Kannauj</option>
                <option value="253">Kannur</option>
                <option value="554">Kanpur Dehat</option>
                <option value="556">Kanpur Nagar</option>
                <option value="536">Kanshiram Nagar</option>
                <option value="476">Kanyakumari</option>
                <option value="422">Kapurthala</option>
                <option value="410">Karaikal</option>
                <option value="453">Karauli</option>
                <option value="48">Karbi Anglong</option>
                <option value="189">Kargil</option>
                <option value="49">Karimganj</option>
                <option value="11">Karimnagar</option>
                <option value="158">Karnal</option>
                <option value="477">Karur</option>
                <option value="254">Kasaragod</option>
                <option value="190">Kathua</option>
                <option value="75">Katihar</option>
                <option value="286">Katni</option>
                <option value="557">Kaushambi</option>
                <option value="106">Kawardha</option>
                <option value="399">Kendrapara</option>
                <option value="395">Kendujhar</option>
                <option value="72">Khagaria</option>
                <option value="12">Khammam</option>
                <option value="287">Khandwa</option>
                <option value="288">Khargone</option>
                <option value="137">Kheda</option>
                <option value="394">Khordha</option>
                <option value="175">Kinnaur</option>
                <option value="73">Kishanganj</option>
                <option value="236">Kodagu</option>
                <option value="210">Koderma</option>
                <option value="373">Kohima</option>
                <option value="50">Kokrajhar</option>
                <option value="237">Kolar</option>
                <option value="366">Kolasib</option>
                <option value="327">Kolhapur</option>
                <option value="595">Kolkata</option>
                <option value="252">Kollam</option>
                <option value="238">Koppal</option>
                <option value="398">Koraput</option>
                <option value="103">Korba</option>
                <option value="104">Koriya</option>
                <option value="454">Kota</option>
                <option value="255">Kottayam</option>
                <option value="256">Kozhikode</option>
                <option value="13">Krishna</option>
                <option value="176">Kulu</option>
                <option value="191">Kupwara</option>
                <option value="14">Kurnool</option>
                <option value="160">Kurukshetra</option>
                <option value="558">Kushinagar</option>
                <option value="136">Kutch</option>
                <option value="177">Lahaul and Spiti</option>
                <option value="51">Lakhimpur</option>
                <option value="560">Lakhimpur Kheri</option>
                <option value="76">Lakhisarai</option>
                <option value="559">Lalitpur</option>
                <option value="328">Latur</option>
                <option value="367">Lawngtlai</option>
                <option value="192">Leh</option>
                <option value="211">Lohardaga</option>
                <option value="30">Lohit</option>
                <option value="31">Lower Subansiri</option>
                <option value="561">Lucknow</option>
                <option value="423">Ludhiana</option>
                <option value="368">Lunglei</option>
                <option value="79">Madhepura</option>
                <option value="77">Madhubani</option>
                <option value="478">Madurai</option>
                <option value="549">Mahamaya Nagar</option>
                <option value="564">Maharajganj</option>
                <option value="107">Mahasamund</option>
                <option value="15">Mahbubnagar</option>
                <option value="411">Mahe</option>
                <option value="161">Mahendragarh</option>
                <option value="565">Mahoba</option>
                <option value="568">Mainpuri</option>
                <option value="257">Malappuram</option>
                <option value="596">Malda</option>
                <option value="400">Malkangiri</option>
                <option value="369">Mamit</option>
                <option value="178">Mandi</option>
                <option value="289">Mandla</option>
                <option value="290">Mandsaur</option>
                <option value="239">Mandya</option>
                <option value="424">Mansa</option>
                <option value="52">Marigaon</option>
                <option value="569">Mathura</option>
                <option value="562">Mau</option>
                <option value="401">Mayurbhanj</option>
                <option value="16">Medak</option>
                <option value="563">Meerut</option>
                <option value="138">Mehsana</option>
                <option value="162">Mewat</option>
                <option value="597">Midnapore</option>
                <option value="566">Mirzapur</option>
                <option value="425">Moga</option>
                <option value="374">Mokokchung</option>
                <option value="375">Mon</option>
                <option value="567">Moradabad</option>
                <option value="291">Morena</option>
                <option value="426">Mukatsar</option>
                <option value="329">Mumbai City</option>
                <option value="330">Mumbai suburban</option>
                <option value="78">Munger</option>
                <option value="598">Murshidabad</option>
                <option value="570">Muzaffarnagar</option>
                <option value="80">Muzaffarpur</option>
                <option value="240">Mysore</option>
                <option value="402">Nabarangpur</option>
                <option value="599">Nadia</option>
                <option value="53">Nagaon</option>
                <option value="479">Nagapattinam</option>
                <option value="455">Nagaur</option>
                <option value="333">Nagpur</option>
                <option value="508">Nainital</option>
                <option value="81">Nalanda</option>
                <option value="54">Nalbari</option>
                <option value="17">Nalgonda</option>
                <option value="481">Namakkal</option>
                <option value="332">Nanded</option>
                <option value="331">Nandurbar</option>
                <option value="139">Narmada</option>
                <option value="292">Narsinghpur</option>
                <option value="334">Nashik</option>
                <option value="140">Navsari</option>
                <option value="82">Nawada</option>
                <option value="427">Nawan Shehar</option>
                <option value="404">Nayagarh</option>
                <option value="293">Neemuch</option>
                <option value="18">Nellore</option>
                <option value="116">New Delhi</option>
                <option value="3">Nicobar</option>
                <option value="19">Nizamabad</option>
                <option value="600">North 24 Parganas</option>
                <option value="1">North and Middle Andaman</option>
                <option value="55">North Cachar Hills</option>
                <option value="117">North Delhi</option>
                <option value="118">North East Delhi</option>
                <option value="123">North Goa</option>
                <option value="465">North Sikkim</option>
                <option value="499">North Tripura</option>
                <option value="119">North West Delhi</option>
                <option value="403">Nuapada</option>
                <option value="335">Osmanabad</option>
                <option value="212">Pakur</option>
                <option value="258">Palakkad</option>
                <option value="213">Palamu</option>
                <option value="456">Pali</option>
                <option value="170">Palwal</option>
                <option value="163">Panchkula</option>
                <option value="142">Panchmahal</option>
                <option value="164">Panipat</option>
                <option value="294">Panna</option>
                <option value="32">Papum Pare</option>
                <option value="336">Parbhani</option>
                <option value="95">Pashchim Champaran</option>
                <option value="217">Pashchim Singhbhum</option>
                <option value="141">Patan</option>
                <option value="259">Pathanamthitta</option>
                <option value="428">Patiala</option>
                <option value="83">Patna</option>
                <option value="509">Pauri Garhwal</option>
                <option value="482">Perambalur</option>
                <option value="376">Phek</option>
                <option value="571">Pilibhit</option>
                <option value="510">Pithoragharh</option>
                <option value="193">Poonch</option>
                <option value="143">Porbandar</option>
                <option value="20">Prakasam</option>
                <option value="572">Pratapgarh</option>
                <option value="457">Pratapgarh</option>
                <option value="412">Puducherry</option>
                <option value="483">Pudukkottai</option>
                <option value="194">Pulwama</option>
                <option value="337">Pune</option>
                <option value="67">Purba Champaran</option>
                <option value="204">Purba Singhbhum</option>
                <option value="405">Puri</option>
                <option value="84">Purnia</option>
                <option value="602">Purulia</option>
                <option value="574">Rae Bareli</option>
                <option value="241">Raichur</option>
                <option value="338">Raigad</option>
                <option value="108">Raigarh</option>
                <option value="110">Raipur</option>
                <option value="298">Raisen</option>
                <option value="195">Rajauri</option>
                <option value="296">Rajgarh</option>
                <option value="144">Rajkot</option>
                <option value="109">Rajnandgaon</option>
                <option value="458">Rajsamand</option>
                <option value="246">Ramanagara</option>
                <option value="484">Ramanathapuram</option>
                <option value="218">Ramgarh</option>
                <option value="573">Rampur</option>
                <option value="214">Ranchi</option>
                <option value="21">Rangareddi</option>
                <option value="297">Ratlam</option>
                <option value="339">Ratnagiri</option>
                <option value="406">Rayagada</option>
                <option value="295">Rewa</option>
                <option value="165">Rewari</option>
                <option value="360">Ri-Bhoi</option>
                <option value="166">Rohtak</option>
                <option value="85">Rohtas</option>
                <option value="511">Rudraprayag</option>
                <option value="429">Rupnagar</option>
                <option value="145">Sabarkantha</option>
                <option value="299">Sagar</option>
                <option value="575">Saharanpur</option>
                <option value="86">Saharsa</option>
                <option value="215">Sahibganj</option>
                <option value="370">Saiha</option>
                <option value="485">Salem</option>
                <option value="87">Samastipur</option>
                <option value="197">Samba</option>
                <option value="407">Sambalpur</option>
                <option value="341">Sangli</option>
                <option value="430">Sangrur</option>
                <option value="578">Sant Kabir Nagar</option>
                <option value="581">Sant Ravidas Nagar</option>
                <option value="90">Saran</option>
                <option value="343">Satara</option>
                <option value="300">Satna</option>
                <option value="460">Sawai Madhopur</option>
                <option value="301">Sehore</option>
                <option value="352">Senapati</option>
                <option value="302">Seoni</option>
                <option value="216">Seraikela and Kharsawan</option>
                <option value="371">Serchhip</option>
                <option value="303">Shahdol</option>
                <option value="577">Shahjahanpur</option>
                <option value="304">Shajapur</option>
                <option value="89">Sheikhpura</option>
                <option value="88">Sheohar</option>
                <option value="305">Sheopur</option>
                <option value="179">Shimla</option>
                <option value="242">Shimoga</option>
                <option value="306">Shivpuri</option>
                <option value="583">Shravasti</option>
                <option value="56">Sibsagar</option>
                <option value="579">Siddharthnagar</option>
                <option value="307">Sidhi</option>
                <option value="459">Sikar</option>
                <option value="340">Sindhudurg</option>
                <option value="308">Singrauli</option>
                <option value="180">Sirmaur</option>
                <option value="461">Sirohi</option>
                <option value="167">Sirsa</option>
                <option value="91">Sitamarhi</option>
                <option value="576">Sitapur</option>
                <option value="486">Sivagangai</option>
                <option value="93">Siwan</option>
                <option value="181">Solan</option>
                <option value="342">Solapur</option>
                <option value="580">Sonbhadra</option>
                <option value="168">Sonepat</option>
                <option value="57">Sonitpur</option>
                <option value="601">South 24 Parganas</option>
                <option value="2">South Andaman</option>
                <option value="120">South Delhi</option>
                <option value="361">South Garo Hills</option>
                <option value="124">South Goa</option>
                <option value="466">South Sikkim</option>
                <option value="500">South Tripura</option>
                <option value="121">South West Delhi</option>
                <option value="22">Srikakulam</option>
                <option value="196">Srinagar</option>
                <option value="408">Subarnapur</option>
                <option value="582">Sultanpur</option>
                <option value="409">Sundargarh</option>
                <option value="92">Supaul</option>
                <option value="147">Surat</option>
                <option value="146">Surendranagar</option>
                <option value="111">Surguja</option>
                <option value="353">Tamenglong</option>
                <option value="512">Tehri Garhwal</option>
                <option value="344">Thane</option>
                <option value="491">Thanjavur</option>
                <option value="132">The Dangs</option>
                <option value="480">The Nilgiris</option>
                <option value="489">Theni</option>
                <option value="493">Thiruvallur</option>
                <option value="261">Thiruvananthapuram</option>
                <option value="494">Thiruvarur</option>
                <option value="492">Thoothukudi</option>
                <option value="354">Thoubal</option>
                <option value="260">Thrissur</option>
                <option value="309">Tikamgarh</option>
                <option value="58">Tinsukia</option>
                <option value="33">Tirap</option>
                <option value="488">Tiruchirappalli</option>
                <option value="490">Tirunelveli</option>
                <option value="487">Tiruppur</option>
                <option value="495">Tiruvannamalai</option>
                <option value="462">Tonk</option>
                <option value="377">Tuensang</option>
                <option value="243">Tumkur</option>
                <option value="463">Udaipur</option>
                <option value="513">Udham Singh Nagar</option>
                <option value="198">Udhampur</option>
                <option value="244">Udupi</option>
                <option value="310">Ujjain</option>
                <option value="355">Ukhrul</option>
                <option value="311">Umaria</option>
                <option value="182">Una</option>
                <option value="584">Unnao</option>
                <option value="35">Upper Subansiri</option>
                <option value="603">Uttar Dinajpur</option>
                <option value="245">Uttara Kannada</option>
                <option value="514">Uttarkashi</option>
                <option value="148">Vadodara</option>
                <option value="94">Vaishali</option>
                <option value="149">Valsad</option>
                <option value="585">Varanasi</option>
                <option value="496">Vellore</option>
                <option value="312">Vidisha</option>
                <option value="497">Villupuram</option>
                <option value="23">Vishakhapatnam</option>
                <option value="24">Vizianagaram</option>
                <option value="25">Warangal</option>
                <option value="345">Wardha</option>
                <option value="346">Washim</option>
                <option value="262">Wayanad</option>
                <option value="122">West Delhi</option>
                <option value="362">West Garo Hills</option>
                <option value="26">West Godavari</option>
                <option value="36">West Kameng</option>
                <option value="363">West Khasi Hills</option>
                <option value="467">West Sikkim</option>
                <option value="501">West Tripura</option>
                <option value="378">Wokha</option>
                <option value="248">Yadagiri</option>
                <option value="169">Yamuna Nagar</option>
                <option value="413">Yanam</option>
                <option value="347">Yavatmal</option>
                <option value="379">Zunheboto</option>
                </select><br><br>
                <select id="cty_code" name="cty_code" class="form-control c-square c-theme" style="font-size: 1.5rem !important;  text-transform: lowercase;">
                <option selected="selected" value="91">India (+91)</option>
                <option value="93">Afghanistan (+93)</option>
                <option value="355">Albania (+355)</option>
                <option value="213">Algeria (+213)</option>
                <option value="684">American Samoa (+684)</option>
                <option value="376">Andorra (+376)</option>
                <option value="244">Angola (+244)</option>
                <option value="264">Anguilla (+264)</option>
                <option value="672">Antarctica (Casey) (+672)</option>
                <option value="672">Antarctica (Scott) (+672)</option>
                <option value="268">Antigua (+268)</option>
                <option value="54">Argentina (+54)</option>
                <option value="374">Armenia (+374)</option>
                <option value="297">Aruba (+297)</option>
                <option value="247">Ascension Islands (+247)</option>
                <option value="0">Atlantic Ocean (+0)</option>
                <option value="61">Australia (+61)</option>
                <option value="0">Australia Territory (+0)</option>
                <option value="43">Austria (+43)</option>
                <option value="994">Azerbaijan (+994)</option>
                <option value="242">Bahamas (+242)</option>
                <option value="973">Bahrain (+973)</option>
                <option value="880">Bangladesh (+880)</option>
                <option value="246">Barbados (+246)</option>
                <option value="268">Barbuda (+268)</option>
                <option value="375">Belarus (+375)</option>
                <option value="32">Belgium (+32)</option>
                <option value="501">Belize (+501)</option>
                <option value="229">Benin (+229)</option>
                <option value="441">Bermuda (+441)</option>
                <option value="975">Bhutan (+975)</option>
                <option value="591">Bolivia (+591)</option>
                <option value="387">Bosnia Herzegovina (+387)</option>
                <option value="267">Botswana (+267)</option>
                <option value="55">Brazil (+55)</option>
                <option value="284">British Virgin Islands (+284)</option>
                <option value="673">Brunei (+673)</option>
                <option value="359">Bulgaria (+359)</option>
                <option value="226">Burkina Faso (+226)</option>
                <option value="257">Burundi (+257)</option>
                <option value="855">Cambodia (+855)</option>
                <option value="237">Cameroon (+237)</option>
                <option value="1">Canada (+1)</option>
                <option value="238">Cape Verde Island (+238)</option>
                <option value="345">Cayman Island (+345)</option>
                <option value="236">Central Africa Republic (+236)</option>
                <option value="235">Chad Republic (+235)</option>
                <option value="56">Chile (+56)</option>
                <option value="86">China (+86)</option>
                <option value="61">Christmas/Cocos (+61)</option>
                <option value="57">Colombia (+57)</option>
                <option value="269">Comoros (+269)</option>
                <option value="242">Congo (+242)</option>
                <option value="682">Cook Island (+682)</option>
                <option value="506">Costa Rica (+506)</option>
                <option value="385">Croatia (+385)</option>
                <option value="53">Cuba (+53)</option>
                <option value="599">Curacao (+599)</option>
                <option value="357">Cyprus (+357)</option>
                <option value="420">Czech Republic (+420)</option>
                <option value="243">Dem. Rep. of Congo (+243)</option>
                <option value="45">Denmark (+45)</option>
                <option value="246">Diego Garcia (+246)</option>
                <option value="253">Djibouti (+253)</option>
                <option value="767">Dominica (+767)</option>
                <option value="809">Dominican Republic (+809)</option>
                <option value="670">East Timor (+670)</option>
                <option value="56">Easter Island (+56)</option>
                <option value="593">Ecuador (+593)</option>
                <option value="20">Egypt (+20)</option>
                <option value="503">El Salvador (+503)</option>
                <option value="240">Equatorial Guinea (+240)</option>
                <option value="291">Eritrea (+291)</option>
                <option value="372">Estonia (+372)</option>
                <option value="251">Ethiopia (+251)</option>
                <option value="298">Faeroe Islands (+298)</option>
                <option value="679">Fiji Islands (+679)</option>
                <option value="358">Finland (+358)</option>
                <option value="33">France (+33)</option>
                <option value="596">French Antilles (+596)</option>
                <option value="594">French Guiana (+594)</option>
                <option value="689">French Polynesia (+689)</option>
                <option value="241">Gabon (+241)</option>
                <option value="220">Gambia (+220)</option>
                <option value="995">Georgia (+995)</option>
                <option value="49">Germany (+49)</option>
                <option value="233">Ghana (+233)</option>
                <option value="350">Gibraltar (+350)</option>
                <option value="881">Global Mobile Satellite System (GMSS) (+881)</option>
                <option value="30">Greece (+30)</option>
                <option value="299">Greenland (+299)</option>
                <option value="473">Grenada (+473)</option>
                <option value="590">Guadeloupe (+590)</option>
                <option value="671">Guam (+671)</option>
                <option value="502">Guatemala (+502)</option>
                <option value="224">Guinea (+224)</option>
                <option value="592">Guyana (+592)</option>
                <option value="509">Haiti (+509)</option>
                <option value="504">Honduras (+504)</option>
                <option value="852">Hong Kong (+852)</option>
                <option value="36">Hungary (+36)</option>
                <option value="354">Iceland (+354)</option>
                <option value="0">Indian Ocean (+0)</option>
                <option value="62">Indonesia (+62)</option>
                <option value="871">Inmarsat (Atlantic Ocean - East) (+871)</option>
                <option value="874">Inmarsat (Atlantic Ocean - West) (+874)</option>
                <option value="873">Inmarsat (Indian Ocean) (+873)</option>
                <option value="872">Inmarsat (Pacific Ocean) (+872)</option>
                <option value="870">Inmarsat SNAC (+870)</option>
                <option value="98">Iran (+98)</option>
                <option value="964">Iraq (+964)</option>
                <option value="353">Ireland (+353)</option>
                <option value="8817">Iridium (Mobile Satellite service) (+8817)</option>
                <option value="972">Israel (+972)</option>
                <option value="39">Italy (+39)</option>
                <option value="225">Ivory Coast (+225)</option>
                <option value="876">Jamaica (+876)</option>
                <option value="81">Japan (+81)</option>
                <option value="962">Jordan (+962)</option>
                <option value="7">Kazakhstan (+7)</option>
                <option value="254">Kenya (+254)</option>
                <option value="686">Kiribati (+686)</option>
                <option value="7">Kirighzia (+7)</option>
                <option value="965">Kuwait (+965)</option>
                <option value="996">Kyrgyz Republic (+996)</option>
                <option value="7">Kyrgyzstan (+7)</option>
                <option value="856">Laos (+856)</option>
                <option value="371">Latvia (+371)</option>
                <option value="961">Lebanon (+961)</option>
                <option value="266">Lesotho (+266)</option>
                <option value="231">Liberia (+231)</option>
                <option value="218">Libya (+218)</option>
                <option value="423">Liechtenstein (+423)</option>
                <option value="370">Lithuania (+370)</option>
                <option value="352">Luxembourg (+352)</option>
                <option value="853">Macao (+853)</option>
                <option value="389">Macedonia (+389)</option>
                <option value="261">Madagascar (+261)</option>
                <option value="265">Malawi (+265)</option>
                <option value="60">Malaysia (+60)</option>
                <option value="960">Maldives (+960)</option>
                <option value="223">Mali Republic (+223)</option>
                <option value="356">Malta (+356)</option>
                <option value="692">Marshall Islands (+692)</option>
                <option value="596">Martinique (+596)</option>
                <option value="222">Mauritania (+222)</option>
                <option value="230">Mauritius (+230)</option>
                <option value="269">Mayotte Island (+269)</option>
                <option value="521">Mexico Band 1 (+521)</option>
                <option value="522">Mexico Band 2 (+522)</option>
                <option value="523">Mexico Band 3 (+523)</option>
                <option value="524">Mexico Band 4 (+524)</option>
                <option value="525">Mexico Band 5 (+525)</option>
                <option value="526">Mexico Band 6 (+526)</option>
                <option value="527">Mexico Band 7 (+527)</option>
                <option value="528">Mexico Band 8 (+528)</option>
                <option value="691">Micronesia (+691)</option>
                <option value="808">Midway Island (+808)</option>
                <option value="373">Moldova (+373)</option>
                <option value="377">Monaco (+377)</option>
                <option value="976">Mongolia (+976)</option>
                <option value="664">Montserrat (+664)</option>
                <option value="212">Morocco (+212)</option>
                <option value="258">Mozambique (+258)</option>
                <option value="95">Myanmar (Burma) (+95)</option>
                <option value="264">Namibia (+264)</option>
                <option value="674">Nauru (+674)</option>
                <option value="977">Nepal (+977)</option>
                <option value="31">Netherlands (+31)</option>
                <option value="599">Netherlands Antilles (+599)</option>
                <option value="869">Nevis Island (+869)</option>
                <option value="687">New Caledonia (+687)</option>
                <option value="64">New Zealand (+64)</option>
                <option value="505">Nicaragua (+505)</option>
                <option value="227">Niger (+227)</option>
                <option value="234">Nigeria (+234)</option>
                <option value="683">Niue Island (+683)</option>
                <option value="672">Norfolk Island (+672)</option>
                <option value="850">North Korea (+850)</option>
                <option value="670">Northern Marianas Islands (Saipan, Rota, &amp; Tinian) (+670)</option>
                <option value="47">Norway (+47)</option>
                <option value="968">Oman (+968)</option>
                <option value="92">Pakistan (+92)</option>
                <option value="680">Palau (+680)</option>
                <option value="970">Palestine (+970)</option>
                <option value="809">Palm Island (+809)</option>
                <option value="507">Panama (+507)</option>
                <option value="675">Papau New Guinea (+675)</option>
                <option value="595">Paraguay (+595)</option>
                <option value="51">Peru (+51)</option>
                <option value="63">Philippines (+63)</option>
                <option value="48">Poland (+48)</option>
                <option value="351">Portugal (+351)</option>
                <option value="239">Principe (+239)</option>
                <option value="974">Qatar (+974)</option>
                <option value="262">Reunion Island (+262)</option>
                <option value="40">Romania (+40)</option>
                <option value="7">Russia (+7)</option>
                <option value="250">Rwanda (+250)</option>
                <option value="7">Sakhalin (+7)</option>
                <option value="378">San Marino (+378)</option>
                <option value="239">Sao Tome (+239)</option>
                <option value="966">Saudi Arabia (+966)</option>
                <option value="221">Senegal Republic (+221)</option>
                <option value="381">Serbia (+381)</option>
                <option value="248">Seychelles (+248)</option>
                <option value="232">Sierra Leone (+232)</option>
                <option value="65">Singapore (+65)</option>
                <option value="421">Slovakia (+421)</option>
                <option value="386">Slovenia (+386)</option>
                <option value="677">Solomon Islands (+677)</option>
                <option value="252">Somalia (+252)</option>
                <option value="27">South Africa (+27)</option>
                <option value="82">South Korea (+82)</option>
                <option value="34">Spain (+34)</option>
                <option value="94">Sri Lanka (+94)</option>
                <option value="290">St. Helena (+290)</option>
                <option value="869">St. Kitts (+869)</option>
                <option value="758">St. Lucia (+758)</option>
                <option value="508">St. Pierre &amp; Miquelon (+508)</option>
                <option value="784">St. Vincent &amp; Grenadines (+784)</option>
                <option value="249">Sudan (+249)</option>
                <option value="597">Suriname (+597)</option>
                <option value="268">Swaziland (+268)</option>
                <option value="46">Sweden (+46)</option>
                <option value="41">Switzerland (+41)</option>
                <option value="963">Syria (+963)</option>
                <option value="886">Taiwan (+886)</option>
                <option value="992">Tajikistan (+992)</option>
                <option value="255">Tanzania (+255)</option>
                <option value="66">Thailand (+66)</option>
                <option value="228">Togo (+228)</option>
                <option value="690">Tokelau (+690)</option>
                <option value="676">Tonga (+676)</option>
                <option value="868">Trinidad/Tobago (+868)</option>
                <option value="216">Tunisia (+216)</option>
                <option value="90">Turkey (+90)</option>
                <option value="993">Turkmenistan (+993)</option>
                <option value="649">Turks/Caicos (+649)</option>
                <option value="688">Tuvalu Islands (+688)</option>
                <option value="256">Uganda (+256)</option>
                <option value="380">Ukraine (+380)</option>
                <option value="971">United Arab Emirates (+971)</option>
                <option value="44">United Kingdom (+44)</option>
                <option value="878">Universal Personal Telecommunications (UPT) (+878)</option>
                <option value="598">Uruguay (+598)</option>
                <option value="340">US Virgin Islands (+340)</option>
                <option value="1">USA (+1)</option>
                <option value="998">Uzbekistan (+998)</option>
                <option value="678">Vanuatu (+678)</option>
                <option value="39">Vatican City (+39)</option>
                <option value="58">Venezuela (+58)</option>
                <option value="84">Vietnam (+84)</option>
                <option value="808">Wake Island (+808)</option>
                <option value="685">West Samoa (+685)</option>
                <option value="967">Yemen Arab Rep. (+967)</option>
                <option value="381">Yugoslavia (+381)</option>
                <option value="260">Zambia (+260)</option>
                <option value="255">Zanzibar (+255)</option>
                <option value="263">Zimbabwe (+263)</option>
                </select><br><br>
                <input type="text" id="number" name="number" placeholder="Mobile Number"
                class="form-control input-md c-square sign-up" style="font-size: 1.5rem !important;  text-transform: lowercase;"><br>
                <button style="font-size: 1.5rem;
            background: var(--orange);
            color: white;
            padding: 6px;
            border-radius: 9px;">Create New Account</button>
            </form>
        
        
</header>



<section class="home" id="home" style="background:url(image/walls.jpg) no-repeat !important;background-size: cover !important;margin-top: 85px;height: 408px;">


</section>


<section class="features" id="features">

    <h1 class="heading"> our Career<span> Services</span> </h1>

    <div class="box-container">
        <?PHP
            $con = mysqli_connect('localhost','root');
            mysqli_select_db($con,'services');
            $query = " SELECT `Name`, `About` ,`Image`FROM `service`";
            $queryfire = mysqli_query($con, $query);
            $num = mysqli_num_rows($queryfire);

            if($num > 0){
                while($product = mysqli_fetch_array($queryfire)){
        ?>
        <div class="box">
            <img src="image/<?php echo $product['Image'];?>" alt="">
            <h3><?php echo $product['Name'];?></h3>
            <p><?php echo $product['About'];?></p>
        </div>
        <?php		
		}
	    }
	    ?>

    </div>

</section>



<section class="products" id="products" >

    <h1 class="heading"> our <span>Counsellors</span> </h1>

    <div class="swiper product-slider" style="z-index: 0 !important;">

        <div class="swiper-wrapper" style="z-index: 0 !important;">

            <?PHP
                $con = mysqli_connect('localhost','root');
                mysqli_select_db($con,'counsellor');
                $query = "SELECT * FROM `counsellor`";
                $queryfire = mysqli_query($con, $query);
                $num = mysqli_num_rows($queryfire);
                
                if($num > 0){
                    while($product = mysqli_fetch_array($queryfire)){
                        ?>
            <div class="swiper-slide box" style="z-index: 0 !important;">
                <img src="image/<?php echo $product['image'];?>" alt="" style="z-index: 0 !important;">
                <h3 style="z-index: 0 !important;"><?php echo $product['Name'];?></h3>
                <div class="price" style="z-index: 0 !important;"><?php echo $product['City'];?> </div>
                <div class="stars" style="z-index: 0 !important;">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                
                
            </div>
                <?php		
        		}
	            }
	            ?>

        </div>

    </div>

    <div class="swiper product-slider"style="z-index: 0 !important;">

        <div class="swiper-wrapper" style="z-index: 0 !important;">

            <?PHP
                $con = mysqli_connect('localhost','root');
                mysqli_select_db($con,'counsellor');
                $query = " SELECT * FROM `counsellor`";
                $queryfire = mysqli_query($con, $query);
                $num = mysqli_num_rows($queryfire);
                
                if($num > 0){
                    while($product = mysqli_fetch_array($queryfire)){
                        ?>
            <div class="swiper-slide box"style="z-index: 0 !important;">
                <img src="image/<?php echo $product['image'];?>"style="z-index: 0 !important;" alt="">
                <h3 style="z-index: 0 !important;"><?php echo $product['Name'];?></h3>
                <div class="price" style="z-index: 0 !important;"><?php echo $product['City'];?> </div>
                <div class="stars" style="z-index: 0 !important;">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
            </div>
                <?php		
        		}
	            }
	            ?>

        </div>

    </div>


</section>

<section class="review" id="review">

    <h1 class="heading" style="z-index: -1 !important;"> customer's <span>review</span> </h1>

    <div class="swiper review-slider" style="z-index: 0 !important;">

        <div class="swiper-wrapper" style="z-index: -1 !important;">

            <?PHP
                $con = mysqli_connect('localhost','root');
                mysqli_select_db($con,'review');
                $query = " SELECT `Name`, `review`FROM `review`";
                $queryfire = mysqli_query($con, $query);
                $num = mysqli_num_rows($queryfire);
                    
                if($num > 0){
                    while($product = mysqli_fetch_array($queryfire)){
            ?>
                <div class="swiper-slide box" style="z-index: -1 !important;">
                    <img src="image/pic-1.png" alt="" style="z-index: -1 !important;">
                    <p style="z-index: -1 !important;"><?php echo $product['review'];?></p>
                    <h3 style="z-index: -1 !important;"><?php echo $product['Name'];?></h3>
                    <div class="stars" style="z-index: -1 !important;">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
                <?php		
        	    	}
	                }
	            ?>
                

        </div>

    </div>
</section>
<button class="btn__purple" id="trigger" style="
    background: var(--orange);
    height: 60px;
    width:  266px;
    margin-bottom: 13px;
    margin-top: 17px;
    font-size: 3rem;
    color: #fff;
    border: none;
    border-radius: 5px;
    position: relative;
    left: 634px;
    ">Add Review</button>

    <div class="modal__wrapper">
        <div class="modal__container" style="background-color:#3D3962 !important;">
            <button class="close" style="color: white;">&times;</button>
            <h2 style=" color: white;font-size: 29px;">We Appreciate Your Review!!!</h2>
            <form method="post" action="review.php">
                    <input type="text" id="fname" name="firstname" placeholder="Your name.." style="
    height: 36px;
    border: none;
    border-radius: 9px;
    font-size: 25px;
    width: 515px;
"><br>

                        <textarea id="subject" name="subject" placeholder="Write your review here.." style="height:200px;border: none;border-radius: 9px;font-size: 25px;width: 515px; margin-top:30px;"></textarea><br>
                        <input type="submit" value="Add Review"class="btn__purple"style="background: var(--orange); margin-top:24px;">
                </form>
            <div class="action">
                
            </div>
        </div>
    </div>
<section class="footer" style="">

    <div class="box-container">

        <div class="box">
            <h3> CareerVision.com <i class="fa-solid fa-building-columns"></i> </h3>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquam, saepe.</p>
            <div class="share">
                <a href="#" class="fab fa-facebook-f"></a>
                <a href="#" class="fab fa-twitter"></a>
                <a href="#" class="fab fa-instagram"></a>
                <a href="#" class="fab fa-linkedin"></a>
            </div>
        </div>

        <div class="box">
            <h3>contact info</h3>
            <a href="#" class="links"> <i class="fas fa-phone"></i> +123-456-7890 </a>
            <a href="#" class="links"> <i class="fas fa-phone"></i> +111-222-3333 </a>
            <a href="#" class="links"> <i class="fas fa-envelope"></i> jayank@gmail.com </a>
            <a href="#" class="links"> <i class="fas fa-map-marker-alt"></i> mumbai, india - 400104 </a>
        </div>

        <div class="box">
            <h3>quick links</h3>
            <a href="index.php" class="links"> <i class="fas fa-arrow-right"></i> home </a>
            <a href="index.php#features" class="links"> <i class="fas fa-arrow-right"></i> Career Services </a>
            <a href="index.php#products" class="links"> <i class="fas fa-arrow-right"></i> Counsellors </a>
            
            <a href="#review" class="links"> <i class="fas fa-arrow-right"></i> review </a>
            
        </div>

        <div class="box">
            <h3>newsletter</h3>
            <p>subscribe for latest updates</p>
            <input type="email" placeholder="your email" class="email">
            <input type="submit" value="subscribe" class="btn">
            <img src="image/payment.png" class="payment-img" alt="">
        </div>

    </div>

</section>
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<script src="js/script.js"></script>

<script>const trigger = document.querySelector('#trigger');
        const modalWrapper = document.querySelector('.modal__wrapper');
        const closeBtn = document.querySelector('.close');
        
        trigger.addEventListener('click', function(){
            openModal();
        });
        
        closeBtn.addEventListener('click', function(){
            closeModal();
        });
        
        modalWrapper.addEventListener('click', function(e){
            if(e.target !== this) return;
            closeModal();
        });
        
        document.addEventListener('keydown', function(e){
            if(e.key === 'Escape') {
                closeModal();
            }
        })
        
        function openModal() {
            modalWrapper.classList.add('active');
        }
        function closeModal() {
            modalWrapper.classList.remove('active');
        }</script>
        
            <script>const trigger = document.querySelector('#regist');
            const modalWrapper = document.querySelector('.modal__wrapper');
            const closeBtn = document.querySelector('.close');
            
            trigger.addEventListener('click', function(){
                openModal();
            });
            
            closeBtn.addEventListener('click', function(){
                closeModal();
            });
            
            modalWrapper.addEventListener('click', function(e){
                if(e.target !== this) return;
                closeModal();
            });
            
            document.addEventListener('keydown', function(e){
                if(e.key === 'Escape') {
                    closeModal();
                }
            })
            
            function openModal() {
                modalWrapper.classList.add('active');
            }
            function closeModal() {
                modalWrapper.classList.remove('active');
            }</script>


</body>
</html>