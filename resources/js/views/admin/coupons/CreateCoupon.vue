<template>
    <h4 class="mt-3"> Create a new Coupon</h4>
    <form class="row" @submit.prevent="createCouponFormSubmit">
        <div class="form-group col-md-6 col-sm-12">
            <label for="exampleFormControlInput1">*Name:</label>
            <input required type="text" v-model="couponData.name" class="form-control" id="exampleFormControlInput1" placeholder="EID BONUS">
            <small class="text-danger"> {{ errors['name'] ? errors['name'][0] : ""}} </small>
        </div>
        <div class="form-group col-md-6 col-sm-12">
            <label for="exampleFormControlInput1">*CODE:</label>
            <input required type="text" class="form-control" v-model="couponData.code" id="exampleFormControlInput1" placeholder="EID20221">
            <small class="text-danger"> {{ errors['code'] ? errors['code'][0] : ""}} </small>
        </div>
        <div class="form-group col-md-6 col-sm-12">
            <label for="exampleFormControlInput1">*Type:</label>
            <select class="form-control" v-model="couponData.type" required>
                <option value="fixed">Fixed</option>
                <option value="percentage">Percentage</option>
            </select>
        </div>
        <div class="form-group col-md-6 col-sm-12" v-if="couponData.type === 'fixed'">
            <label for="exampleFormControlInput5">*Fixed Amount:</label>
            <input type="number" step="0.01" min="0.01" class="form-control" v-model="couponData.fixed_amount" id="exampleFormControlInput5" placeholder="123.50" :required="couponData.type === 'fixed'">
            <small class="text-danger"> {{ errors['fixed_amount'] ? errors['fixed_amount'][0] : ""}} </small>
        </div>
        <div class="form-group col-md-6 col-sm-12" v-if="couponData.type === 'percentage'">
            <label for="exampleFormControlInput6">*Percentage Off(%):</label>
            <input type="number" step="0.01" min="0.01" max="100" v-model="couponData.percentage_off" class="form-control" id="exampleFormControlInput6" placeholder="12.50" :required="couponData.type === 'percentage'">
            <small class="text-danger"> {{ errors['percentage_off'] ? errors['percentage_off'][0] : ""}} </small>
        </div>
        <div class="form-group col-md-6 col-sm-12">
            <label for="exampleFormControlInput7">Expiration Date:</label>
            <input required type="date" class="form-control" v-model="couponData.expiration_date" id="exampleFormControlInput7" :min="couponData.expiration_date">
            <small class="text-danger"> {{ errors['expiration_date'] ? errors['expiration_date'][0] : ""}} </small>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Create</button>
    </form>
</template>

<script>
import {mapState, mapGetters, mapActions} from 'vuex'

export default {
  name: 'CreateCoupon',
  data() {
        return {
            couponData:{
                name: '',
                code: '',
                type: 'fixed',
                fixed_amount: 0,
                percentage_off: null,
                expiration_date: new Date().toISOString().slice(0, 10)
            }
        }
    },
    computed: {
        ...mapGetters({
            errors: 'coupon/errors',
        })
    },
    methods:{
        ...mapActions({
            storeCoupon:'coupon/storeCoupon',
        }),
        createCouponFormSubmit(){
            this.storeCoupon(this.couponData)
        }
        
    },
}
</script>

<style>

</style>