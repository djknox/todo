<template>
    <div>
        <div class="card-header">
            {{ group.name }}
        </div>

        <div class="card-body">
            <item-display
                v-for="item of group.items"
                :key="item.id"
                :item="item"
                v-on:item-deleted="refreshGroupFromResponse"
                v-on:item-completed="refreshGroupFromResponse"
                class="my-4">
            </item-display>
        
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
    }
</script>