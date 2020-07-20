<template>
    <div>
        <button
            @click="showForm = !showForm"
            class="rounded-full hover:bg-red-300 px-2 py-1 mr-4">
            <TrashIcon class="h-4 w-4" />
        </button>
        <div
            v-if="showForm"
            class="absolute z-1 bg-red-100 p-3 shadow rounded">
            <div
                v-if="submitting == false"
                class="flex flex-col items-center">
                <button
                    class="shadow bg-red-800 hover:bg-red-900 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded text-sm"
                    @click="submit()">
                        Confirm Delete
                </button>
                <a 
                    @click.prevent="showForm = false"
                    class="mt-2 text-xs"
                    href="#">
                    cancel
                </a>
            </div>

            <div v-if="submitting">
                <div 
                    v-if="successMessage"
                    class="alert alert-success text-center"
                    role="alert">
                    {{ successMessage }}
                </div>

                <div
                    v-if="showSubmittingMessage"
                    class="alert alert-secondary text-center"
                    role="alert">
                    Deleting Item...
                </div>

                <div
                    v-for="error of errors"
                    v-bind:key="error.id"
                    class="alert alert-danger text-center"
                    role="alert">
                    {{ error[0] }}
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import { TrashIcon } from 'vue-feather-icons';
    
    export default {
        name: "item-delete",

        props: {
            item: {
                required: true,
                type: Object,
            },
        },

        components: {
            TrashIcon
        },

        data () {
            return {
                submitting: false,
                showForm: false,
                showSubmittingMessage: false,
                successMessage: null,
                errors: [],
            };
        },

        methods: {
            submit () {
                this.submitting = true;
                this.showSubmittingMessage = true;
                this.successMessage = null;
                this.errors = [];

                axios.delete('/items/' + this.item.id)
                     .then((response) => {
                        this.successMessage = null;
                        this.showForm = true;
                        this.showSubmittingMessage = false;
                        this.errors = [];

                        this.successMessage = response.data.message;

                        this.$emit('item-deleted', response);
                     })
                     .catch(error => {
                        this.showSubmittingMessage = false;
                        this.errors = error.response.data.errors;
                });
            },
        },
    }
</script>