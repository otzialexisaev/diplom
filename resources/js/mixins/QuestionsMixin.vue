<script>
export default {
    name: "QuestionsMixin",
    props: {
        data: {
            type: Object,
            default: function () {
                return {
                    items: [],
                    description: '',
                    correctAnswer: null,
                    // todo to make this work with value, pass value to subject select
                    subject_id: null,
                    material_id: null
                }
            }
        },
        index: Number
    },
    computed: {
        selectItems: function () {
            let items = [];
            this.$data.items.forEach((value, index) => {
                items.push({text: value, value: index});
            });
            return items;
        }
    },
    data() {
        return {
            description: this.$props.data.description,
            correctAnswer: this.$props.data.correctAnswer,
            items: this.$props.data.items,
            subject_id: this.$props.data.subject_id,
            material_id: this.$props.data.material_id,
        }
    },
    methods: {
        addChoice: function () {
            this.$data.items.push(this.choiceText);
            this.choiceText = '';
            this.updateData();
        },
        deleteSelf: function () {
            this.$emit('delete');
        },
        updateData: function () {
            this.$emit('update', {
                items: this.$data.items,
                subject_id: this.subject_id,
                material_id: this.material_id,
                description: this.$data.description,
                correctAnswer: this.correctAnswer
            });
        }
    }
}
</script>
