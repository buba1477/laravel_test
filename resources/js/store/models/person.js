import router from './../../router';

const state = {
    arr: '',
    people: '',
    errorUpdate: [

    ],
};

const getters = {
    arr: state => state.arr,
    errorUpdate: state => state.errorUpdate
};

const actions = {
    getUsers({state, commit, dispatch}) {
        let user = axios.get('/api/people').then( response => {
            commit('setArr', response.data)

        }).catch(
            error => console.log(error)
        )
    },
    getUser({state, commit, dispatch}, id) {
       return axios.get('/api/' + id).then( response => {
           return response.data

        }).catch(
            error => console.log(error)
        )
    },
    addPerson({state, commit, dispatch}, person) {
        return axios.post('/api/people', {title: person.title, text: person.text}).then( response => {
            let data = response.data
            return data
    }).catch(
            error => {
                return error.response.data
            }
        )
    },

    editPerson({state, commit, dispatch}, params) {
        return axios.patch(`/api/`+ params.id, {title: params.title, text: params.text}).then( response => {

           router.push({ path: '/' });
            return response.data

        }).catch(
            error => {
                console.log( error.response.data.errors);
                commit('setUpdateErr', error.response.data.errors)
            }
        )
    },
    deletePerson({state, commit, dispatch}, params) {
        return  axios.delete(`/api/`+ params).then( response => {
            dispatch('getUsers')
            return response.data

        }).catch(
            error => console.log(error)
        )
    }
};

const mutations = {
    setArr(state, arr) {
        state.arr = arr
       },

        setUpdateErr(state, errorUpdate) {
            state.errorUpdate = errorUpdate
        }
    }

    export default {
        state,
        getters,
        actions,
        mutations
    }
