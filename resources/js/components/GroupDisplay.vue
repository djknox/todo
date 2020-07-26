<template>
    <div>
        <div class="card-header flex flex-row items-center">
            {{ group.name }}
            <completion-display
                :completion-percentage="completionPercentage"
                class="ml-2">
            </completion-display>
        </div>

        <div class="card-body">
            <items-display
                :items="group.items"
                v-on:item-deleted="refreshGroupFromResponse"
                v-on:item-completed="refreshGroupFromResponse">
            </items-display>
        
            <add-item-to-group
                :group="group"
                v-on:item-added="refreshGroupFromResponse">
            </add-item-to-group>
        </div>
    </div>
</template>

<script>
    export default {
        name: "group-display",

        props: {
            initialGroup: {
                required: true,
                type: Object,
            },
        },
        data () {
            return {
                group: this.initialGroup,
            };
        },
        methods: {
            refreshGroupFromResponse (response) {
                this.group = response.data.group;
            },
        },
        computed: {
            completedItems () {
                return this.group.items.filter(function (item) {
                    return item.completed;
                });
            },
            uncompletedItems () {
                return this.group.items.filter(function (item) {
                    return !item.completed;
                });
            },
            completionPercentage () {
                let numTotalItems = this.group.items.length;
                let numCompletedItems = this.completedItems.length;
                let completionPercentage = (numCompletedItems / numTotalItems ) * 100;

                return completionPercentage;
            },
        },
    }
</script>