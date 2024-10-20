import axios from 'axios';
import router from './router';

const api = axios.create();

// start interceptor
api.interceptors.request.use(config =>{

    if(localStorage.getItem('access_token')){
        config.headers.authorization = `Bearer ${localStorage.getItem('access_token')}`
    }

    return config
}, error => {
    console.log(error)
})

api.interceptors.response.use(config =>{
    if(localStorage.getItem('access_token')) {
        config.headers.authorization = `Bearer ${localStorage.getItem('access_token')}`
    }
    return config
}, error => {

    if(error.response.data.message === 'Token has expired') {
        return api.post('/api/auth/refresh', {}, {
            headers: {
                Authorization: `Bearer ${localStorage.getItem('refresh_token')}`
            }
        }).then(response => {
            localStorage.setItem('access_token', response.data.access_token)
            error.config.headers.authorization = `Bearer ${localStorage.getItem('access_token')}`
            return api.request(error.config)
        })
    }
    // } else if(error.response.status === 401 ) {
    //     router.push({name: 'Логин'})
    // }
})
// end interceptor

export default api
