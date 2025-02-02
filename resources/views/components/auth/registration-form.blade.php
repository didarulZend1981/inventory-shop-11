
<div class="container">
    <div class="row justify-content-center">
    <div class="row justify-content-center">
        <div class="col-md-7 animated fadeIn col-lg-6 center-screen">
            <div class="card w-90  p-4">
                    <h4>Sign Up</h4>
                    <hr/>
                    <div class="container-fluid m-0 p-0">
                        <div class="row m-0 p-0">
                            
                            <div class="col-full p-2">
                                <label>Full Name</label> 
                                <input id="name" placeholder="Full Name" class="form-control" type="text"/>
                            </div>

                            <div class="col-full p-2">
                                <label>E-mail</label> 
                                <input id="email" placeholder="E-mail" class="form-control" type="text"/>
                            </div>
                           
                            <div class="col-full p-2">
                                <label>Mobile Number</label>
                                <input id="mobile" placeholder="Mobile" class="form-control" type="mobile"/>
                            </div>
                            <div class="col-full p-2">
                                <label>Password</label>
                                <input id="password" placeholder="User Password" class="form-control" type="password"/>
                            </div>
                        </div>
                        <div class="row m-0 p-0">
                            <div class="col-md-4 p-2">
                                <button onclick="onRegistration()" class="btn mt-3 w-100  bg-gradient-primary">Complete</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

async function onRegistration() {

        let email = document.getElementById('email').value;
        let name = document.getElementById('name').value;
        let mobile = document.getElementById('mobile').value;
        let password = document.getElementById('password').value;

        console.log("email--",email);
        console.log("name--",name);
        console.log("mobile--",mobile);
        console.log("password--",password);

        if(email.length===0){
            errorToast('Email is required')
        }
        else if(name.length===0){
            errorToast('full Name is required')
        }
       
        else if(mobile.length===0){
            errorToast('Mobile is required')
        }
        else if(password.length===0){
            errorToast('Password is required')
        }
        else{
            showLoader();
            let res=await axios.post("/user-registration",{
                email:email,
                name:name,
                mobile:mobile,
                password:password
            })
            hideLoader();
            if(res.status===200 && res.data['status']==='success'){
                successToast(res.data['message']);
                setTimeout(function (){
                    window.location.href='/'
                },2000)
            }
            else{
                errorToast(res.data['message'])
            }
        }
  
 
    }

</script>
