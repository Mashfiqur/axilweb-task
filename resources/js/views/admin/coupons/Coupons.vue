<template>
    <div class="row">
        <div class="col-6">
            <h5>Coupons</h5>
        </div>
        <div class="col-6">
            <router-link to="coupons/create">
                <button class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Create Coupon</button>
            </router-link>
        </div>
    </div>
    <table class="table">
      <thead>
        <tr>
          <th>Name</th>
          <th>CODE</th>
          <th>Type</th>
          <th>Amount</th>
          <th>Expiration Date</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(coupon, index) in coupons">
          <td>{{ coupon.name }}</td>
          <td>{{ coupon.code }}</td>
          <td>{{ coupon.type ? coupon.type.toUpperCase() : "" }}</td>
          <td>{{ coupon.fixed_amount }}</td>
          <td>{{ coupon.expiration_date }}</td>
          <td><router-link to="/coupon/assign">Assign</router-link></td>
        </tr>
      </tbody>
    </table>
</template>

<script>
import {mapState, mapGetters, mapActions} from 'vuex'

export default {
  name: 'Coupons',
  data() {
        return {
            
        }
    },
    computed: {
        ...mapGetters({
          coupons: 'coupon/coupons',
        })
    },
    methods:{
        ...mapActions({
            getCoupons:'coupon/getCoupons',
            storeCoupon:'coupon/storeCoupon',
        }),
        storeCouponClicked(){

        }
    },
    created(){
      this.getCoupons()
    }
}
</script>

<style>

</style>