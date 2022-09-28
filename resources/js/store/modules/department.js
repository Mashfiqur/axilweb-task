import ApiEndpoints from '../../config/apiEndpoints'
import ApiRequester from '../../helper/apiRequester'

export default {
    namespaced: true,
    state: {
        departments: []
    },
    getters: {
        departments(state){
            return state.departments
        },
    },
    mutations: {
        SET_DEPARTMENTS (state, value) {
            state.departments = value
        },
    },
    actions: {
        getDepartments({commit}) {
            ApiRequester.GET(ApiEndpoints.GET_DEPARTMENTS_URL, (res) => {
				if (res.success) {
					commit('SET_DEPARTMENTS',res.data.departments.data)
				}
			}, true);
        },
        
    }
}