<template>
     <div class="auth-sidebar p-3">
        <div class="login-social-sidebar" v-if="!(user.user_id > 0) && !is_register">
            <h5 class="Heavent_med">สมัครสมาชิก เพื่อเป็นสาวซันเด</h5>
            <p class="control">
                <button class="btn btn-secondary btn-block" @click="sidebarFbLogin">
                    <i class="icon-facebook"></i>
                    <span>Login with Facebook</span>
                </button>
                <button class="btn btn-secondary btn-block">
                    <i class="icon-google"></i>
                    <span>Login with Google</span>
                </button>
                <button class="btn btn-secondary btn-block" @click="is_register = true">
                    <i class="icon-email"></i>
                    <span>Sign up with Email</span>
                </button>
            </p>
        </div>

        <hr v-if="!(user.user_id > 0) && !is_register">

        <div class="login-form-sidebar" v-if="!(user.user_id > 0) && !is_register">
            <h5 class="Heavent_med">เป็นสาวซันเด/จีบันอยู่แล้ว เข้าสู่ระบบ</h5>

            <div class="form-group">
                    <input type="text" class="form-control" placeholder="ล็อกอิน" v-model="login.username">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" placeholder="รหัสผ่าน" v-model="login.password">
            </div>
            <button type="submit" class="btn btn-primary btn-block" @click="sidebarLogin">Login</button>
            <a class="btn btn-link btn-block" href="javascript:;">ลืมรหัสผ่าน</a>
        </div>

        <div class="register-form-sidebar" v-if="!(user.user_id > 0) && is_register">
            <h5 class="Heavent_med">สมัครสมาชิกด้วยอีเมล</h5>

            <div class="form-group">
                <input type="text" class="form-control" placeholder="ชื่อ" v-model="register.name">
            </div>
            <div class="form-group">
                <input type="email" class="form-control" placeholder="อีเมล" v-model="register.email">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" placeholder="รหัสผ่าน" v-model="register.password">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" placeholder="ยืนยันรหัสผ่าน" v-model="register.password_confirmation">
            </div>
            <button type="submit" class="btn btn-primary btn-block" @click="sidebarRegister">สมัครสมาชิก</button>
            <a class="btn btn-link btn-block" href="javascript:;" @click="is_register = false">กลับไปหน้าล็อกอิน</a>
        </div>

        <ul v-if="(user.user_id > 0)" class="action-list nav flex-column">
            <li class="nav-item">
                <a class="collapsed" data-toggle="collapse" href="#aside-right-nav-create" aria-expanded="true" aria-controls="aside-right-nav-create">
                    <span class="icon home"></span><span>+ Create</span>
                </a>
                <ul class="action-list nav collapse in flex-column" id="aside-right-nav-create" aria-expanded="true">
                    <li class="nav-item"><a href="#"><i class="icon-write"></i><span>Create Topic</span></a></li>
                </ul>
            </li>
            <li class="nav-item"><a href="#"><i class="icon-search"></i><span>Search</span></a></li>
            <li class="nav-item"><a href="#"><i class="icon-member"></i><span>My Page</span></a></li>
            <li class="nav-item hl-item"><a href="#" @click="sidebarLogout"><span>Log Out</span></a></li>
        </ul>
    </div>
</template>

<script>
    export default {
        created() {
            /*
            window.fbAsyncInit = function() {
                FB.init({
                    appId: '631437230238974',
                    xfbml: true,
                    version: 'v2.7'
                });

                //This function should be here, inside window.fbAsyncInit
                FB.getLoginStatus(function(response) {
                    console.log(response);
                });
            };
            */

            console.log(user);

            (function(d, s, id){
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) {return;}
                js = d.createElement(s); js.id = id;
                js.src = "//connect.facebook.net/en_US/sdk.js";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
        },
        props: ['user'],
        data () {
            return {
                is_register: false,
                login: { username: '', password: '', remember: false},
                register: { username: '', email: '', password: ''},
                // user: user
            }
        },
        methods: {
            sidebarLogin() {
                axios.post('/api/login', this.login).then((response) => {
                    console.log(response.data);
                    if (response.data.SUCCESS) {
                        console.log(response.data.TOKEN);
                        localStorage.setItem('token', response.data.TOKEN)
                        window.axios.defaults.headers.common.Authorization = 'Bearer ' + localStorage.getItem('token');

                        axios.get('/api/user').then((response) => {
                            this.$root.user = response.data;
                        });
                    }
                }).catch((error) => {
                    alert('ล็อกอินหรือรหัสผ่านไม่ถูกต้อง ลองอีกทีนะจ๊ะ')
                });
            },
            sidebarRegister() {
                axios.post('/api/register', this.register).then((response) => {
                    // success callback
                    alert('success');
                    console.log(response);
                }).catch((response) => {
                    // error callback
                    console.log(response.error.message);
                });
            },
            sidebarLogout() {
                axios.post('/api/logout', this.login).then((response) => {
                    if (response.data.SUCCESS) {
                        this.$root.user = []
                        localStorage.removeItem('token')
                    }
                }).catch((response) => {
                    //console.log(JSON.stringify(response, null, 4));
                    alert(response.data.ERROR);
                });
            },

            sidebarFbLogin() {
                var vuex = this;

                FB.getLoginStatus(function(response) {
                    if (response.status === 'connected') {
                        vuex.sidebarVerifyFbLogin(response);
                    } else {
                        FB.login(function(response) {
                            vuex.sidebarVerifyFbLogin(response);
                        }, {
                            scope: 'email'
                        }, function() {
                            //hide_whirl();
                        });
                    }
                });
            },

            sidebarVerifyFbLogin: function  (response) {
                if (response.status == 'connected') {
                    var accessToken = response.authResponse.accessToken;


                    alert(accessToken);
                    return false;

                    //show_whirl();

                    axios.post(
                        '/smarty-site/api/v1/fblogin', 
                        {'accessToken': accessToken})
                    .then((response) => {
                        // alert(JSON.stringify(response.data.SUCCESS, null, 4));
                        // localStorage.setItem('token', response.data.token)
                        console.log(response);
                    }).catch((response) => {
                        //console.log(JSON.stringify(response, null, 4));
                        console.log(response);
                    });
                    /*
                    $.ajax({
                        type: "POST",
                        url: '/smarty-site/api/v1/fblogin',
                        data: JSON.stringify({
                            'accessToken': accessToken
                        }), // now data come in this function
                        contentType: "application/json; charset=utf-8",
                        crossDomain: true,
                        dataType: "json",
                        success: function(data, status, jqXHR) {
                            console.log(data);
                            window.open(url, "_self");
                            //hide_whirl();
                        },

                        error: function(jqXHR, status) {
                            var response = JSON.parse(jqXHR.responseText);
                            alert(response.message);
                            //hide_whirl();
                        }
                    });
                    */
                }
            },
            
            // The object to be passed as a header for authenticated requests
            getAuthHeader() {
                return {
                    'Authorization': 'Bearer ' + localStorage.getItem('token')
                }
            }
        }
    }
</script>
