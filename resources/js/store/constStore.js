export default {
    state: {
        courses: [],
        questionTypes: [
            {value: 1, desc: 'Выбор одного ответа'},
            {value: 2, desc: 'Выбор нескольких ответов'},
        ],
        groups: {
            1:
                [
                    {text: '21ИСТв1', id: 1},
                    {text: '21ИСТв2', id: 2}
                ],
            2:
                [
                    {text: '20ИСТв1', id: 3},
                    {text: '20ИСТв2', id: 4}
                ]
        },
        subjects: [
            {id: 1, text: 'first'},
            {id: 2, text: 'second'}
        ],
        materials:
            {
                1:
                    [
                        {title: 'Material 1', id: 1},
                        {title: 'Material 2', id: 2}
                    ],
                2:
                    [
                        {title: 'Material 3', id: 3},
                        {title: 'Material 4', id: 4}
                    ]
            }
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
            await axios.get('/api/admin/subjects')
                .then((res) => {
                    context.commit('setSubjects', res.data);
                })
                .catch((res) => {
                    console.log(res);
                });
        }
    }
}

