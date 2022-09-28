<template>
    <div class="w-100">
        <div class="wrapper">
            <SideNav/>
            <div class="content">
                <router-view></router-view>
            </div>
        </div>
    </div>
</template>
<script>
import SideNav from "../components/dashboard/SideNav.vue";

export default {
    components: {SideNav}
}
</script>


<style>
@media (min-width: 767px) {
  .content {
    margin-left: 250px;
  }
}
.content {
  padding: 20px;
}
.content p {
  color: #eee;
}
</style>