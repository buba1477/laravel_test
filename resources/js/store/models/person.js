import router from './../../router';
import {max} from "@popperjs/core/lib/utils/math.js";
import api from "../../api";

const state = {
    arr: '',
    people: '',
    errorUpdate: {
        title: '',
        text: ''
    },
    file: []

};

const getters = {
    arr: state => state.arr,
    errorUpdateText: state => state.errorUpdate.text ? state.errorUpdate.text[0] : '',
    errorUpdateTitle: state => state.errorUpdate.title ? state.errorUpdate.title[0] : '',
};



const actions = {
    getUsers({state, commit, dispatch}) {
        return api.get('/api/auth/people').then( response => {

            commit('setArr', response.data)
        }).catch(
            error => console.log(error)
        )
    },
    getUser({state, commit, dispatch}, id) {
       return api.get('/api/auth/' + id).then( response => {

           return response.data

        }).catch(
            error => console.log(error)
        )
    },
    addPerson({state, commit, dispatch}, person) {
        return api.post('/api/auth/people', person).then( response => {

            router.push({ path: '/' })
            commit('setUpdateErr', {title: '', text: ''})
            let data = response.data
            return data
    }).catch(
            error => {
                commit('setUpdateErr', error.response.data.errors)
            }
        )
    },

    editPerson({state, commit, dispatch}, param) {
        return api.post(`/api/auth/peoples/${param.id}`, param.data).then( response => {

            router.push({ path: '/' });
            commit('setUpdateErr', {title: '', text: ''})
        }).catch(
            error => {
                commit('setUpdateErr', error.response.data.errors)
            }
        )
    },
    deletePerson({state, commit, dispatch}, params) {
        return  api.delete(`/api/auth/people/`+ params).then( response => {
            dispatch('getUsers')
            return response.data

        }).catch(
            error => console.log(error)
        )
    },

    downloadFile({state, commit, dispatch}, param) {
        return api.get(`/api/auth/download`, {
            params: param
        }).then(response =>{
           return response.data;
        })
    },
    deleteFile({state, commit, dispatch}, param){
        return api.delete(`/api/auth/${param}`).then(response =>{
            dispatch('getUsers');
        })
    },

    };



const mutations = {
    setArr(state, arr) {
        state.arr = arr

       },

        setUpdateErr(state, errorUpdate) {
            state.errorUpdate = errorUpdate
        },
    setFile(state, arr){
        state.file = arr
    }
    }

    export default {
        state,
        getters,
        actions,
        mutations
    }
