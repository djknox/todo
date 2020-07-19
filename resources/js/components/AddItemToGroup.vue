<template>
    <div>
        <div
            @click="showFormButtonClicked()"
            v-if="!showForm"
            class="text-center">
            <button>
                Add Item
            </button>
        </div>

        <div v-if="showForm">
            <div class="flex flex-col container px-5 pb-3 mt-5">
                <form @submit.prevent="submit">

                    <div class="flex rounded-md mt-2">
                        <input
                            type="text"
                            placeholder="Enter a description"
                            class="flex-1 border bg-white border-gray-100 form-input block w-full rounded-md transition duration-150 ease-in-out text-base sm:leading-5 h-12 t4 text-blue-900 text-center"
                            v-model="item.description"
                            required
                        />
                    </div>
                </form>

                <div 
                    v-if="!this.successMessage"
                    class="mt-4 text-center flex flex-col">
                    <button
                        @click.prevent="submit()"
                        :class="submitButtonClasses"
                        :disabled="!inputsAreValid">
                        Add Item
                    </button>
                    <a
                        @click.prevent="showForm = false"
                        class="mt-4"
                        href="#">
                        cancel
                    </a>
                </div>
            </div>
        </div>

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
            Adding Item...
        </div>

        <div
            v-for="error of errors"
            v-bind:key="error.id"
            class="alert alert-danger text-center"
            role="alert">
            {{ error[0] }}
        </div>
    </div>
</template>

<script>
    export default {
        name: "add-item-to-group",

        props: {
            group: {
                required: true,
                type: Object,
            },
        },
        data () {
            return {
                item: {
                    description: '',
                },
                showForm: false,
                showSubmittingMessage: false,
                successMessage: null,
                errors: [],
            }
        },
        methods: {
            showFormButtonClicked () {
                this.showForm = true;
                this.successMessage = null;
                this.errors = [];
            },
            submit () {
                this.showSubmittingMessage = true;
                this.successMessage = null;
                this.errors = [];

                axios.post(`/groups/${this.group.id}/items`, this.item)
                .then((response) => {
                    this.reset();
                    this.successMessage = response.data.message;

                    this.$emit('item-added', response);
                })
                .catch(error => {
                    this.showSubmittingMessage = false;
                    this.errors = error.response.data.errors;
                });
            },
            reset () {
                this.item.description = '';
                this.successMessage = null;
                this.showForm = false;
                this.showSubmittingMessage = false;
                this.errors = [];
            },
        },
        computed: {
            inputsAreValid () {
                return this.item.description;
            },
            submitButtonClasses () {
                return {
                    'inline-flex items-center justify-center px-5 py-3 border border-transparent text-base leading-6 font-medium rounded-md text-white bg-primary hover:bg-indigo-500 focus:outline-none focus:shadow-outline transition duration-150 ease-in-out': this.inputsAreValid,
                    'inline-flex items-center justify-center px-5 py-3 border border-transparent text-base leading-6 font-medium rounded-md text-gray-400 bg-gray-300 focus:outline-none focus:shadow-outline transition duration-150 ease-in-out pointer-events-none': !this.inputsAreValid,
                };
            },
        },
    }
</script>