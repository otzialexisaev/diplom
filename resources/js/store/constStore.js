export default {
    state: {
        courses: [
            {
                text: 1,
                value: 1
            },
            {
                text: 2,
                value: 2
            }
        ],
        questionTypes: [
            { value: 1, desc: 'Выбор одного ответа' },
            { value: 2, desc: 'Выбор нескольких ответов' },
        ],
        groups: {
            1: [
                {text: '21ИСТв1', id: 1},
                {text: '21ИСТв2', id: 2}
            ],
            2: [
                {text: '20ИСТв1', id: 3},
                {text: '20ИСТв2', id: 4}
            ]
        },
        subjects: [
            {id: 1, text: 'first'},
            {id: 2, text: 'second'}
        ],
        materials: {
            1: [
                {title: 'Material 1', id: 1},
                {title: 'Material 2', id: 2}
            ],
            2: [
                {title: 'Material 3', id: 3},
                {title: 'Material 4', id: 4}
            ]
        }
    }
}
