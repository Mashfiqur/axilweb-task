import ApiEndpoints from '../../config/apiEndpoints'
import ApiRequester from '../../helper/apiRequester'
import router from '../../router/index'

export default {
    namespaced: true,
    state:{
        authenticated: localStorage.getItem('authenticated') ? localStorage.getItem('authenticated') : false,
        user: localStorage.getItem('user') ? JSON.parse(localStorage.getItem('user')) : {},
        token:  localStorage.getItem('token') ? localStorage.getItem('token') : "",
    },
    getters:{
        authenticated(state){
            return state.authenticated
        },
        user(state){
            return state.user
        },
        token(state){
            return state.token
        }
    },
    mutations:{
        SET_AUTHENTICATED (state, value) {
            localStorage.setItem('authenticated', value);
            state.authenticated = value
        },
        SET_USER (state, value) {
            localStorage.setItem('user', JSON.stringify(value));
            state.user = value
        },
        SET_TOKEN (state, value){
            localStorage.setItem('token', value != "" ? 'Bearer ' + value : "");
            state.token = value != "" ? 'Bearer ' + value : ""
        }
    },
    actions:{
        submitLogin({commit}, payload){
            ApiRequester.POST(ApiEndpoints.USER_LOGIN_URL, payload, (res) => {
				if (res.success) {
					commit('SET_AUTHENTICATED',true)
                    commit('SET_USER',res.data.user)
                    commit('SET_TOKEN',res.data.token)
                    router.push('/dashboard')
				}
			}, false);
        },
        logout({commit}){
            console.log(1)
            localStorage.removeItem('authenticated');
            localStorage.removeItem('user');
            localStorage.removeItem('token');
            commit('SET_USER',{})
            commit('SET_AUTHENTICATED',false)
            commit('SET_TOKEN',"")
        }
    }
}