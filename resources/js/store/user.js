import axios from 'axios'
import router from '../router'

export default {
    namespaced: true,
    state:{
      users: {},
      user:{}
    },
    mutations:{
        SET_USERS (state, value) {
            state.users = value
      },
      SET_USER (state, value) {
            state.user = value
      }
    },
    actions:{
        getUsers({commit}){
        return axios.get('/api/users').then(({ data }) => {
                commit('SET_USERS',data.users)
            }).catch(({response:{data}})=>{
                commit('SET_USERS',{})
            })
      },
      deleteUser({ commit},params) {
        return axios.post('/api/delete', params);
      },
      getUserById({ commit }, params) {
        return axios.get('/api/get-user/'+params.id);
      },
    }
}