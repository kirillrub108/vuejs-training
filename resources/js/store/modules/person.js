import router from "@/router.js";
import person from "@/store/modules/person.js";

const Person = {
    state: () => ({
        person: {
            name: null,
            age: null,
            job: null,
        },
        people: null,
    }),

    getters: {
        person: state => state.person,
        people: state => state.people,
        isDisabled: state => !(state.person.name && state.person.age && state.person.job)
    },

    actions: {
        getPerson({commit}, id) {
            axios.get(`/api/people/${id}`)
                .then(res => {
                    commit('setPerson', res.data.data)
                })
        },

        getPeople({commit}) {
            axios.get('/api/people')
                .then(res => {
                    commit('setPeople', res.data.data)
                })
        },

        deletePerson({dispatch}, id) {
            axios.delete(`/api/people/${id}`)
                .then(res => {
                    dispatch('getPeople')
                })
        },

        updatePerson({}, data) {
            axios.patch(`/api/people/${data.id}`, {
                name: data.name,
                age: data.age,
                job: data.job
            }).then(res => {
                router.push({name: 'person.show', params: {id: data.id}})
            })
        },

        storePerson({}, data) {
            axios.post('/api/people', {
                name: data.name,
                age: data.age,
                job: data.job
            }).then(res => {
                router.push({ name: 'person.index'})
            })
        }
    },

    mutations: {
        setPerson(state, person) {
            state.person = person
        },

        setPeople(state, people) {
            state.people = people
        },
    }
}

export default Person
