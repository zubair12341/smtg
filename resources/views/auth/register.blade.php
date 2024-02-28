<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- favicon -->
    <link rel="icon" type="image/png" href="{{ asset('assets/images/favicon.png') }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets2/css/bootstrap.min.css') }}" media="all">
    <!-- Fonts Awesome CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets2/css/all.min.css') }}">
    <!-- google fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,400&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,400&display=swap"
        rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets2/css/style.css') }}">
    <title>Smart Tour Guide | Register </title>
</head>

<body>
    <div class="login-page" style="background-image: url({{ asset('assets2/images/bg.jpg') }}); height: 100%;">
        <div class="login-from-wrap" style="">

            <form method="POST" action="{{ route('register') }}" class="login-from" enctype="multipart/form-data">
                @csrf
                <h1 class="site-title">
                    <a href="#">
                        <img src="{{ asset('assets2/images/logo.png') }}" alt="">
                    </a>
                </h1>
                <div class="row">
                    @php
                        $userData = session()->get('userData');
                        // dump($userData);
                    @endphp
                    @if (isset($userData))
                    <input type="hidden" name="my_image" value="{{$userData['image']}}">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="first_name1">Name <b style="color: red">*</b></label>
                                <input type="text" name="name"
                                    class="validate @error('name') is-invalid @enderror" value="{{ $userData['name'] }}"
                                    readonly required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="first_name1">Email <b style="color: red">*</b></label>
                                <input type="text" name="email"
                                    class="validate @error('email') is-invalid @enderror"
                                    value="{{ $userData['email'] }}" readonly required autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="last_name">User Type <b style="color: red">*</b></label>
                                <select name="user_type" id="user_type" class="form-controll" required
                                    onchange="showFields()">
                                    <option value="" disabled selected>Choose User Type</option>
                                    <option value="Tourist">Tourist</option>
                                    <option value="Driver">Driver</option>
                                </select>
                                @error('user_type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    @else
                        <div class="col-6">
                            <div class="form-group">
                                <label for="first_name1">Name <b style="color: red">*</b></label>
                                <input type="text" name="name"
                                    class="validate @error('name') is-invalid @enderror" value="{{ old('name') }}"
                                    required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="first_name1">Email <b style="color: red">*</b></label>
                                <input type="text" name="email"
                                    class="validate @error('email') is-invalid @enderror" value="{{ old('email') }}"
                                    required autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="form-group col">
                                    <label for="last_name">Password <b style="color: red">*</b></label>
                                    <input id="last_name" name="password" type="password"
                                        class="validate @error('password') is-invalid @enderror" required
                                        autocomplete="current-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group col">
                                    <label for="last_name">Confirm Password <b style="color: red">*</b></label>
                                    <input id="last_name" name="password_confirmation" type="password"
                                        class="validate @error('password_confirmation') is-invalid @enderror" required
                                        autocomplete="new-password">
                                    @error('password_confirmation')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="last_name">User Type <b style="color: red">*</b></label>
                                <select name="user_type" id="user_type" class="form-controll" required
                                    onchange="showFields()">
                                    <option value="" disabled selected>Choose User Type</option>
                                    <option value="Tourist">Tourist</option>
                                    <option value="Driver">Driver</option>
                                </select>
                                @error('user_type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="last_name">Upload Profile</label>
                                <input type="file" name="image" class="form-control">
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    @endif
                    <div class="col-6">

                        <div class="row">
                            <div class="col form-group">
                                <label for="">Country <b style="color: red">*</b></label>
                                <input type="text" name="country" class="fomr-controll"
                                    placeholder="enter you country name">
                            </div>
                            <div class="col form-group">
                                <label for="">State <b style="color: red">*</b></label>
                                <input type="text" name="state" placeholder="enter your state name"
                                    class="fomr-controll">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col form-group">
                                <label for="">City <b style="color: red">*</b></label>

                                <select name="city">
                                    <option value="" disabled selected>Select The City</option>
                                    <option value="Islamabad">Islamabad</option>
                                    <option value="" disabled>Punjab Cities</option>
                                    {{-- <option value="Ahmed Nager Chatha">Ahmed Nager Chatha</option>
                                    <option value="Ahmadpur East">Ahmadpur East</option>
                                    <option value="Ali Khan Abad">Ali Khan Abad</option>
                                    <option value="Alipur">Alipur</option>
                                    <option value="Arifwala">Arifwala</option>
                                    <option value="Attock">Attock</option>
                                    <option value="Bhera">Bhera</option>
                                    <option value="Bhalwal">Bhalwal</option>
                                    <option value="Bahawalnagar">Bahawalnagar</option> --}}
                                    <option value="Bahawalpur">Bahawalpur</option>
                                    {{-- <option value="Bhakkar">Bhakkar</option>
                                    <option value="Burewala">Burewala</option>
                                    <option value="Chillianwala">Chillianwala</option>
                                    <option value="Chakwal">Chakwal</option>
                                    <option value="Chichawatni">Chichawatni</option>
                                    <option value="Chiniot">Chiniot</option>
                                    <option value="Chishtian">Chishtian</option>
                                    <option value="Daska">Daska</option>
                                    <option value="Darya Khan">Darya Khan</option>
                                    <option value="Dera Ghazi Khan">Dera Ghazi Khan</option>
                                    <option value="Dhaular">Dhaular</option>
                                    <option value="Dina">Dina</option>
                                    <option value="Dinga">Dinga</option>
                                    <option value="Dipalpur">Dipalpur</option>
                                    <option value="Faisalabad">Faisalabad</option>
                                    <option value="Ferozewala">Ferozewala</option>
                                    <option value="Fateh Jhang">Fateh Jang</option>
                                    <option value="Ghakhar Mandi">Ghakhar Mandi</option>
                                    <option value="Gojra">Gojra</option> --}}
                                    <option value="Gujranwala">Gujranwala</option>
                                    {{-- <option value="Gujrat">Gujrat</option>
                                    <option value="Gujar Khan">Gujar Khan</option>
                                    <option value="Hafizabad">Hafizabad</option>
                                    <option value="Haroonabad">Haroonabad</option>
                                    <option value="Hasilpur">Hasilpur</option>
                                    <option value="Haveli Lakha">Haveli Lakha</option>
                                    <option value="Jatoi">Jatoi</option>
                                    <option value="Jalalpur">Jalalpur</option>
                                    <option value="Jattan">Jattan</option>
                                    <option value="Jampur">Jampur</option>
                                    <option value="Jaranwala">Jaranwala</option>
                                    <option value="Jhang">Jhang</option>
                                    <option value="Jhelum">Jhelum</option>
                                    <option value="Kalabagh">Kalabagh</option>
                                    <option value="Karor Lal Esan">Karor Lal Esan</option>
                                    <option value="Kasur">Kasur</option>
                                    <option value="Kamalia">Kamalia</option>
                                    <option value="Kamoke">Kamoke</option>
                                    <option value="Khanewal">Khanewal</option>
                                    <option value="Khanpur">Khanpur</option>
                                    <option value="Kharian">Kharian</option>
                                    <option value="Khushab">Khushab</option>
                                    <option value="Kot Addu">Kot Addu</option>
                                    <option value="Jauharabad">Jauharabad</option> --}}
                                    <option value="Lahore">Lahore</option>
                                    {{-- <option value="Lalamusa">Lalamusa</option>
                                    <option value="Layyah">Layyah</option>
                                    <option value="Liaquat Pur">Liaquat Pur</option>
                                    <option value="Lodhran">Lodhran</option>
                                    <option value="Malakwal">Malakwal</option>
                                    <option value="Mamoori">Mamoori</option>
                                    <option value="Mailsi">Mailsi</option>
                                    <option value="Mandi Bahauddin">Mandi Bahauddin</option>
                                    <option value="Mian Channu">Mian Channu</option> --}}
                                    <option value="Mianwali">Mianwali</option>
                                    <option value="Multan">Multan</option>
                                    <option value="Murree">Murree</option>
                                    {{-- <option value="Muridke">Muridke</option>
                                    <option value="Mianwali Bangla">Mianwali Bangla</option>
                                    <option value="Muzaffargarh">Muzaffargarh</option>
                                    <option value="Narowal">Narowal</option>
                                    <option value="Nankana Sahib">Nankana Sahib</option>
                                    <option value="Okara">Okara</option>
                                    <option value="Renala Khurd">Renala Khurd</option>
                                    <option value="Pakpattan">Pakpattan</option>
                                    <option value="Pattoki">Pattoki</option>
                                    <option value="Pir Mahal">Pir Mahal</option>
                                    <option value="Qaimpur">Qaimpur</option>
                                    <option value="Qila Didar Singh">Qila Didar Singh</option>
                                    <option value="Rabwah">Rabwah</option>
                                    <option value="Raiwind">Raiwind</option>
                                    <option value="Rajanpur">Rajanpur</option>
                                    <option value="Rahim Yar Khan">Rahim Yar Khan</option>
                                    <option value="Rawalpindi">Rawalpindi</option>
                                    <option value="Sadiqabad">Sadiqabad</option>
                                    <option value="Safdarabad">Safdarabad</option>
                                    <option value="Sahiwal">Sahiwal</option>
                                    <option value="Sangla Hill">Sangla Hill</option>
                                    <option value="Sarai Alamgir">Sarai Alamgir</option> --}}
                                    <option value="Sargodha">Sargodha</option>
                                    {{-- <option value="Shakargarh">Shakargarh</option>
                                    <option value="Sheikhupura">Sheikhupura</option> --}}
                                    <option value="Sialkot">Sialkot</option>
                                    {{-- <option value="Sohawa">Sohawa</option>
                                    <option value="Soianwala">Soianwala</option>
                                    <option value="Siranwali">Siranwali</option>
                                    <option value="Talagang">Talagang</option>
                                    <option value="Taxila">Taxila</option>
                                    <option value="Toba Tek Singh">Toba Tek Singh</option>
                                    <option value="Vehari">Vehari</option>
                                    <option value="Wah Cantonment">Wah Cantonment</option> --}}
                                    <option value="Wazirabad">Wazirabad</option>
                                    <option value="" disabled>Sindh Cities</option>
                                    {{-- <option value="Badin">Badin</option>
                                    <option value="Bhirkan">Bhirkan</option>
                                    <option value="Rajo Khanani">Rajo Khanani</option>
                                    <option value="Chak">Chak</option>
                                    <option value="Dadu">Dadu</option>
                                    <option value="Digri">Digri</option>
                                    <option value="Diplo">Diplo</option>
                                    <option value="Dokri">Dokri</option>
                                    <option value="Ghotki">Ghotki</option>
                                    <option value="Haala">Haala</option> --}}
                                    <option value="Hyderabad">Hyderabad</option>
                                    {{-- <option value="Islamkot">Islamkot</option>
                                    <option value="Jacobabad">Jacobabad</option>
                                    <option value="Jamshoro">Jamshoro</option>
                                    <option value="Jungshahi">Jungshahi</option>
                                    <option value="Kandhkot">Kandhkot</option>
                                    <option value="Kandiaro">Kandiaro</option> --}}
                                    <option value="Karachi">Karachi</option>
                                    {{-- <option value="Kashmore">Kashmore</option>
                                    <option value="Keti Bandar">Keti Bandar</option>
                                    <option value="Khairpur">Khairpur</option>
                                    <option value="Kotri">Kotri</option>
                                    <option value="Larkana">Larkana</option>
                                    <option value="Matiari">Matiari</option>
                                    <option value="Mehar">Mehar</option> --}}
                                    <option value="Mirpur Khas">Mirpur Khas</option>
                                    {{-- <option value="Mithani">Mithani</option>
                                    <option value="Mithi">Mithi</option>
                                    <option value="Mehrabpur">Mehrabpur</option>
                                    <option value="Moro">Moro</option>
                                    <option value="Nagarparkar">Nagarparkar</option>
                                    <option value="Naudero">Naudero</option>
                                    <option value="Naushahro Feroze">Naushahro Feroze</option>
                                    <option value="Naushara">Naushara</option> --}}
                                    <option value="Nawabshah">Nawabshah</option>
                                    {{-- <option value="Nazimabad">Nazimabad</option>
                                    <option value="Qambar">Qambar</option>
                                    <option value="Qasimabad">Qasimabad</option>
                                    <option value="Ranipur">Ranipur</option>
                                    <option value="Ratodero">Ratodero</option> --}}
                                    <option value="Rohri">Rohri</option>
                                    {{-- <option value="Sakrand">Sakrand</option>
                                    <option value="Sanghar">Sanghar</option>
                                    <option value="Shahbandar">Shahbandar</option>
                                    <option value="Shahdadkot">Shahdadkot</option>
                                    <option value="Shahdadpur">Shahdadpur</option>
                                    <option value="Shahpur Chakar">Shahpur Chakar</option>
                                    <option value="Shikarpaur">Shikarpaur</option> --}}
                                    <option value="Sukkur">Sukkur</option>
                                    {{-- <option value="Tangwani">Tangwani</option>
                                    <option value="Tando Adam Khan">Tando Adam Khan</option>
                                    <option value="Tando Allahyar">Tando Allahyar</option>
                                    <option value="Tando Muhammad Khan">Tando Muhammad Khan</option>
                                    <option value="Thatta">Thatta</option>
                                    <option value="Umerkot">Umerkot</option>
                                    <option value="Warah">Warah</option> --}}
                                    <option value="" disabled>Khyber Cities</option>
                                    <option value="Abbottabad">Abbottabad</option>
                                    {{-- <option value="Adezai">Adezai</option>
                                    <option value="Alpuri">Alpuri</option>
                                    <option value="Akora Khattak">Akora Khattak</option>
                                    <option value="Ayubia">Ayubia</option>
                                    <option value="Banda Daud Shah">Banda Daud Shah</option>
                                    <option value="Bannu">Bannu</option>
                                    <option value="Batkhela">Batkhela</option>
                                    <option value="Battagram">Battagram</option>
                                    <option value="Birote">Birote</option>
                                    <option value="Chakdara">Chakdara</option>
                                    <option value="Charsadda">Charsadda</option>
                                    <option value="Chitral">Chitral</option>
                                    <option value="Daggar">Daggar</option>
                                    <option value="Dargai">Dargai</option>
                                    <option value="Darya Khan">Darya Khan</option>
                                
                                    <option value="Doaba">Doaba</option>
                                    <option value="Dir">Dir</option>
                                    <option value="Drosh">Drosh</option>
                                    <option value="Hangu">Hangu</option>
                                    <option value="Haripur">Haripur</option>
                                    <option value="Karak">Karak</option>
                                    <option value="Kohat">Kohat</option>
                                    <option value="Kulachi">Kulachi</option>
                                    <option value="Lakki Marwat">Lakki Marwat</option>
                                    <option value="Latamber">Latamber</option>
                                    <option value="Madyan">Madyan</option>
                                
                                    <option value="Mardan">Mardan</option>
                                    <option value="Mastuj">Mastuj</option>
                                    <option value="Mingora">Mingora</option>
                                    <option value="Nowshera">Nowshera</option>
                                    <option value="Paharpur">Paharpur</option>
                                    <option value="Pabbi">Pabbi</option> --}}
                                    <option value="Dera Ismail Khan">Dera Ismail Khan</option>
                                    <option value="Mansehra">Mansehra</option>
                                    <option value="Peshawar">Peshawar</option>
                                    {{-- <option value="Saidu Sharif">Saidu Sharif</option>
                                    <option value="Shorkot">Shorkot</option>
                                    <option value="Shewa Adda">Shewa Adda</option>
                                    <option value="Swabi">Swabi</option>
                                    <option value="Swat">Swat</option>
                                    <option value="Tangi">Tangi</option>
                                    <option value="Tank">Tank</option>
                                    <option value="Thall">Thall</option>
                                    <option value="Timergara">Timergara</option>
                                    <option value="Tordher">Tordher</option> --}}
                                    <option value="" disabled>Balochistan Cities</option>
                                    {{-- <option value="Awaran">Awaran</option>
                                    <option value="Barkhan">Barkhan</option>
                                    <option value="Chagai">Chagai</option>
                                    <option value="Dera Bugti">Dera Bugti</option> --}}
                                    <option value="Gwadar">Gwadar</option>
                                    {{-- <option value="Harnai">Harnai</option>
                                    <option value="Jafarabad">Jafarabad</option>
                                    <option value="Jhal Magsi">Jhal Magsi</option>
                                    <option value="Kacchi">Kacchi</option>
                                    <option value="Kalat">Kalat</option>
                                    <option value="Kech">Kech</option>
                                    <option value="Kharan">Kharan</option>
                                    <option value="Khuzdar">Khuzdar</option>
                                    <option value="Killa Abdullah">Killa Abdullah</option>
                                    <option value="Killa Saifullah">Killa Saifullah</option>
                                    <option value="Kohlu">Kohlu</option>
                                    <option value="Lasbela">Lasbela</option>
                                    <option value="Lehri">Lehri</option>
                                    <option value="Loralai">Loralai</option>
                                    <option value="Mastung">Mastung</option>
                                    <option value="Musakhel">Musakhel</option>
                                    <option value="Nasirabad">Nasirabad</option>
                                    <option value="Nushki">Nushki</option>
                                    <option value="Panjgur">Panjgur</option>
                                    <option value="Pishin Valley">Pishin Valley</option> --}}
                                    <option value="Quetta">Quetta</option>
                                    {{-- <option value="Sherani">Sherani</option>
                                    <option value="Sibi">Sibi</option>
                                    <option value="Sohbatpur">Sohbatpur</option>
                                    <option value="Washuk">Washuk</option>
                                    <option value="Zhob">Zhob</option> --}}
                                    <option value="Ziarat">Ziarat</option>
                                </select>
                            </div>
                            <div class="col form-group">
                                <label for="">phone <b style="color: red">*</b></label>
                                <input type="number" name="phone" placeholder="enter your phone no"
                                    class="fomr-controll">
                            </div>
                        </div>

                        <hr style="padding-bottom: 5px; padding-top:5px;">

                        {{--    --}}
                        <div id="touristFields" style="display: none;">
                            <!-- Tourist Fields -->

                            <div class="form-group">
                                <label for="last_name">Place Type</label>
                                <select name="place_type" id="place_type" class="form-controll" required
                                    onchange="showFields()">
                                    <option value="Nature">Nature</option>
                                    <option value="Religious">Religious</option>
                                    <option value="Architect">Architect</option>
                                </select>
                                @error('place_type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="last_name">Food Type <b style="color: red">*</b></label>
                                <select name="food_type" id="food_type" class="form-controll" required
                                    onchange="showFields()">
                                    <option value="Desi Food">Desi Food</option>
                                    <option value="Chinees">Chinees</option>
                                    <option value="Italian">Italian</option>
                                </select>
                                @error('food_type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="last_name">Accomodation Type <b style="color: red">*</b></label>
                                <select name="accomodation_type" id="accomodation_type" class="form-controll"
                                    required onchange="showFields()">
                                    <option value="High Rated">High Rated</option>
                                    <option value="Average Rated">Average Rated</option>
                                    <option value="Cheap Rated">Cheap Rated</option>
                                </select>
                                @error('accomodation_type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div id="driverFields"
                            style="display: none; overflow-y: scroll;overflow-x: hidden; height: 600px; padding 15px">
                            <!-- Driver Fields -->
                            <div class="row">
                                <div class="form-group col">
                                    <label for="">Age <b style="color: red">*</b></label>
                                    <input type="number" name="age" placeholder="enter your age"
                                        class="fomr-controll">
                                </div>
                                <div class="form-group col">
                                    <label for="">CNIC (without brackets) <b style="color: red">*</b></label>
                                    <input type="number" name="cnic" placeholder="enter your cnic"
                                        class="fomr-controll">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="">Address <b style="color: red">*</b></label>
                                <input type="text" name="address" placeholder="enter your complete address"
                                    class="fomr-controll">
                            </div>
                            <div class="form-group">
                                <label for="">Location <b style="color: red">*</b></label>
                                <input type="text" name="location" placeholder="enter your complete address"
                                    class="fomr-controll">
                            </div>
                            <div class="form-group">
                                <textarea name="driver_personal_info" id="" cols="3" rows="2" placeholder="Personal Info"></textarea>
                            </div>
                            <div class="row">
                                <div class="form-group col">
                                    <label for="">Price per day <b style="color: red">*</b></label>
                                    <input type="number" name="price_per_day" placeholder="enter price per day"
                                        class="fomr-controll">
                                </div>
                                <div class="form-group col">
                                    <label for="last_name">Vehicle Type <b style="color: red">*</b></label>
                                    <select name="vehicle_type" id="vehicle_type" class="form-controll">
                                        <option value="Sedan">Sedan</option>
                                        <option value="SUV">SUV</option>
                                        <option value="Hatchback">Hatchback</option>
                                        <option value="Minivan">Minivan</option>
                                    </select>
                                    @error('vehicle_type')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col">
                                    <label for="">Model <b style="color: red">*</b></label>
                                    <input type="text" name="model" placeholder="enter car model"
                                        class="fomr-controll">
                                </div>
                                <div class="form-group col">
                                    <label for="">Manufacturer <b style="color: red">*</b></label>
                                    <input type="text" name="manufacturer" placeholder="enter car manufacturer"
                                        class="fomr-controll">
                                </div>
                            </div>
                        </div>

                        {{--  --}}
                    </div>

                    <div class="form-group">
                        <button class="btn button-primary" type="submit">Register</button>
                        <a href="{{ route('forgot.page') }}" class="for-pass">Forgot Password?</a>
                    </div>
            </form>
        </div>
    </div>
    </div>

    <!-- *Scripts* -->
    <script src="{{ asset('assets2/js/jquery-3.2.1.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="{{ asset('assets2/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets2/js/canvasjs.min.js') }}"></script>
    <script src="{{ asset('assets2/js/counterup.min.js') }}"></script>
    <script src="{{ asset('assets2/js/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('assets2/js/dashboard-custom.js') }}"></script>
</body>

</html>

<script>
    function showFields() {
        var userType = document.getElementById('user_type').value;
        var touristFields = document.getElementById('touristFields');
        var driverFields = document.getElementById('driverFields');

        if (userType === 'Tourist') {
            touristFields.style.display = 'block';
            driverFields.style.display = 'none';
        } else if (userType === 'Driver') {
            touristFields.style.display = 'none';
            driverFields.style.display = 'block';
        } else {
            touristFields.style.display = 'none';
            driverFields.style.display = 'none';
        }
    }
</script>
