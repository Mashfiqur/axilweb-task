import ApiEndpoints from '../../config/apiEndpoints'
import ApiRequester from '../../helper/apiRequester'
import router from '../../router'

export default {
    namespaced: true,
    state: {
        coupons: [],
        errors: []
    },
    getters: {
        coupons(state){
            return state.coupons
        },
        errors(state){
            return state.errors
        },
    },
    mutations: {
        SET_COUPONS (state, value) {
            state.coupons = value
        },
        SET_ERRORS (state, value) {
            state.errors = value
        },
    },
    actions: {
        getCoupons({commit}) {
            ApiRequester.GET(ApiEndpoints.GET_COUPONS_URL, (res) => {
                console.log(res)
				if (res.success) {
					commit('SET_COUPONS',res.data.coupons.data)
				}
			}, true);
        },
        storeCoupon({commit}, payload){
            ApiRequester.POST(ApiEndpoints.GET_COUPONS_URL,payload, (res) => {
				if (res?.success) {
					router.push('/coupons')
				}else{
					commit('SET_ERRORS',res)
                }
			}, true);
        },
        assignCoupon({commit}, payload){
            ApiRequester.POST(ApiEndpoints.ASSIGN_COUPON_URL,payload, (res) => {
				if (res?.success) {
					router.push('/coupons')
				}
			}, true);
        }
        
    }
}