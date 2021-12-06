export default {
    namespaced: true,
    state: {
        questions: []
    },
    mutations: {
        addQuestion(state, payload) {
            payload.id = state.questions.length;
            state.questions.push(payload);
        },
        deleteQuestion(state, payload) {
            state.questions = state.questions.filter(value => value.id !== payload);
        }
    },
    getters: {
        questions(state) {
            return state.questions;
        }
    }
}
