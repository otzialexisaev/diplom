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
                    correct: null,
                    // todo to make this work with value, pass value to subject select
                    material_id: null
                }
            }
        },
        subject_id: Number,
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
            correct: this.$props.data.correct,
            items: this.$props.data.items,
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
                material_id: this.material_id,
                description: this.$data.description,
                correct: this.correct
            });
        }
    }
}
</script>
