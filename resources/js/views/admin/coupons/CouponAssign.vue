<template>
    <h4 class="mt-3"> Assign Coupon</h4>
    
</template>

<script>
import {mapState, mapGetters, mapActions} from 'vuex'

export default {
  name: 'CouponAssign',
  data() {
        return {
            
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
    },
}
</script>

<style>

</style>