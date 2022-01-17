export default {
    state: {
        courses: [],
        questionTypes: [
            {value: 1, desc: 'Выбор одного ответа'},
            {value: 2, desc: 'Выбор нескольких ответов'},
        ],
        groups: {},
        subjects: [],
        materials: {}
    },
    mutations: {
        setGroups(state, data) {
            let groups = {};
            data.forEach((value) => {
                if (typeof groups[value.course] === "undefined") {
                    groups[value.course] = [];
                }
                groups[value.course].push({
                    id: value.id,
                    title: value.title
                });
            });
            state.groups = groups;
        },
        setCourses(state, data) {
            data.forEach((value) => {
                state.courses.push({
                    text: value,
                    value: Number(value)
                });
            });
        },
        setSubjects(state, data) {
            state.subjects = data;
        },
        setMaterials(state, data) {
            let materials = {};
            data.forEach((material) => {
                material.subjects.forEach((subject) => {
                    if (typeof materials[subject.id] === 'undefined') {
                        materials[subject.id] = [];
                    }
                    materials[subject.id].push({
                        id: material.id,
                        title: material.title
                    });
                });
            });
            state.materials = materials;
        }
    },
    actions: {
        async loadGroups(context) {
            await axios.get('/api/admin/groups')
                .then((res) => {
                    context.commit('setGroups', res.data);
                    context.commit('setCourses', Object.keys(context.state.groups));
                });
        },
        async loadSubjects(context) {
            await axios.get('/api/admin/subjects/getAll')
                .then((res) => {
                    context.commit('setSubjects', res.data);
                })
                .catch((res) => {
                    console.log(res);
                });
        },
        async loadMaterials(context) {
            await axios.get('/api/admin/materials/getAll')
                .then((res) => {
                    context.commit('setMaterials', res.data);
                })
                .catch((res) => {console.log(res)});
        }
    }
}

