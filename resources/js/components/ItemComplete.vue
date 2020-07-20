<template>
    <div>
        <button
            @click="submit()"
            :class="submitButtonClasses">
            <CheckIcon />
        </button>
    </div>
</template>

<script>
    import { CheckIcon } from 'vue-feather-icons';

    export default {
        name: "item-complete",

        props: {
            initialItem: {
                required: true,
                type: Object,
            },
        },

        components: {
            CheckIcon
        },

        data () {
            return {
                item: this.initialItem,
            };
        },

        methods: {
            submit () {
                this.item.completed = !this.item.completed;
                
                axios.patch('/items/' + this.item.id, this.item)
                     .then((response) => {
                        this.$emit('item-completed', response);
                     })
                     .catch(error => {
                });
            },
        },
        computed: {
            submitButtonClasses () {
                return {
                    'rounded-full bg-green-300 px-2 py-1 mr-4': this.item.completed,
                    'rounded-full hover:bg-green-300 px-2 py-1 mr-4': !this.item.completed,
                };
            },
        },
    }
</script>