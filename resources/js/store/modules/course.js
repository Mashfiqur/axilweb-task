import ApiEndpoints from '../../config/apiEndpoints'
import ApiRequester from '../../helper/apiRequester'

export default {
    namespaced: true,
    state: {
        courses: []
    },
    getters: {
        courses(state){
            return state.courses
        },
    },
    mutations: {
        SET_COURSES (state, value) {
            state.courses = value
        },
    },
    actions: {
        getCourses({commit}) {
            ApiRequester.GET(ApiEndpoints.GET_COURSES_URL, (res) => {
				if (res.success) {
					commit('SET_COURSES',res.data.courses.data)
				}
			}, true);
        },
        
    }
}