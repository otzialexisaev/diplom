import Vuex from 'vuex';
import Vue from 'vue';

Vue.use(Vuex);

import ConstStore from './constStore';
import AdminTestCreateStore from './admin/test/createStore';

export default new Vuex.Store({
    modules: {
        const: ConstStore,
        adminTestCreate: AdminTestCreateStore
    }
});
