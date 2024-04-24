import Vuex from 'vuex'
import Person from './modules/person.js'

const store = new Vuex.Store({
    modules: {
        Person
    }
})

export default store;
