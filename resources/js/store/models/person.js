const state = {
    arr: '',
    people: ''
};

const getters = {
    arr: state => state.arr
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
            console.log(response.data)
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
                return error.response.data.errors
            }
        )
    },

    editPerson({state, commit, dispatch}, params) {
        return axios.patch(`/api/`+ params.id, {title: params.title, text: params.text}).then( response => {
            let data = response.data

        }).catch(
            error => console.log(error)
        )
    },
    deletePerson({state, commit, dispatch}, params) {
        return  axios.delete(`/api/`+ params).then( response => {
            let data = response.data

        }).catch(
            error => console.log(error)
        )
    }
};

const mutations = {
    setArr(state, arr) {
        state.arr = arr
       }
    }

    export default {
        state,
        getters,
        actions,
        mutations
    }
