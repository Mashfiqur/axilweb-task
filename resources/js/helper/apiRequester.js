import axios from 'axios'
import authStore from '../store/modules/auth';

let headers = {
    'Content-Type': 'application/json; charset=utf-8'
};

const ApiRequester = {
    POST: (url, param, callback, auth = false) => {
        if (auth === true) {
            headers['Authorization'] = authStore.state.token;
        }
        axios.post(url, param, {headers: headers}).then((response) => {
            if (response.status === 200) {
                callback(response.data);
            }
        }).catch(err => {
            const errorCode = parseInt(err.toLocaleString().replace(/\D/g, ""));
            if (errorCode === 401) {
                authStore.actions.logout();
            }
            else if(errorCode === 422){
                callback(err.response.data.errors);
            }
        })
    },
    GET: (url, callback, auth = false) => {
        if (auth === true) {
            headers['Authorization'] = authStore.state.token;
        }
        axios.get(url, {headers: headers}).then((response) => {
            if (response.status === 200) {
                callback(response.data);
            }
        }).catch(err => {
            const error_code = parseInt(err.toLocaleString().replace(/\D/g, ""));
            if (error_code === 401) {
                authStore.actions.logout();
            }
        })
    },
    ErrorHandler(errors) {
        console.log(errors)
    }
}
export default ApiRequester;