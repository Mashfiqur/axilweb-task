<template>
    <h4 class="mt-3"> Assign Coupon</h4>
    <form class="row" @submit.prevent="couponAssignFormSubmit">
        <div class="form-group col-12">
            <label for="exampleFormControlInput1">Departments:</label>
            <select class="form-control" multiple v-model="couponAssignFormData.departments">
                <option v-for="(department,index) in departments" :value="department.id">{{department.name}}</option>
            </select>
        </div>
        <div class="form-group col-12">
            <label for="exampleFormControlInput1">Courses:</label>
            <select class="form-control" multiple v-model="couponAssignFormData.courses">
                <option v-for="(course,index) in courses" :value="course.id">{{course.code}}</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Assign</button>
    </form>
</template>

<script>
import {mapState, mapGetters, mapActions} from 'vuex'

export default {
  name: 'CouponAssign',
  data() {
        return {
            couponAssignFormData:{
                coupon_id: this.$route.params.id,
                departments: [],
                courses: [],
            },
        }
    },
    computed: {
        ...mapGetters({
            departments: 'department/departments',
            courses: 'course/courses',
        })
    },
    methods:{
        ...mapActions({
            getCourses:'course/getCourses',
            getDepartments:'department/getDepartments',
            assignCoupon:'coupon/assignCoupon'
        }),
        couponAssignFormSubmit(){
            this.assignCoupon(this.couponAssignFormData)
        }
    },
    created(){
        this.getCourses();
        this.getDepartments ();
    }
}
</script>

<style>

</style>