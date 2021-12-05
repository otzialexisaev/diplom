import Vuex from 'vuex';
import Vue from 'vue';
import ConstStore from './constStore';

Vue.use(Vuex);

export default new Vuex.Store({
    modules: {
        const: ConstStore
    }
});
