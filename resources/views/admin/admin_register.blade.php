<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Register</title>

    <!-- Fontfaces CSS-->
    @include('admin.body.css')

</head>

<body class="animsition">
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#">
                                <img src="{{asset('admin_assets/images/icon/logo.png')}}" alt="CoolAdmin">
                            </a>
                        </div>
                        <div class="login-form">
                            <form action="{{route('admin.register.create')}}" method="post">
                                @csrf
                                <div class="form-group row">

                                    <div class="col-md-6 ">
                                        <label for="">UserName</label>
                                        <input  type="text" name="uname" id="" class="form-control">
                                    </div>
    
    
                                    <div class="col-md-6">
                                        <label for="">Department Name</label>
                                        <input  type="text" name="dept_name" id="" class="form-control">
                                    </div>
            
                                    <div class="col-md-12 mt-3">
                                        <label for="">Department Address</label>
                                        <textarea  name="dept_address" id="" class="form-control" cols="30" rows="2"></textarea>
                                    </div>
    
                                    <div class="col-md-6 mt-2">
                                        <label for="">Email Address</label>
                                        <input  type="email" name="email" id="" class="form-control">
                                    </div>
            
                                    <div class="col-md-6 mt-2">
                                        <label for="">Phone</label>
                                        <input  type="text" name="phone" id="" class="form-control">
                                    </div>
    
                                    <div class="col-md-6 mt-2">
                                        <label for="">Street Address</label>
                                        <input  type="text" name="st_address" id="" class="form-control">
                                    </div>
            
                                    <div class="col-md-4 mt-2">
                                        <label for="">Postal Code</label>
                                        <input  type="text" name="p_code" id="" class="form-control">
                                    </div>
    
                                    <div class="col-md-12 mt-2">
                                        <label for="">Pasword</label>
                                        <input  type="text" name="password" id="" class="form-control" >
                                    </div>
            
                                    <div class="col-12 mt-2" >
                                        <label for="">LTS Number</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                 <select class="custom-select form-control" id="lts_number" name="countryCode" required="" onchange="updatePlaceholder()" >
                                                    <optgroup label="Other countries">
                                                        <option data-countryCode="CA" value="+0002" selected>Alberta (RT0-02)</option>
                                                        <option data-countryCode="PK" value="+0003" placeholder="hi">Quebec (RT0001)</option>
                                                        <option data-countryCode="GB" value="+0001" >Ontario (+44)</option>
                                             
                                                    </optgroup>
                                                </select>
                                            </div>
                                            <input id="phone" class="form-control" type="text" name="lts_code" required="" placeholder="Enter 9 Digits Number" :value="old('phone')" >
                                        </div>
                                    </div>
    
                                    <div class="col-md-12 mt-4">
                                        <input type="submit" value="Register Vendor" class="form-control btn btn-success">
                                        </div>
                                </div>ss="au-btn au-btn--block au-btn--green m-b-20" type="submit">register</button>
                                
                            </form>
                            <div class="register-link">
                                <p>
                                    Already have account?
                                    <a href="{{route('login_form')}}">Sign In</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

  @include('admin.body.js')

</body>

</html>
<!-- end document-->