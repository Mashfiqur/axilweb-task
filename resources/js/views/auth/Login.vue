<template>
    <div class="container h-100">
        <div class="login_name_wrapper">
            <div class="d-flex justify-content-center">ABC UNIVERSITY</div>
        </div>
        <div class="d-flex justify-content-center h-50" >
            <div class="user_card">
                <div class="d-flex justify-content-center">
                    <div class="login_logo_container"> <img src="https://crezzur.com/img/projects/27-home_default.png" class="login_logo" alt="Logo"> </div>
                </div>
                <div class="d-flex justify-content-center form_container">
                    <form style="width: 320px" @submit.prevent="loginFormSubmit">
                        <div id="msgcont" class="d-flex justify-content-center d-none">
                            <div id="msg" class="alert alert-danger py-1 px-2" role="alert"></div>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-append"> <span class="input-group-text"><i class="fa fa-user"></i></span> </div>
                            <input id="email" type="text" name="email" v-model="loginFormData.email" class="form-control input_user" placeholder="info@crezzur.com" required>
                        </div>
                        <div class="input-group mb-4">
                            <div class="input-group-append"> <span class="input-group-text"><i class="fa fa-key"></i></span> </div>
                            <input id="pass" type="password" name="password" v-model="loginFormData.password" class="form-control input_pass" placeholder="*********" required>
                        </div>

                        <div class="d-flex justify-content-center mt-3 login_container">
                            <button type="submit" :disabled="processing" class="btn login_btn">
                              {{ processing ? "Please wait" : "Login" }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>


<script>
import {mapGetters, mapActions} from 'vuex'

export default {
    name: "Login",
    data() {
        return {
            loginFormData: {
                email: '',
                password: ''
            },
            processing:false
        }
    },
    computed: {
        ...mapGetters({
          authenticated: 'auth/authenticated',
          token: 'auth/token',
        })
    },
    methods:{
        ...mapActions({
            submitLogin:'auth/submitLogin'
        }),
        loginFormSubmit(){
            this.submitLogin(this.loginFormData)
        },
    },
    created(){
      if(this.authenticated != "false" && this.token != ""){
        this.$router.push('/dashboard')
      }
    }
}
</script>

<style>

html, body {
  margin: 0;
  height: 100%;
}

.user_card {
  height: 400px;
  width: 400px;
  margin-top: auto;
  margin-bottom: auto;
  background: #fff;
  position: relative;
  display: flex;
  justify-content: center;
  flex-direction: column;
  padding: 10px;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  -webkit-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  -moz-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  border-radius: 5px;
}
.login_name_wrapper {
    height: 20%!important;
    min-height: 200px;
    margin-bottom: auto;
    margin-top: auto;
    position: relative;
    display: flex;
    justify-content: center;
    flex-direction: column;
    color: #FFF;
    font-size: 35px;
    font-weight: bold;
    text-transform: uppercase;
}
.login_logo_container {
  position: absolute;
  height: 170px;
  width: 170px;
  top: -75px;
  border-radius: 50%;
  background: #233588;
  padding: 10px;
  text-align: center;
}
.login_logo {
  height: 150px;
  width: 150px;
  border-radius: 50%;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.5), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  -webkit-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.5), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  -moz-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.5), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
.form_container {
  margin-top: 100px;
}
.login_btn {
  width: 100%;
  background: #233588 !important;
  color: white !important;
}
.login_btn:hover {
  background: #2c44b0!important;
}

.login_container {
  padding: 0 2rem;
}
.input-group-text {
  background: #233588 !important;
  color: white !important;
  border: 0 !important;
  border-radius: 0.25rem 0 0 0.25rem !important;
}
.input_user, .input_pass:focus {
  box-shadow: none !important;
  outline: 0px !important;
}
.custom-checkbox .custom-control-input:checked ~ .custom-control-label::before {
  background-color: #233588 !important;
}
.input-group-text {
  height: 38px;
}
</style>
