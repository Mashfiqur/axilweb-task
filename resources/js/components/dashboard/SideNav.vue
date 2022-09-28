<template>
    <nav class="nav-side-menu">
        <div class="brand">UNIVERSITY</div>
        <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
        <div class="menu-list">
            <ul id="menu-content" class="menu-content collapse out">
                <li>
                    <router-link to="/dashboard">
                        <a>
                            <i class="fa fa-fw fa-dashboard fa-lg"></i>Dashboard
                        </a>
                    </router-link>
                </li>
                <li>
                    <router-link to="/departments">
                        <a>
                            <i class="fa fa-fw fa-building-o fa-lg"></i>Departments
                        </a>
                    </router-link>
                </li>
                <li>
                    <router-link to="/courses">
                        <a>
                            <i class="fa fa-fw fa-graduation-cap fa-lg"></i>Courses
                        </a>
                    </router-link>
                </li>
                <li>
                    <router-link to="/coupons">
                        <a>
                            <i class="fa fa-fw fa-envelope-open-o fa-lg"></i>Coupons
                        </a>
                    </router-link>
                </li>
            </ul>
        </div>
        <button class="btn btn-primary logout" @click="logoutClicked">Logout</button>
    </nav>
</template>

<script>
import {mapActions, mapGetters} from 'vuex'

export default {
  name: 'SideNav',
  computed: {
      ...mapGetters({
        authenticated: 'auth/authenticated',
        token: 'auth/token',
      })
  },
  methods:{
      ...mapActions({
          logout:'auth/logout'
      }),
      logoutClicked(){
        this.logout();
        this.$router.push('/')
      }
  },
  created(){
      if(this.authenticated === 'false' || this.token == ""){
        this.$router.push('/')
      }
  }
}
</script>

<style>
html,
body {
  width: 100vw;
  height: 100vh;
}
.nav-side-menu {
  overflow: auto;
  font-family: 'Roboto', sans-serif;
  font-size: 12px;
  font-weight: 200;
  background-color: #2e353d;
  position: fixed;
  top: 0;
  width: 250px;
  height: 100%;
  color: #e1ffff;
}
.nav-side-menu .brand {
  background-color: #23282e;
  line-height: 50px;
  display: block;
  text-align: center;
  font-size: 14px;
}
.nav-side-menu .toggle-btn {
  display: none;
}
.nav-side-menu ul {
  list-style: none;
  padding: 0;
  margin: 0;
  line-height: 35px;
  cursor: pointer;
}
.nav-side-menu ul .active {
  border-left: 3px solid #d19b3d;
  background-color: #4f5b69;
}
.nav-side-menu ul .sub-menu li.active {
  color: #d19b3d;
}
.nav-side-menu ul .sub-menu li.active a {
  color: #d19b3d;
}
.nav-side-menu ul .sub-menu li {
  background-color: #181c20;
  border: none;
  line-height: 28px;
  border-bottom: 1px solid #23282e;
  margin-left: 0;
}
.nav-side-menu ul .sub-menu li:hover {
  background-color: #020203;
  transition: none;
}
.nav-side-menu li {
  list-style: none;
  padding: 0;
  margin: 0;
  line-height: 35px;
  cursor: pointer;
  padding-left: 0;
  border-left: 3px solid #2e353d;
  border-bottom: 1px solid #23282e;
  transition: all 0.2s ease;
}
.nav-side-menu li .active {
  border-left: 3px solid #d19b3d;
  background-color: #4f5b69;
}
.nav-side-menu li .sub-menu li.active {
  color: #d19b3d;
}
.nav-side-menu li .sub-menu li.active a {
  color: #d19b3d;
}
.nav-side-menu li .sub-menu li {
  background-color: #181c20;
  border: none;
  line-height: 28px;
  border-bottom: 1px solid #23282e;
  margin-left: 0;
}
.nav-side-menu li .sub-menu li:hover {
  background-color: #020203;
}
.nav-side-menu li a {
  text-decoration: none;
  color: #e1ffff;
}
.nav-side-menu li a i {
  margin: 10px 15px;
}
.nav-side-menu li:hover {
  border-left: 3px solid #d19b3d;
  background-color: #4f5b69;
  transition: none;
}
.sub-menu li {
  padding-left: 20px;
}
body {
  margin: 0;
  padding: 0;
}
li .fa-chevron-down {
  margin: 10px;
  vertical-align: middle;
  float: right;
  transition: transform 0.4s;
}
li.active .fa-chevron-down {
  transform: rotateX(180deg);
}
@media (max-width: 767px) {
  .nav-side-menu {
    position: relative;
    width: 100%;
    height: auto;
    margin-bottom: 10px;
  }
  .nav-side-menu .toggle-btn {
    display: block;
    cursor: pointer;
    position: absolute;
    right: 10px;
    top: 10px;
    z-index: 10 !important;
    padding: 3px;
    background-color: #fff;
    color: #000;
    width: 40px;
    text-align: center;
    border-radius: 4px;
  }
  .brand {
    text-align: left !important;
    font-size: 22px;
    padding-left: 20px;
    line-height: 50px !important;
  }
}
@media (min-width: 767px) {
  .nav-side-menu .menu-list .menu-content {
    display: block;
  }
}
table {
  color: #eee;
}
.logout{
  position : absolute;
  bottom   : 45px;
  margin-left: 80px
}
</style>