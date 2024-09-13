const state = {
    arr: '',
};

const getters = {
    arr: state => state.arr
};

const actions = {
    getUsers({state, commit, dispatch}) {
        let user = axios.get('/api/author').then( response => {
            commit('setArr', response.data)

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
