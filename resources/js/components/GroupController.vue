<template>
    <div class="card">
        <group-display
            :initial-group="group">
        </group-display>
        
        <add-item-to-group
            :group="group"
            v-on:item-added="addItemToGroup">
        </add-item-to-group>
    </div>
</template>

<script>
    export default {
        name: "group-controller",

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
            addItemToGroup (response) {
                this.group = response.group;
            },
        },
    }
</script>